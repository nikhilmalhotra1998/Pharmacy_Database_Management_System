$(document).ready(function(){
	var DOMAIN = "http://localhost/new";
	$("#register_form").on("submit",function(){
		var status = false;
		var name = $("#username");
		var email = $("#email");
		var pass1 = $("#password1");
		var pass2 = $("#password2");
		var type = $("#usertype");
		
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
		if(name.val() == "" || name.val().length < 6){
			name.addClass("border-danger");
			$("#u_error").html("<span class='text-danger'>Please Enter Name and Name should be more than 6 char</span>");
			status = false;
		}else{
			name.removeClass("border-danger");
			$("#u_error").html("");
			status = true;
		}
		if(!e_patt.test(email.val())){
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if(pass1.val() == "" || pass1.val().length < 9){
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Please Enter more than 9 digit password</span>");
			status = false;
		}else{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status = true;
		}
		if(pass2.val() == "" || pass2.val().length < 9){
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Please Enter more than 9 digit password</span>");
			status = false;
		}else{
			pass2.removeClass("border-danger");
			$("#p2_error").html("");
			status = true;
		}
		if(type.val() == ""){
			type.addClass("border-danger");
			$("#t_error").html("<span class='text-danger'>Please Enter more than 9 digit password</span>");
			status = false;
		}else{
			type.removeClass("border-danger");
			$("#t_error").html("");
			status = true;
		}
		if ((pass1.val() == pass2.val()) && status == true) {
			$(".overlay").show();
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#register_form").serialize(),
				success : function(data){
					if (data == "EMAIL_ALREADY_EXISTS") {
						$(".overlay").hide();
						alert("It seems like you email is already used");
					}else if(data == "SOME_ERROR"){
						$(".overlay").hide();
						alert("Something Wrong");
					}else{
						$(".overlay").hide();
						window.location.href = encodeURI(DOMAIN+"/index.php?msg=You are registered Now you can login");
					}
				}
			})
		}else{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password is not matched</span>");
			status = true;
		}
	})

	//For Login Part
	$("#form_login").on("submit",function(){
		var email = $("#log_email");
		var pass = $("#log_password");
		var status = false;
		if (email.val() == "") {
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if (pass.val() == "") {
			pass.addClass("border-danger");
			$("#p_error").html("<span class='text-danger'>Please Enter Password</span>");
			status = false;
		}else{
			pass.removeClass("border-danger");
			$("#p_error").html("");
			status = true;
		}
		if (status) {
			$(".overlay").show();
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#form_login").serialize(),
				success : function(data){
					if (data == "NOT_REGISTERD") {
						$(".overlay").hide();
						email.addClass("border-danger");
						$("#e_error").html("<span class='text-danger'>It seems like you are not registered</span>");
					}else if(data == "PASSWORD_NOT_MATCHED"){
						$(".overlay").hide();
						pass.addClass("border-danger");
						$("#p_error").html("<span class='text-danger'>Please Enter Correct Password</span>");
						status = false;
					}else{
						$(".overlay").hide();
						console.log(data);
						window.location.href = DOMAIN+"/dashboard.php";
					}
				}
			})
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

	//Add doctor
	$("#doctor_form").on("submit",function(){
		if ($("#doctor_name").val() == "" && $("#doctor_name").val() == "") {
			$("#doctor_name").addClass("border-danger");
			$("#cat_error").html("<span class='text-danger'>Please Enter doctor Name</span>");$("#doctor_add").addClass("border-danger");
			$("#cat1_error").html("<span class='text-danger'>Please Enter doctor address</span>");
		}
        else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data  : $("#doctor_form").serialize(),
				success : function(data){
					if (data == "doctor_ADDED") {
							$("#doctor_name").removeClass("border-danger");$("#doctor_Add").removeClass("border-danger");
							$("#cat1_error").html("<span class='text-success'>New doctor Added Successfully..!</span>");
							$("#doctor_name").val("");
							fetch_doctor();
					}else{
						alert(data);
					}
				}
			})
		}
	})


	//Add patient
	$("#patient_form").on("submit",function(){
		if ($("#patient_name").val() == "") {
			$("#patient_name").addClass("border-danger");
			$("#patient_error").html("<span class='text-danger'>Please Enter patient Name</span>");
		}else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#patient_form").serialize(),
				success : function(data){
					if (data == "patient_ADDED") {
						$("#patient_name").removeClass("border-danger");
						$("#patient_error").html("<span class='text-success'>New patient Added Successfully..!</span>");
						$("#patient_name").val("");
						fetch_patient();
					}else{
						alert(data);
					}
						
				}
			})
		}
	})

	//add medicine
	$("#medicine_form").on("submit",function(){
		$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#medicine_form").serialize(),
				success : function(data){
					if (data == "NEW_medicine_ADDED") {
						alert("New medicine Added Successfully..!");
						$("#medicine_name").val("");
						$("#medicine_price").val("");
						$("#medicine_qty").val("");

					}else{
						console.log(data);
						alert(data);
					}
						
				}
			})
	})



})
