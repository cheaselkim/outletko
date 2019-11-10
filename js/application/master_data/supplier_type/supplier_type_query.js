$(document).ready(function(){

	outlet();
	query_data();

	$("#search").click(function(){
		query_data();
	});

});

function outlet(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Supplier_type/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result =  data.data;
			for (var i = 0; i < result.length; i++) {
				$("#prod_unit_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = $("#app_func").val();
	var prod_unit_outlet = $("#prod_unit_outlet").val();
	var prod_unit_desc = $("#prod_unit_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_unit_outlet, unit_desc : prod_unit_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Supplier_type/query_business_type",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-query").html(result.output);
			$("#count").val(result.count);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function delete_business_type(id,key){
	var value = $("table tbody tr:eq("+(key)+")").find("td:eq(0)").text();
	var	csrf_name = $("input[name=csrf_name]").val();
	swal({
		title: "Are you sure do you want to Delete Business Type : "+ value +" ?",
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
			    	data : {"id" : id, csrf_name : csrf_name},
			    	url : base_url + "Supplier_type/delete_business_type",
			    	type : "POST",
			    	dataType : "JSON",
			    	success : function (result){
						$("input[name=csrf_name]").val(result.token);
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

function edit_business_type(id){
	$("body").empty();
	$("body").load(base_url + "menu/edit_menu/4/22/2/"+id);
}