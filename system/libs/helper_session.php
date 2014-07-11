<?php

class Helper_session {

	function set_the_session($key, $val)	{

		$_SESSION["$key"] = $val;

	}
	
	function get_session($key){

		if(!isset($_SESSION["$key"])){

			return false;

		}else{

			return $_SESSION["$key"];

		}


	}
	
	function session_destroy($key = false)
	{

		if($key == false){

			session_destroy();

		}else{

			$file = session_save_path()."/sess_".session_id();

			unlink($file);

		}

	}

}

?>