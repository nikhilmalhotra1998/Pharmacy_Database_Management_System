<?php

/**
* 
*/
class DBOperation
{
	
	private $con;

	function __construct()
	{
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function adddoctor($cat,$add){
		$pre_stmt = $this->con->prepare("INSERT INTO `doctor`( `Doctor_name`, `Address`,`status`)
		 VALUES (?,?,?)");
        $status = 1;
		$pre_stmt->bind_param("ssi",$cat,$add,$status);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "doctor_ADDED";
		}else{
			return 0;
		}

	}

	public function addpatient($patient_name,$sex,$problem,$contact,$did){
		$pre_stmt = $this->con->prepare("INSERT INTO `patient`(`patient_name`,`sex`,`problem`,`contact`,`did`)
		 VALUES (?,?,?,?,?)");
		$status = 1;
		$pre_stmt->bind_param("sssss",$patient_name,$sex,$problem,$contact,$did);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "patient_ADDED";
		}else{
			return 0;
		}

	}

	public function addmedicine($pro_name,$price,$stock,$date){
		$pre_stmt = $this->con->prepare("INSERT INTO `medicine`(`medicine_name`, `medicine_price`,`product_stock`, `date`, `p_status`)
			 VALUES (?,?,?,?,?)");
		$status = 1;
		$pre_stmt->bind_param("siisi",$pro_name,$price,$stock,$date,$status);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "NEW_medicine_ADDED";
		}else{
			return 0;
		}

	}

	public function getAllRecord($table){
		$pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$rows = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		return "NO_DATA";
	}
}

//$opr = new DBOperation();
//echo $opr->adddoctor(1,"Mobiles");
//echo "<pre>";
//print_r($opr->getAllRecord("categories"));
?>