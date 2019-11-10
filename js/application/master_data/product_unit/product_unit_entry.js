$(document).ready(function(){

	company();
	outlet();
	query_data();

	$("#save").click(function(){
		$("#save").prop("disabled", true);
		check_product_unit();
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
		url : base_url + "product_unit/company",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_unit_comp").val(data.data);
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
		url : base_url + "product_unit/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#prod_unit_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = "3";
	var prod_unit_outlet = "";
	var prod_unit_desc = "";
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_unit_outlet, unit_desc : prod_unit_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "product_unit/entry_query",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-table").html(result.output);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}


function check_product_unit(){
	var outlet = $("#prod_unit_outlet").val();
	var unit_code = $("#prod_unit_code").val().toUpperCase();
	var unit_name = capitalize($("#prod_unit_name").val());
	var unit_desc = $("#prod_unit_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (unit_code == "" || unit_name == ""){
		$("#save").prop("disabled", false);

		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (unit_code == ""){
			$("#prod_unit_code").addClass("error");
		}

		if (unit_name == ""){
			$("#prod_unit_name").addClass("error");
		}

	}else{
		$.ajax({
			data : {unit_code : unit_code, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_unit/product_unit_wo_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
					$("#save").prop("disabled", false);
					swal({
						title : "Product Unit Code is already exists",
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

	var outlet = $("#prod_unit_outlet").val();
	var unit_code = $("#prod_unit_code").val().toUpperCase();
	var unit_name = capitalize($("#prod_unit_name").val());
	var unit_desc = $("#prod_unit_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (unit_code == "" || unit_name == ""){
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, unit_code : unit_code, unit_desc : unit_desc, unit_name : unit_name, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_unit/insert_product_unit",
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