<?php

namespace Maderwin\Rest;

/**
 * Class JSONServer
 * @package Maderwin\Rest
 */
class JSONServer extends Server {

    /**
     * Array To JSON string
     * @param array $data
     * @return string json
     */
    protected function emit($data){
        return json_encode($data);
    }
}


?>