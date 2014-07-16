<!-- add new department -->
<div class="modal fade addDept" role="dialog" aria-labelledby="departmentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="<?php echo BASE_URL; ?>request/addDept" method="post" class="frm-addDept" role="form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add New Departement</h4>
        </div>
     	<div class="modal-body">
	     	<div class="form-group">
		        <label>Department title: </label>
		        <input class="form-control deptTitle" name="deptTitle" value="" />
	    	</div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary btnSaveDept" value="save" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- add new department -->
<div class="modal fade editDept" role="dialog" aria-labelledby="departmentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="<?php echo BASE_URL; ?>request/editDept" method="post" class="frm-editDept" role="form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Update Departement</h4>
        </div>
     	<div class="modal-body">
	     	<div class="form-group">
		        <label>Department title: </label>
		        <input class="form-control deptEditTitle" name="deptTitle" value="" />
		        <input type="hidden" name="deptID" class="deptIDhidden" value="" />
	    	</div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary btnEditDept" value="save" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
  </div>
</div>