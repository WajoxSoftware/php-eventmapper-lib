<?php
namespace wajox\eventmapper;

abstract class AbstractEventHandler implements EventHandlerInterface
{
    protected $event;

    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    public function getEvent()
    {
        return $this->event;
    }

    abstract public function run();
}
