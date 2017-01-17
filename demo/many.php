<?php

include_once __DIR__ . '/bootstrap.php';

// /hello/world

class Hello extends \Deimos\Controller\Processor
{

    protected $attribute = 'p2';

    protected function buildWorld()
    {
        return new \DeimosController\World($this->builder);
    }

}

class Processor extends \Deimos\Controller\Processor
{

    protected $attribute = 'p1';

    /**
     * @return Hello
     *
     * @throws \InvalidArgumentException
     */
    protected function buildHello()
    {
        return new Hello($this->builder);
    }

}

$builder    = new \DeimosSrc\Builder();
$controller = new Processor($builder);

echo $controller->execute();