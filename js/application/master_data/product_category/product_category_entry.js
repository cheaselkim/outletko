$(document).ready(function(){

	company();
	outlet();
	query_data();

	$("#save").click(function(){
        $("#save").prop("disabled", true);
		check_product_category();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "", "_self");
	});

	$("#prod_cat_code").keyup(function(){
		$(this).removeClass("error");
	});

	$("#prod_cat_name").keyup(function(){
		$(this).removeClass("error");
	});


});

function company(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "product_category/company",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_cat_company").val(data.data);
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
		url : base_url + "product_category/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#prod_cat_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = "3";
	var prod_cat_outlet = "";
	var prod_cat_desc = "";
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_cat_outlet, category_desc : prod_cat_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "product_category/entry_query",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-table").html(result.output);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function check_product_category(){
	var outlet = $("#prod_cat_outlet").val();
	var category_code = $("#prod_cat_code").val().toUpperCase();
	var category_name = capitalize($("#prod_cat_name").val());
	var category_desc = $("#prod_cat_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (category_name == "" || category_code == ""){
        $("#save").prop("disabled", false);

		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (category_name == ""){
			$("#prod_cat_name").addClass("error");
		}

		if (category_code == ""){
			$("#prod_cat_code").addClass("error");
		}


	}else{
		$.ajax({
			data : {category_code : category_code, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_category/product_category_wo_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
					swal({
						title : "Product Categrory Code is already exists",
						type : "warning"
					})
				}else{
					save();
				}
			}
		})
	}	
}

function save(){

	var outlet = $("#prod_cat_outlet").val();
	var category_code = $("#prod_cat_code").val().toUpperCase();
	var category_name = capitalize($("#prod_cat_name").val());
	var category_desc = $("#prod_cat_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (category_name == "" || category_code == ""){
        $("#save").prop("disabled", false);
		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (category_name == ""){
			$("#prod_cat_name").addClass("error");
		}

		if (category_code == ""){
			$("#prod_cat_code").addClass("error");
		}

	}else{
		$.ajax({
			data : {outlet : outlet, category_desc : category_desc, category_code : category_code, category_name : category_name, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_category/insert_product_category",
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