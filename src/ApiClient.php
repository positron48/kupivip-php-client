<?php

namespace KupiVipApi;

use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Result;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ApiClient extends GuzzleClient
{
    public static function create($config = [])
    {
        $service_description = new Description(
            (array) json_decode(file_get_contents(__DIR__ . '/../service.json'), TRUE)
        );

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json;charset=UTF-8',
                'Authorization' => $config['token']
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