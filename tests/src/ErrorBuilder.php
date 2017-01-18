<?php

namespace DeimosTest;

class ErrorBuilder extends \Deimos\Builder\Builder
{
    public function helper()
    {
        return $this->once(function ()
        {
            return new \Deimos\Helper\Helper($this);
        }, __METHOD__);
    }

    public function router()
    {
        return $this->instance('router');
    }

    protected function buildRouter()
    {
        $router = new \Deimos\Router\Router();

        $router->setMethod();

        $router->setRoutes([
            [
                '/admin/path',
                [
                    'controller' => 'example',
                    'action'     => 'index'
                ]
            ],
            [
                '/admin/path/<id:\d+>',
                [
                    'controller' => 'example',
                    'action'     => 'default'
                ]
            ],
            [
                '/admin/json',
                [
                    'controller' => 'example',
                    'action'     => 'json'
                ]
            ],
            [
                '/error/example',
                [
                    'controller' => 'error',
                    'action'     => 'default'
                ]
            ],
            [
                '/error/example/123',
                [
                    'controller' => 'example',
                    'action'     => 'error'
                ]
            ]
        ]);

        return $router;
    }

//    public function request()
//    {
//        return $this->instance('request');
//    }

    protected function buildRequest()
    {
        $request = new \DeimosTest\Request($this->helper());
        $request->setRouter($this->router());

        return $request;
    }
}
