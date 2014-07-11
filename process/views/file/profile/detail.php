
<?php

if(isset($profileupdated)){

        $this->display_alert_message('alert-success', $profileupdated);

}

?>

<table class="table table-hover">
    <tbody>
        <?php 

        	if(isset($profile)){

        		foreach($profile as $user){
        ?>
        		<tr>
        			<td width="150">
        				<img src="<?php echo BASE_URL; ?>picture/profile/<?php echo $user->user_photo; ?>" alt="profile picure" class="img-circle" style="width:100px;"/>
        			</td>
        			<td style="vertical-align:bottom !important;">
        				<p><?php echo ucfirst($user->user_fname.' '.$user->user_lname); ?></p>                                        				
        				<!-- <p>
        					<a href="<?php echo BASE_URL; ?>profile/changepicture">Change picture</a></p>
        				<p> -->
        					<a href="<?php echo BASE_URL; ?>profile/updateinfo">Update info</a>
        					<!-- | <a href="<?php echo BASE_URL; ?>profile/changepassword">Change password</a> -->
        				</p>
        			</td>
        		</tr>
        		<tr>
        			<td>Email : </td><td><?php echo $user->user_email; ?></td>
        		</tr>
        		<tr>
        			<td>DOB : </td><td><?php echo $user->user_dob; ?></td>
        		</tr>
        		<tr>
        			<td>Country : </td><td><?php echo $user->user_country; ?></td>
        		</tr>
        		<tr>
        			<td>City : </td><td><?php echo $user->user_city; ?></td>
        		</tr>
        		<tr>
        			<td>Phone : </td><td><?php echo $user->user_phone; ?></td>
        		</tr>
        		<tr>
        			<td>Address : </td><td><?php echo $user->user_address; ?></td>
        		</tr>
        		<tr>
        			<td>Experiences : </td><td><?php echo $user->user_experience; ?></td>
        		</tr>
        		<tr>
                    <td>Interesting : </td><td><?php echo $user->user_interest; ?></td>
                </tr>
                <tr>
        			<td></td><td></td>
        		</tr>
        <?php
        		}

        	} 

        ?>
    </tbody>
</table>