<?php
/*
 * PIP v0.5.3
 */

//Start the Session
session_start(); 

// Defines
define('MAIN_DIR', realpath(dirname(__FILE__)) .'/');
define('PROCESS_DIR', MAIN_DIR .'process/');

// Includes
require(MAIN_DIR .'system/config/config.php');
require(MAIN_DIR .'system/core/models.php');
require(MAIN_DIR .'system/core/views.php');
require(MAIN_DIR .'system/core/controllers.php');
require(MAIN_DIR .'system/core/core.php');
require(MAIN_DIR .'system/error.php');

global $config;
// Define base URL

define('BASE_URL', $config['base_url']);

core();

?>
 