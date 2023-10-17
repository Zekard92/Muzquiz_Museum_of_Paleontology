<?php
namespace App;

use App\Logger\Logger;

class Application
{
    public function __construct()
    {
        Logger::Log("Initializing Application");

        

        Logger::Log("Application Initializer Concluded");
    }
}