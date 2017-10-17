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
        // 
        $sourceType = "source";
        $sourceId = "source_id";
        $sourceOrigin = "source-origin";
        $sourceParams = ["k" => "v"];
      
        $targetType = "target";
        $targetId = "target_id";
        $targetParams = ["a" => "b"];

        $eventName = "name";
        $eventUserId = "event-user-id";
        $createdAt = time();
        $params = ["key1" => "value1"];

        // call method
        $event = new Event();
        $event
            ->buildTarget($targetType, $targetId, $targetParams)
            ->buildSource($sourceType, $sourceId, $sourceOrigin, $sourceParams)
            ->setName($eventName)
            ->setUserId($eventUserId)
            ->setCreatedAt($createdAt)
            ->setParams($params);
        // validate
        $this->assertEquals($eventName, $event->getName());

        $this->assertEquals($sourceType, $event->getSource()->getType());
        $this->assertEquals($sourceId, $event->getSource()->getId());
        $this->assertEquals($sourceOrigin, $event->getSource()->getOrigin());
        $this->assertEquals($sourceParams, $event->getSource()->getParams());

        $this->assertEquals($targetType, $event->getTarget()->getType());
        $this->assertEquals($targetId, $event->getTarget()->getId());
        $this->assertEquals($targetParams, $event->getTarget()->getParams());

        $this->assertEquals($eventUserId, $event->getUserId());
        $this->assertEquals($createdAt, $event->getCreatedAt());
        $this->assertEquals($params, $event->getParams());
    }

    public function testParamsMethods()
    {    
        $sourceType = "source";
        $sourceId = "source_id";
        $sourceOrigin = "source-origin";
        $sourceParams = ["k" => "v"];
      
        $targetType = "target";
        $targetId = "target_id";
        $targetParams = ["a" => "b"];
    // init data
        $eventName = "name";
        $eventUserId = "event-user-id";
        $createdAt = time();
        $params = ["key1" => "value1"];

        // call method
        $event = new Event();
        $event
            ->buildTarget($targetType, $targetId, $targetParams)
            ->buildSource($sourceType, $sourceId, $sourceOrigin, $sourceParams)
            ->setName($eventName)
            ->setUserId($eventUserId)
            ->setCreatedAt($createdAt)
            ->setParams($params);

        $this->assertEquals("value1", $event->getParam("key1"));
        $this->assertEquals(null, $event->getParam("key2"));

        $event->setParam("key2", "value2");
        $this->assertEquals("value2", $event->getParam("key2"));

        $event->removeParam("key1");
        $this->assertEquals(null, $event->getParam("key1"));
    }

    public function testJsonMethods()
    {
        $sourceType = "source";
        $sourceId = "source_id";
        $sourceOrigin = "source-origin";
        $sourceParams = ["k" => "v"];
      
        $targetType = "target";
        $targetId = "target_id";
        $targetParams = ["a" => "b"];

        $eventName = "name";
        $eventUserId = "event-user-id";
        $createdAt = time();
        $params = ["key1" => "value1"];

        $event = new Event();
        $event
            ->buildTarget($targetType, $targetId, $targetParams)
            ->buildSource($sourceType, $sourceId, $sourceOrigin, $sourceParams)
            ->setName($eventName)
            ->setUserId($eventUserId)
            ->setCreatedAt($createdAt)
            ->setParams($params);

        $json = \json_encode($event);

        $decodedEvent = new Event();
        $decodedEvent->loadJson($json);

        $this->assertEquals(
            $decodedEvent->getName(),
            $event->getName()
        );

        $this->assertEquals(
            $decodedEvent->getTarget(),
            $event->getTarget()
        );

        $this->assertEquals(
            $decodedEvent->getUserId(),
            $event->getUserId()
        );

        $this->assertEquals(
            $decodedEvent->getCreatedAt(),
            $event->getCreatedAt()
        );

        $this->assertEquals(
            $decodedEvent->getParams(),
            $event->getParams()
        );
    }
}
