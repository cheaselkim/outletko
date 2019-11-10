
$(document).ready(function(){

	get_transaction($("#trans_id").val());
	company();
	outlet();

	$("#outlet_type_code").keyup(function(){
		$(this).removeClass("error");
	});

	$("#outlet_type_name").keyup(function(){
		$(this).removeClass("error");
	});


	$("#update").click(function(){
        $("#update").prop("disabled", true);
		check_outlet_type();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "app/4/26/2", "_self");
	});


});

function company(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "outlet_type/company",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_color_comp").val(data.data);
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
		url : base_url + "outlet_type/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#outlet_type_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
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
		url : base_url + "outlet_type/get_transaction",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#outlet_type_outlet").val(data.outlet);
			$("#outlet_type_code").val(data.outlet_type_code);
			$("#outlet_type_name").val(data.outlet_type_name);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function check_outlet_type(){
	var outlet = $("#outlet_type_outlet").val();
	var outlet_type_desc = $("#outlet_type_desc").val();
	var outlet_type_code = $("#outlet_type_code").val().toUpperCase();
	var outlet_type_name = $("#outlet_type_name").val();
	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (outlet_type_code == "" || outlet_type_name == ""){
        $("#update").prop("disabled", false);
		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (outlet_type_code == ""){
			$("#outlet_type_code").addClass("error");
		}

		if (outlet_type_name == ""){
			$("#outlet_type_name").addClass("error");
		}


	}else{
		$.ajax({
			data : {outlet_type_code : outlet_type_code, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "outlet_type/outlet_type_w_id",
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

	var outlet = $("#outlet_type_outlet").val();
	var outlet_type_desc = $("#outlet_type_desc").val();
	var outlet_type_code = $("#outlet_type_code").val().toUpperCase();
	var outlet_type_name = $("#outlet_type_name").val();
	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (outlet_type_code == "" || outlet_type_name == ""){
        $("#update").prop("disabled", false);
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, outlet_type_desc : outlet_type_desc, id : id, outlet_type_code : outlet_type_code, outlet_type_name : outlet_type_name, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "outlet_type/update_outlet_type",
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