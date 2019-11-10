$(document).ready(function(){

	get_transaction($("#trans_id").val());
	product_category();
	company();
	outlet();

	$("#update").click(function(){
        $("#update").prop("disabled", true);
		check_product_class();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "app/4/11/2", "_self");
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

function get_transaction(id){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		type : "POST",
		data : {"id" : id, csrf_name : csrf_name},
		dataType : "JSON",
		url : base_url + "product_class/get_transaction",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#prod_class_outlet").val(data.outlet);
			$("#prod_class_cat").val(data.class_cat);
			$("#prod_class_code").val(data.class_code);
			$("#prod_class_name").val(data.class_name);
			$("#prod_class_desc").val(data.class_desc);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function check_product_class(){
	var outlet = $("#prod_class_outlet").val();
	var class_cat = $("#prod_class_cat").val();
	var class_code = $("#prod_class_code").val().toUpperCase();
	var class_name = capitalize($("#prod_class_name").val());
	var class_desc = $("#prod_class_desc").val();
	var id =  $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (class_code == "" || class_cat == "" || class_name == ""){
        $("#update").prop("disabled", false);
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
			data : {class_code : class_code, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_class/product_class_w_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0 ){
			        $("#update").prop("disabled", false);
					swal({
						title : "Product Class is already exists",
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
	var id =  $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (class_code == "" || class_cat == "" || class_name == ""){
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, class_code : class_code, class_name : class_name, class_desc : class_desc, class_cat : class_cat, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_class/update_product_class",
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