<?php

include_once dirname(__DIR__) . '/vendor/autoload.php';

class Builder extends \Deimos\Builder\Builder
{
    public function helper()
    {
        return $this->once(function ()
        {
            return new Deimos\Helper\Helper($this);
        }, __METHOD__);
    }

    public function router()
    {
        return $this->instance('router');
    }

    protected function buildRouter()
    {
        $router = new \Deimos\Router\Router();
        $router->setRoutes([
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

    public function request()
    {
        return $this->instance('request');
    }

    protected function buildRequest()
    {
        $request = new \Deimos\Request\Request($this->helper());
        $request->setRouter($this->router());

        return $request;
    }
}

class Deimos extends \Deimos\Controller\Controller
{

    /**
     * @var \Deimos\Request\Request
     */
    protected $request;

    protected function configure()
    {
        $this->request = $this->builder->request();
        // TODO: Implement configure() method.
    }

    protected function before()
    {
        // TODO: Implement before() method.
    }

    protected function after($data)
    {
        // TODO: Implement after() method.
    }

    public function actionDefault()
    {
        return $this->request->attributes();
    }

}

class Runner extends \Deimos\Controller\Runner
{
    protected function buildDeimos()
    {
        return new Deimos($this->builder);
    }
}

$builder    = new Builder();
$controller = new Runner($builder);

echo $controller->execute();