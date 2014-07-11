<?php
	if(isset($updateProfile)){
		$update = json_decode(json_encode($updateProfile[0]), true);
	}else{
		$update['user_fname'] = "";
		$update['user_lname'] = "";
		$update['user_email'] = "";
		$update['user_dob'] = "";
		$update['user_country'] = "";
		$update['user_city'] = "";
		$update['user_phone'] = "";
		$update['user_address'] = "";
		$update['user_experience'] = "";
		$update['user_interest'] = "";
	}

	if(isset($nothingupdate)){

		$this->display_alert_message('alert-warning', $nothingupdate);

	}
	
	if(isset($updatefail)){

		$this->display_alert_message('alert-danger', $updatefail);

	}
?>


<form action="<?php echo BASE_URL; ?>profile/updateinfo" method="post" role="form">
    <div class="form-group">
        <label>First Name</label>
        <input class="form-control" name="txtfname" value="<?php echo $update['user_fname']; ?>" placeholder="first name..">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input class="form-control" name="txtlname" value="<?php echo $update['user_lname']; ?>" placeholder="last name..">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input class="form-control" name="txtemail" value="<?php echo $update['user_email']; ?>" placeholder="last name.." disabled>
    </div>
    <div class="form-group">
        <label>Date of Birth</label>
        <input class="form-control dob" name="txtdob" value="<?php echo $update['user_dob']; ?>" data-date-format="yyyy-mm-dd" placeholder="date..">
    </div>
    <div class="form-group">
        <label>Country</label>
        <input class="form-control" name="txtcountry" value="<?php echo $update['user_country']; ?>" placeholder="country..">
    </div>
    <div class="form-group">
        <label>City</label>
        <input class="form-control" name="txtcity" value="<?php echo $update['user_city']; ?>" placeholder="city..">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input class="form-control" name="txtphone" value="<?php echo $update['user_phone']; ?>" placeholder="phone number..">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" name="txtaddress" rows="3" placeholder="your address.."><?php echo $update['user_address']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Experiences</label>
        <textarea class="form-control" name="txtexperience" rows="3" placeholder="your experience.."><?php echo $update['user_experience']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Interesting</label>
        <textarea class="form-control" name="txtinterest" rows="3" placeholder="your interesting.."><?php echo $update['user_interest']; ?></textarea>
    </div>
    <button type="submit" name="btnUpdateInfo" class="btn btn-default btn-primary">Save Change</button>
    <button type="reset" class="btn btn-default">Reset</button>
</form>