$(document).ready(function(){

	get_transaction($("#trans_id").val());
	company();
	outlet();

	$("#update").click(function(){
		$(this).prop("disabled", true);
		check_product_model();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "app/4/13/2", "_self");
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

function get_transaction(id){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		type : "POST",
		data : {"id" : id, csrf_name : csrf_name},
		dataType : "JSON",
		url : base_url + "product_model/get_transaction",
		success : function(data){
			console.log(data);
			$("#prod_model_outlet").val(data.outlet);
			$("#prod_model_desc").val(data.model_desc);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function check_product_model(){
	var id = $("#trans_id").val();
	var outlet = $("#prod_model_outlet").val();
	var model_code = $("#prod_model_code").val().toUpperCase();
	var model_name = capitalize($("#prod_model_name").val());
	var	csrf_name = $("input[name=csrf_name]").val();

	if (model_code == "" || model_name == ""){
			
		$("#update").prop("disabled", false);

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
			data : {model_code : model_code, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_model/product_model_wo_id",
			success : function(result){
				if (result > 0){
					$("#update").prop("disabled", false);
					swal({
						title : "Product Model Code is already exists",
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

	var id = $("#trans_id").val();
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
			data : {outlet : outlet, model_desc : model_desc, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_model/update_product_model",
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