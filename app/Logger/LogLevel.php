<?php
namespace App\Logger;

/**
 * Enumerate the risk levels at which we wish to report to the logger.
 * 
 * @author Miguel A. Guajardo <mguajardoal@gmail.com>
 * @copyright 2023 Zekard Technologies.
 * @license GNU GPLv3
 * @version 0.0.1
 * @since 17/Oct/2023 Class available since release 0.0.1
 */
enum LogLevel: string
{
    case DEBUG      = 'DEBUG';
    case INFO       = 'INFO';
    case WARNING    = 'WARNING';
    case ERROR      = 'ERROR';
}