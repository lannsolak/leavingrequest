<?php

class Profile extends Controllers {

	function __construct(){

		parent::__construct();

		$this->model('profilemod');

		$this->helper('session');
		
	}

	function index(){

		if($this->helper->get_session('roleTitle') && $this->helper->get_session('userId')){
	 	
	 		$this->profile($this->helper->get_session('userId'));

		}

	}

	public function profile($userId = false){

		if($userId == false && $this->helper->get_session('userId')){

			$userId = $this->helper->get_session('userId');

		}

		if($this->helper->get_session("updateprofile")){

			$data['profileupdated'] = "Your profile have been updated successfully !!!";

			unset($_SESSION['updateprofile']);

		}

		$data['profile'] = $this->model->getProfile($userId);

		$this->view->render('dashboard', $data);

	}


	public function updateinfo(){

		if(isset($_REQUEST['btnUpdateInfo'])){

			$result = $this->model->updateProfile($this->helper->get_session('userId'), $_REQUEST);
			
			if($result == 0){

				$data['nothingupdate'] = "There is nothing to update...";
			
			}elseif($result > 0){

				$this->helper->set_the_session('updateprofile', "successfully");

				$this->redirect("profile");

			}else{

				$data['updatefail'] = "The error occured that make updating false, please contact system administrator...";

			}
			

		}

		$data['updateProfile'] = $this->model->getProfile($this->helper->get_session('userId'));

		$this->view->render('dashboard', $data);

	}

	public function changepicture(){

		$this->view->render('dashboard');

	}

	public function changepassword(){

		$this->view->render('dashboard');

	}

}

?>
