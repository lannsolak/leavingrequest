<?php

class Controllers {
	
	var $view;
	var $model;

	public function __construct(){
		$this->view();
	}

	public function model($name){
		require(PROCESS_DIR .'models/'. strtolower($name) .'.php');
		$model = new $name;
		$this->model = $model;
	}
	
	public function view(){
		$view = new Views();
		$this->view = $view;
	}
	
	public function plugin($name){
		require(MAIN_DIR .'system/libs/'. strtolower($name) .'.php');
	}
	
	public function helper($name){
		require(MAIN_DIR .'system/libs/helper_'. strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}
	
	public function redirect($loc)	{
		global $config;		
		header('Location: '. $config['base_url'] . $loc);
	}
	    
}

?>