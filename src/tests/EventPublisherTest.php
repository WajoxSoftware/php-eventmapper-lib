<?php
namespace wajox\eventmapper\tests;

use wajox\eventmapper\EventPublisher;

class EventPublisherTest extends \Codeception\Test\Unit
{
    /**
     * @var \wajox/eventmapper/tests\
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }
    // tests
    public function testConstructor()
    {
        $options = ["key1" => "value1"];

        $publisher = new EventPublisher(
            "\\wajox\\eventmapper\\tests\\helpers\\TestEventPublisherAdapter",
            $options
        );

        $this->assertEquals(
            $publisher->getAdapter()->getOptions(),
            $options
        );

        $this->assertTrue(
            $publisher->getAdapter()->publish(null, null)
        );
    }
}
