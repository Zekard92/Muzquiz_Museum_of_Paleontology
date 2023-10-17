<?php
namespace App\Logger;

enum LogLevel: string
{
    case DEBUG      = 'DEBUG';
    case INFO       = 'INFO';
    case WARNING    = 'WARNING';
    case ERROR      = 'ERROR';
}