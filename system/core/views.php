<?php

class Views {

	private $page_variables = array();

	public function render($source, $data = ''){

		if($data){

			$this->$page_variables = $data;
		
			extract($this->$page_variables);

		}

		ob_start();

		if(file_exists(PROCESS_DIR.'views/'.$source.'.php')){

			require(PROCESS_DIR.'views/'.$source.'.php');

		}else{

			error404();

		}

		echo ob_get_clean();

	}
    
}

?>