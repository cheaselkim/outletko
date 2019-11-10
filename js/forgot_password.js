$(document).ready(function(){
	$("#alert-danger").hide();
	$("#alert-success").hide();

	$("#reset_pass").click(function(){
		var email = $("#email").val();
		$("#reset_pass").prop("disabled", true);

		if (!isEmail(email)){
			$("#reset_pass").prop("disabled", false);
			$("#alert-danger").show();
			$("#alert-danger label").text("Invalid Email");
		}else{
			forgot_password();
		}
	});

	$("#new_pass_eye").click(function(){
		if ($("#new_pass").attr("type") == "text"){
			$("#new_pass_icon").removeClass("fa-eye");
			$("#new_pass_icon").addClass("fa-eye-slash");
			$("#new_pass").attr("type","password");
		}else{
			$("#new_pass_icon").removeClass("fa-eye-slash");
			$("#new_pass_icon").addClass("fa-eye");
			$("#new_pass").attr("type","text");
		}
	});


	$("#conf_pass_eye").click(function(){
		if ($("#conf_pass").attr("type") == "text"){
			$("#conf_pass_icon").removeClass("fa-eye");
			$("#conf_pass_icon").addClass("fa-eye-slash");
			$("#conf_pass").attr("type","password");
		}else{
			$("#conf_pass_icon").removeClass("fa-eye-slash");
			$("#conf_pass_icon").addClass("fa-eye");
			$("#conf_pass").attr("type","text");
		}
	});


	$("#save").click(function(){
		var new_pass = $("#new_pass").val();
		var conf_pass = $("#conf_pass").val();

		if (new_pass.length < 6){
			$("#alert-danger").show();
			$("#alert-success").hide();			
			$("#alert-danger span").text("Password Length should be greater than 6");
		}else if (new_pass != conf_pass){
			$("#alert-danger").show();
			$("#alert-success").hide();
			$("#alert-danger span").text("Password does not match");
		}else{
			change_password();
		}

	});
})

function isEmail(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

function forgot_password(){
	var email = $("#email").val();
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {"email" : email, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "/Password/send_email",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#reset_pass").prop("disabled", false);
			if (result.result == "1"){
				$("#alert-danger").show();
				$("#alert-success").hide();
			}else{
				$("#alert-danger").show();
				$("#alert-danger label").text("Email not found");
			}
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function change_password(){
	var password = $("#new_pass").val();
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {"password" : password, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "/Password/change_password",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#reset_pass").prop("disabled", false);
			if (result.result >= "1"){
				$("#alert-danger").hide();
				$("#alert-success").show();
			}else{
				$("#alert-danger").show();
			}
	
			startTimer(4, "");
			setTimeout(function(){ window.open(base_url + "/logout", "_self"); }, 4000);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        seconds = parseInt(timer % 60, 10);

        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);

}

window.onload = function () {
    var fiveMinutes = 4,
    display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};