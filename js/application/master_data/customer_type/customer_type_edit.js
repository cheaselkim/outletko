$(document).ready(function(){



	company();

	outlet();

	get_transaction($("#trans_id").val());

	$("#cust_type_code").keyup(function(){
		$(this).removeClass("error");
	});

	$("#cust_type_desc").keyup(function(){
		$(this).removeClass("error");
	});

	$("#update").click(function(){
		check_customer_type();
		$("#update").attr("disabled", true);
	});	

	$("#cancel").click(function(){

		window.open(base_url + "app/4/15/2", "_self");

	});



});

function company(){
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({

		data : {csrf_name : csrf_name},
		type : "GET",

		dataType : "JSON",

		url : base_url + "Customer_type/company",

		success: function(data){
			$("input[name=csrf_name]").val(data.token);

			$("#prod_unit_comp").val(data.data);

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

		url : base_url + "Customer_type/outlet",

		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {

				$("#cust_type_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");

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

		url : base_url + "Customer_type/get_transaction",

		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#cust_type_outlet").val(data.outlet);
			$("#cust_type_code").val(data.cust_type_code);
			$("#cust_type_desc").val(data.cust_type_name);

		}, error : function(err){

			console.log(err.responseText);

		}

	});

}

function check_customer_type(){

	var outlet = $("#cust_type_outlet").val();

	var cust_code = $("#cust_type_code").val().toUpperCase();
	var cust_name = $("#cust_type_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	var id = $("#trans_id").val();



	if (cust_code == "" || cust_name == ""){

		if (cust_code == ""){
			$("#cust_type_code").addClass("error");
		}

		if (cust_name == ""){
			$("#cust_type_desc").addClass("error");
		}

		swal({
			title : "Please input all required fields",
			type : "warning",
			timer: 2000
		})

	}else{

		$.ajax({

			data : {cust_code : cust_code, id : id, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "Customer_type/customer_type_w_id",

			success : function(result){

				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){

					swal({

						title : "Customer Type is already exists",

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



	var outlet = $("#cust_type_outlet").val();

	var cust_code = $("#cust_type_code").val().toUpperCase();
	var cust_name = $("#cust_type_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	var id = $("#trans_id").val();



	if (cust_code == "" || cust_name == ""){

		if (cust_code == ""){
			$("#cust_type_code").addClass("error");
		}

		if (cust_name == ""){
			$("#cust_type_desc").addClass("error");
		}

		swal({

			title : "Please input all required fields",

			type : "warning"

		})

		$("#update").attr("disabled", false);
	}else{

		$.ajax({

			data : {outlet : outlet, cust_code : cust_code, cust_name : cust_name, id : id, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "Customer_type/update_customer_type",

			crossOrigin: false,

			beforeSend : function(){
              swal({
                  title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })                

			},success : function(result){
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