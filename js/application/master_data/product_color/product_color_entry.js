$(document).ready(function(){

	company();
	outlet();
	query_data();

	$("#save").click(function(){
        $("#save").prop("disabled", false);
		check_product_color();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "", "_self");
	});

});

function company(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		type : "GET",
		dataType : "JSON",
		data : {'csrf_name' : csrf_name},
		url : base_url + "product_color/company",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.data;
			$("#prod_color_comp").val(data);
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function outlet(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		type : "GET",
		dataType : "JSON",
		data : {'csrf_name' : csrf_name},
		url : base_url + "product_color/outlet",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.data;
			for (var i = 0; i < data.length; i++) {
				$("#prod_color_outlet").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var	csrf_name = $("input[name=csrf_name]").val();
	var app_func = "3";
	var prod_color_outlet = "";
	var prod_color_desc = "";

	$.ajax({
		data : {app_func : app_func, outlet : prod_color_outlet, color_desc : prod_color_desc, 'csrf_name' : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "product_color/entry_query",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-table").html(result.output);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}


function check_product_color(){
	var	csrf_name = $("input[name=csrf_name]").val();
	var outlet = $("#prod_color_outlet").val();
	var color_desc = $("#prod_color_desc").val();
	var color_code = $("#prod_color_code").val().toUpperCase();
	var color_name = capitalize($("#prod_color_name").val());

	if (color_code == "" || color_name == ""){
        $("#save").prop("disabled", false);
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
			data : {color_code : color_code, 'csrf_name' : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_color/product_color_wo_id",
			success : function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.data;
				if (data > 0){
		        $("#save").prop("disabled", false);
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

	var	csrf_name = $("input[name=csrf_name]").val();
	var outlet = $("#prod_color_outlet").val();
	var color_desc = $("#prod_color_desc").val();
	var color_code = $("#prod_color_code").val().toUpperCase();
	var color_name = capitalize($("#prod_color_name").val());

	if (color_code == "" || color_name == ""){
        $("#save").prop("disabled", false);
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, color_desc : color_desc, color_code : color_code, color_name : color_name, 'csrf_name' : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_color/insert_product_color",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				var data = result.result;
				if (data == true){
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