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
     */
    public function run();

    /**
     * get handler result
     * @return mixed
     */
    public function getResult();
}
