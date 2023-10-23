<?php
namespace App\Controllers;

use App\Logger\Logger;

/**
 * An implementation of Controller class.
 * 
 * This Controller will respond to any request regarding the
 * home (or main) part of the site.
 * 
 * @author Miguel A. Guajardo <mguajardoal@gmail.com>
 * @copyright 2023 Zekard Technologies.
 * @license GNU GPLv3
 * @version 0.0.1
 * @since 22/Oct/2023 This class is available since release 0.0.2
 */
class HomeController extends Controller
{
    private $viewsFolder;

    /**
     * During construction, sets up the uri of a folder,
     * from which all the views will be acquired.
     * 
     * @author Miguel A. Guajardo<mguajardoal@gmail.com>
     */
    public function __construct()
    {
        Logger::Log("Home Controller is being constructed.");
        Logger::LogDebug("Setting up the views folder.");
        $this->viewsFolder = __DIR__ . '/../../resources/views/';
    }

    /**
     * The implementation of an abstract method.
     * 
     * This function will return the home page (A.K.A. Main landing-page).
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public function DefaultView($path = []) : void
    {
        $this->home();
    }

    /**
     * Home (Main) landing-page.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public function home($path = [])
    {
        Logger::LogDebug("Building home page");
        Logger::LogDebug(file_exists($this->viewsFolder . "layouts/layout.php")?"true":"false");
        $title = 'Home - Museo de paleontolog&iacute;a de M&uacute;zquiz.';
        include $this->viewsFolder . "home.php";
        include $this->viewsFolder . "segments/header.php";
        include $this->viewsFolder . "layouts/layout.php";
    }

    /**
     * About US landing-page.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public function about($path = [])
    {
        Logger::LogDebug("Building about us page");
        Logger::LogDebug(file_exists($this->viewsFolder . "layouts/layout.php")?"true":"false");
        $title = 'About - Museo de paleontolog&iacute;a de M&uacute;zquiz.';
        include $this->viewsFolder . "about.php";
        include $this->viewsFolder . "segments/header.php";
        include $this->viewsFolder . "layouts/layout.php";
    }

    public function css($file = [])
    {
        Logger::LogDebug('Acquiring tailwindcss');

        logger::LogDebug('Setting the Content-Type as text/css');
        header('Content-Type: text/css');
        
        include $this->viewsFolder . "../css/$file[0].css";
    }
}