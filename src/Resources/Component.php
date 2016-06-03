<?php

namespace Cachet\Resources;

use Cachet\Resource;

class Component extends Resource
{

    private $endpoint = 'components';

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

    public function findOrCreate($name)
    {
        $components = $this->all()->response;

        foreach ($components as $component) {
            if ($component['name'] == $name) {
                return $component;
            }
        }

        return $this->create(['name' => $name])->response;
    }

}
