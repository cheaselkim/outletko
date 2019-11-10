$(document).ready(function(){

	$("#mod_cash").number(true, 2);
	$("#mod_card").number(true, 2);
	$("#mod_dated").number(true, 2);
	$("#mod_post_dated").number(true, 2);
	$("#mod_online").number(true, 2);

	query();

	$("#btn_search").click(function(){
		query();
	});

	$("#process").click(function(){
		var process_date = $("#mod_trans_date").val();
		swal({
			type : "warning",
			title : "Your Transaction Date " + process_date + " will be closed.",
			text : "",
            showCancelButton: true
		}, function(isConfirm){
			$("#process").prop("disabled", true);
            if (isConfirm){
				process_end_day(2);
            }
          })
	});

	$("#unprocess").click(function(){
		process_end_day(1);
	});

});

function query(){

	var csrf_name = $("input[name=csrf_name]").val();
	var fdate = $("#fdate").val();
	var tdate = $("#tdate").val();
	var status = $("#status").val();

	$.ajax({
		data : {fdate : fdate, tdate : tdate, status : status, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Sales/end_day_query",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div_query_tbl").html(result.result);
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function closed($key){
	$("#unprocess").hide();
	$("#process").show();
	$("#cancel").text("Cancel");

	$("#modal_end_day").modal("show");

	$("#mod_trans_date").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_trans_date").text());
	$("#mod_trans_no").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_total_trans").text());
	$("#mod_curr").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_curr_code").text());
	$("#mod_total_sales").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_total_amount").text());
	$("#mod_account_id").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_account_id").text());
	$("#mod_account_id").attr("data-id", $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_user_id").text());
	$("#mod_outlet_id").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_outlet").text());
	$("#mod_outlet_id").attr("data-id", $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_outlet_id").text());

	var csrf_name = $("input[name=csrf_name]").val();
	var trans_date = $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_trans_date").text();
	var user_id = $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_user_id").text();
	var outlet_id = $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_outlet_id").text();

	$.ajax({
		data : {trans_date : trans_date, user_id : user_id , outlet_id : outlet_id, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Sales/end_day_payment_transaction",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#mod_cash").val(data.cash_payment);
			$("#mod_card").val(data.card_payment);
			$("#mod_dated").val(data.check_payment);
			$("#mod_post_dated").val(data.pdc_payment);
			$("#mod_online").val(data.online_payment);
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function open_process($key){
	$("#unprocess").show();
	$("#process").hide();
	$("#cancel").text("Cancel");

	$("#modal_end_day").modal("show");

	$("#mod_trans_date").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_trans_date").text());
	$("#mod_trans_no").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_total_trans").text());
	$("#mod_curr").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_curr_code").text());
	$("#mod_total_sales").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_total_amount").text());
	$("#mod_account_id").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_account_id").text());
	$("#mod_account_id").attr("data-id", $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_user_id").text());
	$("#mod_outlet_id").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_outlet").text());
	$("#mod_outlet_id").attr("data-id", $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_outlet_id").text());

	var csrf_name = $("input[name=csrf_name]").val();
	var trans_date = $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_trans_date").text();

	$.ajax({
		data : {trans_date : trans_date, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Sales/end_day_payment_transaction",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#mod_cash").val(data.cash_payment);
			$("#mod_card").val(data.card_payment);
			$("#mod_dated").val(data.check_payment);
			$("#mod_post_dated").val(data.pdc_payment);
			$("#mod_online").val(data.online_payment);
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function view($key){
	$("#unprocess").hide();
	$("#process").hide();
	$("#cancel").text("Close");

	$("#modal_end_day").modal("show");

	$("#mod_trans_date").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_trans_date").text());
	$("#mod_trans_no").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_total_trans").text());
	$("#mod_curr").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_curr_code").text());
	$("#mod_total_sales").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_total_amount").text());
	$("#mod_account_id").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_account_id").text());
	$("#mod_account_id").attr("data-id", $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_user_id").text());
	$("#mod_outlet_id").val($("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_outlet").text());
	$("#mod_outlet_id").attr("data-id", $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_outlet_id").text());

	var csrf_name = $("input[name=csrf_name]").val();
	var trans_date = $("#end_day_tbl tbody tr:eq("+$key+")").find(".tbl_trans_date").text();

	$.ajax({
		data : {trans_date : trans_date, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Sales/end_day_payment_transaction",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#mod_cash").val(data.cash_payment);
			$("#mod_card").val(data.card_payment);
			$("#mod_dated").val(data.check_payment);
			$("#mod_post_dated").val(data.pdc_payment);
			$("#mod_online").val(data.online_payment);
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}


function process_end_day(status){

	var trans_date = $("#mod_trans_date").val();
	var text = "";

	if (status == "2"){
		text = "Successfully Process";
	}else{
		text = "Successfully Unprocess";
	}

	var csrf_name = $("input[name=csrf_name]").val();
	var account_id = $("#mod_account_id").attr("data-id");
	var outlet_id = $("#mod_outlet_id").attr("data-id");

	$.ajax({
		data : {trans_date : trans_date, status : status, user_id : account_id, outlet_id : outlet_id, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Sales/process_end_day",
		beforeSend : function(){
			swal({
				title : "Processing.....",
				showCancelButton: false, 
				showConfirmButton: false           
			});
		},
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#modal_end_day").modal("hide");
				swal({
					type : "success",
					title : text
				}, function(){
					location.reload();
				})
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}