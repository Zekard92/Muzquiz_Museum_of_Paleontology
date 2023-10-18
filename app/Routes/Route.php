<?php
namespace App\Routes;

use App\Logger\Logger;

/**
 * Route base class
 *
 * @author Miguel A. Guajardo <mguajardoal@gmail.com>
 * @copyright 2023 Zekard Technologies
 * @license GNU GPLv3
 * @version 0.0.1
 * @since 17/Oct/2023 Class available since Release 0.0.2
 */
class Route
{
    protected $subdomain;
    protected $path;
    protected $query;

    public function __construct()
    {
        Logger::LogInfo("Initializing Route");
        
        Logger::LogDebug("Capturing the http_host. " . print_r($_SERVER['HTTP_HOST'], true));
        $this->processHttpHost($_SERVER['HTTP_HOST']);

        Logger::LogDebug("Capturing the request URI. " . print_r($_SERVER['REQUEST_URI'], true));
        $this->processRequestUri($_SERVER['REQUEST_URI']);

        Logger::LogDebug("Display Route Data:" . print_r($this, true));

        Logger::LogInfo("Route Initializer Concluded");
    }
    
    /**
     * This method will process the http_host property of the request
     * in order to extract the subdomain, if any.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * @param string
     */
    private function processHttpHost(String $httpHost):void
    {
        $regex = "/((?'subdomain'\w+)\.)?(ligafenix|localhost)\.?(com\.mx|com|mx)?/";
        $matches = [];
        Logger::LogDebug("Matched: " . preg_match($regex, $httpHost, $matches));
        Logger::LogDebug("Matches: " . print_r($matches, true));
        
        $this->subdomain = $matches['subdomain'];
        Logger::LogDebug("Subdomain: " . $this->subdomain);
    }

    /**
     * This method will process the request URI string and extract a path
     * & query; if any exists; and store them in this class's variable members.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * 
     * @param string $requestUri Uri string from http request.
     */
    private function processRequestUri(String $requestUri):void
    {
        $regex = "/(?'path'[\/\w]+)?(\?(?'query'.*)?)?/";
        $matches=[];
        Logger::LogDebug(preg_match($regex, $requestUri, $matches));

        $this->path = $matches['path'];
        $this->query = $matches['query'];

        Logger::LogDebug("Path: => " . $this->path);
        Logger::LogDebug("Query: => " . $this->query);
    }
}
