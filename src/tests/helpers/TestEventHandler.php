<?php
namespace wajox\eventmapper\tests\helpers;

use wajox\eventmapper\EventHandlerInterface;

class TestEventHandler implements EventHandlerInterface
{
    private $event;

    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function run()
    {
        return $this;
    }

    public function getResult()
    {
        return true;
    }
}
