<?php

namespace DeimosTest;

class Processor extends \Deimos\Controller\Processor
{
    protected function buildExample()
    {
        return new Example($this->builder);
    }
}
