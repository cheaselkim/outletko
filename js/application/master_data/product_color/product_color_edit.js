
$(document).ready(function(){

	get_transaction($("#trans_id").val());
	company();
	outlet();

	$("#update").click(function(){
        $("#update").prop("disabled", true);
		check_product_color();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "app/4/12/2", "_self");
	});


});

function company(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "product_color/company",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#prod_color_comp").val(result.data);
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
		url : base_url + "product_color/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#prod_color_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
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
		url : base_url + "product_color/get_transaction",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_color_outlet").val(data.outlet);
			$("#prod_color_code").val(data.color_code);
			$("#prod_color_name").val(data.color_name);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function check_product_color(){
	var outlet = $("#prod_color_outlet").val();
	var color_desc = $("#prod_color_desc").val();
	var color_code = $("#prod_color_code").val().toUpperCase();
	var color_name = capitalize($("#prod_color_name").val());
	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (color_code == "" || color_name == ""){
        $("#update").prop("disabled", false);
		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (color_code == ""){
			$("#prod_color_code").addClass("error");
		}

		if (color_name == ""){
			$("#prod_color_name").addClass("error");
		}


	}else{
		$.ajax({
			data : {color_code : color_code, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_color/product_color_w_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
			        $("#update").prop("disabled", false);
					swal({
						title : "Product Color Code is already exists",
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

	var outlet = $("#prod_color_outlet").val();
	var color_desc = $("#prod_color_desc").val();
	var color_code = $("#prod_color_code").val().toUpperCase();
	var color_name = capitalize($("#prod_color_name").val());
	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (color_code == "" || color_name == ""){
        $("#update").prop("disabled", false);
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, color_desc : color_desc, id : id, color_code : color_code, color_name : color_name, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_color/update_product_color",
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