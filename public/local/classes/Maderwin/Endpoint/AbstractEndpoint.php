<?php

namespace Maderwin\Endpoint;

use \Bitrix\Main\Data\Cache;
use \Bitrix\Main\Context;

/**
 * Class AbstractEndpoint
 * @package Maderwin\Endpoint
 */
abstract class AbstractEndpoint {
    /** @var \Bitrix\Main\Data\Cache */
    protected $cache;

    /** @var \Bitrix\Main\HttpRequest */
    public $request;

    /** @var \Bitrix\Main\Server */
    public $server;

    public function __construct(){
        $this->cache = Cache::createInstance();
        $this->request = Context::getCurrent()->getRequest();
        $this->server = Context::getCurrent()->getServer();
    }
}