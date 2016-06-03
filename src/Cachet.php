<?php

namespace Cachet;

class Cachet
{

    public $clientVersion = '0.0.1';

    private $version;
    private $token;
    private $base_url;

    private $source;

    public function __construct($version, $token, $base_url = 'localhost')
    {
        if (!is_null($token)) {
            $this->token = $token;
        }
        $this->version = $version;
        $this->base_url = $base_url;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getBaseUrl()
    {
        return $this->base_url;
    }

    public function base()
    {
        return new Resources\Base($this);
    }

    public function components()
    {
        return new Resources\Component($this);
    }

    public function incidents()
    {
        return new Resources\Component($this);
    }

    public function metrics()
    {
        return new Resources\Component($this);
    }
}
