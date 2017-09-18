<?php
namespace wajox\eventmapper;

/**
 * Event dispatcher interface
 */
interface EventRouterInterface
{
    /**
     * constructor
     * @param array $map e.g. ["eventName" => "handler\ClassName"]
     */
    public function __construct($map);

    /**
     * processnew event
     * @param  string $eventJson
     * @return  bool
    */
    public function onEvent($eventJson);
}
