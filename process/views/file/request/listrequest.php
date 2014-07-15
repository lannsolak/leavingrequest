<form action="<?php echo BASE_URL; ?>request/" method="post" class="frm-action" role="form">
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-table"></i> <span> All Leaving Request </span> 
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="<?php echo BASE_URL; ?>request/add"><i class="fa fa-plus-square"></i> add</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="rq-edit" data-action="modify"><i class="fa fa-edit"></i> modify</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="rq-view" data-action="detail"><i class="fa fa-eye"></i> view details</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="rq-deleted" data-action="delete"><i class="fa fa-trash-o"></i> delete</span></a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                   Approve options
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#"><span class="rq-approve" data-value="1"> Approve</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="rq-decline" data-value="2"> Decline</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="rq-pending" data-value="0"> Pending</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="rq-cancel" data-value="3"> Cancel</span></a></li>
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
                        <th>Date</th>                                  
                        <th>Requester</th>
                        <th>Subject</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Reason</th>
                        <th>Permit</th>
                        <th>Permit-by</th>
                        <th>Status</th>
                    </tr>
                </thead>
                
                <tbody>

                    <?php 
                        if(isset($OwnLeave)){
                            foreach($OwnLeave as $ol){
                    ?>
                            <tr>
                                <td><input type="checkbox" name="tdcheckbox[]" class="tdcheckbox" value="<?php echo $ol->request_id; ?>" /></td>
                                <td><?php echo $ol->request_date; ?></td>
                                <td><?php echo $ol->username; ?></td>
                                <td><?php echo $ol->request_subject; ?></td>
                                <td><?php echo $ol->calendar_fromdate; ?></td>
                                <td><?php echo $ol->calendar_todate; ?></td>
                                <td><?php echo $ol->request_message; ?></td>
                                <td><?php echo $ol->request_approvedate; ?></td>
                                <td><?php echo $ol->approvebyname; ?></td>
                                <td>
                                    <?php 
                                        if($ol->request_status == 0){
                                            echo "Pending";
                                        }elseif($ol->request_status == 1){
                                            echo "Approved";
                                        }elseif($ol->request_status == 2){
                                            echo "Decline";
                                        }elseif($ol->request_status == 3){
                                            echo "Cancel";
                                        }else{
                                            echo "";
                                        }
                                    ?>
                                </td>
                                 <!-- <i class="fa fa-times"> | -->
                            </tr> 
                    <?php
                            }
                        }                   
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</form>  