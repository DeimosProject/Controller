<?php

namespace DeimosSrc;

use Deimos\Helper\Helper;
use Deimos\Request\Request;
use Deimos\Router\Router;
use Deimos\Slice\Slice;

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
        $router = new Router(new Slice($this->helper(), [
            [
                'type' => 'prefix',
                'path' => '/demo',

                'resolver' => [
                    [
                        'type' => 'pattern',
                        'path' => '/many.php',

                        'defaults' => [
                            'p1'     => 'hello',
                            'p2'     => 'world',
                            'action' => 'default'
                        ],
                    ],
                    [
                        'type' => 'pattern',
                        'path' => '/demo.php',

                        'defaults' => [
                            'controller' => 'deimos',
                            'action'     => 'default'
                        ],
                    ]
                ]
            ],
        ]));

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
     *
     * @throws \InvalidArgumentException
     */
    protected function buildRequest()
    {
        $request = new Request($this->helper());
        $request->setRouter($this->router());

        return $request;
    }

}