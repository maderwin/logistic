<?php
namespace Maderwin;

use \Bitrix\Main\Data\Cache;
use \Bitrix\Main\Context;

abstract class Component extends \CBitrixComponent {

    protected $templateName = 'template';

    /** @var \Bitrix\Main\Data\Cache */
    protected $cache;

    /** @var \Bitrix\Main\HttpRequest */
    public $request;

    /** @var \Bitrix\Main\Server */
    public $server;

    public function __construct($component = null){
        parent::__construct($component);
        $this->cache = Cache::createInstance();
        $this->request = Context::getCurrent()->getRequest();
        $this->server = Context::getCurrent()->getServer();
    }

    public function executeComponent(){
        $result = null;
        if($this->StartResultCache()){
            $result = $this->execute();
            $this->IncludeComponentTemplate($this->templateName);
        }
        return $result;
    }

    protected function execute(){

    }

    protected function getCurrentUser() {
        $user = new \CUser();

        if(!$user->IsAuthorized()){
            return false;
        }

        return $user->GetByID($user->GetID())->Fetch();
    }

    protected function getRequestedPage() {
        return rtrim(str_replace('index.php', '', $this->request->getRequestedPage()), '/') . '/';
    }

    protected function d($var){
        if(isset($this->request['dump'])){
            echo '<pre style="font-size: 12px; line-height: 16px; letter-spacing: 0;">';
            var_dump($var);
            echo '</pre>';
        }
    }
}