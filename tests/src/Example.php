<?php

namespace DeimosTest;

class Example extends \Deimos\Controller\Controller
{

    /**
     * @var \DeimosTest\Request
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

    public function actionAttributes()
    {
        return $this->request->attributes();
    }

    public function actionIndex()
    {
        return '<h1>index</h1>';
    }

    public function actionDefault()
    {
        return $this->request->attribute('id');
    }

    public function actionError()
    {
        return (int)$this->request->attribute('id');
    }

    public function actionJson()
    {
        return range(0, __LINE__);
    }

}
