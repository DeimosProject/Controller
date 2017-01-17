<?php

include_once __DIR__ . '/bootstrap.php';

class Processor extends \Deimos\Controller\Processor
{
    protected function buildDeimos()
    {
        return new DeimosController\Deimos($this->builder);
    }
}

$builder    = new \DeimosSrc\Builder();
$controller = new Processor($builder);

echo $controller->execute();