<form action="<?php echo BASE_URL; ?>employee/modify" method="post" role="form" enctype="multipart/form-data">    
	
	<?php 

		if(isset($error)){

			foreach($error as $err){

				if($err != "")		

				$this->display_alert_message('alert-warning', $err);

			}
		}

		if(isset($successModifyEmployee)){

			$this->display_alert_message('alert-success', $successModifyEmployee);

		}

		if(isset($nochangeModifyEmployee)){

			$this->display_alert_message('alert-info', $nochangeModifyEmployee);

		}

	if(isset($em_modiryem)){

		foreach($em_modiryem as $em){
		
	?>
	<input type="hidden" name="em_id" value="<?php echo $em->user_id; ?>"/>
	<div class="col-lg-6">
		<div class="form-group">
	        <label>First Name <span class="require"> *</span></label>
	        <input class="form-control" name="txtfname" value="<?php echo $em->user_fname; ?>" placeholder="first name..">
	    </div>
	    <div class="form-group">
	        <label>Last Name <span class="require"> *</span></label>
	        <input class="form-control" name="txtlname" value="<?php echo $em->user_lname; ?>" placeholder="last name..">
	    </div>
	    <div class="form-group">
	        <label>Email <span class="require"> *</span></label>
	        <input class="form-control" name="txtemail" value="<?php echo $em->user_email; ?>" placeholder="email..">
	    </div>
	    <div class="form-group">
	        <label>Date of Birth <span class="require"> *</span></label>
	        <input class="form-control dob" name="txtdob" value="<?php echo $em->user_dob; ?>" data-date-format="yyyy-mm-dd" placeholder="date..">
	    </div>
	    <div class="form-group">
	        <label>Country <span class="require"> *</span></label>
	        <input class="form-control" name="txtcountry" value="<?php echo $em->user_country; ?>" placeholder="country..">
	    </div>
	    <div class="form-group">
	        <label>City <span class="require"> *</span></label>
	        <input class="form-control" name="txtcity" value="<?php echo $em->user_city; ?>" placeholder="city..">
	    </div>
	    <div class="form-group">
	        <label>Phone <span class="require"> *</span></label>
	        <input class="form-control" name="txtphone" value="<?php echo $em->user_phone; ?>" placeholder="phone number..">
	    </div>
	    <div class="form-group">
	        <label>Picture Profile</label>
	        <input type="file" name="picProfile" class="picProfile">
	        <input type="hidden" name="oldpic" value="<?php echo $em->user_photo; ?>" /><br/>
	        <p><b>current picture: </b><?php echo $em->user_photo; ?></p>
	    </div>
	</div>

	<div class="col-lg-6">
	    <div class="form-group">
	        <label>Role: <span class="require"> *</span></label>
	        <select class="form-control emRole" name="emRole">
	        	<option value="">--- select ---</option>
	        	<?php 
	        		if(isset($em_role)){
	        			foreach($em_role as $emRole){
	        				if($em->tbl_role_role_id == $emRole->role_id){
	        					echo '<option value="'.$emRole->role_id.'" selected>'.$emRole->role_name.'</option>';
	        				}else{
	        					echo '<option value="'.$emRole->role_id.'">'.$emRole->role_name.'</option>';
	        				}
	        			}
	        		}
	        	?>
	        </select>
	    </div>
	    <div class="form-group">
	        <label>Ordinator: </label>
	        <select class="form-control emOrdinator" name="emOrdinator">
	        	<option value="">--- select ---</option>
	        	<?php 
	        		if(isset($em_ordinator)){
	        			foreach($em_ordinator as $usreach){
	        				if($em->subordinateofuser == $usreach->user_id){
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
	        <label>Department:  <span class="require"> *</span></label>
	        <select class="form-control emDepartment" name="emDepartment">
	        	<option value="">--- select ---</option>
	        	<?php 
	        		if(isset($em_department)){
	        			foreach($em_department as $emdept){
	        				if($em->tbl_department_dept_id == $emdept->dept_id){
	        					echo '<option value="'.$emdept->dept_id.'" selected>'.$emdept->dept_title.'</option>';
	        				}else{
								echo '<option value="'.$emdept->dept_id.'">'.$emdept->dept_title.'</option>';
	        				}	        				
	        			}
	        		}
	        	?>
	        </select>
	    </div>
	    <div class="form-group">
	        <label>Address <span class="require"> *</span></label>
	        <textarea class="form-control" name="txtaddress" rows="3" placeholder="your address.."><?php echo $em->user_address; ?></textarea>
	    </div>
	    <div class="form-group">
	        <label>Experiences </label>
	        <textarea class="form-control" name="txtexperience" rows="3" placeholder="your experience.."><?php echo $em->user_experience; ?></textarea>
	    </div>
	    <div class="form-group">
	        <label>Interesting</label>
	        <textarea class="form-control" name="txtinterest" rows="3" placeholder="your interesting.."><?php echo $em->user_interest; ?></textarea>
	    </div>

	</div> 
	<div class="col-lg-12 pull-right">
		<span class="pull-right"> 
		    <button type="submit" name="btnModifyEmployee" class="btn btn-default btn-primary btn-sm">Save Change</button> 
		    <a href="<?php echo BASE_URL; ?>employee" class="btn btn-default btn-sm">Back</a>	
	   	<span>
	</div>	
	<?php 
	}	
}
	?>
</form>