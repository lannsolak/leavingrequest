<?php 
	
	class Employeemod extends Models{

		public function getDetail($wherein){

			$sql = "SELECT CONCAT(a.user_fname,' ',a.user_lname) AS 'ordinator',
					       e.*, tbl_rud.*, tbl_department.dept_title, tbl_role.role_name  
					FROM tbl_rud
					RIGHT JOIN tbl_user e ON tbl_rud.tbl_user_user_id = e.user_id					
					LEFT JOIN tbl_user a ON e.subordinateofuser = a.user_id
					LEFT JOIN tbl_department ON tbl_rud.tbl_department_dept_id = tbl_department.dept_id
					LEFT JOIN tbl_role ON tbl_rud.tbl_role_role_id = tbl_role.role_id
					WHERE e.user_id IN (".implode(", ",$wherein).")";
	
			$record = $this->query($sql);

			return $record;	

		}

		public function createEmployee($records, $filename){

			if($records['emOrdinator'] == ''){
				$records['emOrdinator'] = NULL;
			}

			$sql = "INSERT INTO tbl_user 
			(user_fname, user_lname, user_email, user_password, user_photo, user_dob, user_country, user_city, user_phone, user_address, user_experience, user_interest, subordinateofuser)
			VALUES ('".$records['txtfname']."','".$records['txtlname']."','".$records['txtemail']."','12345678','".$filename."','".$records['txtdob']."','".$records['txtcountry']."','".$records['txtcity']."','".$records['txtphone']."','".$records['txtaddress']."','".$records['txtexperience']."','".$records['txtinterest']."','".$records['emOrdinator']."')";

			$this->execute($sql);

			return mysql_insert_id();

		}

		public function updateEmployee($records, $filename, $emID){

			if($records['emOrdinator'] == ''){
				$records['emOrdinator'] = NULL;
			}

			$sql = "UPDATE tbl_user SET user_fname='".$records['txtfname']."', user_lname='".$records['txtlname']."', user_email='".$records['txtemail']."', user_photo='".$filename."', user_dob='".$records['txtdob']."', user_country='".$records['txtcountry']."', user_city='".$records['txtcity']."', user_phone='".$records['txtphone']."', user_address='".$records['txtaddress']."', user_experience='".$records['txtexperience']."', user_interest='".$records['txtinterest']."', subordinateofuser=' ".$records['emOrdinator']."' 

			WHERE user_id=$emID";
			
			$this->execute($sql);

			return mysql_affected_rows();

		}

		public function updateRud($emDeptID, $emRoleID, $emId){

			$update = "UPDATE tbl_rud SET tbl_department_dept_id=$emDeptID, tbl_role_role_id=$emRoleID WHERE tbl_user_user_id =$emId";

			$record = $this->execute($update);

			return  mysql_affected_rows();

		}

		public function insertRud($emDeptID, $emRoleID, $emId){

			$sql = "INSERT INTO tbl_rud (tbl_user_user_id, tbl_department_dept_id, tbl_role_role_id) VALUES ('".$emId."','".$emDeptID."','".$emRoleID."')";

			$this->execute($sql);

			return mysql_insert_id();
		}

		public function getAmountOfEmployeeInDept($usrID){

			$sql = "SELECT tbl_department.dept_title, COUNT(*) as emInDept FROM tbl_department			
			LEFT JOIN tbl_rud ON tbl_rud.tbl_department_dept_id = tbl_department.dept_id
			LEFT JOIN tbl_user e ON tbl_rud.tbl_user_user_id = e.user_id
			WHERE e.user_id!=$usrID AND e.user_deleted=0
			GROUP BY tbl_department.dept_id
			";

			$record = $this->query($sql);

			return $record;
		}

		public function getListImployee($usrID){

			$sql = "SELECT CONCAT(a.user_fname,' ',a.user_lname) AS 'ordinator',
					       e.*, tbl_rud.*, tbl_department.dept_title, tbl_role.role_name  
					FROM tbl_rud
					RIGHT JOIN tbl_user e ON tbl_rud.tbl_user_user_id = e.user_id					
					LEFT JOIN tbl_user a ON e.subordinateofuser = a.user_id
					LEFT JOIN tbl_department ON tbl_rud.tbl_department_dept_id = tbl_department.dept_id
					LEFT JOIN tbl_role ON tbl_rud.tbl_role_role_id = tbl_role.role_id
					WHERE e.user_id!=$usrID AND e.user_deleted=0
					ORDER BY e.user_id DESC";
	
			$record = $this->query($sql);

			return $record;		

		}

		public function getEmployeeModify($em_id){

			if($em_id != false){
				foreach($em_id as $em){
					$id = $em;
				}
			}else{
				return null;
			}

			$sql = "SELECT *  
					FROM tbl_rud INNER JOIN tbl_user e ON tbl_rud.tbl_user_user_id = e.user_id
					WHERE e.user_id=$id AND e.user_deleted=0";
	
			$record = $this->query($sql);

			return $record;		

		}

		public function getDepartment(){

			$sql = "SELECT * FROM tbl_department WHERE dept_deleted=0";
	
			$record = $this->query($sql);

			return $record;	
		}

		public function getOrdinator(){

			$sql = "SELECT * FROM tbl_user 

			INNER JOIN tbl_rud ON tbl_rud.tbl_user_user_id=tbl_user.user_id

			INNER JOIN tbl_role ON tbl_rud.tbl_role_role_id=tbl_role.role_id

			WHERE tbl_user.user_deleted=0 AND tbl_role.role_name!='staff'";
	
			$record = $this->query($sql);

			return $record;

		}

		public function getRole(){

			$sql = "SELECT * FROM tbl_role WHERE role_deleted=0 AND role_name!='administrator'";
	
			$record = $this->query($sql);

			return $record;

		}

		public function deleteEmployee($em_id){

			$update = "UPDATE tbl_user SET user_deleted=1 WHERE user_id IN ('%s')";

			$record = $this->execute(sprintf($update, implode(',', $em_id)));

			return  mysql_affected_rows();
		}


	}
?>