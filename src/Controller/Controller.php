<?php

namespace Deimos\Controller;

use Deimos\Controller\Exceptions\DisplayNone;
use Deimos\Controller\Exceptions\NotFound;
use Deimos\Controller\Exceptions\RequestNotFound;

abstract class Controller extends Proxy
{

    protected $attribute = 'action';

    /**
     * @return mixed
     *
     * @throws \InvalidArgumentException
     * @throws RequestNotFound
     * @throws DisplayNone
     * @throws NotFound
     */
    public function execute()
    {
        $this->configure();
        $this->before();

        $name = $this->request()->attribute($this->attribute);

        if (!$this->methodExists($name))
        {
            throw new NotFound('Action \'' . $name . '\' not found!');
        }

        $data = $this->instance($name);

        $this->after($data);

        return $this->display($data);
    }

    /**
     * @inheritdoc
     *
     * @throws \InvalidArgumentException
     * @throws DisplayNone
     */
    protected function display($data)
    {
        if (is_string($data))
        {
            return $data;
        }

        if (is_array($data) || $data instanceof \stdClass)
        {
            return $this->helper()->json()->encode($data);
        }

        throw new DisplayNone('Undefined value \'' . $data . '\'');
    }

}