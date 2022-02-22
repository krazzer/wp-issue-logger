<?php

namespace WPIssueLogger;

class IssueLogger
{
    /**
     * @param string $message
     * @param string $traceString
     * @param string $email
     * @return bool
     */
    public function log(string $message, string $traceString, string $email): bool
    {
        if ( ! function_exists('wp_mail')) {
            return false;
        }

        return wp_mail($email, 'WP Issue: ' . $message, $message . "\n\n" . $traceString);
    }
}