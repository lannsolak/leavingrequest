<form action="<?php echo BASE_URL; ?>employee/" method="post" class="em-frm-action" role="form">
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-table"></i> <span> All Employees </span> 
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="<?php echo BASE_URL; ?>employee/add"><i class="fa fa-plus-square"></i> add</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="em-edit" data-action="modify"><i class="fa fa-edit"></i> modify</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="em-view" data-action="detail"><i class="fa fa-eye"></i> view details</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="em-deleted" data-action="delete"><i class="fa fa-trash-o"></i> delete</span></a></li>
                </ul>
            </div>            
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-request">
                <thead>
                    <tr>   
                        <th><input type="checkbox" name="hcheckbox" class="hcheckbox" value="" /></th>                         
                        <th>Photo</th>                                   
                        <th>Name</th>                                  
                        <th>Email</th>
                        <th>Phone</th>
                        <th>role</th>
                        <th>Ordiate by</th>
                        <th>Department</th>
                    </tr>
                </thead>
                
                <tbody>

                    <?php 
                        if(isset($listEmployee)){
                            foreach($listEmployee as $le){
                    ?>
                            <tr>
                                <td><input type="checkbox" name="tdcheckbox[]" class="tdcheckbox" value="<?php echo $le->user_id; ?>" /></td>
                                <td><img src="<?php echo BASE_URL; ?>picture/profile/<?php echo $le->user_photo; ?>" alt="profile picure" class="img-circle" style="width:50px;"/></td>
                                <td><?php echo $le->user_fname." ".$le->user_lname; ?></td>
                                <td><?php echo $le->user_email; ?></td>
                                <td><?php echo $le->user_phone; ?></td>
                                <td><?php echo $le->role_name; ?></td>
                                <td><?php echo $le->ordinator; ?></td>
                                <td><?php echo $le->dept_title; ?></td>
                            </tr>
                    <?php
                            }
                        }                   
                    ?>

                                 <!-- <i class="fa fa-times"> | -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</form>