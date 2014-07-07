<?php

class Views {

	public function render($source, $data = ''){

		if($data != ""){

			$page_variables = $data;
		
			extract($page_variables);

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