<?php

class Loginmod extends Models {

	public function checklogin($email, $pwd){

		$email = $this->escapeString($email);

		$pwd = $this->escapeString($pwd);

		$sql = "SELECT * FROM tbl_user 
		INNER JOIN tbl_rud ON tbl_rud.tbl_user_user_id=tbl_user.user_id 
		INNER JOIN tbl_role ON tbl_rud.tbl_role_role_id=tbl_role.role_id 
		WHERE user_email='%s' AND user_password='%s'";

		// $record = $this->query(sprintf("SELECT * FROM tbl_user WHERE user_email='%s' AND user_password='%s'" ,$email ,$pwd));
		$record = $this->query(sprintf($sql ,$email ,$pwd));

		return $record;
		
	}

}

?>
