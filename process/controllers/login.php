<?php

class Login extends Controllers {

	function __construct(){
		parent::__construct();
		$this->model('loginmod');
	}

	function index()
	{
		if(isset($_REQUEST['lgsubmit'])){

			$validate = $this->validation();

			if(!$validate){

				$checklogin = $this->model->checklogin($_REQUEST['lgemail'], $_REQUEST['lgpwd']);

				var_dump($checklogin);

			}

		}

		$this->view->render('login');
	}

	function validation(){

		$error = true; // validation meet the error

		if($_REQUEST['lgemail'] != "" && $_REQUEST['lgpwd'] != ""){
			
			if(! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_REQUEST['lgemail'])){
				
				$error = true; // validation meet the error

			}else{

				$error = false; // validation meet the true codition

			}

		}else{

			$error = true; // validation meet the error

		}

		return $error;

	}

}

?>
