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
        Logger::Log('Home Controller is being constructed.');

        $this->controllerName = 'Home';
        $this->title='Paleontología Múzquiz';

        Logger::LogDebug('Setting up the views folder.');
        $this->viewsFolder = __DIR__ . '/../../resources/views/';
        
    }
    
    protected function render(string $viewPath)
    {
        $pageTitle = "$this->controllerName - $this->title";

        include $this->viewsFolder . $viewPath;
        include $this->viewsFolder . 'segments/header.php';
        include $this->viewsFolder . 'segments/footer.php';
        include $this->viewsFolder . 'layouts/layout.php';
    }
    
    /**
     * The implementation of an abstract method.
     * 
     * This function will return the home page (A.K.A. Main landing-page).
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public function DefaultView($path = []) : void
    {
        Logger::LogInfo('Following default View');
        $this->home();
    }
    
    /**
     * Home (Main) landing-page.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public function home($path = [])
    {
        Logger::LogDebug('Building home page');
        Logger::LogDebug(file_exists($this->viewsFolder . 'layouts/layout.php')?'true':'false');

        Logger::LogInfo('Implementing Includes');
        $this->render('home.php');
    }
    
    /**
     * About US landing-page.
     * 
     * @author Miguel A. Guajardo <mguajardoal@gmail.com>
     */
    public function about($path = [])
    {
        Logger::LogDebug('Building about us page');
        Logger::LogDebug(
			'Layout file exists? ' 
			. file_exists($this->viewsFolder . 'layouts/layout.php')?'true':'false'
			);

        Logger::LogInfo('Rendering Page.');
        $this->render('about.php');
    }

    public function css($file = [])
    {
        Logger::LogDebug('Acquiring tailwindcss');

        Logger::LogDebug('Setting the Content-Type as text/css');
        header('Content-Type: text/css');
        
        include $this->viewsFolder . "../css/$file[0].css";
    }

	public function favicon()
	{
		Logger::LogDebug('Favicon requested');
	}
}
