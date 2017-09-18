# Eventmapper PHP

## Write and use event handler
1. Create your class by extending wajox\eventmapper\AbstractEventHandler
2. Put your handler code into method run(), the method should return boolean value

e.g.
```
// ./helpers/TestEventHandler.php
<?php
namespace wajox\eventmapper\tests\helpers;

use wajox\eventmapper\AbstractEventHandler;

class TestEventHandler extends AbstractEventHandler
{
    public function run()
    {
        return true;
    }
}
```
Here is an example of the event processing

```
// your handler class name
$handlerClass = "\\wajox\\eventmapper\\tests\\helpers\\TestEventHandler";

// get event json from request body
$eventJson = file_get_contents('php://input');

// define event routes
// $map = [
//   "{regex}" => "{handler class name}",
// ];

$map = [
    "/users\.(.+)/" => $handlerClass,
];

// create router object and process event
$router = new EventRouter($map);
$results = $router->onEvent($json);
```

## Tests
```
vendor/bin/codecept run unit
```