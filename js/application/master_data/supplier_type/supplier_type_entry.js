$(document).ready(function(){



	company();

	outlet();

	supplier_type();

	$("#supp_type_code").keyup(function(){
		$(this).removeClass("error");
	});

	$("#supp_type_desc").keyup(function(){
		$(this).removeClass("error");
	});

	$("#save").click(function(){
		$("#save").prop("disabled", true);
		check_business_type();
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
			var result = data.data;
			for (var i = 0; i < result.length; i++) {

				$("#supp_type_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");

			}

		}, error: function(err){

			console.log(err.responseText);

		}

	});

}

function supplier_type(){
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Supplier_type/entry_query",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-query").html(result.output);
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}


function check_business_type(){

	var outlet = $("#supp_type_outlet").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	var supp_code = $("#supp_type_code").val().toUpperCase();
	var supp_name = $("#supp_type_desc").val();

	if (supp_code == "" || supp_name == ""){

		$("#save").prop("disabled", false);

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

			data : {supp_code : supp_code, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "Supplier_type/business_type_wo_id",

			success : function(result){

				$("input[name=csrf_name]").val(result.token);
				if (result.result > 0){	

				$("#save").prop("disabled", false);

					swal({

						title : "Business Type is already Exists",

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

			data : {outlet : outlet, supp_code : supp_code, supp_name : supp_name, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "Supplier_type/insert_business_type",

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