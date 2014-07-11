<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
             	<?php 
             		echo ucfirst($_SESSION['roleTitle']);
             	?>
            </h2>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12">
            <!-- his own take leave -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-table"></i> <span> OWN TAKE LEAVE</span>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>                                    
                                <th>Requester</th>
                                <th>Subject</th>
                                <th>Leave date</th>
                                <th>Back date</th>
                                <th>Reason</th>
                                <th>Date</th>
                                <th>Permit date</th>
                                <th>Permit by</th>
                                <th>Action</th>
                            </tr>
                        </thead>                    
                        <tbody>
                    <?php 
                        if(isset($OwnLeave)){
                            foreach($OwnLeave as $ol){
                    ?>
                            <tr>
                                <td><?php echo $ol->user_fname.' '.$ol->user_lname; ?></td>
                                <td><?php echo $ol->request_subject; ?></td>
                                <td><?php echo $ol->calendar_fromdate; ?></td>
                                <td><?php echo $ol->calendar_todate; ?></td>
                                <td><?php echo $ol->request_message; ?></td>
                                <td><?php echo $ol->request_date; ?></td>
                                <td><?php echo $ol->request_approvedate; ?></td>
                                <td><?php echo $ol->user_fname.' '.$ol->user_lname; ?></td>
                                <td></td>
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
        	<!-- new request -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-table"></i> <span> STARE TAKE LEAVE </span>                          
                </div>
                <div class="panel-body">
                    <div class="table-responsive">

                    </div>
                </div>
            </div>  
            <!-- old request  -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-table"></i> <span> APPROVED TAKE LEAVE </span>                          
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
	                    <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-request">
	                        <thead>
	                            <tr>                                    
                                    <th>Requester</th>
                                    <th>Subject</th>
                                    <th>Leave date</th>
                                    <th>Back date</th>
                                    <th>Reason</th>
                                    <th>Date</th>
                                    <th>Permit date</th>
                                    <th>Permit by</th>
	                                <th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <tr>
	                                <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
	                            </tr>
	                        </tbody>
	                    </table> -->
                    </div>
                </div>
            </div>  
        </div>

    </div>
</div>