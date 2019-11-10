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
		url : base_url + "Payment_type/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#payment_type_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = $("#app_func").val();
	var outlet = $("#payment_type_outlet").val();
	var type_desc = $("#type_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : outlet, type_desc : type_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Payment_type/query_payment_type",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-query").html(result.result);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function delete_payment_type(id,key){
	var value = $("#tbl-data tbody tr:eq("+(key)+")").find("td:eq(2)").text();
	var	csrf_name = $("input[name=csrf_name]").val();

	swal({
		title: "Are you sure do you want to Delete Payment Type : "+ value +" ?",
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
			    	url : base_url + "Payment_type/delete_payment_type",
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

function edit_payment_type(id){
	$("body").empty();
	$("body").load(base_url + "menu/edit_menu/4/16/2/"+id);
}