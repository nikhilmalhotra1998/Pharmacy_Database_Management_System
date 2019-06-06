<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

//For Registration Processsing
if (isset($_POST["username"]) AND isset($_POST["email"])) {
	$user = new User();
	$result = $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
	echo $result;
	exit();
}

//For Login Processing
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
	$user = new User();
	$result = $user->userLogin($_POST["log_email"],$_POST["log_password"]);
	echo $result;
	exit();
}

//To get doctor
if (isset($_POST["getdoctor"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("doctor");
	foreach ($rows as $row) {
		echo "<option value='".$row["did"]."'>".$row["Doctor_name"]."</option>";
	}
	exit();
}

//Fetch patient
if (isset($_POST["getpatient"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("patients");
	foreach ($rows as $row) {
		echo "<option value='".$row["Did"]."'>".$row["doctor_name"]."</option>";
	}
	exit();
}

//Add doctor
if (isset($_POST["doctor_name"]) AND isset($_POST["doctor_add"])) {
	$obj = new DBOperation();
	$result = $obj->adddoctor($_POST["doctor_name"],$_POST["doctor_add"]);
	echo $result;
	exit();
}

//Add patient
if (isset($_POST["patient_name"]) && isset($_POST["sex"]) && isset($_POST["patient_add"]) && isset($_POST["contact"]) && isset($_POST["parent_cat"])) {
	$obj = new DBOperation();
	$result = $obj->addpatient($_POST["patient_name"],$_POST["sex"],$_POST["patient_add"],$_POST["contact"],$_POST["parent_cat"]);
	echo $result;
	exit();
}

//Add medicine
if (isset($_POST["medicine_name"])) {
	$obj = new DBOperation();
	$result = $obj->addmedicine(
							$_POST["medicine_name"],
							$_POST["medicine_price"],
							$_POST["medicine_qty"],
							$_POST["added_date"]);
	echo $result;
	exit();
}

//Manage doctor
if (isset($_POST["managedoctor"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("doctor",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["doctor"]; ?></td>
			        <td><?php echo $row["Address"]; ?></td>
			        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
			        <td>
			        	<a href="#" did="<?php echo $row['did']; ?>" class="btn btn-danger btn-sm del_cat">Delete</a>
			        	
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}


//Delete doctor
if (isset($_POST["deletedoctor"])) {
	$m = new Manage();
	$result = $m->deleteRecord("doctor","did",$_POST["id"]);
	echo $result;
}



//------------------patient---------------------


//Manage patient
if (isset($_POST["managepatient"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("patient",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["patient_name"]; ?></td>
                    <td><?php echo $row["sex"]; ?></td>
                    <td><?php echo $row["problem"]; ?></td>
                    <td><?php echo $row["contact"]; ?></td>
                    <td><?php echo $row["did"]; ?></td>
			        
			        <td>
			        	<a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_patient">Delete</a>
			        	
			      </tr>
			<?php
			$n++;
		}
		?>
			
		<?php
		exit();
	}
}

//Delete 
if (isset($_POST["deletepatient"])) {
	$m = new Manage();
	$result = $m->deleteRecord("patient","pid",$_POST["id"]);
	echo $result;
}


//----------------medicine---------------------

if (isset($_POST["managemedicine"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("medicine",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["medicine_name"]; ?></td>
			        <td><?php echo $row["medicine_price"]; ?></td>
			        <td><?php echo $row["product_stock"]; ?></td>
			        <td><?php echo $row["date"]; ?></td>
			        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
			        <td>
			        	<a href="#" did="<?php echo $row['mid']; ?>" class="btn btn-danger btn-sm del_medicine">Delete</a>
			        	<a href="#" eid="<?php echo $row['mid']; ?>" data-toggle="modal" data-target="#form_medicine" class="btn btn-info btn-sm edit_medicine">Edit</a>
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

//Delete 
if (isset($_POST["deletemedicine"])) {
	$m = new Manage();
	$result = $m->deleteRecord("medicine","mid",$_POST["id"]);
	echo $result;
}

//Update medicine
if (isset($_POST["updatemedicine"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("medicine","mid",$_POST["id"]);
	echo json_encode($result);
	exit();
}

//Update Record after getting data
if (isset($_POST["update_medicine"])) {
	$m = new Manage();
	$id = $_POST["mid"];
	$name = $_POST["update_medicine"];
	$price = $_POST["medicine_price"];
	$qty = $_POST["medicine_qty"];
	$date = $_POST["added_date"];
	$result = $m->update_record("medicine",["mid"=>$id],["medicine_name"=>$name,"medicine_price"=>$price,"product_stock"=>$qty,"date"=>$date]);
	echo $result;
}

//-------------------------Order Processing--------------

if (isset($_POST["getNewOrderItem"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("medicine");
	?>
	<tr>
		    <td><b class="number">1</b></td>
		    <td>
		        <select name="mid[]" class="form-control form-control-sm mid" required>
		            <option value="">Choose medicine</option>
		            <?php 
		            	foreach ($rows as $row) {
		            		?><option value="<?php echo $row['mid']; ?>"><?php echo $row["medicine_name"]; ?></option><?php
		            	}
		            ?>
		        </select>
		    </td>
		    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>   
		    <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
		    <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></td>
        <td><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
		    <td>Rs.<span class="amt">0</span></td>
	</tr>
	<?php
	exit();
}


//Get price and qty of one item
if (isset($_POST["getPriceAndQty"])) {
	$m = new Manage();
    
	$result = $m->getSingleRecord("medicine","mid",$_POST["id"]);
	echo json_encode($result);
	
    exit();
}


if (isset($_POST["order_date"]) AND isset($_POST["cust_name"])) {
	
	$orderdate = $_POST["order_date"];
	$cust_name = $_POST["cust_name"];
    

	//Now getting array from order_form
	$ar_tqty = $_POST["tqty"];
	$ar_qty = $_POST["qty"];
	$ar_price = $_POST["price"];
	$ar_pro_name=$_POST["pro_name"];


	$sub_total = $_POST["sub_total"];
	$gst = $_POST["gst"];
	$discount = $_POST["discount"];
	$net_total = $_POST["net_total"];
	$paid = $_POST["paid"];
	$due = $_POST["due"];
	$payment_type = $_POST["payment_type"];


	$m = new Manage();
	echo $result = $m->storeCustomerOrderInvoice($orderdate,$cust_name,$ar_tqty,$ar_qty,$ar_price,$ar_pro_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_type);




}

?>