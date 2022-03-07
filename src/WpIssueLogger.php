<?php

namespace WPIssueLogger;

use Psr\Http\Message\ResponseInterface;

class WpIssueLogger
{
    /** @var CronLogger */
    private $cronLogger;

    /** @var IssueLogger */
    private $issueLogger;

    /** @var string */
    private $email;

    /**
     * @param string $url
     * @param string $apiKey
     * @param string $email
     */
    public function __construct(string $url, string $apiKey, string $email)
    {
        $logger = new Api($url, $apiKey);

        $this->cronLogger  = new CronLogger($logger);
        $this->issueLogger = new IssueLogger();

        $this->email = $email;
    }

    /**
     * @param string $cronKey
     * @return ResponseInterface
     */
    public function logCron(string $cronKey): ResponseInterface
    {
        return $this->cronLogger->log($cronKey);
    }

    /**
     * @param string $message
     * @param string $traceString
     * @return bool
     */
    public function logIssue(string $message, string $traceString): bool
    {
        return $this->issueLogger->log($message, $traceString, $this->email);
    }
}