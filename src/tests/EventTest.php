<?php
namespace wajox\eventmapper\tests;

use wajox\eventmapper\Event;
use wajox\eventmapper\tests\helpers\EventsHelper;

class EventTest extends \Codeception\Test\Unit
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
    public function testCreateMethod()
    {
        // init data
        $eventName = "name";
        $eventTarget = "event-target";
        $eventUserId = "event-user-id";
        $createdAt = time();
        $params = ["key1" => "value1"];

        // call method
        $eventObject = new Event();
        $eventObject
            ->setName($eventName)
            ->setTarget($eventTarget)
            ->setUserId($eventUserId)
            ->setCreatedAt($createdAt)
            ->setParams($params);
        // validate
        $this->assertEquals($eventName, $event->getName());
        $this->assertEquals($eventTarget, $event->getTarget());
        $this->assertEquals($eventUserId, $event->getUserId());
        $this->assertEquals($createdAt, $this->getCreatedAt());
        $this->assertEquals($params, $this->getParams());
    }

    public function testParamsMethods()
    {        // init data
        $eventName = "name";
        $eventTarget = "event-target";
        $eventUserId = "event-user-id";
        $createdAt = time();
        $params = ["key1" => "value1"];

        // call method
        $eventObject = new Event();
        $eventObject
            ->setName($eventName)
            ->setTarget($eventTarget)
            ->setUserId($eventUserId)
            ->setCreatedAt($createdAt)
            ->setParams($params);

        $this->assertEquals("value1", $eventObject->getParam("key1"));
        $this->assertEquals(null, $eventObject->getParam("key2"));

        $eventObject->setParam("key2", "value2");
        $this->assertEquals("value2", $eventObject->getParam("key2"));

        $eventObject->removeParam("key1");
        $this->assertEquals(null, $eventObject->getParam("key1"));
    }

    public function testJsonMethods()
    {
        $eventName = "name";
        $eventTarget = "event-target";
        $eventUserId = "event-user-id";
        $createdAt = time();
        $params = ["key1" => "value1"];

        $eventObject = new Event();
        $eventObject
            ->setName($eventName)
            ->setTarget($eventTarget)
            ->setUserId($eventUserId)
            ->setCreatedAt($createdAt)
            ->setParams($params);

        $json = \json_encode($eventObject);

        $decodedEvent = new Event();
        $decodedEvent->loadJson($json);

        $this->assertEquals(
            $decodedEvent->getName(),
            $eventObject->getName()
        );

        $this->assertEquals(
            $decodedEvent->getTarget(),
            $eventObject->getTarget()
        );

        $this->assertEquals(
            $decodedEvent->getUserId(),
            $eventObject->getUserId()
        );

        $this->assertEquals(
            $decodedEvent->getCreatedAt(),
            $eventObject->getCreatedAt()
        );

        $this->assertEquals(
            $decodedEvent->getParams(),
            $eventObject->getParams()
        );
    }
}
