<?php
namespace App\Routes;

use App\Controllers\Controller;
use App\Controllers\HomeController;
use App\Controllers\ResourcesController;
use App\Logger\Logger;
use Exception;

/**
 * Route base class
 *
 * @author Miguel A. Guajardo <mguajardoal@gmail.com>
 * @copyright 2023 Zekard Technologies
 * @license GNU GPLv3
 * @version 0.0.2
 * @since 17/Oct/2023 Class available since Release 0.0.2
 */
abstract class Route
{
    static protected $subdomain;
    static protected $path;
    static protected $query;
    static protected $controller;

    /**
     * Prepares and perform the routing for the request.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public static function Enroute() : void
    {
        self::GetSubdomain($_SERVER['HTTP_HOST']);
        self::ProcessRequestSections($_SERVER['REQUEST_URI']);
        $controller = self::DefineController();
        self::PerformRequest($controller);
    }
    
    /**
     * This method will process the http_host property of the request
     * in order to extract the subdomain, if any.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * 
     * @param string $httpHost
     * @return string
     */
    private static function GetSubdomain(String $httpHost) : string
    {
        $regex = "/((?'subdomain'\w+)\.)?(ligafenix|localhost)\.?(com\.mx|com|mx)?/";
        $matches = [];

        preg_match($regex, $httpHost, $matches);

        Logger::LogDebug("Matches: " . print_r($matches, true));
        
        $subdomain = $matches['subdomain'];
        
        //As the .htaccess removes www subdomain, we will set it here.
        if ($subdomain = '' || $subdomain = '/' || $subdomain = null) { $subdomain = 'www'; }

        Logger::LogDebug("Subdomain $subdomain");
        return $subdomain;
    }
    
    /**
     * This method will process the request URI string and extract a path
     * & query; if any exists; and store them in this class's variable members.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * 
     * @param string $requestUri Uri string from http request.
     */
    private static function ProcessRequestSections(string $requestUri) : void
    {
        $regex = "/(?'path'[\/\w]+)?(\?(?'query'.*)?)?/";
        $matches=[];
        preg_match($regex, $requestUri, $matches);

        Logger::LogDebug(print_r($matches, true));
        self::$path = array_values(array_filter(explode('/', $matches['path'])));
        self::$query = $matches['query'];

        Logger::LogDebug("Path: => " . print_r(self::$path, true));
        Logger::LogDebug("Query: => " . self::$query);
    }

    /**
     * Defines the controller to be using during the interaction of this request.
     * 
     * Using the RouteType enum, looks for the most appropriate Controller
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * 
     * @return Controller
     */
    private static function DefineController() : Controller //         //Type of Controller.
    {
        Logger::logDebug("Getting Controller Type");
        $controller = null;

        try 
        {
            switch (self::$subdomain)
            {
                case '':
                case RouteType::WEB:
                    Logger::LogInfo("Landed a web request.");
                    $controller = new HomeController();
                    break;
                
                default:
                    Logger::LogWarning("The subdomain was not spcefied.");
                    
                    //TODO: in further iterations, replace this route with a redirect to home page.
                    $controller = new HomeController();
                    break;
            }
        } 
        catch (\Throwable $th) 
        {
            $message = "An Exception was thrown during Controller definition process. Internal Message: " . $th->getMessage();
            Logger::LogError($message);
        } 
        finally 
        {
            if ($controller == null) throw new Exception("Couldn't define a controller class.");
        }

        return $controller;
    }

    /**
     * Moves the process forward into the controller.
     * 
     * using the steps on the path, provides the controller with the view-part of the path
     * as a callback, for the controller to call-it.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    private static function PerformRequest(Controller $controller)
    {
        $path = self::$path;
        $view = self::$path[0] ? self::$path[0] : 'home';
        unset($path[0]);
        $path = array_values($path);

        Logger::LogDebug("Requesting View: $view");
        if (method_exists($controller, $view))
        {
            Logger::LogDebug("Calling Controller: $view");
            $controller->$view($path);
        }
        else
        {
            Logger::LogWarning("View $view doesn't exists");
            $controller->DefaultView();
        }
    }
}
