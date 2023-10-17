<?php
namespace App;

use App\Logger\Logger;

/**
 * The main application.
 * 
 * This class is in charge of the app interactions.
 *  
 * @author Miguel A. Guajardo <mguajardoal@gmail.com>
 * @copyright 2023 Zekard Technologies.
 * @license GNU GPLv3
 * @version 0.0.1
 * @since 17/Oct/2023 Class available since Release 0.0.1
 */
class Application
{
    public function __construct()
    {
        Logger::Log("Initializing Application");

        //TODO: Do things.

        Logger::Log("Application Initializer Concluded");
    }
}
