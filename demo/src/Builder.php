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
     *
     * @throws \Deimos\Router\Exceptions\PathNotFound
     * @throws \Deimos\Router\Exceptions\TypeNotFound
     */
    protected function buildRouter()
    {
        $router = new Router();
        $router->setRoutes([
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