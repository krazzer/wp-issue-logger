<?php

namespace WPIssueLogger;

use JetBrains\PhpStorm\Pure;
use Psr\Http\Message\ResponseInterface;

class WpIssueLogger
{
    /** @var CronLogger */
    private CronLogger $cronLogger;

    /** @var IssueLogger */
    private IssueLogger $issueLogger;

    /** @var string */
    private string $envKey;

    /**
     * @param string $url
     * @param string $apiKey
     * @param string $envKey
     */
    #[Pure] public function __construct(string $url, string $apiKey, string $envKey)
    {
        $logger = new Api($url, $apiKey);

        $this->cronLogger  = new CronLogger($logger);
        $this->issueLogger = new IssueLogger($logger);

        $this->envKey = $envKey;
    }

    /**
     * @return ResponseInterface
     */
    public function logCron(): ResponseInterface
    {
        return $this->cronLogger->log($this->envKey);
    }

    /**
     * @return ResponseInterface
     */
    public function logIssue(): ResponseInterface
    {
        return $this->issueLogger->log($this->envKey);
    }
}