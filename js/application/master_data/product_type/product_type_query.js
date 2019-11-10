$(document).ready(function(){

	outlet();
	query_data();

	$("#search").click(function(){
		query_data();
	});

});

function outlet(){
	$.ajax({
		type : "GET",
		dataType : "JSON",
		url : base_url + "Product_type/outlet",
		success: function(data){
			for (var i = 0; i < data.length; i++) {
				$("#prod_type_outlet").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = $("#app_func").val();
	var prod_type_outlet = $("#prod_type_outlet").val();
	var prod_type_desc = $("#prod_type_desc").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_type_outlet, type_desc : prod_type_desc},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Product_type/query_product_type",
		success: function(result){
			$("#div-query").html(result.output);
			$("#count").val(result.count);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function delete_prod_type(id,key){
	var value = $("#tbl-data tbody tr:eq("+(key)+")").find("td:eq(2)").text();
	swal({
		title: "Are you sure do you want to Delete Product Type : "+ value +" ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Confirm',
		closeOnConfirm: false,
		closeOnCancel: false,
		timer: 3000
		},function(isConfirm){
			if (isConfirm){
			  	$.ajax({
			    	data : {"id" : id},
			    	url : base_url + "Product_type/delete_prod_type",
			    	type : "POST",
			    	dataType : "JSON",
			    	success : function (result){
			      		query_data();
				      swal("Successfully Delete", "", "success");
				    }, error : function(err){
				    	console.log(err.responseText);
			    	}       
				});
			}else{
			    swal("Cancelled", "", "error");
			}
	});
}

function edit_prod_type(id){
	$("body").empty();
	$("body").load(base_url + "menu/edit_menu/4/8/2/"+id);
}