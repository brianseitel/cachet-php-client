<?php

namespace Cachet;

class ResourceResponse
{

    public $response;
    public $statusCode;
    public $status;

    public function __construct($response)
    {
        $this->response = json_decode((string) $response->getBody(), 1);
        $this->statusCode = $response->getStatusCode();
        $this->status = $this->processStatus($this->response);
    }

    public function __get($key)
    {
        return array_key_exists($key, $this->response) ? $this->response[$key] : null;
    }

    public function processStatus($response)
    {
        $status = isset($response['status']) ? $response['status'] : null;

        switch ($status) {
            case 'processed':
                return 'Successfully processed by Cachet.';
            case 'already_submitted':
                return 'Already submitted to Cachet.';
            case 'verify':
                return 'Verified. Data not saved into Cachet.';
            case 'submitted':
                return 'Successfully submitted to Cachet.';
        }
    }
}
