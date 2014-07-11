<?php

class Profilemod extends Models {

	public function getProfile($userId){

		$mysql = "SELECT * FROM tbl_user WHERE user_id ='%s'";

		$record = $this->query(sprintf($mysql ,$userId));

		return $record;

	}

	public function updateProfile($usrId, $records){

		$update = "UPDATE tbl_user SET user_fname='%s', user_lname='%s', user_dob='%s', user_country='%s', user_city='%s', user_phone='%s', user_address='%s', user_experience='%s', user_interest='%s' WHERE user_id ='%s'";

		$record = $this->execute(sprintf($update,$records['txtfname'], $records['txtlname'], $records['txtdob'], $records['txtcountry'], $records['txtcity'], $records['txtphone'], $records['txtaddress'], $records['txtexperience'],  $records['txtinterest'], $usrId));

		return  mysql_affected_rows();

	}
	
}

?>