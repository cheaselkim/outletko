
$(document).ready(function(){

	company();
	outlet();
	get_transaction($("#trans_id").val());

	$("#update").click(function(){
        $("#update").prop("disabled", true);
		check_product_color();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "app/4/24/2", "_self");
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
			$("#bank_mainntenance_comp").val(data.data);
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
			get_transaction($("#trans_id").val());
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function get_transaction(id){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		type : "POST",
		data : {"id" : id, csrf_name : csrf_name},
		dataType : "JSON",
		url : base_url + "bank_maintenance/get_transaction",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#bank_maintenance_outlet").val(data.outlet);
			$("#bank_maintenance_code").val(data.bank_code);
			$("#bank_maintenance_name").val(data.bank_name);
			$("#bank_maintenance_account").val(data.account_no);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function check_product_color(){
	var outlet = $("#bank_maintenance_outlet").val();
	var bank_code = $("#bank_maintenance_code").val().toUpperCase();
	var bank_name = $("#bank_maintenance_name").val();
	var account_no = $("#bank_maintenance_account").val();
	var id = $("#trans_id").val();

	if (bank_code == "" || bank_name == "" || account_no == ""){
        $("#update").prop("disabled", false);

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
			data : {bank_code : bank_code, account_no : account_no, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "bank_maintenance/bank_maintenance_w_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
		        $("#update").prop("disabled", false);
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

	var outlet = $("#bank_maintenance_outlet").val();
	var bank_code = $("#bank_maintenance_code").val().toUpperCase();
	var bank_name = $("#bank_maintenance_name").val();
	var account_no = $("#bank_maintenance_account").val();
	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (bank_code == "" || bank_name == ""){
        $("#update").prop("disabled", false);
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, bank_code : bank_code, bank_name : bank_name, account_no : account_no, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "bank_maintenance/update_bank_maintenance",
			crossOrigin: false,
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				swal({
					title : "Successfully Saved",
					type : "success",
					timer: 2000
				}, function(){
					location.reload();
				})
			}, error : function(err){
				console.log(err.responseText);
			}
		});
	}

}