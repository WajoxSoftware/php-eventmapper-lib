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
