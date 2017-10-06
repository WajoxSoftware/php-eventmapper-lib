<?php
namespace wajox\eventmapper;

/**
 * Event dispather class
 * @see  EventRouterInterface.php
 */
class EventRouter implements EventRouterInterface
{
    protected $map;

    /**
     * constructor
     * @param array $map e.g. ["eventName" => "handler\ClassName"]
     */
    public function __construct($map)
    {
        $this->map = $map;
    }

    /**
     * processnew event
     * @param  string $eventJson
     * @return  array
     */
    public function onEvent($eventJson)
    {
        $results = [];

        try {
            $results = $this->runHandlers(
                $this->buildEvent($eventJson)
            );
        } catch (\Exception $e) {
            return [];
        }

        return $results;
    }

    /**
     * build event objec from json-encoded string
     * @param  string $eventJson
     * @return EventInterface
     * @see  EventInterface.php
     */
    protected function buildEvent($eventJson)
    {
        $event = new Event();

        $event->loadJson($eventJson);

        return $event;
    }

    /**
     * run related event handlers
     * @param  EventInterface $event
     * @return  array
     */
    protected function runHandlers($event)
    {
        $results = [];

        foreach ($this->getMap() as $eventRegex => $handlerClass) {
            if (preg_match($eventRegex, $event->getName()) == 1) {
                $results[$handlerClass] = $this->runHandler(
                    $handlerClass,
                    $event
                );
            }
        }

        return $results;
    }

    /**
     * execute handler
     * @param  string $handlerClass
     * @param  EventInterface $event
     * @return bool
     */
    protected function runHandler($handlerClass, $event)
    {
        $handler = new $handlerClass($event);

        return $handler->run();
    }

    /**
     * get routes map
     * @return array
     */
    protected function getMap()
    {
        return $this->map;
    }
}
