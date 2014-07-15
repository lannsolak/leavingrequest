<form action="<?php echo BASE_URL; ?>request/modify" method="post" role="form">    
	
	<?php 

		if(isset($error)){

			foreach($error as $err){

				if($err != "")		

				$this->display_alert_message('alert-warning', $err);

			}

		}

		if(isset($successEditrequest)){

			$this->display_alert_message('alert-success', $successEditrequest);

		}


		if(isset($nochange)){

			$this->display_alert_message('alert-info', $nochange);

		}

	if(isset($rqRecords)){

		foreach($rqRecords as $rq){

			
	?>

	<input type="hidden" name="calID" value="<?php echo $rq->calendar_id; ?>" />

	<input type="hidden" name="rqID" value="<?php echo $rq->request_id; ?>" />

	<div class="col-lg-6">		
	    <div class="form-group">
	        <label>Request Date: </label>
	        <input class="form-control date-rq" name="txtDateRequest" value="<?php echo $rq->request_date; ?>" data-date-format="yyyy-mm-dd" placeholder="date..">
	    </div>
	    <div class="form-group">
	        <label>Take leave from: </label>
	        <input class="form-control datefrome-rq" name="txtFromDate" value="<?php echo $rq->calendar_fromdate; ?>" data-date-format="yyyy-mm-dd" placeholder="date..">
	    </div>
	    <div class="form-group">
	        <label>Return Date: </label>
	        <input class="form-control datetoe-rq" name="txtToDate" value="<?php echo $rq->calendar_todate; ?>" data-date-format="yyyy-mm-dd" placeholder="date..">
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

	        				if($rq->tbl_user_user_id == $usreach->user_id){
	        				
	        					echo '<option value="'.$usreach->user_id.'" selected>'.$usreach->user_fname.' '.$usreach->user_lname.'</option>';

	        				}else{
	        				
	        					echo '<option value="'.$usreach->user_id.'">'.$usreach->user_fname.' '.$usreach->user_lname.'</option>';
	        				}

	        			}

	        		}

	        	?>
	        </select>
	    </div>
	    <div class="form-group">
	        <label>Subject: </label>
	        <input class="form-control" name="txtSubject" value="<?php echo $rq->request_subject; ?>" placeholder="subject..">
	    </div>
	    <div class="form-group">
	        <label>Object / Reason</label>
	        <textarea class="form-control" name="txtMsg" rows="3" placeholder="your object/reason.."><?php echo $rq->request_message; ?></textarea>
	    </div>
	    <div class="pull-right">
		    <button type="submit" name="btnEditRequest" class="btn btn-default btn-primary">Save</button>
		    <button type="reset" class="btn btn-default">Reset</button>
		    <a href="<?php echo BASE_URL; ?>request" class="btn btn-default">Back</a>	    	
	    </div>
	</div>

	<?php 
	
		}
		
	}
		
	?>
</form>