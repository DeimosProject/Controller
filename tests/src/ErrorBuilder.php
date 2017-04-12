<?php

namespace DeimosTest;

use Deimos\Slice\Slice;

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
        $router = new \Deimos\Router\Router(new Slice($this->helper(), [
            [
                'type' => 'pattern',
                'path' => '/admin/path',

                'defaults' => [
                    'controller' => 'example',
                    'action'     => 'index'
                ]
            ],
            [
                'type' => 'pattern',
                'path' => '/admin/path/<id:\d+>',

                'defaults' => [
                    'controller' => 'example',
                    'action'     => 'default'
                ]
            ],
            [
                'type' => 'pattern',
                'path' => '/admin/json',

                'defaults' => [
                    'controller' => 'example',
                    'action'     => 'json'
                ]
            ],
            [
                'type' => 'pattern',
                'path' => '/error/example',

                'defaults' => [
                    'controller' => 'error',
                    'action'     => 'default'
                ]
            ],
            [
                'type' => 'pattern',
                'path' => '/error/example/123',

                'defaults' => [
                    'controller' => 'example',
                    'action'     => 'error'
                ]
            ]
        ]));

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
