$(document).ready(function(){



	outlet();

	company();

	get_transaction($("#trans_id").val());



	// setTimeout(function(){ 

	// 	get_transaction($("#trans_id").val());

	// }, 1000);

	$("#supp_type_code").keyup(function(){
		$(this).removeClass("error");
	});

	$("#supp_type_desc").keyup(function(){
		$(this).removeClass("error");
	});


	$("#update").click(function(){
		$("#update").prop("disabled", true);
		check_business_type();

	});	



	$("#cancel").click(function(){

		window.open(base_url + "app/4/21/2", "_self");

	});



});



function company(){
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",

		dataType : "JSON",

		url : base_url + "Supplier_type/company",

		success: function(data){

			$("input[name=csrf_name]").val(data.token);
			$("#supp_type_comp").val(data.data);

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

		url : base_url + "Supplier_type/outlet",

		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result  = data.data;
			for (var i = 0; i < result.length; i++) {

				$("#supp_type_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");

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

		url : base_url + "Supplier_type/get_transaction",

		success : function(data){

			$("input[name=csrf_name]").val(data.token);
			$("#supp_type_outlet").val(data.outlet);
			$("#supp_type_code").val(data.supplier_code_type);
			$("#supp_type_desc").val(data.supplier_name_type);

		}, error : function(err){

			console.log(err.responseText);

		}

	});

}



function check_business_type(){

	var outlet = $("#supp_type_outlet").val();

	var supp_code = $("#supp_type_code").val().toUpperCase();
	var supp_name = $("#supp_type_desc").val();

	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();



	if (supp_code == "" || supp_name == ""){

		$("#update").prop("disabled", false);

		if (supp_code == ""){
			$("#supp_type_code").addClass("error");
		}

		if (supp_name == ""){
			$("#supp_type_desc").addClass("error");
		}

		swal({

			title : "Please input all required fields",

			type : "warning"

		})

	}else{

		$.ajax({

			data : {supp_code : supp_code, id : id, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "Supplier_type/business_type_w_id",

			success : function(result){

				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){

					$("#update").prop("disabled", false);

					swal({

						title : "Business Type is already exists",

						type : "warning"

					})

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



	var outlet = $("#supp_type_outlet").val();

	var supp_code = $("#supp_type_code").val().toUpperCase();
	var supp_name = $("#supp_type_desc").val();

	var id = $("#trans_id").val();
	var	csrf_name = $("input[name=csrf_name]").val();



	if (supp_code == "" || supp_name == ""){

		if (supp_code == ""){
			$("#supp_type_code").addClass("error");
		}

		if (supp_name == ""){
			$("#supp_type_desc").addClass("error");
		}

		swal({

			title : "Please input all required fields",

			type : "warning"

		})

	}else{

		$.ajax({

			data : {outlet : outlet, supp_code : supp_code, supp_name : supp_name, id : id, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "Supplier_type/update_business_type",

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

				swal({

					title : "Successfully updated",

					type : "success",

					timer: 2000

				}, function(){

					location.reload();

				})

			}, error : function(err){

				console.log(err.responseText);

			}

		});

	}



}