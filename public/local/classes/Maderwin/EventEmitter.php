<?php

namespace Maderwin;

use Sabre\Event\EventEmitterInterface;
use Sabre\Event\EventEmitterTrait;

class EventEmitter implements EventEmitterInterface {
    use EventEmitterTrait {
        on as traitOn;
        once as traitOnce;
    }

    protected static $instance = null;

    protected function __constructor(){}

    /**
     * @return EventEmitter
     */
    public static function getInstance() {
        if(static::$instance === null){
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function on($eventName, callable $callBack, $priority = 100){
        $this->traitOn($eventName, $callBack, $priority);
        return $this;
    }

    public function once($eventName, callable $callBack, $priority = 100){
        $this->traitOnce($eventName, $callBack, $priority);
        return $this;
    }
}