<div class="panel-group" id="accordion">

<?php 
	if(isset($selectrequestdetail)){
		$r = 0;
		foreach($selectrequestdetail as $slrqdetail){
			if($r == 0) { $cl = "in"; $r = 1; }else{ $cl = ""; }
?>
	<div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $slrqdetail->request_id; ?>">
	          <?php echo $slrqdetail->request_subject; ?>
	        </a>
	      </h4>
	    </div>
	    <div id="collapse<?php echo $slrqdetail->request_id; ?>" class="panel-collapse collapse <?php echo $cl; ?>">
	      <div class="panel-body">
	      <!-- <div class="table-responsive"> -->
	       	<table class="table table-hover">
		    	<tbody>
					<tr>
	        			<td width="200"><b>Request Date : </b></td><td><?php echo $slrqdetail->request_date; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Requester : </b></td><td><?php echo $slrqdetail->username; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Subject : </b></td><td><?php echo $slrqdetail->request_subject; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Take leave from : </b></td><td><?php echo $slrqdetail->calendar_fromdate; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Return Date : </b></td><td><?php echo $slrqdetail->calendar_todate; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Object / Reason : </b></td><td><?php echo $slrqdetail->request_message; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Permit date: </b></td><td><?php echo $slrqdetail->request_approvedate; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Permit-by : </b></td><td><?php echo $slrqdetail->approvebyname; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Status : </b></td>
	        			<td>
	        				<?php 
                                if($slrqdetail->request_status == 0){
                                    echo "Pending";
                                }elseif($slrqdetail->request_status == 1){
                                    echo "Approved";
                                }elseif($slrqdetail->request_status == 2){
                                    echo "Decline";
                                }elseif($slrqdetail->request_status == 3){
                                    echo "Cancel";
                                }else{
                                    echo "";
                                }
                            ?>
                        </td>
	        		</tr>
				 </tbody>
				</table>
			</div>
		  <!-- </div> -->
	    </div>
	</div>
<?php 
		}
	}
?>

</div>