<?php
namespace App\Routes;

/**
 * This enum provides the types of route the app can receive.
 * 
 * @author Miguel A. Guajardo <mguajardoal@gmail.com>
 * 
 * @copyright 2023 Zekard Techonologies.
 * @license GNU GPLv3
 * @version 0.0.1
 * @since 17/OCt/2023 This enum is available since release 0.0.2
 */
enum RouteType:string
{
    case WEB    = "www";
    case API    = "api";
    case ADMIN  = "admin";
}
