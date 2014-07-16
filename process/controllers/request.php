<?php

class Request extends Controllers {

	function __construct(){

		parent::__construct();

		$this->model('requestmod');

		$this->helper('session');
		
	}

	function index(){

		$usrID = $this->helper->get_session("userId");

		$data['OwnLeave'] = $this->model->getAllLeave($usrID);

		$data['Department'] = $this->model->getAllDepartment();

		if($this->helper->get_session('delete')){

			$data['deleted'] = $this->helper->get_session('delete');

			unset($_SESSION['delete']);

		}

		if($this->helper->get_session('status')){

			$data['status'] = $this->helper->get_session('status');

			unset($_SESSION['status']);

		}

		if($this->helper->get_session('add_department')){

			$data['add_department'] = $this->helper->get_session('add_department');

			unset($_SESSION['add_department']);

		}

		if($this->helper->get_session('edit_department')){

			$data['edit_department'] = $this->helper->get_session('edit_department');

			unset($_SESSION['edit_department']);

		}

		if($this->helper->get_session('delete_department')){

			$data['delete_department'] = $this->helper->get_session('delete_department');

			unset($_SESSION['delete_department']);

		}

		$this->view->render('dashboard', $data);

	}

	public function add(){

		$usrID = $this->helper->get_session("userId");

		$data['usrs'] = $this->model->getUserToRequest($usrID);

		if(isset($_REQUEST['btnAddRequest'])){

			$vrq = $this->validation_request();

			if($vrq[0]['rq-date'] && $vrq[0]['daterange'] && $vrq[0]['rq-usr'] && $vrq[0]['rq-subject'] && $vrq[0]['rq-msg']){

				$caledarID = $this->model->insertCalendar($_REQUEST['txtFromDate'], $_REQUEST['txtToDate']);

				if($caledarID){

					$result = $this->model->insertRequest($caledarID, $_REQUEST['txtDateRequest'], $_REQUEST['sluser'], $_REQUEST['txtSubject'], $_REQUEST['txtMsg']);

					if($result){

						$data['successAddrequest'] = "The take leave have been submitted...";

					}else{

						$data['error'][] = "The take leave cannot submit...";

					}

				}else{

					$data['error'][] = "The take leave cannot submit...";

				}

			}else{

				$data['error'] = $vrq[1];

			}

		}

		$this->view->render('dashboard', $data);

	}

	public function detail(){

		$wherein = $_REQUEST['tdcheckbox'];

		if($wherein != false){

			$data['selectrequestdetail'] = $this->model->getDetail($wherein);

		}else{

			$data['error'] = "You don't have any selected records.";

			$this->redirect('request');

		}

		$this->view->render('dashboard', $data);

	}

	public function modify(){

		$usrID = $this->helper->get_session("userId");

		$data['usrs'] = $this->model->getUserToRequest($usrID);

		$rq_id = false;

		if(isset($_REQUEST['tdcheckbox'])){ $rq_id = $_REQUEST['tdcheckbox']; }elseif(isset($_REQUEST['rqID'])){ $rq_id = array($_REQUEST['rqID']); }

		$data['rqRecords'] = $this->model->getModifyRequest($rq_id);

		if(isset($_REQUEST['btnEditRequest'])){

			$vrq = $this->validation_request();

			$postRequestID = $_REQUEST['rqID'];

			$postCalendarID = $_REQUEST['calID'];

			if($vrq[0]['rq-date'] && $vrq[0]['daterange'] && $vrq[0]['rq-usr'] && $vrq[0]['rq-subject'] && $vrq[0]['rq-msg']){

				$caledarID = $this->model->updateCalendar($postCalendarID, $_REQUEST['txtFromDate'], $_REQUEST['txtToDate']);

				$result = $this->model->updateRequest($postRequestID, $caledarID, $_REQUEST['txtDateRequest'], $_REQUEST['sluser'], $_REQUEST['txtSubject'], $_REQUEST['txtMsg']);

				if($result > 0 OR $caledarID > 0 ){

					$data['successEditrequest'] = "The take leave have been updated...";

				}elseif($result == 0 && $caledarID == 0){

					$data['nochange'] = "There is no records was modified...";

				}else{

					$data['error'][] = "The take leave cannot update...";

				}

			}else{

				$data['error'] = $vrq[1];

			}

		}		

		$this->view->render('dashboard', $data);

	}

