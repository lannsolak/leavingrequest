<?php 
	
	class Employeemod extends Models{

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


	}

			// SELECT state,
			//       ,COUNT(*) as cnt
			//       ,SUM(sale_amount)          as sumSales
			//       ,ROUND(AVG(sale_amount),0) as avgSales
			//   FROM orders
			//  GROUP BY state
?>