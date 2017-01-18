<?php

namespace DeimosTest;

class TestSetUp extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Builder
     */
    public $builder;
    /**
     * @var Processor
     */
    public $processor;

    public function setUp()
    {

        $annotation = $this->getAnnotations();

        if (!empty($annotation['method']['path'][0]))
        {
            $_SERVER['REQUEST_URI'] = $annotation['method']['path'][0];
        }

        if (isset($annotation['method']['errorBuilder'][0]))
        {
            $this->builder   = new ErrorBuilder();
        }
        else
        {
            $this->builder   = new Builder();
        }

        $this->processor = new Processor($this->builder);

    }

}
