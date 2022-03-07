<?php

namespace WPIssueLogger;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Api
{
    /** @var string */
    private $url;

    /** @var string */
    private $apiKey;

    /**
     * @param string $url
     * @param string $apiKey
     */
    public function __construct(string $url, string $apiKey)
    {
        $this->url    = $url;
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $path
     * @param array $params
     * @return ResponseInterface
     */
    public function post(string $path, array $params = []): ResponseInterface
    {
        $client = new Client();

        $params['apiKey'] = $this->apiKey;

        return $client->post($this->url . '/' . $path, ['form_params' => $params]);
    }
}