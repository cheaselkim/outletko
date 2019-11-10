$(document).ready(function(){

	company();
	outlet();
	query_data();

	$("#save").click(function(){
        $("#save").prop("disabled", true);
		check_bank_maintenance();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "", "_self");
	});

});

function company(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "bank_maintenance/company",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_color_comp").val(data.data);
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function outlet(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "bank_maintenance/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#bank_maintenance_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = "3";
	var prod_color_outlet = "";
	var prod_color_desc = "";
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_color_outlet, color_desc : prod_color_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "bank_maintenance/entry_query",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-table").html(result.output);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function check_bank_maintenance(){
	var outlet = $("#bank_maintenance_outlet").val();
	var bank_code = $("#bank_maintenance_code").val().toUpperCase();
	var bank_name = $("#bank_maintenance_name").val();
	var account_no = $("#bank_maintenance_account").val();

	if (bank_code == "" || bank_name == "" || account_no == ""){
        $("#save").prop("disabled", false);

		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (bank_code == ""){
			$("#bank_maintenance_code").addClass("error");
		}

		if (bank_name == ""){
			$("#bank_maintenance_name").addClass("error");
		}

		if (account_no == ""){
			$("#bank_maintenance_account").addClass("error");
		}

	}else{
		var	csrf_name = $("input[name=csrf_name]").val();
		$.ajax({
			data : {bank_code : bank_code, account_no : account_no, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "bank_maintenance/bank_maintenance_wo_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
		        $("#save").prop("disabled", false);
					swal({
						title : "Bank Code or Account No already exists",
						type : "warning"
					})
				}else{
					save();
				}
			}, error : function(err){
				console.log(err.responseText);
			}
		})
	}		
}

function save(){

	var	csrf_name = $("input[name=csrf_name]").val();
	var outlet = $("#bank_maintenance_outlet").val();
	var bank_code = $("#bank_maintenance_code").val().toUpperCase();
	var bank_name = $("#bank_maintenance_name").val();
	var account_no = $("#bank_maintenance_account").val();

	if (bank_code == "" || bank_name == ""){
        $("#save").prop("disabled", false);
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, bank_code : bank_code, bank_name : bank_name, account_no : account_no, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "bank_maintenance/insert_bank_maintenance",
			crossOrigin: false,
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result == true){
					swal({
						title : "Successfully Saved",
						type : "success",
						timer: 2000
					}, function(){
						location.reload();
					})
				}else{
					console.log(result);
				}
			}, error : function(err){
				console.log(err.responseText);
			}
		});
	}

}