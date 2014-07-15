<?php 

class Requestmod extends Models{

	public function getAllLeave($usrId){

		$sql = "SELECT tblr.*,(SELECT CONCAT_WS(' ',tblu.user_fname, tblu.user_lname)
		        FROM  tbl_user AS tblu WHERE user_id = tbl_user_user_id) AS 'username',
				(SELECT CONCAT_WS(' ',tblu.user_fname, tblu.user_lname)
		        FROM  tbl_user AS tblu WHERE user_id = request_approveby) AS 'approvebyname', tbl_calendar.*
				FROM tbl_request AS tblr
				INNER JOIN tbl_calendar ON tblr.tbl_calendar_calendar_id=tbl_calendar.calendar_id
				WHERE tblr.tbl_user_user_id!=$usrId AND tblr.request_deleted!=1";
	
		$record = $this->query($sql);

		return $record;

	}

	public function getAllDepartment(){

		$sql = "SELECT * FROM tbl_department WHERE dept_deleted = 0";

		$record = $this->query($sql);

		return $record;

	}

	public function getUserToRequest($usrID){

		$sql = "SELECT user_id,user_fname,user_lname FROM tbl_user WHERE user_id != $usrID AND user_deleted = 0";

		$record = $this->query($sql);

		return $record;

	}

	public function insertCalendar($from, $to){

		$sql = "INSERT INTO tbl_calendar (calendar_fromdate, calendar_todate) VALUES (CAST('".$from."' AS DATE), CAST('".$to."' AS DATE))";

		$this->execute($sql);

		return mysql_insert_id();

	}

	public function insertRequest($caledarID, $rq_date, $usrID, $subject, $msg){

		$sql = "INSERT INTO tbl_request
		(request_date, tbl_user_user_id, request_subject, request_message, tbl_calendar_calendar_id) 
		VALUES 
		(CAST('".$rq_date."' AS DATE), '".$usrID."', '".$subject."', '".$msg."', '".$caledarID."')";

		$this->execute($sql);

		return mysql_insert_id();

	}

	public function getDetail($wherein){

		$sql = "SELECT tblr.*,(SELECT CONCAT_WS(' ',tblu.user_fname, tblu.user_lname)
		        FROM  tbl_user AS tblu WHERE user_id = tbl_user_user_id) AS 'username',
				(SELECT CONCAT_WS(' ',tblu.user_fname, tblu.user_lname)
		        FROM  tbl_user AS tblu WHERE user_id = request_approveby) AS 'approvebyname', tbl_calendar.*
				FROM tbl_request AS tblr
				INNER JOIN tbl_calendar ON tblr.tbl_calendar_calendar_id=tbl_calendar.calendar_id
				WHERE tblr.request_id IN (".implode(", ",$wherein).")";

		$record = $this->query($sql);

		return $record;

	}

	public function getModifyRequest($rqID){

		if($rqID != false){

			foreach($rqID as $rq){

				$rq_ID = $rq;

			}

		}else{


			return null;

		}

		$sql = "SELECT tblr.*,tbl_calendar.* FROM tbl_request AS tblr
				INNER JOIN tbl_calendar ON tblr.tbl_calendar_calendar_id=tbl_calendar.calendar_id
				WHERE tblr.request_id = $rq_ID";
	
		$record = $this->query($sql);

		return $record;

	}

	public function updateCalendar($calendarID, $from, $to){

		$update = "UPDATE tbl_calendar SET calendar_fromdate=CAST('%s' AS DATE), calendar_todate=CAST('%s' AS DATE) WHERE calendar_id ='%s'";

		$record = $this->execute(sprintf($update,$from, $to,$calendarID));

		return  mysql_affected_rows();

	}

	public function updateRequest($postRequestID, $calendarID, $rq_date, $usrID, $subject, $msg){

		$update = "UPDATE tbl_request SET request_date=CAST('%s' AS DATE), tbl_user_user_id='%s', request_subject='%s', request_message='%s' WHERE request_id ='%s'";

		$record = $this->execute(sprintf($update,$rq_date, $usrID,$subject, $msg, $postRequestID));

		return  mysql_affected_rows();

	}

	public function deleteRequest($rq_id){

		$update = "UPDATE tbl_request SET request_deleted=1 WHERE request_id IN ('%s')";

		$record = $this->execute(sprintf($update, implode(',', $rq_id)));

		return  mysql_affected_rows();

	}

	public function statusRequest($status, $rq_id){

		$update = "UPDATE tbl_request SET request_status='%s' WHERE request_id IN (".implode(", ",$rq_id).")";

		$record = $this->execute(sprintf($update, $status));

		return  mysql_affected_rows();

	}

}

?>