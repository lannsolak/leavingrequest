<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>               
            <th>Date</th>   
            <th>Subject</th>
            <th>From</th>
            <th>To</th>
            <th>Reason</th>
            <th>Permit</th>
            <th>Action</th>
        </tr>
    </thead>                    
    <tbody>
<?php 
    if(isset($OwnLeave)){
        foreach($OwnLeave as $ol){
?>
        <tr>            
            <td><?php echo $ol->request_date; ?></td>
            <td><?php echo $ol->request_subject; ?></td>
            <td><?php echo $ol->calendar_fromdate; ?></td>
            <td><?php echo $ol->calendar_todate; ?></td>
            <td><?php echo $ol->request_message; ?></td>
            <td><?php echo $ol->request_approvedate; ?></td>
            <!-- <td><?php echo $ol->user_fname.' '.$ol->user_lname; ?></td> -->
            <td> <i class="fa fa-edit"></i> | <i class="fa fa-eye"></i> | <i class="fa fa-trash-o"></i></td>
             <!-- <i class="fa fa-times"> | -->
        </tr> 
<?php
        }
    }                   
?>

    </tbody>  
</table>