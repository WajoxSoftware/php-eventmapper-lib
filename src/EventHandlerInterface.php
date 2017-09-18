<?php
namespace wajox\eventmapper;

/**
 * Handler interface
 */
interface EventHandlerInterface
{
    /**
     * set event
     * @param EventInterface $event
     */
    public function setEvent($event);

    /**
     * get event
     * @return EventInterface
     */
    public function getEvent();

    /**
     * execute handler
     *
     * @return  bool
     */
    public function run();
}
