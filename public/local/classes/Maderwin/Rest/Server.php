<?php

namespace Maderwin\Rest;

use \Bitrix\Main\Context;
use Exception;
use Impocar\Utils;
use Maderwin\Utils\Site;
use Maderwin\Utils\User;

/**
 * Class Server
 * @package Maderwin\Rest
 */
class Server {

    protected $url;
    protected $className;
    protected $classInfo;
    protected $request;
    protected $arOptions;
    protected $debug;

    protected $isLogged = false;

    public function __construct($url, $className, $arOptions = []){
        $this->url = $url;
        $this->className = $className;
        $this->request = Context::getCurrent()->getRequest();
        $this->arOptions = $arOptions;
        $this->debug = false;
    }

    public function handle(){
        if($this->request['debug']) {
            $this->debug = true;
        }
        if(!$this->request['method']) {
            return $this->renderDocs($this->getClassInfo());
        }

        if(!$this->requireAuth()){
            return false;
        }

        if(!is_string($this->request['method'])){
            return $this->emitError('Invalid method name');
        }

        if(!$this->isMethodExists($this->request['method'])) {
            return $this->emitError('No such method "' . $this->request['method'] . '"');
        }

        try {
            $this->checkMethodParams($this->request['method'], $this->request['arg']);
            $result = $this->callMethod($this->request['method'], $this->request['arg']);
        } catch(Exception $e){
            return $this->emitError($e->getMessage(), $e->getTrace());
        }

        return $this->emitSuccess($result);
    }

    protected function callMethod($methodName, $arParamList){
        $methodInfo = $this->getClassInfo(true)[$methodName];

        $arCallParams = [];

        if($methodInfo['params']['xml'] && $this->request->getRequestMethod() == 'POST' && $_SERVER['CONTENT_TYPE'] == 'application/xml'){
            $arParamList['xml'] = trim($GLOBALS['HTTP_RAW_POST_DATA']);
        }

        foreach($methodInfo['params'] as $key => $arParam){
            if(isset($arParamList[$key])){
                $arCallParams[] = $arParamList[$key];
            }elseif(in_array('null', $arParam['type']) || in_array('void', $arParam['type'])){
                $arCallParams[] = null;
            }else{
                throw new Exception('No value for parameter "'.$key.'"');
            }
        }

        $result =  call_user_func_array([ new $this->className, $methodName], $arCallParams);
//        $result = !is_bool($result) ? $result : ($result ? 'true' : 'false');

        return $result;
    }

    protected function emitAndLogout($data){
        $this->emit($data);

        if($this->isLogged){
            (new \CUser)->Logout();
        }

        return true;
    }

    protected function emit($data){
        var_dump($data);

        return true;
    }

    protected function emitSuccess($data){
        return $this->emitAndLogout([
            'success' => true,
            'result' => $data
        ]);
    }

    protected function emitFail(){
        return $this->emitAndLogout( [ 'success' => false]);
    }

    protected function emitError($message, $stack=[]){
        if($this->debug){
            return $this->emitAndLogout([
                'success' => false,
                'error' => $message,
                'stack' => print_r($stack, true)
            ]);
        }
        return $this->emitAndLogout([
            'success' => false,
            'error' => $message
        ]);
    }

    protected function getClassInfo($filterVisible = false){
        if($this->classInfo && !$filterVisible) {
            return $this->classInfo;
        }

        $classRef = \Zend\Server\Reflection::reflectClass($this->className);

        $arMethodRefList = $classRef->getMethods();
        $arResult = [];

        foreach($arMethodRefList as $methodRef){
            /*
             * @var \Zend\Server\ReflectionMethod $methodRef
             */

            $methodName = $methodRef->getName();


            $arParams = [];
            $arReturnType = [
                'description' => '',
                'type' => []
            ];

            foreach($methodRef->getPrototypes() as $proto){
                if(!$arReturnType['description'] && !is_null($proto->return->getDescription())){
                    $arReturnType['description'] = $proto->return->getDescription();
                }
                $arReturnType['type'][] = $proto->return->getType();
                $arReturnType['type'] = array_unique($arReturnType['type']);

                foreach($proto->getParameters() as $param){
                    $name = $param->getName();
                    if(!$filterVisible && $name == 'xml'){
                        continue;
                    }
                    if(!$arParams[$name]){
                        $arParams[$name] = [
                            'name' => $name,
                            'description' => $param->getDescription(),
                            'type' => []
                        ];
                    }
                    $arParams[$name]['type'][] = $param->getType();
                    $arParams[$name]['type'] = array_unique($arParams[$name]['type']);
                }
            }

            $minParams = $maxParams = sizeof($arParams);

            foreach($arParams as $arParam){
                if(in_array('null', $arParam['type']) || in_array('void', $arParam['type'])){
                    $minParams--;
                }
            }


            $arResult[$methodName] = [
                'name' => $methodName,
                'description' => $methodRef->getDescription(),
                'params' => $arParams,
                'minParams' => $minParams,
                'maxParams' => $maxParams,
                'return' => $arReturnType,
                'url' => $this->url . '#' . $methodName,
                'example' => $this->getMethodExample($methodName, $arParams)
            ];
        }

        return $arResult;
    }

