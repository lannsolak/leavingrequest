<?php

class Employee extends Controllers{

	function __construct(){

		parent::__construct();

		$this->model('employeemod');

		$this->helper('session');
		
	}

	public function index(){

		$usrID = $this->helper->get_session("userId");

		$data['listEmployee'] = $this->model->getListImployee($usrID);

		$data['emInDepartment'] = $this->model->getAmountOfEmployeeInDept($usrID);

		$this->view->render('dashboard', $data);

	}

	public function add(){

		$usrID = $this->helper->get_session("userId");

		$data['emInDepartment'] = $this->model->getAmountOfEmployeeInDept($usrID);

		$data['em_department'] = $this->model->getDepartment();

		$data['em_ordinator'] = $this->model->getOrdinator();

		$data['em_role'] = $this->model->getRole();

		if(isset($_REQUEST['btnCreateEmployee'])){

			$vem = $this->validateEmployee();

			if( $vem[0]['emfname'] && $vem[0]['emlname'] && $vem[0]['txtdob'] && $vem[0]['txtcountry'] && $vem[0]['txtcity'] && $vem[0]['txtphone'] && $vem[0]['emDepartment'] && $vem[0]['txtaddress'] && $vem[0]['txtemail']){

				$upload = $this->uploadimage();

				if($upload[2]['status'] == false){

					$data['error'] = $upload[1];

				}

				$emId = $this->model->createEmployee($_REQUEST,$upload[0]['filename']);

				$result = $this->model->insertRud($_REQUEST['emDepartment'], $_REQUEST['emRole'], $emId);

				if($emID && $result){

					$data['successAddEmployee'] = "The new employee was created successfully...";
				}


			}else{

				$data['error'] = $vem[1];

			}

		}

		$this->view->render('dashboard', $data);

	}

	// function to check upload file

	// function to validate form add new employee

	public function validateEmployee(){

		$error = array();

		if($_REQUEST['txtfname'] != ""){ 

			$error[0]['emfname'] = true;

        	$error[1]['emfname'] = "";

		}else{

			$error[0]['emfname'] = false;

        	$error[1]['emfname'] = "The first name is required ...";

		}

		if($_REQUEST['txtlname'] != ""){

			$error[0]['emlname'] = true;

        	$error[1]['emlname'] = "";

		}else{

			$error[0]['emlname'] = false;

        	$error[1]['emlname'] = "The last name is required ...";

		}

		if($_REQUEST['txtdob'] != ""){

			$error[0]['txtdob'] = true;

        	$error[1]['txtdob'] = "";

		}else{

			$error[0]['txtdob'] = false;

        	$error[1]['txtdob'] = "The Date of birth is required ...";

		}

		if($_REQUEST['txtcountry'] != ""){

			$error[0]['txtcountry'] = true;

        	$error[1]['txtcountry'] = "";

		}else{

			$error[0]['txtcountry'] = false;

        	$error[1]['txtcountry'] = "The County is required ...";

		}

		if($_REQUEST['txtcity'] != ""){

			$error[0]['txtcity'] = true;

        	$error[1]['txtcity'] = "";

		}else{

			$error[0]['txtcity'] = false;

        	$error[1]['txtcity'] = "The City is required ...";

		}

		if($_REQUEST['txtphone'] != ""){

			$error[0]['txtphone'] = true;

        	$error[1]['txtphone'] = "";

		}else{

			$error[0]['txtphone'] = false;

        	$error[1]['txtphone'] = "The Phone number is required ...";

		}

		if($_REQUEST['emDepartment'] != ""){

			$error[0]['emDepartment'] = true;

        	$error[1]['emDepartment'] = "";

		}else{

			$error[0]['emDepartment'] = false;

        	$error[1]['emDepartment'] = "The Department is required ...";

		}

		if($_REQUEST['txtaddress'] != ""){

			$error[0]['txtaddress'] = true;

        	$error[1]['txtaddress'] = "";

		}else{

			$error[0]['txtaddress'] = false;

        	$error[1]['txtaddress'] = "The Address is required ...";

		}

		if($_REQUEST['emRole'] != ""){

			$error[0]['emRole'] = true;

        	$error[1]['emRole'] = "";

		}else{

			$error[0]['emRole'] = false;

        	$error[1]['emRole'] = "The Role is required ...";

		}

		if($_REQUEST['txtemail'] != ""){

        	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_REQUEST['txtemail'])) {
			  

			  	$error[0]['txtemail'] = false;

        		$error[1]['txtemail'] = "Invalid email format ...";

			}else{

				$error[0]['txtemail'] = true;

	        	$error[1]['txtemail'] = "";

			}

		}else{

			$error[0]['txtemail'] = false;

        	$error[1]['txtemail'] = "The Address is required ...";

		}

		

		return $error;


	}

	public function uploadimage(){

		$allowedExts = array("gif", "jpeg", "jpg", "png");

		$temp = explode(".", $_FILES["picProfile"]["name"]);

		$extension = end($temp);

		$checked = array();

		if ((($_FILES["picProfile"]["type"] == "image/gif") || ($_FILES["picProfile"]["type"] == "image/jpeg")
		|| ($_FILES["picProfile"]["type"] == "image/jpg")	|| ($_FILES["picProfile"]["type"] == "image/pjpeg")
		|| ($_FILES["picProfile"]["type"] == "image/x-png") || ($_FILES["picProfile"]["type"] == "image/png"))
		&& ($_FILES["picProfile"]["size"] < 200000) && in_array($extension, $allowedExts)) {
		  
			if ($_FILES["picProfile"]["error"] > 0) {

			    $checked[0]['filename'] = "default.gif";
			    $checked[1]['message'] = $_FILES["picProfile"]["error"];
			    $checked[2]['status'] = false;

			} else {
			    
			    if (file_exists("picture/profile/" . $_FILES["picProfile"]["name"])) {

			       $checked[0]['filename'] = $_FILES["picProfile"]["name"];
				   $checked[1]['message'] = $_FILES["picProfile"]["name"] . " already exists. So, we used this images";
				   $checked[2]['status'] = false;

			    } else {

			       $checked[0]['filename'] = $_FILES["picProfile"]["name"];
				   $checked[1]['message'] = $_FILES["picProfile"]["name"] . " uploaded successfully";
				   $checked[2]['status'] = true;

			       move_uploaded_file($_FILES["picProfile"]["tmp_name"], "picture/profile/" . $_FILES["picProfile"]["name"]);

			    }

			}

		} else {

			$checked[0]['filename'] = "default.gif";
			$checked[1]['message'] = "Invalid file type, file is big size or you file extension not allowed...";
			$checked[2]['status'] = false;
		}

		return $checked;

	}


}

?>