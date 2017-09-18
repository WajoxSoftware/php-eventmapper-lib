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
            "/" . $decodedJson["EventName"] . "/" => $handlerClass,
        ];

        $router = new EventRouter($map);
        $results = $router->onEvent($json);

        $this->assertEquals(1, count($results));
        $this->assertTrue($results[$handlerClass]);
    }
}
