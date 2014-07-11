<?php

function core(){
	
	global $config;
    
    // Set our defaults
    $controller = $config['default_controller']; // default controller

    $action = 'index'; // default action

    $url = ''; 
	
	// Get request url and script url
	$request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
	$script_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';

	$script_url  = strtolower($script_url);
	$request_url  = strtolower($request_url);

	// Get our url path and trim the / of the left and the right, (get the url segement).
	if($request_url != $script_url) $url = trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/');

	// Split the url into segments
	$segments = explode('/', $url);
	
	// Check there are a segemnt request
	if(isset($segments[0]) && $segments[0] != '') $controller = $segments[0];

	if(isset($segments[1]) && $segments[1] != '') $action = $segments[1];

	// Controller including
    $path = PROCESS_DIR . 'controllers/' . $controller . '.php'; // get controller path

	if(file_exists($path)){

        require_once($path);

	} else {

        // $controller = $config['error_controller'];

        // require_once(PROCESS_DIR . 'controllers/' . $controller . '.php');
        
        error404(); exit();

	}

    // Check the method exists
    if(!method_exists($controller, $action)){

        // $controller = $config['error_controller'];

        // require_once(PROCESS_DIR . 'controllers/' . $controller . '.php');

        // $action = 'index';
        error404(); exit();

    }
	
	// Create object and call method
	$obj = new $controller;

    die(call_user_func_array(array($obj, $action), array_slice($segments, 2)));

}


function segment($seg){

	if(!is_int($seg)) return false;

	// Get request url and script url
	$request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
	$script_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';

	$script_url  = strtolower($script_url);
	$request_url  = strtolower($request_url);
	
	// Get our url path and trim the / of the left and the right, (get the url segement).
	if($request_url != $script_url) $url = trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/');

	// Split the url into segments
	$parts = explode('/', $url);

    return isset($parts[$seg]) ? $parts[$seg] : false;

}

?>
