$(document).ready(function(){

	company();
	outlet();
	query_data();

	$("#sales_discount_amount").number(true, 2);
	$("#sales_discount_amount").val(0);

	$("#sales_discount_code").keyup(function(){
		$(this).removeClass("error");
	});

	$("#sales_discount_name").keyup(function(){
		$(this).removeClass("error");
	});

	$("#sales_discount_amount").keyup(function(){
		$(this).removeClass("error");
	});


	$("#save").click(function(){
		check_sales_discount();
		$(this).attr("disabled", true);
	});	

	$("#cancel").click(function(){
		window.open(base_url + "", "_self");
	});

});

function company(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Sales_discount/company",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#sales_discount_comp").val(data.data);
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
		url : base_url + "Sales_discount/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#sales_discount_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = "3";
	var prod_color_outlet = "";
	var prod_color_desc = "";
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_color_outlet, color_desc : prod_color_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Sales_discount/entry_query",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-table").html(result.output);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}


function check_sales_discount(){
	var outlet = $("#sales_discount_outlet").val();
	var sales_discount_code = $("#sales_discount_code").val();
	var sales_discount_name = $("#sales_discount_name").val();
	var sales_discount_type = $("#sales_discount_type").val();
	var sales_discount_amount = $("#sales_discoutn_amount").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (sales_discount_code == "" || sales_discount_name == "" || sales_discount_amount == "0.00" || sales_discount_amount == ""){
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {sales_discount_code : sales_discount_code, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "Sales_discount/sales_discount_wo_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
					swal({
						title : "Sales Discount Code is already exists",
						type : "warning"
					})
					$("#save").attr("disabled", true);
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

	var outlet = $("#sales_discount_outlet").val();
	var sales_discount_code = $("#sales_discount_code").val().toUpperCase();
	var sales_discount_name = $("#sales_discount_name").val();
	var sales_discount_type = $("#sales_discount_type").val();
	var sales_discount_amount = $("#sales_discount_amount").val();
	var amount = "";
	var percent = "";
	var	csrf_name = $("input[name=csrf_name]").val();

	if (sales_discount_type == "%"){
		percent = sales_discount_amount;
	}else{
		amount = sales_discount_amount;
	}

	if (sales_discount_code == "" || sales_discount_name == "" || sales_discount_amount == 0){
		swal({
			title : "Please input all required fields",
			type : "warning"
		})

		if (sales_discount_code == ""){
			$("#sales_discount_code").addClass("error");
		}

		if (sales_discount_name == ""){
			$("#sales_discount_name").addClass("error");
		}

		if (sales_discount_amount == 0 ){
			$("#sales_discount_amount").addClass("error");
		}

		$("#save").attr("disabled", false);
	}else{
		$.ajax({
			data : {outlet : outlet, sales_discount_code : sales_discount_code, sales_discount_name : sales_discount_name, sales_discount_amount : amount, sales_discount_percent : percent, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "Sales_discount/insert_sales_discount",
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