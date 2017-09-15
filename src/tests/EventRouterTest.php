<?php
namespace wajox\eventmapper\tests;

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
        $json = file_get_contents(__DIR__ . '/example_data/user_added_event.json');
        $decodedJson = \json_decode($json, true);

        $routes = [
            $decodedJson["EventName"],
            "\wajox\eventmapper\tests\helpers\TestEventHandler",
        ];

        $router = new EventRouter($map);
        $result = $router->run($json);

        $this->assertTrue($result);
    }
}
