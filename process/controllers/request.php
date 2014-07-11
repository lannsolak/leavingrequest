<?php

class Request extends Controllers {

	function __construct(){

		parent::__construct();

		$this->model('requestmod');

		$this->helper('session');
		
	}

	function index(){

		$usrID = $this->helper->get_session("userId");

		$data['OwnLeave'] = $this->model->getOwnLeave($usrID);

		// if($this->helper->get_session("roleTitle") == "Administrator"){

		// 	$data['ApprovedLeave'] = $this->model->getApprovedLeave();

		// 	$data['StaredLeave'] = $this->model->getApprovedLeave();

		// }

		$this->view->render('dashboard', $data);

	}

}