<?php

namespace DeimosTest;

class ErrorProcessor extends \Deimos\Controller\Processor
{
    protected $attribute = 'error';

    protected function buildUndefined()
    {
        return new Example($this->builder);
    }
}
