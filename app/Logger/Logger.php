<?php
namespace App\Logger;

/**
 * Program logger
 * 
 * This class shall be used to write the log files for every interaction.
 * 
 * @author Miguel A. Guajardo <mguajardoal@gmail.com>
 * @copyright 2023 Zekard Techonologies
 * @license GNU GPLv3
 * @version 0.0.1
 * @since 17/Oct/2023 Class available since realease 0.0.1
 */
class Logger
{
    protected static function SaveLog(String $message, LogLevel $level):void
    {
        $date = date('d/M/Y H:i:s');

        $message = "[$date] $level->value:\t$message";

        echo "$message<br>";
    }

    public static function Log(String $message)
    {
        self::SaveLog($message, LogLevel::INFO);
    }

    public static function LogDebug(String $message):void
    {
        self::SaveLog($message, LogLevel::DEBUG);
    }

    public static function LogInfo(String $message):void
    {
        self::SaveLog($message, LogLevel::INFO);
    }

    public static function LogWarning(String $message):void
    {
        self::SaveLog($message, LogLevel::WARNING);
    }

    public static function LogError(String $message):void
    {
        self::SaveLog($message, LogLevel::ERROR);
    }
}