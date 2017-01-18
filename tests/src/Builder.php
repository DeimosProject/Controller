<?php

namespace DeimosTest;

class Builder extends ErrorBuilder
{

    public function request()
    {
        return $this->instance('request');
    }

}
