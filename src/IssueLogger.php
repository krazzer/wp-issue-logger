<?php

namespace WPIssueLogger;

use Psr\Http\Message\ResponseInterface;

class IssueLogger
{
    /** @var Api */
    private Api $api;

    /**
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * @param string $envKey
     * @return ResponseInterface
     */
    public function log(string $envKey): ResponseInterface
    {
        return $this->api->post('issue', ['env' => $envKey]);
    }
}