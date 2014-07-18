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
                
                if(segment(1)){
            ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-table"></i> <span> <?php echo ucfirst(segment(1)); ?> </span> 
                        <a href="<?php echo BASE_URL; ?>employee" class="btn btn-xs btn-default pull-right">Back</a>
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
                    include_once("listemployee.php"); 
                }
            ?>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user fa-fw"></i> <span> Employee In Department</span>                          
                </div>
                <div class="panel-body">
                    <?php 
                        if(isset($emInDepartment)){
                            foreach($emInDepartment as $dpin){
                    ?>
                            <div class="list-group">
                            <span class="list-group-item">
                                    <?php echo $dpin->dept_title; ?>
                                    <span class="pull-right text-muted small"><em><?php echo $dpin->emInDept; ?><i class="fa fa-user fa-fw"></i></em>
                                    </span>
                                </span>
                            </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>  
        </div>
        
    </div>
</div>