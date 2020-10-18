<?php

namespace App\Models\Services;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class JsonRpcClient
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => ['Content-Type' => 'application/json'],
            'base_uri' => config('app.data.base_uri')
        ]);
    }

    public function send(string $method, array $params): array
    {
        $response = $this->client
            ->post('api/data', [
                RequestOptions::JSON => [
                    'jsonrpc' => '2.0',
                    'id' => time(),
                    'method' => $method,
                    'params' => $params
                ]
            ])->getBody()->getContents();

        return json_decode($response, true);
    }
}
