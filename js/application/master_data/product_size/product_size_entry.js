$(document).ready(function(){

	company();
	outlet();
	query_data();

	$("#save").click(function(){
		$("#save").prop("disabled", true);
		check_product_size();
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
		url : base_url + "product_size/company",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_size_comp").val(data.data);
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
		url : base_url + "product_size/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#prod_size_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = "3";
	var prod_size_outlet = "";
	var prod_size_desc = "";
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_size_outlet, size_desc : prod_size_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "product_size/entry_query",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-table").html(result.output);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}


function check_product_size(){
	var outlet = $("#prod_size_outlet").val();
	var size_code = $("#prod_size_code").val().toUpperCase();
	var size_name = capitalize($("#prod_size_name").val());
	var size_desc = $("#prod_size_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (size_code == "" || size_name == ""){
		$("#save").prop("disabled", false);

		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (size_code == ""){
			$("#prod_size_code").addClass("error");
		}

		if (size_name == ""){
			$("#prod_size_name").addClass("error");
		}

	}else{
		$.ajax({
			data : {size_code : size_code, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_size/product_size_w_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
					$("#save").prop("disabled", false);
					swal({
						title : "Product Size Code is already exists",
						type : "error"
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

	var outlet = $("#prod_size_outlet").val();
	var size_code = $("#prod_size_code").val().toUpperCase();
	var size_name = capitalize($("#prod_size_name").val());
	var size_desc = $("#prod_size_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (size_code == "" || size_name == ""){
		$("#save").prop("disabled", false);
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, size_desc : size_desc, size_code : size_code, size_name : size_name, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_size/insert_product_size",
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