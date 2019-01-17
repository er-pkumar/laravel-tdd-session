<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testHelloWorld() {
        $this->assertTrue(true);
        $this->assertFalse(false);
        $this->assertNotEmpty(['hello']);
        $this->assertEquals(true, true);
    }
}
