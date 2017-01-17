<?php

namespace Deimos\Controller;

use Deimos\Builder\Builder;
use Deimos\Controller\Exceptions\ControllerNotFound;
use Deimos\Controller\Traits\Request;

abstract class Processor extends Builder
{

    use Request;

    /**
     * @var string
     */
    protected $attribute = 'controller';

    /**
     * Runner constructor.
     *
     * @param Builder $builder
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(Builder $builder)
    {
        if ($builder instanceof self)
        {
            throw new \InvalidArgumentException('Instanceof SELF');
        }

        $this->builder = $builder;
    }

    /**
     * @return mixed
     *
     * @throws \InvalidArgumentException
     * @throws Exceptions\RequestNotFound
     * @throws Exceptions\DisplayNone
     * @throws ControllerNotFound
     */
    public function execute()
    {
        $name = $this->request()->attribute($this->attribute);

        if ($this->methodExists($name))
        {
            /**
             * @var Controller $instance
             */
            $instance = $this->instance($name);

            return $instance->execute();
        }

        throw new ControllerNotFound('Controller \'' . $name . '\' not found!');
    }

}