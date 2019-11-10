$(document).ready(function(){

	product_category();
	company();
	outlet();
	query_data();

	$("#save").click(function(){
        $("#save").prop("disabled", true);
		check_product_class();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "", "_self");
	});

	$("#prod_class_cat").change(function(){
		$(this).addClass("error");
	});

	$("#prod_class_code").keyup(function(){
		$(this).addClass("error");
	});

	$("#prod_class_name").keyup(function(){
		$(this).addClass("error");
	});

});

function product_category(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "product_class/product_category",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#prod_class_cat").append("<option value='"+result[i].id+"'>"+result[i].category_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function company(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "product_class/company",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_class_comp").val(data.data);
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
		url : base_url + "product_class/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#prod_class_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = "3";
	var prod_class_outlet = "";
	var prod_class_desc = "";
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_class_outlet, class_desc : prod_class_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "product_class/entry_query",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-table").html(result.output);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function check_product_class(){
	var outlet = $("#prod_class_outlet").val();
	var class_cat = $("#prod_class_cat").val();
	var class_code = $("#prod_class_code").val().toUpperCase();
	var class_name = $("#prod_class_name").val();
	var class_desc = $("#prod_class_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (class_code == "" || class_name == "" || class_cat == ""){

        $("#save").prop("disabled",false);

		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (class_code == ""){
			$("#prod_class_code").addClass("error");
		}

		if (class_name == ""){
			$("#prod_class_name").addClass("error");
		}

		if (class_cat == ""){
			$("#prod_class_cat").addClass("error");
		}

	}else{
		$.ajax({
			data : {class_code : class_code, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_class/product_class_wo_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
			        $("#save").prop("disabled",false);
					swal({
						title : "Product Class Code is already exists!",
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

	var outlet = $("#prod_class_outlet").val();
	var class_cat = $("#prod_class_cat").val();
	var class_code = $("#prod_class_code").val().toUpperCase();
	var class_name = $("#prod_class_name").val();
	var class_desc = $("#prod_class_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (class_code == "" || class_name == "" || class_cat == ""){

        $("#save").prop("disabled",false);

		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (class_code == ""){
			$("#prod_class_code").addClass("error");
		}

		if (class_name == ""){
			$("#prod_class_name").addClass("error");
		}

		if (class_cat == ""){
			$("#prod_class_cat").addClass("error");
		}

	}else{
		$.ajax({
			data : {outlet : outlet, class_code : class_code, class_name : class_name, class_desc : class_desc, class_cat : class_cat, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_class/insert_product_class",
			crossOrigin: false,
			beforeSend : function(){
              swal({
                  title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })  
			},
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