	public function delete(){

		$rq_id = false;

		if(isset($_REQUEST['tdcheckbox'])){ $rq_id = $_REQUEST['tdcheckbox']; }

		$result = $this->model->deleteRequest($rq_id);

		if($result){

			$this->helper->set_the_session('delete', 'success');

		}else{

			$this->helper->set_the_session('delete', 'fail');

		}

		$this->redirect('request');

	}

	public function status(){

		$status = segment(2);

		$rq_id = false;

		if(isset($_REQUEST['tdcheckbox'])){ $rq_id = $_REQUEST['tdcheckbox']; }

		$result = $this->model->statusRequest($status, $rq_id);

		if($result){

			$this->helper->set_the_session('status', 'success');

		}else{

			$this->helper->set_the_session('status', 'fail');

		}

		$this->redirect('request');

	}


	//  department section

	public function addDept(){

		$deptmentTitle = $_REQUEST['deptTitle'];

		$result = $this->model->createDepartment($deptmentTitle);

		if($result){

			$this->helper->set_the_session('add_department', 'success');

		}else{

			$this->helper->set_the_session('add_department', 'fail');

		}

		$this->redirect('request');

	}

	public function editDept(){

		$deptmentTitle = $_REQUEST['deptTitle'];

		$deptmentID = $_REQUEST['deptID'];

		$result = $this->model->updateDepartment($deptmentTitle, $deptmentID);

		if($result > 0){

			$this->helper->set_the_session('edit_department', 'success');

		}else if($result == 0){

			$this->helper->set_the_session('edit_department', 'nochange');

		}else{

			$this->helper->set_the_session('edit_department', 'fail');

		}

		$this->redirect('request');

	}

	public function deleteDept(){

		$deptmentID = segment(2);

		$result = $this->model->deleteDepartment($deptmentID);

		if($result > 0){

			$this->helper->set_the_session('delete_department', 'success');

		}else{

			$this->helper->set_the_session('delete_department', 'fail');

		}

		$this->redirect('request');

	}

	public function validation_request(){

		$error = array();

		if($_REQUEST['txtDateRequest'] != ""){ 

			$error[0]['rq-date'] = true;

        	$error[1]['rq-date'] = "";

		}else{

			$error[0]['rq-date'] = false;

        	$error[1]['rq-date'] = "The Request Date is required ...";

		}

		if($_REQUEST['txtFromDate'] != "" && $_REQUEST['txtToDate'] != ""){

			$days = date_diff(date_create($_REQUEST['txtFromDate']), date_create($_REQUEST['txtToDate']));

        	$days = $days->format("%a");

        	if($days > 4 ){

        		$error[0]['daterange']['daterange'] = false;

        		$error[1]['daterange'] = "The amount of days is greater than 4.";

        	}else{

        		$error[0]['daterange'] = true;

        		$error[1]['daterange'] = "";

        	}

		}else{

			$error[0]['daterange'] = true;

        	$error[1]['daterange'] = "The Take leave From Date and Return Date is required...";

		}

		if($_REQUEST['sluser'] != ""){

			$error[0]['rq-usr'] = true;

        	$error[1]['rq-usr'] = "";

		}else{

			$error[0]['rq-usr'] = true;

        	$error[1]['rq-usr'] = "The User is required ...";

		}

		if($_REQUEST['txtSubject'] != ""){
			
			$error[0]['rq-subject'] = true;

        	$error[1]['rq-subject'] = "";

		}else{

			$error[0]['rq-subject'] = false;

        	$error[1]['rq-subject'] = "The Subject is required ...";

		}

		if($_REQUEST['txtMsg'] != ""){

			$error[0]['rq-msg'] = true;

        	$error[1]['rq-msg'] = "";

		}else{

			$error[0]['rq-msg'] = false;

        	$error[1]['rq-msg'] = "The Message is required ...";

		}

		return $error;

	}

}