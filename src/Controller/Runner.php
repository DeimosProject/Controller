<?php

namespace Deimos\Controller;

use Deimos\Builder\Builder;
use Deimos\Controller\Exceptions\ControllerNotFound;
use Deimos\Controller\Traits\Request;

abstract class Runner extends Builder
{

    use Request;

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
        $name = $this->request()->attribute('controller');

        if ($this->methodExists($name))
        {
            /**
             * @var Controller $instance
             */
            $instance = $this->instance($name);

            return $instance->execute();
        }

        throw new ControllerNotFound($name);
    }

}