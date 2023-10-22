<?php
namespace App;

use App\Logger\Logger;
use App\Routes\Route;
use App\Routes\WebRoute;

/**
 * The main application.
 * 
 * This class is in charge of the app interactions.
 *  
 * @author Miguel A. Guajardo <mguajardoal@gmail.com>
 * @copyright 2023 Zekard Technologies.
 * @license GNU GPLv3
 * @version 0.0.3
 * @since 17/Oct/2023 Class available since Release 0.0.1
 */
class Application
{
    protected $route;

    public function __construct()
    {
        Logger::OpenFile();
        Logger::Log('Request received.');
        Logger::EndDivision();

        Route::Enroute();

        Logger::Log("Request cycle concluded.");
        Logger::EndDivision();
        Logger::CloseFile();
    }
}
