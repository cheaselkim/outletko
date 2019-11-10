$(document).ready(function(){

	company();
	outlet();
	query_data();

	$("#save").click(function(){
        $("#save").prop("disabled", true);
		check_product_brand();
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
		url : base_url + "product_brand/company",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_brand_comp").val(data.data);
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
		url : base_url + "product_brand/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#prod_brand_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = "3";
	var prod_brand_outlet = "";
	var prod_brand_desc = "";
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_brand_outlet, brand_desc : prod_brand_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "product_brand/entry_query",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-table").html(result.output);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function check_product_brand(){

	var outlet = $("#prod_brand_outlet").val();
	var brand_code = $("#prod_brand_code").val().toUpperCase();
	var brand_name = $("#prod_brand_name").val();
	var brand_desc = $("#prod_brand_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (brand_name == "" || brand_code == ""){

        $("#save").prop("disabled", false);
		if (brand_name == ""){
			$("#prod_brand_name").addClass("error");
		}

		if (brand_code == ""){
			$("#prod_brand_code").addClass("error");
		}

		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {brand_code : brand_code, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_brand/product_brand_wo_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
			        $("#save").prop("disabled", false);
					swal({
						title : "Product Brand Code is already exists",
						type : "warning",
						timer : 2000
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

	var outlet = $("#prod_brand_outlet").val();
	var brand_code = $("#prod_brand_code").val().toUpperCase();
	var brand_name = $("#prod_brand_name").val();
	var brand_desc = $("#prod_brand_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {outlet : outlet, brand_desc : brand_desc, brand_code : brand_code, brand_name : brand_name, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "product_brand/insert_product_brand",
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