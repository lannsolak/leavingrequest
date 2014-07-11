<?php 

class Requestmod extends Models{

	public function getTakeRequest(){

		echo "records is getting";

	}

	public function getOwnLeave($usrId){

		$sql = "SELECT * FROM tbl_request
		INNER JOIN tbl_user a ON tbl_request.tbl_user_user_id=a.user_id 
		INNER JOIN tbl_calendar ON tbl_request.tbl_calendar_calendar_id=tbl_calendar.calendar_id 
		LEFT JOIN tbl_user b ON tbl_request.request_approveby=b.user_id 
		WHERE tbl_request.tbl_user_user_id='%s'";

		$record = $this->query(sprintf($sql ,$usrId));

		return $record;
	}

}

?>