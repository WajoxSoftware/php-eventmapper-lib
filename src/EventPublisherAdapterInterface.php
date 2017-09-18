<?php
namespace wajox\eventmapper;

/**
 * Event publisher adapter interface
 * @see  EventPublisherInterface.php
 * @see  EventInterface.php
 */
interface EventPublisherAdapterInterface
{
    /**
     * constructor
     * @param array $options adapter options
     */
    public function __construct($options = []);

    /**
     * publish event
     * @param  string $routingKey
     * @param  EventInterface $event
     * @return bool
     */
    public function publish($routingKey, $event);
}
