<?php
/**
 * Every request will come through this script,
 * This script will host and set the application up.
 * 
 * @author Miguel A. Guajardo <mguajardoal@gmail.com>
 * @copyright 2023 Zekard Technologies.
 * @license GNU GPLv3
 * @version 0.0.1
 * @since 17/Oct/2023 Class available since Release 0.0.1
 */

require __DIR__ . '/../vendor/autoload.php';
use App\Logger\Logger;

/* */
Logger::LogDebug("SCRIPT_URL => " . $_SERVER['SCRIPT_URL']);
Logger::LogDebug("SCRIPT_URI => " . $_SERVER['SCRIPT_URI']);
Logger::LogDebug("QUERY_STRING => " . $_SERVER['QUERY_STRING']);
Logger::LogDebug("SERVER_NAME => " . $_SERVER['SERVER_NAME']);
Logger::LogDebug("HTTP_HOST => " . $_SERVER['HTTP_HOST']);
Logger::LogDebug("REQUEST_URI => " . $_SERVER['REQUEST_URI']);
/* */

Logger::Log("Request received.");

$app = new App\Application();

Logger::Log("Request life-cycle finished.");