    protected function getMethodExample($name, $arParams){
        $arUrlParams = [];

        foreach($arParams as $arParam){
            if($arParam['name'] == 'xml'){
                continue;
            }
            $arUrlParams['arg'][$arParam['name']] = '{' . implode('|', $arParam['type']) .'}';
        }

        $result = $this->url . '?method=' . $name . ($arUrlParams ? '&' . http_build_query($arUrlParams) : '');

        $result = urldecode($result);

        return $result;
    }

    protected function getEndpointName(){
        $arName = explode('\\', $this->className);

        return end($arName);
    }

    protected function renderDocs($arDocs){
        include P_LAYOUT . 'docs/header.php';
        ?>
            <h1><?=$this->getEndpointName()?>  reference</h1>
            <?php foreach($arDocs as $arMethod): ?>
                <div class="row" id="<?=$arMethod['name']?>">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-3">
                                    <h3>
                                        <small><a href="<?=$arMethod['url']?>"><span class="glyphicon glyphicon-share"></span></a></small>
                                        <?=$arMethod['name']?>
                                    </h3>
                                    <?=$arMethod['description']?>
                                </div>
                                <div class="col-md-9">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Parameters</div>
                                        <table class="table table-hover table-bordered">
                                            <?php if($arMethod['params']): ?>
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40px">#</th>
                                                        <th style="width: 200px">Name</th>
                                                        <th style="width: 200px">Type</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <?php $i = 0; foreach($arMethod['params'] as $arParam): $i++; ?>
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$arParam['name']?></td>
                                                        <td><?=implode(' | ', $arParam['type'])?></td>
                                                        <td><?=$arParam['description'] ? $arParam['description'] : '<em>(no description)</em>'?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="font-weight: 300;"><em>(no parameters)</em></th>
                                                    </tr>
                                                </thead>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Returns</div>
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 240px"></th>
                                                    <th style="width: 200px">Type</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td></td>
                                                <td><?=implode(' | ', $arMethod['return']['type'])?></td>
                                                <td><?=$arMethod['return']['description'] ? $arMethod['return']['description'] : '<em>(no description)</em>'?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <pre><?=$arMethod['example']?></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php
        include P_LAYOUT . 'docs/footer.php';

        return true;
    }

    protected function isMethodExists($method){
        return method_exists($this->className, $method);
    }

    protected function checkMethodParams($methodName, $arParams){
        $arMethodInfo = $this->getClassInfo()[$methodName];
        if(sizeof($arParams) > $arMethodInfo['maxParams']){
            throw new Exception('Too many parameters');
        }

        if(sizeof($arParams) < $arMethodInfo['minParams']){
            throw new Exception('Not enough parameters');
        }

        foreach($arParams as $key => $val){
            if(!$arMethodInfo['params'][$key]){
                throw new Exception('Not such parameter "'.$key.'"');
            }
            $bPass = false;
            foreach($arMethodInfo['params'][$key]['type'] as $type){
                switch($type){
                    case 'array': $bPass |= is_array($val); break;
                    case 'int': $bPass |= is_numeric($val); break;
                    case 'float': $bPass |= ($val); break;
                    case 'string': $bPass |= is_string($val); break;
                    case 'bool': $bPass = true; break;
                }
            }
            if($bPass){
                unset($arParams[$key]);
                unset($arMethodInfo['params'][$key]);
            }else{
                throw new Exception('Type mismatch in parameter "'.$key.'"');
            }
        }

        foreach($arMethodInfo['params'] as $key => $arParam){
            if(!in_array('null', $arParam['type']) && !in_array('void', $arParam['type'])){
                throw new Exception('No value for parameter "'.$key.'"');
            }
        }

        return true;
    }

    protected function requireAuth(){
        if(!$this->arOptions['auth']){
            return true;
        }

        if(User::IsAuthorized() && User::InGroup($this->arOptions['group'])){
            return true;
        }

        if(!$arUser = (new \CUser())->Login($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'], 'N')){
            $this->httpAuth();
            return false;
        }

        $this->isLogged = true;

        if(!User::InGroup($this->arOptions['group']) || $arUser['TYPE'] == 'ERROR'){
            $this->httpAuth();
            return false;
        }

        return true;
    }

    protected function httpAuth(){
        header('WWW-Authenticate: Basic realm="'. Site::get()['SITE_NAME'] .'"');
        header('HTTP/1.0 401 Unauthorized');

        include P_LAYOUT . 'docs/header.php'; ?>

        <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono" rel="stylesheet">';

        <div style="position: fixed; z-index: -99; top: -10%; left: -10%; right:-10%; bottom: -10%">
              <iframe frameborder="0" height="100%" width="100%"
                      src="//youtube.com/v/5-LyRjHlRgQ?autoplay=1&controls=0&showinfo=0&autohide=1&loop=1&html5=1&playlist=5-LyRjHlRgQ">
              </iframe>
            </div>

        <div class="access-denied"><span>Access Denied</span></div>';

        <?php
        include P_LAYOUT . 'docs/footer.php';
    }

}