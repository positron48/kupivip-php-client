<?php

namespace KupiVipApi;

use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Result;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class IntegrationApiClient extends GuzzleClient
{
    public static function create($config = [])
    {
        $serviceParams = (array) json_decode(file_get_contents(__DIR__ . '/../service_integration.json'), true);
        if (isset($config['baseUrl'])){
            $serviceParams['baseUrl'] = $config['baseUrl'];
        }

        $service_description = new Description($serviceParams);

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json;charset=UTF-8',
            ],
            //'http_errors' => true,
            'allow_redirects' => false
        ]);

        return new static(
            $client,
            $service_description,
            NULL,
            NULL,
            NULL,
            $config
        );
    }
}