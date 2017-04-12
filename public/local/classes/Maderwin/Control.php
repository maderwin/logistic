<?php

namespace Maderwin;

class Control
{
    public static $ajax = false;

    protected $data = false;

    public function __construct($action='index', $params=array()) {
        $action = trim($action);
        if($action == '')
            $action = 'index';

        foreach($params as $key=>$value) {
            if(!is_scalar($value)){
                $params[$key] = trim($value);
            }
        }

        if(method_exists($this, $action) && !(isset($this::$ajax) && $this::$ajax && !Helper::IsAjax()))
            return $this->data = $this->$action($params);
        else
            return $this->page404();
    }

    protected function page404() {
        return false;
    }

    public function render() {
        return json_encode($this->data);
    }
}