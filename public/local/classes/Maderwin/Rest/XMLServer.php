<?php

namespace Maderwin\Rest;

use Maderwin\Helper;
/**
 * Class XMLServer
 * @package Maderwin\Rest
 */
class XMLServer extends Server {

    /**
     * Array To XML string
     * @param array $data
     * @return string
     */
    protected function emit($data){
        header("Content-Type: text/xml");
        echo Helper::ArrayToXml($data);
        return true;
    }
}