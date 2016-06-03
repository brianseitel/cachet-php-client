<?php

namespace Cachet\Resources;

use Cachet\Resource;

class Base extends Resource
{

    private $endpoint = '/';

    public function ping()
    {
        return $this->sendRequest(
            'ping',
            'GET'
        );
    }

    public function version()
    {
        return $this->sendRequest(
            'version',
            'GET'
        );
    }
}
