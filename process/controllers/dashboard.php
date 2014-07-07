<?php

class Dashboard extends Controllers {

	function __construct(){

		parent::__construct();

	}

	function index(){

		$data['hello'] = "welcome";
		
		$this->view->render('dashboard', $data);

	}

}

?>
