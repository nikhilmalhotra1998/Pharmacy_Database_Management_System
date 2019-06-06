$(document).ready(function(){
	var DOMAIN = "http://localhost/new";

	//Mange doctor
	managedoctor(1);
	function managedoctor(pn){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {managedoctor:1,pageno:pn},
			success : function(data){
				$("#get_doctor").html(data);		
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		managedoctor(pn);
	})

	$("body").delegate(".del_cat","click",function(){
		var did = $(this).attr("did");
		if (confirm("Are you sure ? You want to delete..!")) {
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : {deletedoctor:1,id:did},
				success : function(data){
					if (data == "DEPENDENT_doctor") {
						alert("Sorry ! this doctor is dependent on other sub categories");
					}else if(data == "doctor_DELETED"){
						alert("doctor Deleted Successfully..! happy");
						managedoctor(1);
					}else if(data == "DELETED"){
						alert("Deleted Successfully");
					}else{
						alert(data);
					}
						
				}
			})
		}else{

		}
	})

	//Fetch doctor
	fetch_doctor();
	function fetch_doctor(){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {getdoctor:1},
			success : function(data){
				var root = "<option value='0'>Root</option>";
				var choose = "<option value=''>Choose doctor</option>";
				$("#parent_cat").html(root+data);
				$("#select_cat").html(choose+data);
			}
		})
	}

	//Fetch patient
	fetch_patient();
	function fetch_patient(){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {getpatient:1},
			success : function(data){
				var choose = "<option value=''>Choose patient</option>";
				$("#select_patient").html(choose+data);
			}
		})
	}


	//Update doctor
	$("body").delegate(".edit_cat","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updatedoctor:1,id:eid},
			success : function(data){
				console.log(data);
				$("#did").val(data["did"]);
				$("#update_doctor").val(data["Doctor_name"]);
				$("#doctor_add").val(data["address"]);
			}
		})
	})

	$("#update_doctor_form").on("submit",function(){
		if ($("#update_doctor").val() == "") {
			$("#update_doctor").addClass("border-danger");
			$("#cat_error").html("<span class='text-danger'>Please Enter doctor Name</span>");
		}else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data  : $("#update_doctor_form").serialize(),
				success : function(data){
					window.location.href = "";
				}
			})
		}
	})


	//----------patient-------------
	managepatient(1);
	function managepatient(pn){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {managepatient:1,pageno:pn},
			success : function(data){
				$("#get_patient").html(data);		
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		managepatient(pn);
	})

	$("body").delegate(".del_patient","click",function(){
		var did = $(this).attr("did");
		if (confirm("Are you sure ? You want to delete..!")) {
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : {deletepatient:1,id:did},
				success : function(data){
					if (data == "DELETED") {
						alert("patient is deleted");
						managepatient(1);
					}else{
						alert(data);
					}
						
				}
			})
		}
	})

	//Update patient
	$("body").delegate(".edit_patient","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updatepatient:1,id:eid},
			success : function(data){
				console.log(data);
				$("#bid").val(data["bid"]);
				$("#update_patient").val(data["patient_name"]);
			}
		})
	})

	$("#update_patient_form").on("submit",function(){
		if ($("#update_patient").val() == "") {
			$("#update_patient").addClass("border-danger");
			$("#patient_error").html("<span class='text-danger'>Please Enter patient Name</span>");
		}else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data  : $("#update_patient_form").serialize(),
				success : function(data){
					alert(data);
					window.location.href = "";
				}
			})
		}
	})


	//---------------------medicines-----------------
	managemedicine(1);
	function managemedicine(pn){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {managemedicine:1,pageno:pn},
			success : function(data){
				$("#get_medicine").html(data);		
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		managemedicine(pn);
	})

	$("body").delegate(".del_medicine","click",function(){
		var did = $(this).attr("did");
		if (confirm("Are you sure ? You want to delete..!")) {
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : {deletemedicine:1,id:did},
				success : function(data){
					if (data == "DELETED") {
						alert("medicine is deleted");
						managemedicine(1);
					}else{
						alert(data);
					}
						
				}
			})
		}
	})

	//Update medicine
	$("body").delegate(".edit_medicine","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updatemedicine:1,id:eid},
			success : function(data){
				console.log(data);
				$("#mid").val(data["mid"]);
				$("#update_medicine").val(data["update_name"]);
				
				
				$("#medicine_price").val(data["medicine_price"]);
				$("#medicine_qty").val(data["medicine_qty"]);

			}
		})
	})

	//Update medicine
	$("#update_medicine_form").on("submit",function(){
		$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#update_medicine_form").serialize(),
				success : function(data){
					if (data == "UPDATED") {
						alert("medicine Updated Successfully..!");
						window.location.href = "";
					}else{
						alert(data);
					}
				}
			})
	})


	
})