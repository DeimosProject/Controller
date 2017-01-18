<?php

namespace DeimosTest;


class World extends \Deimos\Controller\Processor
{

    protected $attribute = 'p2';

    /**
     * @return \DeimosController\World
     */
    protected function buildWorld()
    {
        return new \DeimosController\World($this->builder);
    }

}