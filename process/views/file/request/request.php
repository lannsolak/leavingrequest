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

        <div class="col-lg-9">
            <?php      
                
                if(isset($deleted)){

                    if($deleted == 'success'){
                        
                        $this->display_alert_message('alert-success', "The records have been deleted successfully...");
                    
                    }else{

                        $this->display_alert_message('alert-warning', "The processing failed to deleted the record...");

                    }

                }

                if(isset($status)){

                    if($status == 'success'){
                        
                        $this->display_alert_message('alert-success', "The status have been changed successfully...");
                    
                    }else{

                        $this->display_alert_message('alert-warning', "The processing failed to change status the record...");

                    }

                }

                if(segment(1)){
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-table"></i> <span> <?php echo ucfirst(segment(1)); ?> </span> 
                    <a href="<?php echo BASE_URL; ?>request" class="btn btn-xs btn-default pull-right">Back</a>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                <?php
                    include_once(segment(1).".php");
                ?>
                </div>
            </div>
            <?php
                }else{                                      
                    include_once("listrequest.php"); 
                }
            ?>
        </div>
        <!-- Department -->
        <div class="col-lg-3">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-table"></i> <span> Department </span> 
                    <a href="" class="btn btn-xs btn-default addrequest pull-right"><i class="fa fa-plus-square"></i> Department</a>
                    <div class="clearfix"></div>                         
                    <!-- <i class="fa fa-table"></i> <span> CHECKED TAKE LEAVE </span>                           -->
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <span class="list-group-item">
                            <a href="#" class="">Department A</a> 
                            <span class="pull-right"><i class="fa fa-edit"></i> | <i class="fa fa-trash-o"></i></span>                       
                        </span>
                        <span class="list-group-item">
                            <a href="#" class="">Department B</a> 
                            <span class="pull-right"><i class="fa fa-edit"></i> | <i class="fa fa-trash-o"></i></span>                       
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>