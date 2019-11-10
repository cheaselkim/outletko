$(document).ready(function(){

	get_transaction($("#trans_id").val());
	company();
	outlet();

	$("#update").click(function(){
        $("#update").prop("disabled", true);
		check_product_category();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "app/4/10/2", "_self");
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

function get_transaction(id){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		type : "POST",
		data : {"id" : id, csrf_name : csrf_name},
		dataType : "JSON",
		url : base_url + "product_category/get_transaction",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_cat_outlet").val(data.outlet);
			$("#prod_cat_code").val(data.category_code);
			$("#prod_cat_name").val(data.category_name);
			$("#prod_cat_desc").val(data.category_desc);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function check_product_category(){
	var outlet = $("#prod_cat_outlet").val();
	var category_code = $("#prod_cat_code").val().toUpperCase();
	var category_name = capitalize($("#prod_cat_name").val());
	var category_desc = $("#prod_cat_desc").val();
	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (category_name == "" || category_code == ""){

        $("#update").prop("disabled", false);

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
			data : {category_code : category_code, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_category/product_category_w_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
			        $("#update").prop("disabled", false);
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
	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (category_name == "" || category_code == ""){
        $("#update").prop("disabled", false);

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
			data : {outlet : outlet, category_desc : category_desc, category_code : category_code, category_name : category_name, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_category/update_product_category",
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