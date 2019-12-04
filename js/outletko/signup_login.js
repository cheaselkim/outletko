$(document).ready(function(){

	// $("#div-signup-form").hide();
	$("#signup_next").hide();
	$("#signup_back").hide();
	$("#btn_signup").hide();
	$("#div-confirm-email2").hide();
	$("#div-confirm-email").hide();
	$("#btn_confirm").hide();
	$("#btn_confirm2").hide();
	$("#div-form").hide();

	$("#a_login").click(function(){
		$("#div-signup-form").hide();
		$("#btn_signup").hide();

		$("#div-login-form").show();
		$("#btn_login").show();
	})

	$("#a_register").click(function(){
		$("#div-login-form").hide();
		$("#btn_login").hide();

		$("#div-signup-form").show();
		$("#btn_signup").show();
	})

	$("#a_register_store").click(function(){
		$("#div-signup-form").hide();
		$("#btn_signup2").hide();
		
		$("#div-business").hide();
		$("#div-address ").hide();

		$("#next-1").addClass("fas fa-circle");
		$("#next-2").addClass("fas fa-circle");
		$("#next-1").removeClass("fas fa-check-circle");
		$("#next-2").removeClass("fas fa-check-circle");
		$("#next-2").removeClass("text-black");
		$("#next-3").removeClass("text-black");
		$("#div-form").find(":input").val("");

		$("#div-name").show();
		$("#div-form").show();
		$("#signup_next").show();
		// $("#signup_back").show();
		// $("#signup_save").show();
	});

	$("#a_signup").click(function(){
		$("#div-form").hide();
		$("#signup_next").hide();
		$("#signup_back").hide();
		$("#signup_save").hide();

		$("#div-signup-form").find(":input").val("");
		$("#div-signup-form").show();
		$("#btn_signup2").show();		
	});

	$("#btn_signup").click(function(){
		check_signup_field();
	});

	$("#btn_signup2").click(function(){
		check_signup_field();
	});


	$("#btn_confirm").click(function(){
		confirm_account();
	});

	$("#btn_confirm2").click(function(){
		confirm_account();
	});


	$("#btn_login").click(function(){
		check_login_field();
	});

	$('#verify_code').bind("cut copy paste",function(e) {
		e.preventDefault();
    });

})

/* LOGIN */

function check_login_field(){
	var username = jQuery.trim($("#login_email").val()).length;
	var password = jQuery.trim($("#login_password").val()).length;

	if (username <= 0 || password <= 0){
		swal({
			type : "warning",
			title : "Please input all required fields"
		})
	}else{
		check_login();
	}
}

function check_login(){

	var csrf_name = $("input[name=csrf_name]").val();
	var username = $("#login_email").val();
	var password = $("#login_password").val();

	$.ajax({
		data : { csrf_name : csrf_name, username : username, password : password },
		type : "POST",
		dataType : "JSON",
		url : base_url + "Signup/check_login",
		success : function(result){	
			$("input[name=csrf_name]").val(result.token);
			console.log(result);

			if (result.user_type == "5"){
				location.reload();
			}else{
				window.open(base_url, "_self");
			}

			// window.open(base_url + "my-order", "_self");
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

/* LOGIN */

/* SIGNUP */

function check_signup_field(){

	var fname = jQuery.trim($("#signup_user_fname").val()).length;
	var lname = jQuery.trim($("#signup_user_lname").val()).length;
	var email = jQuery.trim($("#signup_user_email").val()).length;
	var password = jQuery.trim($("#signup_user_password").val()).length;
	var conf_pass = jQuery.trim($("#signup_user_conf_password").val()).length;

	if (fname <= 0 || lname <= 0 || email <= 0 || password <= 0 || conf_pass <= 0){

		swal({
			type : "warning",
			title : "Please input all required fields."
		});

	}else if ($("#password").val() != $("#conf_pass").val() ){

		swal({
			type : "warning",
			title : "Password does not match"
		})

	}else{

		insert_user();
	}

}

function insert_user(){

	console.log("insert_user");
	
	var csrf_name = $("input[name=csrf_name]").val();

	var fname = $("#signup_user_fname").val();
	var lname = $("#signup_user_lname").val();
	var email = $("#signup_user_email").val();
	var password = $("#signup_user_password").val();
	var conf_pass = $("#signup_user_conf_password").val();

	$.ajax({
		data : {csrf_name : csrf_name, fname : fname, lname : lname, email : email, password : password, conf_pass : conf_pass},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Signup/insert_user",
		beforeSend : function(){

			swal({
				title : "Saving....",
                  showCancelButton: false, 
                  showConfirmButton: false  
			})

		},success : function(result){
			swal.close();
			$("#acc_id").val(result.comp_id);
			$("input[name=csrf_name]").val(result.token);
			$("#div-signup-form").hide();
			$("#btn_signup").hide();
			$("#div-confirm-email2").show();
			$("#btn_confirm2").show();
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function confirm_account(){

	var code = $("#verify_code").val();
	var acc_id = $("#acc_id").val();
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {verify_code : code, csrf_name : csrf_name, id : acc_id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Signup/confirm_account",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);

			if (result.result == 1){
				$("#div-signup-form").hide();
				$("#btn_signup").hide();
				$("#div-confirm-email").hide();
				$("#btn_confirm2").hide();
				$("#div-login-form").show();
				$("#btn_login").show();

				$("#modal_signup_user").modal("hide");

				swal({
					type : "success",
					title : "Congratulations!",
					text : "You can start buying products"
				})
			}else{

				swal({
					type : "warning",
					title : "Invalid Verification Code",
					text : "Please try again"
				})

			}


		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

/* SIGNUP */