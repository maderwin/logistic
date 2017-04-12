<?php
namespace Maderwin;

abstract class ComplexComponent extends Component {

    protected $arDefaultUrlTemplates404 = array();
    protected $arDefaultVariableAliases404 = array();
    protected $arDefaultVariableAliases = array();
    protected $arComponentVariables = array();
    protected $SEFFolder = "";
    protected $arUrlTemplates = array();
    protected $arVariables;
    protected $componentPage;
    protected $arVariableAliases = array();
    protected $defaultComponentPage = "template";
    protected $defaultComponentPage404 = "template";

    public function executeComponent() {
        if($this->StartResultCache()){
            $this->checkSEFMode();
            $this->execute();
            if($this->componentPage == '404'){
                define(ERROR_404, 'Y');
            }
            $this->IncludeComponentTemplate( $this->componentPage );
        }
    }

    protected function checkSEFMode() {
        if ( $this->arParams["SEF_MODE"] == "Y" ) {
            $this->onSEFModeEnabled();
        } else {
            $this->onSEFModeDisabled();
        }
        $this->arResult = array(
            "FOLDER"        => $this->SEFFolder,
            "URL_TEMPLATES" => $this->arUrlTemplates,
            "VARIABLES"     => $this->arVariables,
            "ALIASES"       => $this->arVariableAliases
        );
    }

    protected function onSEFModeEnabled() {

        global $APPLICATION;

        $this->arVariables = array();

        $this->arUrlTemplates    =
            \CComponentEngine::MakeComponentUrlTemplates( $this->arDefaultUrlTemplates404,
                                                         $this->arParams["SEF_URL_TEMPLATES"] );
        $this->arVariableAliases =
            \CComponentEngine::MakeComponentVariableAliases( $this->arDefaultVariableAliases404,
                                                            $this->arParams["VARIABLE_ALIASES"] );

        $this->componentPage = \CComponentEngine::ParseComponentPath(
            $this->arParams["SEF_FOLDER"],
            $this->arUrlTemplates,
            $this->arVariables
        );

        if ( strlen( $this->componentPage ) <= 0 ) {
            $uri = $this->removeUrlPrefix(strtok($this->request->getRequestUri(), '?'), $this->arParams["SEF_FOLDER"]);
            if(empty($uri)){
                $this->componentPage = $this->defaultComponentPage;
            }else{
                $this->componentPage = $this->defaultComponentPage404;
            }
        }

        \CComponentEngine::InitComponentVariables( $this->componentPage,
                                                  $this->arComponentVariables,
                                                  $this->arVariableAliases,
                                                  $this->arVariables );

        $this->SEFFolder = $this->arParams["SEF_FOLDER"];
    }

    protected function removeUrlPrefix($url, $prefix) {
        return preg_replace('/^' . preg_quote($prefix, '/') . '/', '', $url);
    }

    protected function onSEFModeDisabled() {
        $this->arVariables = array();

        $this->arVariableAliases =
            \CComponentEngine::MakeComponentVariableAliases( $this->arDefaultVariableAliases,
                                                            $this->arParams["VARIABLE_ALIASES"] );
        \CComponentEngine::InitComponentVariables( false,
                                                  $this->arComponentVariables,
                                                  $this->arVariableAliases,
                                                  $this->arVariables );

        $this->componentPage = $this->defaultComponentPage;
    }
}