<?php

namespace Cachet\Resources;

use Cachet\Resource;

class Metric extends Resource
{

    private $endpoint = 'metrics';

    public function all()
    {
        return $this->sendRequest(
            $this->endpoint,
            'GET'
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

    public function findOrCreate($data)
    {
        $metrics = $this->all()->response;

        foreach ($metrics as $metric) {
            if ($metric['name'] == $data['name']) {
                return $metric;
            }
        }

        return $this->create($data)->response;
    }
}
