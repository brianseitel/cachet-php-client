<?php

namespace Cachet\Resources;

use Cachet\Resource;

class Incident extends Resource
{

    private $endpoint = 'incidents';

    public function all()
    {
        return $this->sendRequest(
            $this->endpoint,
            'GET',
            ['per_page' => 500]
        );
    }

    public function get($id)
    {
        return $this->sendRequest(
            $this->endpoint . "/{$id}",
            'GET'
        );
    }

    public function create($data)
    {
        return $this->sendRequest(
            $this->endpoint,
            'POST',
            $data
        );
    }

    public function update($id, $data)
    {
        return $this->sendRequest(
            $this->endpoint . "/{$id}",
            'PUT',
            $data
        );
    }

    public function delete($id)
    {
        return $this->sendRequest(
            $this->endpoint . "/{$id}",
            'DELETE'
        );
    }
}
