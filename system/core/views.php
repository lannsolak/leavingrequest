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

	public function display_alert_message($class, $msg){

		echo '<div class="alert '.$class.' alert-dismissible" role="alert">

		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		   
		  '.$msg.'

		</div>';

	}
    
}

?>