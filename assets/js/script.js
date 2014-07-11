jQuery(function(){

	var dob = new Date();
	dob.setDate(dob.getDate()-1);
	jQuery('.dob').datepicker({
				weekStart: 1,
			    startDate: dob,
			    autoclose: true
	});

	jQuery('#dataTables-request').dataTable({
	    "aoColumnDefs": [
	      { "bSortable": false, "aTargets": [ 4, 8 ] }
	    ] 
	});
 //    "bFilter": false, // Disable searching
 //    "bPaginate": false, // Disable pagination
 //    "bInfo": false    // Disable info texts
	
});