<?php

namespace DeimosController;

use Deimos\Controller\Controller;

class Deimos extends Controller
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