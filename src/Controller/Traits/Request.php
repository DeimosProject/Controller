<?php

namespace Deimos\Controller\Traits;

use Deimos\Controller\Exceptions\RequestNotFound;
use Deimos\Helper\Traits\Helper;
use Deimos\Request\Request as DeimosRequest;

trait Request
{

    use Helper;

    /**
     * @var DeimosRequest
     */
    private $request;

    /**
     * @return DeimosRequest
     *
     * @throws RequestNotFound
     */
    private function instanceRequest()
    {
        if (method_exists($this->builder, 'request'))
        {
            return $this->builder->request();
        }

        throw new RequestNotFound('Request not found');
    }

    /**
     * @return DeimosRequest
     *
     * @throws RequestNotFound
     */
    protected final function request()
    {
        if (!$this->request)
        {
            $this->request = $this->instanceRequest();
        }

        return $this->request;
    }

}