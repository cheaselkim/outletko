$(document).ready(function(){

	get_transaction($("#trans_id").val());
	company();
	outlet();

	$("#update").click(function(){
        $("#update").prop("disabled", true);
		check_product_brand_update();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "app/4/9/2", "_self");
	});

	$("#prod_brand_code").keyup(function(){
		$(this).removeClass("error");
	});

	$("#prod_brand_name").keyup(function(){
		$(this).removeClass("error");
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

function get_transaction(id){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		type : "POST",
		data : {"id" : id, csrf_name : csrf_name},
		dataType : "JSON",
		url : base_url + "product_brand/get_transaction",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_brand_outlet").val(data.outlet);
			$("#prod_brand_code").val(data.brand_code);
			$("#prod_brand_name").val(data.brand_name);
			$("#prod_brand_desc").val(data.brand_desc);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function check_product_brand_update(){

	var outlet = $("#prod_brand_outlet").val();
	var brand_code = $("#prod_brand_code").val().toUpperCase();
	var brand_name = capitalize($("#prod_brand_name").val());
	var brand_desc = $("#prod_brand_desc").val();
	var id = $("#trans_id").val();

	if (brand_name == "" || brand_code == ""){
		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (brand_name == ""){
			$("#prod_brand_name").addClass("error");
		}

		if (brand_code == ""){
			$("#prod_brand_code").addClass("error");
		}

        $("#update").prop("disabled", false);

	}else{
		var	csrf_name = $("input[name=csrf_name]").val();
		$.ajax({
			data : {brand_code : brand_code, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "Product_brand/product_brand_w_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
			        $("#update").prop("disabled", false);
					swal({
						title : "Product Brand Code is already exists",
						type : "warning",
						timer : 2000
					})
				}else{
					save();
				}
			}
		})
	}

}

function save(){
	var outlet = $("#prod_brand_outlet").val();
	var brand_code = $("#prod_brand_code").val().toUpperCase();
	var brand_name = capitalize($("#prod_brand_name").val());
	var brand_desc = $("#prod_brand_desc").val();
	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (brand_code == "" || brand_name == ""){
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
        $("#update").prop("disabled", false);
	}else{
		$.ajax({
			data : {outlet : outlet, brand_code : brand_code, brand_name : brand_name, brand_desc : brand_desc, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_brand/update_product_brand",
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