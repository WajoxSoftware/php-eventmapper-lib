<?php
namespace wajox\eventmapper;

interface EventHandlerInterface
{
    public function setEvent($event);
    public function getEvent();
    public function run();
    public function getResult();
}
