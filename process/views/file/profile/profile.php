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

        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-table fa-fw"></i> <span> Your Take Leave</span>                     
                    <a href="" class="btn btn-sm btn-default addrequest pull-right">Take New Leave</a>
                    <div class="clearfix"></div> 
                </div>

                <div class="panel-body">
                    <div class="table-responsive">                        
                        <?php
                            include("ownleave.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user fa-fw"></i> <span> Profile </span>                          
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <?php 
                            if(segment(1)){
                                include_once(segment(1).".php");
                            }else{                                      
                                include_once("detail.php"); 
                            }
                        ?>
                    </div>
                </div>
            </div>  
        </div>
        
    </div>
</div>