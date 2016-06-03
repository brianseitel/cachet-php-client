<?php

namespace Cachet;

use Exception;
use GuzzleHttp\Client as Client;
use GuzzleHttp\Psr7\Request;
use Guzzle\Common\Exception\GuzzleException;

abstract class Resource
{
    protected $cachet;

    public function __construct(Cachet $cachet)
    {
        $this->cachet = $cachet;
        $this->client = new Client(['base_uri' => $this->cachet->getBaseUrl()]);
    }

    protected function sendRequest($endpoint, $method, $data = [])
    {
        $request = $this->prepareRequest($endpoint, $method, $data);
        try {
            $response = $this->client->send($request, ['form_params' => $data]);
        } catch (GuzzleException $e) {
            $responseErrorBody = json_decode($e->getResponse()->getBody(), 1);
            $statusCode = $e->getResponse()->getStatusCode();

            $error = json_decode($responseErrorBody);
            if ($statusCode === 500) {
                throw new Exception($error->error);
            }
            return null;
        } catch (Exception $e) {
            throw new Exception((string) $e->getResponse()->getBody());
        }

        return new ResourceResponse($response);
    }

    protected function prepareRequest($endpoint, $method, $data = [])
    {
        $path = "/api/v{$this->cachet->getVersion()}/{$endpoint}";

        $headers = array(
            'Accept' => 'application/json; charset=utf-8',
            'User-Agent' => 'Cachet/v1 PHPClient',
            'X-Cachet-Token' => $this->cachet->getToken(),
        );
        if ($this->cachet->clientVersion) {
            $headers['Cachet-Client-Version'] = $this->cachet->clientVersion;
        }

        $client = new Client(['base_uri' => $this->cachet->getBaseUrl()]);
        $request = new Request($method, $path, $headers);

        return $request;
    }

}
