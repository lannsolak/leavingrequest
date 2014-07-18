<div class="panel-group" id="accordion">

<?php 
	if(isset($selectEmployeedetail)){
		$r = 0;
		foreach($selectEmployeedetail as $slemdetail){
			if($r == 0) { $cl = "in"; $r = 1; }else{ $cl = ""; }
?>
	<div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $slemdetail->user_id; ?>">
	          <?php echo $slemdetail->user_fname.' '.$slemdetail->user_lname; ?>
	        </a>
	      </h4>
	    </div>
	    <div id="collapse<?php echo $slemdetail->user_id; ?>" class="panel-collapse collapse <?php echo $cl; ?>">
	      <div class="panel-body">
	      <div class="table-responsive">
	       	<table class="table table-hover">
		    	<tbody>
					<tr>
	        			<td width="200" colspan="2"><img src="<?php echo BASE_URL; ?>picture/profile/<?php echo $slemdetail->user_photo; ?>" alt="profile picure" class="img-circle img-thumbnail img-responsive" style="width:200px;"/></td>
	        		</tr>
	        		<tr>
	        			<td width="200"><b>First Name : </b></td><td><?php echo $slemdetail->user_fname; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Last Name : </b></td><td><?php echo $slemdetail->user_lname; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Email : </b></td><td><?php echo $slemdetail->user_email; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Role : </b></td><td><?php echo $slemdetail->role_name; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Department : </b></td><td><?php echo $slemdetail->dept_title; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Ordinator : </b></td><td><?php echo $slemdetail->ordinator; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Date of Birth : </b></td><td><?php echo $slemdetail->user_dob; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Country : </b></td><td><?php echo $slemdetail->user_country; ?></td>
	        		</tr>
					<tr>
	        			<td><b>City: </b></td><td><?php echo $slemdetail->user_city; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Phone: </b></td><td><?php echo $slemdetail->user_phone; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Address : </b></td><td><?php echo $slemdetail->user_address; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Experiences : </b></td><td><?php echo $slemdetail->user_experience; ?></td>
	        		</tr>
					<tr>
	        			<td><b>Interesting : </b></td><td><?php echo $slemdetail->user_interest; ?></td>
	        		</tr>
				 </tbody>
				</table>
			</div>
		  </div>
	    </div>
	</div>
<?php 
		}
	}
?>

</div>