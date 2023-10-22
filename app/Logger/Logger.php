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
 * @version 0.0.2
 * @since 17/Oct/2023 Class available since realease 0.0.1
 */
class Logger
{
    private static $logFile;
    private static $fileName;
    private static $logsFolder;

    /**
     * Sets up logger environment.
     * 
     * instantiates the logs folder uri.
     * if the folder doesn't exits, makes one.
     * 
     * instantiates the file uri.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public static function SetEnvUp() : void
    {
        self::$logsFolder = __DIR__ . '/logs';
        
        if (!file_exists(self::$logsFolder))
        {
            mkdir(self::$logsFolder);
        }

        self::$fileName = self::$logsFolder . '/current.log';
    }

    /**
     * Opens the log file.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public static function OpenFile()
    {
        self::SetEnvUp();
        $exists = file_exists(self::$fileName);
        self::$logFile = fopen(self::$fileName, 'a');

        if(!$exists)
        {
            self::Log("First Logger Entry.");
            self::EndDivision();
        }
    }

    /**
     * Closes the log file
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public static function CloseFile()
    {
        fclose(self::$logFile);
    }

    /**
     * Stores away the current log file.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public static function NewLog()
    {
        self::CloseFile();
        
        $newFileName = self::$logsFolder . date('M_d_Y') . '.log';
        rename(self::$fileName, $newFileName);
    }

    /**
     * Writes a division to highlight a limit in the log.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public static function EndDivision()
    {
        $separationLine =
        "------------------------------------------------------------------------------------------------------------------------\n";
        fwrite(self::$logFile, $separationLine);
    }

    /**
     * Save log message to file
     * 
     * This method will save a new log entry into a file.
     * The message that is being saved has the next format:
     * e.g. [17/Oct/2023 16:47:50] INFO: Message to be logged.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * @param String    $message    The message to be logged.
     * @param LogLevel  $level      The importance of the log message.
     */
    protected static function SaveLog(String $message, LogLevel $level):void
    {
        $date = date('d/M/Y H:i:s');

        $logMessage = "[$date] $level->value:\t$message";

        fwrite(self::$logFile, "$logMessage\n");
    }

    /**
     * A basic Log
     * 
     * An alias for the method LogInfo.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * 
     * @param String $message The message to be logged.
     */
    public static function Log(String $message)
    {
        self::SaveLog($message, LogLevel::INFO);
    }

    /**
     * A verbosed log
     * This log should be called at every step of the way to display a highly verbosed log.
     * It saves a Log message with Debug level.
     * [allow it only during debugging and in dev environment.]
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * 
     * @param String $message
     */
    public static function LogDebug(String $message):void
    {
        //TODO: verify that the environment is in development/debugging mode.
        self::SaveLog($message, LogLevel::DEBUG);
    }

    /**
     * Less verbosed log message.
     * This method logs operational level messages (the steps the program is going through).
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * 
     * @param String $message
     */
    public static function LogInfo(String $message):void
    {
        self::SaveLog($message, LogLevel::INFO);
    }

    /**
     * Warning alerts log
     * This messages alerts warning level threats.
     * Use it to log non-critical errors.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * 
     * @param String $message
     */
    public static function LogWarning(String $message):void
    {
        self::SaveLog($message, LogLevel::WARNING);
    }

    /**
     * Critical Error log
     * When a catastrofic error has been found, log it at this level.
     * These logs are meant to log errors that prevent the whole functionality of the site.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     * 
     * @param String $message
     */
    public static function LogError(String $message):void
    {
        self::SaveLog($message, LogLevel::ERROR);
    }
}