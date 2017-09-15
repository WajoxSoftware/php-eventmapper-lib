<?php
namespace wajox\eventmapper;

interface EventRouterInterface
{
    public function __construct($map);
    public function onEvent($eventJson);
}
