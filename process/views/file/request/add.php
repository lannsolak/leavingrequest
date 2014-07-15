<form action="<?php echo BASE_URL; ?>request/add" method="post" role="form">    
	
	<?php 

		if(isset($error)){

			foreach($error as $err){

				if($err != "")		

				$this->display_alert_message('alert-warning', $err);

			}

		}else if(isset($successAddrequest)){

			$this->display_alert_message('alert-success', $successAddrequest);

		}
		
	?>

	<div class="col-lg-6">		
	    <div class="form-group">
	        <label>Request Date: </label>
	        <input class="form-control date-rq" name="txtDateRequest" value="" data-date-format="yyyy-mm-dd" placeholder="date..">
	    </div>
	    <div class="form-group">
	        <label>Take leave from: </label>
	        <input class="form-control datefrom-rq" name="txtFromDate" value="" data-date-format="yyyy-mm-dd" placeholder="date..">
	    </div>
	    <div class="form-group">
	        <label>Return Date: </label>
	        <input class="form-control dateto-rq" name="txtToDate" value="" data-date-format="yyyy-mm-dd" placeholder="date..">
	    </div>
    </div>
    <div class="col-lg-6">    	
	    <div class="form-group">
	        <label>Requester: </label>
	        <select class="form-control user-rq" name="sluser">

	        	<option value="">--- select ---</option>

	        	<?php 

	        		if(isset($usrs)){

	        			foreach($usrs as $usreach){

	        				echo '<option value="'.$usreach->user_id.'">'.$usreach->user_fname.' '.$usreach->user_lname.'</option>';

	        			}

	        		}

	        	?>
	        </select>
	    </div>
	    <div class="form-group">
	        <label>Subject: </label>
	        <input class="form-control" name="txtSubject" value="" placeholder="subject..">
	    </div>
	    <div class="form-group">
	        <label>Object / Reason</label>
	        <textarea class="form-control" name="txtMsg" rows="3" placeholder="your object/reason.."></textarea>
	    </div>
	    <div class="pull-right">
		    <button type="submit" name="btnAddRequest" class="btn btn-default btn-primary">Save</button>
		    <button type="reset" class="btn btn-default">Reset</button>
		    <a href="<?php echo BASE_URL; ?>request" class="btn btn-default">Back</a>	    	
	    </div>
	</div>
</form>