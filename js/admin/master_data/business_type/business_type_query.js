$(document).ready(function(){

	query_data();

	$("#search").click(function(){
		query_data();
	});

});

function query_data(){
	var app_func = $("#app_func").val();
	var business_type = $("#business_type").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, business_type : business_type, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "business_type/query_business_type",
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
	var	csrf_name = $("input[name=csrf_name]").val();
	var value = $("table tbody tr:eq("+(key)+")").find("td:eq(0)").text();
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
			    	url : base_url + "business_type/delete_business_type",
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
	$("body").load(base_url + "menu/edit_menu/5/25/2/"+id);
}