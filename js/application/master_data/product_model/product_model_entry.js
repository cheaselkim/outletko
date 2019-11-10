$(document).ready(function(){

	company();
	outlet();
	query_data();

	$("#save").click(function(){
		$("#save").prop("disabled", true);
		check_product_model();
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
		url : base_url + "product_model/company",
		success: function(data){
			$("#prod_model_comp").val(data);
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
		url : base_url + "product_model/outlet",
		success: function(data){
			for (var i = 0; i < data.length; i++) {
				$("#prod_model_outlet").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = "3";
	var prod_model_outlet = "";
	var prod_model_desc = "";
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_model_outlet, model_desc : prod_model_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "product_model/entry_query",
		success: function(result){
			$("#div-table").html(result.output);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function check_product_model(){
	var outlet = $("#prod_model_outlet").val();
	var model_code = $("#prod_model_code").val().toUpperCase();
	var model_name = capitalize($("#prod_model_name").val());
	var	csrf_name = $("input[name=csrf_name]").val();

	if (model_code == "" || model_name == ""){
		$("#save").prop("disabled", false);
		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (model_code == ""){
			$("#prod_model_code").addClass("error");
		}

		if (model_name == ""){
			$("#prod_model_name").addClass("error");
		}

	}else{
		$.ajax({
			data : {model_code : model_code, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_model/product_model_wo_id",
			success : function(result){
				if (result > 0){
					$("#save").prop("disabled", false);
					swal({
						text : "Product Model Code is already exists",
						type : "warning"
					})
				}else{
					save();
				}
			}, error : function(err){
				console.log(err.responseTexts);
			}
		})
	}	
}

function save(){

	var outlet = $("#prod_model_outlet").val();
	var model_code = $("#prod_model_code").val().toUpperCase();
	var model_name = capitalize($("#prod_model_name").val());
	var	csrf_name = $("input[name=csrf_name]").val();

	if (model_code == "" || model_name == ""){
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, model_desc : model_desc, model_name : model_name, model_code : model_code, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_model/insert_product_model",
			crossOrigin: false,
			success : function(result){
				if (result == true){
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