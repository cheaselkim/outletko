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

function view_user_registry(id){
    var csrf_name = $("input[name=csrf_name]").val();
    console.log(csrf_name);
    console.log(id);

    // $.ajax({
    //     data : {csrf_name : csrf_name, id : id},
    //     type : "POST",
    //     dataType : "JSON",
    //     url : base_url + "User_registry/get_outletko_data",
    //     success : function(result){
    //         $("input[name=csrf_name]").val(result.token);
    //         console.log(result);
    //     }, error : function(err){
    //         console.log(err.responseText);
    //     }
    // })

    $.ajax({
        data : {csrf_name : csrf_name, id : id},
        type : "POST",
        dataType : "JSON",
        url : base_url + "User_registry/get_outletko_data",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            var data = result.data;
            console.log(data);
            $("#modal-user").modal("show");
            $("#modal-user").find(".form-control").attr("readonly", true);
            $("#modal-user").find(".form-control").addClass("bg-white");

            $("#user-name").val(data[0].user_name);
            $("#user-account-id").val(data[0].account_id);
            $("#user-account-name").val(data[0].account_name);
            $("#user-link-name").val(base_url + data[0].link_name);
            $("#user-business-category").val(data[0].buss_cat);
            $("#user-account-pro").val((data[0].account_pro == "0" ? "No" : "Yes"));
            $("#user-account-status").val((data[0].account_status == "1" ? "Active" : "Inactive"));
            $("#user-address").val(data[0].street + ", " + data[0].city_desc + ", " + data[0].province_desc);
            $("#user-email").val(data[0].email);
            $("#user-mobile").val("+63" + data[0].mobile_no);
            $("#user-plan").val(data[0].plan_name);
            $("#user-subscribe-date").val(data[0].subscribe_date);
            $("#user-renewal-date").val(data[0].renewal_date);

        }, error : function(err){
            console.log(err);
        }
    })

}