<?php
namespace wajox\eventmapper;

interface EventPublisherAdapterInterface
{
    public function __construct($options = []);
    public function publish($routingKey, $event);
}
