<?php

namespace DeimosTest;

class Hello extends \Deimos\Controller\Processor
{

    protected $attribute = 'p1';

    /**
     * @return World
     *
     * @throws \InvalidArgumentException
     */
    protected function buildHello()
    {
        return new World($this->builder);
    }

}
