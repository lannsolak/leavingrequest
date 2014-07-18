<form action="<?php echo BASE_URL; ?>employee/add" method="post" role="form" enctype="multipart/form-data">    
	
	<?php 

		if(isset($error)){

			foreach($error as $err){

				if($err != "")		

				$this->display_alert_message('alert-warning', $err);

			}
		}

		}else if(isset($successAddEmployee)){

			$this->display_alert_message('alert-success', $successAddEmployee);

		}
		
	?>
	<div class="col-lg-6">
		<div class="form-group">
	        <label>First Name <span class="require"> *</span></label>
	        <input class="form-control" name="txtfname" value="" placeholder="first name..">
	    </div>
	    <div class="form-group">
	        <label>Last Name <span class="require"> *</span></label>
	        <input class="form-control" name="txtlname" value="" placeholder="last name..">
	    </div>
	    <div class="form-group">
	        <label>Email <span class="require"> *</span></label>
	        <input class="form-control" name="txtemail" value="" placeholder="last name..">
	    </div>
	    <div class="form-group">
	        <label>Date of Birth <span class="require"> *</span></label>
	        <input class="form-control dob" name="txtdob" value="" data-date-format="yyyy-mm-dd" placeholder="date..">
	    </div>
	    <div class="form-group">
	        <label>Country <span class="require"> *</span></label>
	        <input class="form-control" name="txtcountry" value="" placeholder="country..">
	    </div>
	    <div class="form-group">
	        <label>City <span class="require"> *</span></label>
	        <input class="form-control" name="txtcity" value="" placeholder="city..">
	    </div>
	    <div class="form-group">
	        <label>Phone <span class="require"> *</span></label>
	        <input class="form-control" name="txtphone" value="" placeholder="phone number..">
	    </div>
	    <div class="form-group">
	        <label>Picture Profile</label>
	        <input type="file" name="picProfile" class="picProfile">
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
	        				echo '<option value="'.$emRole->role_id.'">'.$emRole->role_name.'</option>';
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
	        				echo '<option value="'.$usreach->user_id.'">'.$usreach->user_fname.' '.$usreach->user_lname.'</option>';
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
	        				echo '<option value="'.$emdept->dept_id.'">'.$emdept->dept_title.'</option>';
	        			}
	        		}
	        	?>
	        </select>
	    </div>
	    <div class="form-group">
	        <label>Address <span class="require"> *</span></label>
	        <textarea class="form-control" name="txtaddress" rows="3" placeholder="your address.."></textarea>
	    </div>
	    <div class="form-group">
	        <label>Experiences </label>
	        <textarea class="form-control" name="txtexperience" rows="3" placeholder="your experience.."></textarea>
	    </div>
	    <div class="form-group">
	        <label>Interesting</label>
	        <textarea class="form-control" name="txtinterest" rows="3" placeholder="your interesting.."></textarea>
	    </div>

	</div> 
	<div class="col-lg-12 pull-right">
		<span class="pull-right"> 
		    <button type="submit" name="btnCreateEmployee" class="btn btn-default btn-primary btn-sm">Create</button>
		    <button type="reset" class="btn btn-default btn-sm">Reset</button>    
		    <a href="<?php echo BASE_URL; ?>employee" class="btn btn-default btn-sm">Back</a>	
	   	<span>
	</div>	
</form>