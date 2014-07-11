<?php

class Login extends Controllers {

	function __construct(){

		parent::__construct();

		$this->model('loginmod');

		$this->helper('session');
		
	}

	function index()
	{

		$data['page'] = "login";

		if(isset($_REQUEST['lgsubmit'])){

			$validate = $this->validation();

			if(!$validate){

				$checklogin = $this->model->checklogin($_REQUEST['lgemail'], $_REQUEST['lgpwd']);
				var_dump($checklogin);
				if(empty($checklogin)){

					$data['error'] = "password and email does not match !!!";

				}else{

					foreach($checklogin as $value){

						$this->helper->set_the_session('roleID', $value->role_id);

						$this->helper->set_the_session('roleTitle', $value->role_name);
						
						$this->helper->set_the_session('userEmail', $value->user_email);
						
						$this->helper->set_the_session('userName', $value->user_fname.' '.$value->user_lname);

						$this->helper->set_the_session('userId', $value->user_id);

						if($this->helper->get_session('roleTitle') && $this->helper->get_session('userId')){
							
							$this->redirect("profile");

						}else{

							$data['error'] = "There is no session created...";

						}

					}

				}

			}else{

				$data['error'] = "invalid email and password !!!";

			}

		}

		$this->view->render('login', $data);
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
