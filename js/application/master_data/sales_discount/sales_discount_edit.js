$(document).ready(function(){

	get_transaction($("#trans_id").val());
	company();
	outlet();
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

	$("#update").click(function(){
		check_sales_discount();
		$(this).attr("disabled", true);
	});	

	$("#cancel").click(function(){
		window.open(base_url + "app/4/23/2", "_self");
	});


});

function company(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "sales_discount/company",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#sales_discount_comp").val(data);
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
		url : base_url + "sales_discount/outlet",
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

function get_transaction(id){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		type : "POST",
		data : {"id" : id, csrf_name : csrf_name},
		dataType : "JSON",
		url : base_url + "sales_discount/get_transaction",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var type = "";
			var amount = "";

			if (data.sales_discount_percent != 0){
				type = "%";
				amount = data.sales_discount_percent;
			}else{
				type = "P";
				amount = data.sales_discount_amount;
			}

			$("#sales_discount_outlet").val(data.outlet);
			$("#sales_discount_code").val(data.sales_discount_code);
			$("#sales_discount_name").val(data.sales_discount_name);
			$("#sales_discount_type").val(type);
			$("#sales_discount_amount").val(amount);
		}, error : function(err){
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
	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (sales_discount_code == "" || sales_discount_name == "" || sales_discount_amount == "0.00" || sales_discount_amount == ""){
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {sales_discount_code : sales_discount_code, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "sales_discount/sales_discount_w_id",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){
					swal({
						title : "Sales Discount Code is already exists",
						type : "warning"
					})
					$("#update").attr("disabled", false);

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
	var id = $("#trans_id").val();
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

		if (sales_discount_amount == 0){
			$("#sales_discount_amount").addClass("error");
		}
		$("#update").attr("disabled", false);

	}else{
		$.ajax({
			data : {outlet : outlet, sales_discount_code : sales_discount_code, sales_discount_name : sales_discount_name, sales_discount_amount : amount, sales_discount_percent : percent, id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "Sales_discount/update_sales_discount",
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