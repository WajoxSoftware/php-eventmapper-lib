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
     * @return  bool
     */
    public function onEvent($eventJson)
    {
  		try {
	    	$this->runHandlers(
	    		$this->buildEvent($eventJson)->getName()
	    	);
    	} catch (\Exception $e) {
			return false;    		
    	}

    	return true;
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
     */
    protected function runHandlers($event)
    {
    	;
    }
}
