$(document).ready(function(){



	company();
	outlet();
	customer_type();

	$("#cust_type_code").keyup(function(){
		$(this).removeClass("error");
	});


	$("#cust_type_desc").keyup(function(){
		$(this).removeClass("error");
	});


	$("#save").click(function(){

		check_customer_type();

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

		url : base_url + "Customer_type/company",

		success: function(data){
			$("input[name=csrf_name]").val(data.token);

			$("#cust_type_comp").val(data.data);

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

function customer_type(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Customer_type/entry_query",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-query").html(result.output);
		}, error : function(err){
			console.log(err.responseText);
		}

	});
}

function check_customer_type(){

	var	csrf_name = $("input[name=csrf_name]").val();
	var outlet = $("#cust_type_outlet").val();

	var cust_code = $("#cust_type_code").val().toUpperCase();
	var cust_name = $("#cust_type_desc").val();

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

	}else{



		$.ajax({

			data : {cust_code : cust_code, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "Customer_type/customer_type_wo_id",
			beforeSend : function(){

              swal({
                  title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })                

			},success : function(result){

				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){

					swal({

						title : "Customer Type is already exists",

						type : "warning"

					})
					$("#save").attr("disabled", false);

				}else{

					setTimeout(function(){ 
						save();
					}, 500);

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
		$("#save").attr("disabled", false);

	}else{
		var	csrf_name = $("input[name=csrf_name]").val();

		$.ajax({

			data : {outlet : outlet, cust_code : cust_code, cust_name : cust_name, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "Customer_type/insert_customer_type",

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