<?php
namespace wajox\eventmapper\tests\helpers;

use wajox\eventmapper\EventPublisherAdapterInterface;

class TestEventPublisherAdapter implements EventPublisherAdapterInterface
{
    protected $options = [];

    public function __construct($options = [])
    {
        $this->options = $options;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function publish($routingKey, $event)
    {
        return true;
    }
}
