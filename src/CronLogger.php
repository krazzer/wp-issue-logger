<?php

namespace WPIssueLogger;

use Psr\Http\Message\ResponseInterface;

class CronLogger
{
    /** @var Api */
    private $api;

    /**
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * @param string $cronKey
     * @return ResponseInterface
     */
    public function log(string $cronKey): ResponseInterface
    {
        return $this->api->post('ping/' . $cronKey);
    }
}