<?php

class Loginmod extends Models {

	public function checklogin($email, $pwd){

		$email = $this->escapeString($email);

		$pwd = $this->escapeString($pwd);

		$record = $this->query(sprintf("SELECT * FROM tbl_user WHERE user_email='%s' AND user_password='%s'" ,$email ,$pwd));

		return $record;
		
	}

}

?>
