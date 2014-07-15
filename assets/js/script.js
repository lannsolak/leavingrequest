jQuery(function(){

	// my general script

	// $("#search-form").attr("action", "/search/" + action); 

    jQuery('.rq-view, .rq-edit').bind('click', function(){
        var action = jQuery(this).attr('data-action');
        var formact = jQuery('.frm-action').attr('action');
        var appendactoin = jQuery('.frm-action').attr('action', formact+action);
        var checkboxlength = jQuery('.tdcheckbox:checked').length;
        if(checkboxlength > 0){            
          jQuery('.frm-action').submit();
        }else{
            alert("Please choose any checkbox in the list record before continue action...");
            return false;
        }
    });

    jQuery('.rq-deleted').bind('click', function(){
        var action = jQuery(this).attr('data-action');
        var formact = jQuery('.frm-action').attr('action');
        var appendactoin = jQuery('.frm-action').attr('action', formact+action);
        var checkboxlength = jQuery('.tdcheckbox:checked').length;
        if(checkboxlength > 0){
          if(confirm("Are you sure to delete the records?")){
                jQuery('.frm-action').submit();
            }
        }else{
            alert("Please choose any checkbox in the list record before continue action...");
            return false;
        }
    });

    // request status update

	jQuery('.rq-approve, .rq-decline, .rq-pending, .rq-cancel').bind('click', function(){
		var action = jQuery(this).attr('data-value');
		var formact = jQuery('.frm-action').attr('action');
		var appendactoin = jQuery('.frm-action').attr('action', formact+"status/"+action);
        var checkboxlength = jQuery('.tdcheckbox:checked').length;
        if(checkboxlength > 0){
          if(confirm("Will you change the status of the records?")){
                jQuery('.frm-action').submit();
            }
        }else{
            alert("Please choose any checkbox in the list record before continue action...");
            return false;
        }
	});

    // check all checkbox
    jQuery(".hcheckbox").bind("click", function(){
        if(jQuery(this).is( ":checked" )){
            jQuery(".tdcheckbox").prop('checked', true);
        }else{
            jQuery(".tdcheckbox").prop('checked', false);           
        }
    });

	// Bootstrap datepicker 

	var dob = new Date();
	dob.setDate(dob.getDate()-1);
	jQuery('.dob').datepicker({
				weekStart: 1,
			    startDate: dob,
			    autoclose: true
	});

	var nwdate = new Date();
	nwdate.setDate(nwdate.getDate()-1);
	jQuery('.date-rq').datepicker({
				weekStart: 1,
			    startDate: nwdate,
			    autoclose: true,
			    onRender: function(date) {
					return date.valueOf() < nwdate.valueOf() ? 'disabled' : '';
				}
	});

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
     
    var checkin = $('.datefrom-rq').datepicker({
    onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
    }).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate());
    checkout.setValue(newDate);
    }else if(ev.date.valueOf() == checkout.date.valueOf()){
    	var newDate = new Date(ev.date)
	    newDate.setDate(newDate.getDate());
	    checkout.setValue(newDate);
    }
    checkin.hide();
    $('.dateto-rq')[0].focus();
    }).data('datepicker');
    var checkout = $('.dateto-rq').datepicker({
    onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    }
    }).on('changeDate', function(ev) {
    checkout.hide();
    }).data('datepicker');

    
     
    var checkine = $('.datefrome-rq').datepicker().on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkoute.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate());
    checkoute.setValue(newDate);
    }else if(ev.date.valueOf() == checkoute.date.valueOf()){
    	var newDate = new Date(ev.date)
	    newDate.setDate(newDate.getDate());
	    checkoute.setValue(newDate);
    }
    checkine.hide();
    $('.datetoe-rq')[0].focus();
    }).data('datepicker');
    var checkoute = $('.datetoe-rq').datepicker().on('changeDate', function(ev) {
    checkoute.hide();
    }).data('datepicker');

    //  Datatable start

	jQuery('#dataTables-request').dataTable({
	    "bInfo": false,
	    "bLengthChange": false,
	    "bSort": false
	});
 //    "bFilter": false, // Disable searching
 //    "bPaginate": false, // Disable pagination
 //    "bInfo": false    // Disable info texts
// 	   "aoColumnDefs": [
//   		 { "bSortable": true, "aTargets": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ] }
// 		],
	
});