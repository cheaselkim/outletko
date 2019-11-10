$(document).ready(function(){

	get_transaction($("#trans_id").val());
	company();
	outlet();

	$("#update").click(function(){
		save();
	});	

	$("#cancel").click(function(){
		window.open(base_url + "app/4/9/2", "_self");
	});

});

function company(){
	$.ajax({
		type : "GET",
		dataType : "JSON",
		url : base_url + "product_type/company",
		success: function(data){
			$("#prod_type_comp").val(data);
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function outlet(){
	$.ajax({
		type : "GET",
		dataType : "JSON",
		url : base_url + "product_type/outlet",
		success: function(data){
			for (var i = 0; i < data.length; i++) {
				$("#prod_type_outlet").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function get_transaction(id){
	$.ajax({
		type : "POST",
		data : {"id" : id},
		dataType : "JSON",
		url : base_url + "product_type/get_transaction",
		success : function(data){
			$("#prod_type_outlet").val(data.outlet);
			$("#prod_type_desc").val(data.type_desc);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function save(){

	var outlet = $("#prod_type_outlet").val();
	var type_desc = $("#prod_type_desc").val();
	var id = $("#trans_id").val();

	if (type_desc == ""){
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, type_desc : type_desc, id : id},
			type : "POST",
			dataType : "JSON",
			url : base_url + "product_type/update_product_type",
			crossOrigin: false,
			success : function(result){
				if (result == true){
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