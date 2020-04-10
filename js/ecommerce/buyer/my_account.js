$(document).ready(function(){

	get_account();

	$("#show_pass").click(function(){
		if ($("#user_pass").attr("type") == "text"){
			$("#pass_icon").removeClass("fa-eye");
			$("#pass_icon").addClass("fa-eye-slash");
			$("#user_pass").attr("type","password");
		}else{
			$("#pass_icon").removeClass("fa-eye-slash");
			$("#pass_icon").addClass("fa-eye");
			$("#user_pass").attr("type","text");
		}
	});

	$("#show_new_pass").click(function(){
		if ($("#user_new_pass").attr("type") == "text"){
			$("#new_pass_icon").removeClass("fa-eye");
			$("#new_pass_icon").addClass("fa-eye-slash");
			$("#user_new_pass").attr("type","password");
		}else{
			$("#new_pass_icon").removeClass("fa-eye-slash");
			$("#new_pass_icon").addClass("fa-eye");
			$("#user_new_pass").attr("type","text");
		}
	});

	$("#show_conf_pass").click(function(){
		if ($("#user_conf_pass").attr("type") == "text"){
			$("#pass_conf_icon").removeClass("fa-eye");
			$("#pass_conf_icon").addClass("fa-eye-slash");
			$("#user_conf_pass").attr("type","password");
		}else{
			$("#pass_conf_icon").removeClass("fa-eye-slash");
			$("#pass_conf_icon").addClass("fa-eye");
			$("#user_conf_pass").attr("type","text");
		}
	});

	$("#user_city").autocomplete({
		focus: function(event, ui){
			$("#user_province").val(ui.item.outlet_province);
		},
		select: function(event, ui){
			$("#user_province").val(ui.item.outlet_province);
			$("#user_city").attr("data-id", ui.item.city_id);
			$("#user_province").attr("data-id", ui.item.prov_id);
		},
		source: function(req, add){
			var outlet_city = $("#user_city").val();
			var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "Outlet/search_outlet_city/", 
                dataType: "json",
                type: "POST",
                data: {'outlet_city' : outlet_city, csrf_name : csrf_name},
                success: function(data){
					$("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                    	$("#user_city").val("");
                    	$("#user_province").val("");
                        add('');
                    }
                }, error: function(err){
                	console.log("Error: " + err.responseText);
                }
            });
		}
	});

	$("#save").click(function(){
		check_required_fields();
	});

})

function get_account(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Buyer/get_account",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.data;

			$("#user_fname").val(data[0].first_name);
			$("#user_mname").val(data[0].middle_name);
			$("#user_lname").val(data[0].last_name);

			$("#user_address").val(data[0].address);
			$("#user_barangay").val(data[0].barangay);
			$("#user_city").val((data[0].city_desc + ", " + data[0].province_desc));
			$("#user_province").val(data[0].province_desc);
			$("#user_city").attr("data-id", data[0].city);
			$("#user_province").attr("data-id", data[0].province);

			$("#user_mobile").val(data[0].mobile_no);
			$("#user_email").val(data[0].email);


		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function check_required_fields(){

	var csrf_name = $("input[name=csrf_name]").val();

	var username = jQuery.trim($("#user_uname").val()).length;
	var user_pass = jQuery.trim($("#user_pass").val()).length;
	var user_new_pass = jQuery.trim($("#user_new_pass").val()).length;
	var user_conf_pass = jQuery.trim($("#user_conf_pass").val()).length;

	var user_fname = jQuery.trim($("#user_fname").val()).length;
	var user_mname = jQuery.trim($("#user_mname").val()).length;
	var user_lname = jQuery.trim($("#user_lname").val()).length;
	var user_address = jQuery.trim($("#user_address").val()).length;
	var user_barangay = jQuery.trim($("#user_barangay").val()).length;
	var user_city = jQuery.trim($("#user_city").attr("data-id")).length;
	var user_province = jQuery.trim($("#user_province").attr("data-id")).length;
	var user_mobile = jQuery.trim($("#user_mobile").val()).length;
	var user_email = jQuery.trim($("#user_email").val()).length;

	var error = 0;

	var user_pass_val = $("#user_pass").val();
	var user_new_pass_val = $("#user_new_pass").val();
	var user_conf_pass_val = $("#user_conf_pass").val();

	if (user_pass != 0 || user_new_pass != 0 || user_conf_pass != 0){
		if (user_pass == 0 || user_new_pass == 0 || user_conf_pass == 0){
			error++;
		}
	}

	if (user_new_pass != 0 && user_conf_pass != 0 && user_pass == 0){
		error++;
	}

	if (user_new_pass != 0 && user_conf_pass == 0 && user_pass != 0){
		error++;
	}

	if (user_new_pass == 0 && user_conf_pass != 0 && user_pass != 0){
		error++;
	}

	if (user_new_pass == 0 && user_conf_pass == 0 && user_pass != 0){
		error++;
	}

	if (user_fname == 0 || user_lname == 0  || user_address == 0 || user_barangay == 0 
		|| user_city == 0 || user_province == 0 || user_province == 0 || user_email == 0){
		error++;
	}

	if (error != 0){
		swal({
			type : "warning",
			title : "Please input all required fields"
		})
	}else if (user_new_pass_val != user_conf_pass_val){
		swal({
			type : "warning",
			title : "Password does not match"
		})
	}else{
		if (user_pass != 0 && user_new_pass != 0 && user_conf_pass != 0){
			$.ajax({
				data : {user_pass : user_pass_val, csrf_name : csrf_name},
				type : "POST",
				dataType : "JSON",
				url : base_url + "Buyer/check_pass",
				success : function(result){
					$("input[name=csrf_name]").val(result.token);
					if (result.result == 0){
						swal({
							type : "warning",
							title : "Invalid Password"
						})
					}else{
						swal({
							type : "warning",
							title : "Update Account? ",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							confirmButtonText: "Yes",
							cancelButtonText: "No",
						}, function(isConfirm){
							if (isConfirm){
								save_data();			
							}
						});

					}
				}, error : function(err){
					console.log(err.responseText);
				}
			})

		}else{
			swal({
				type : "warning",
				title : "Update Account? ",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes",
				cancelButtonText: "No",
			}, function(isConfirm){
				if (isConfirm){
					save_data();			
				}
			});
		}
	}


}

function save_data(){

	var username = $("#user_uname").val();
	var user_pass = $("#user_pass").val();
	var user_new_pass = $("#user_new_pass").val();
	var user_conf_pass = $("#user_conf_pass").val();

	var user_fname = $("#user_fname").val();
	var user_mname = $("#user_mname").val();
	var user_lname = $("#user_lname").val();
	var user_address = $("#user_address").val();
	var user_barangay = $("#user_barangay").val();
	var user_city = $("#user_city").attr("data-id");
	var user_province = $("#user_province").attr("data-id");
	var user_mobile = $("#user_mobile").val();
	var user_email = $("#user_email").val();

	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {
				csrf_name : csrf_name,
				username : username,
				user_pass : user_pass,
				user_new_pass : user_new_pass,
				user_conf_pass : user_conf_pass,
				user_fname : user_fname,
				user_mname : user_mname,
				user_lname : user_lname,
				user_address : user_address,
				user_barangay : user_barangay,
				user_city : user_city,
				user_province : user_province,
				user_mobile : user_mobile,
				user_email : user_email
				},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/update_account",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			swal({
				type : "success",
				title : "Successfully Updated",
			}, function(){
				location.reload();
			})
		}, error : function(err){
			console.log(err.responseText);
		}
	})


}