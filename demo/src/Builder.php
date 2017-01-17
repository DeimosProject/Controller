<?php

namespace DeimosSrc;

use Deimos\Helper\Helper;
use Deimos\Request\Request;
use Deimos\Router\Router;

class Builder extends \Deimos\Builder\Builder
{

    /**
     * @return Helper
     *
     * @throws \InvalidArgumentException
     */
    public function helper()
    {
        return $this->once(function ()
        {
            return new Helper($this);
        }, __METHOD__);
    }

    /**
     * @return Router
     */
    public function router()
    {
        return $this->instance('router');
    }

    /**
     * @return Router
     *
     * @throws \InvalidArgumentException
     */
    protected function buildRouter()
    {
        $router = new Router();
        $router->setRoutes([
            [
                '/demo/many.php',
                [
                    'p1'     => 'hello',
                    'p2'     => 'world',
                    'action' => 'default'
                ]
            ],
            [
                '/demo/demo.php',
                [
                    'controller' => 'deimos',
                    'action'     => 'default'
                ]
            ]
        ]);

        return $router;
    }

    /**
     * @return Request
     */
    public function request()
    {
        return $this->instance('request');
    }

    /**
     * @return Request
     */
    protected function buildRequest()
    {
        $request = new Request($this->helper());
        $request->setRouter($this->router());

        return $request;
    }

}