<?php

namespace Test;

use DeimosTest\Example;
use DeimosTest\Processor;
use DeimosTest\TestSetUp;

class ControllerTest extends TestSetUp
{

    public function testDefault()
    {
        $this->assertEquals(
            '12',
            $this->processor->execute()
        );
    }

    /**
     * @path /admin/path
     */
    public function testIndex()
    {
        $this->assertEquals(
            '<h1>index</h1>',
            $this->processor->execute()
        );
    }

    /**
     * @path /admin/json
     */
    public function testJson()
    {
        json_decode($this->processor->execute());

        $this->assertTrue(json_last_error() === JSON_ERROR_NONE);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testError1()
    {
        new Example(new Example($this->builder));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testError2()
    {
        new Processor(new Processor($this->builder));
    }

    /**
     * @expectedException \Deimos\Controller\Exceptions\NotFound
     * @path /error/example
     */
    public function testError3()
    {
        $this->processor->execute();
    }

    /**
     * @expectedException \Deimos\Controller\Exceptions\DisplayNone
     * @path /error/example/123
     */
    public function testError4()
    {
        $this->processor->execute();
    }

    /**
     * @expectedException \Deimos\Controller\Exceptions\RequestNotFound
     * @errorBuilder 1
     */
    public function testError5()
    {
        $this->processor->execute();
    }

}
