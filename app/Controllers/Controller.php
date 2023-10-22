<?php
namespace App\Controllers;

/**
 * Base controller class
 * 
 * This class will provide the basics to build new Controller classes.
 * 
 * @author Miguel A. Guajardo <mguajardoal@gmail.com>
 * @copyright 2023 Zekard Technologies.
 * @license GNU GPLv3
 * @version 0.0.1
 * @since 22/Oct/2023 Class available since release 0.0.2
 */
abstract class Controller
{
    /**
     * Provides the default view to show.
     * 
     * If the request points to a controller's view that is not set,
     * provide a default one through this method.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public abstract function DefaultView() : void;
}
