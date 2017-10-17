<?php
namespace wajox\eventmapper\tests;

use wajox\eventmapper\EventRouter;

class EventRouterTest extends \Codeception\Test\Unit
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
    public function testRouting()
    {
        $handlerClass = "\\wajox\\eventmapper\\tests\\helpers\\TestEventHandler";
        $json = file_get_contents(
            __DIR__ . '/example_data/user_added_event.json'
        );

        $decodedJson = \json_decode($json, true);

        $map = [
            "/" . $decodedJson["event_name"] . "/" => $handlerClass,
        ];


        $router = new EventRouter($map);
        $results = $router->onEvent($json);

        $this->assertEquals(1, count($results));
        $this->assertTrue($results[$handlerClass]);
        $this->assertFalse(isset($results['errors']));
    }

    public function testRoutingInvalidEvent()
    {
        $handlerClass = "\\wajox\\eventmapper\\tests\\helpers\\TestEventHandler";
        $json = '{"event_name": "ssss", "sasd": "asdasd"}';

        $decodedJson = \json_decode($json, true);

        $map = [
            "/" . $decodedJson["event_name"] . "/" => $handlerClass,
        ];

        $router = new EventRouter($map);
        $results = $router->onEvent($json);

        $this->assertEquals(1, count($results));
        $this->assertTrue(isset($results['errors']));
    }
}
