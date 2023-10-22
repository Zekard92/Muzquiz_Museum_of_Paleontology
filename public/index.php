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

$app = new App\Application();
