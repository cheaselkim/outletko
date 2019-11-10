$(document).ready(function(){

	account_class();

	$("#search").click(function(){
		data_query();
	});
})

function account_class(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "User_registry/account_class",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			var data  = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#account_class").append("<option value='"+data[i].id+"'>"+data[i].desc +"</option>");
            }			
            data_query();
		},error: function(err){
			console.log(err.responseText);
		}
	})
}

function data_query(){
	var csrf_name = $("input[name=csrf_name]").val();
	var trans_date = $("#trans_date").val();
	var keyword = $("#keyword").val();
	var account_status = $("#account_status").val();
	var account_class = $("#account_class").val();
	var app_func = $("#app_func").val();

	$.ajax({
		data : {trans_date : trans_date, keyword : keyword, account_status : account_status, account_class : account_class, app_func : app_func, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "User_registry/data_query",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div_query_tbl").html(result.result);
			$("#trans").val($("table tbody tr").length);
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function edit_user_registry(id){
	$("body").empty();
	$("body").load(base_url + "menu/edit_menu/1/0/2/"+id);
}