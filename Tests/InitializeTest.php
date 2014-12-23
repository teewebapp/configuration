<?php

namespace Tee\Configuration\Tests;

use Tee\System\Tests\TestCase;

class InitializeTest extends TestCase {

    public function testSomethingIsTrue()
    {
        $this->assertTrue(\moduleEnabled('system'));
    }

}