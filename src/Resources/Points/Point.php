<?php

namespace Cachet\Resources\Points;

use Cachet\Resource;

class Point extends Resource
{

    private $endpoint = 'metrics';

    public function all($id)
    {
        return $this->sendRequest(
            $this->endpoint . "/{$id}/points",
            'GET'
        );
    }

    public function get($id, $point_id)
    {
        return $this->sendRequest(
            $this->endpoint . "/{$id}/points/{$point_id}",
            'GET'
        );
    }

    public function create($id, $data)
    {
        return $this->sendRequest(
            $this->endpoint . "/{$id}/points",
            'POST',
            $data
        );
    }

    public function delete($id)
    {
        return $this->sendRequest(
            $this->endpoint . "/{$id}/points",
            'DELETE'
        );
    }

}
