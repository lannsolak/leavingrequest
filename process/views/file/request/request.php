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
                    <a href="" class="btn btn-xs btn-default addrequest pull-right" data-toggle="modal" data-target=".addDept"><i class="fa fa-plus-square"></i> Department</a>
                    <div class="clearfix"></div>                         
                    <!-- <i class="fa fa-table"></i> <span> CHECKED TAKE LEAVE </span>                           -->
                </div>
                <div class="panel-body">

                    <?php 

                        if(isset($add_department)){

                            if($add_department == 'success'){
                                
                                $this->display_alert_message('alert-success', "The department was created successfully...");
                            
                            }else{

                                $this->display_alert_message('alert-warning', "The processing failed to create department the record...");

                            }

                        }

                        if(isset($delete_department)){

                            if($delete_department == 'success'){
                                
                                $this->display_alert_message('alert-success', "The department was deleted successfully...");
                            
                            }else{

                                $this->display_alert_message('alert-warning', "The processing failed to delete department the record...");

                            }

                        }

                        if(isset($edit_department)){

                            if($edit_department == 'success'){
                                
                                $this->display_alert_message('alert-success', "The department was updated successfully...");
                            
                            }elseif($edit_department == 'nochange'){

                                $this->display_alert_message('alert-info', "There is nothing to update...");

                            }else{

                                $this->display_alert_message('alert-warning', "The processing failed to update department the record...");

                            }

                        }
                        
                    ?>

                    <div class="list-group">
                        <?php 
                            if(isset($Department)){

                                foreach($Department as $dept){

                        ?>
                                    <span class="list-group-item">
                                        <!-- <a href="#" class="">Department A</a>  -->
                                        <span class="dept-view dept-view cursor" data-title="<?php echo $dept->dept_title; ?>"><?php echo $dept->dept_title; ?></span> &nbsp; &nbsp;
                                        <span class="pull-right">
                                            <i class="fa fa-edit cursor dept-edit" data-toggle="modal" data-target=".editDept" data-id="<?php echo $dept->dept_id; ?>" data-title="<?php echo $dept->dept_title; ?>"></i>
                                         |  <a href="<?php echo BASE_URL; ?>request/deleteDept/<?php echo $dept->dept_id; ?>" class="deptdelete"><i class="fa fa-trash-o cursor dept-trash"></i></a>
                                        </span>                       
                                    </span>  
                        <?php

                                }

                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>