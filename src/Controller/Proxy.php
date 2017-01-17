<?php

namespace Deimos\Controller;

use Deimos\Builder\Builder;
use Deimos\Controller\Traits\Request;

abstract class Proxy extends Builder
{

    use Request;

    /**
     * @var string
     */
    protected $methodName = 'action';

    /**
     * Controller constructor.
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
     * @return void
     */
    abstract protected function configure();

    /**
     * @return void
     */
    abstract protected function before();

    /**
     * @param mixed $data
     *
     * @return void
     */
    abstract protected function after($data);

    /**
     * @param mixed $data
     *
     * @return mixed
     */
    abstract protected function display($data);

    /**
     * @return mixed
     */
    abstract public function execute();

}