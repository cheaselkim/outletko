$(document).ready(function(){


	get_transaction($("#trans_id").val());


	$("#business_type").keyup(function(){
		$(this).removeClass("error");
	});


	$("#update").click(function(){
		$("#update").prop("disabled", true);
		check_business_type();

	});	



	$("#cancel").click(function(){
		window.open(base_url + "admin/5/25/2", "_self");
	});

});


function get_transaction(id){
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({

		type : "POST",

		data : {"id" : id, csrf_name : csrf_name},

		dataType : "JSON",

		url : base_url + "business_type/get_transaction",

		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#business_type").val(data.business_type);

		}, error : function(err){

			console.log(err.responseText);

		}

	});

}



function check_business_type(){

	var business_type = $("#business_type").val();
	var id = $("#trans_id").val();



	if (business_type == ""){

		$("#update").prop("disabled", false);

		if (business_type == ""){
			$("#business_type").addClass("error");
		}

		swal({

			title : "Please input all required fields",

			type : "warning"

		})

	}else{

		var	csrf_name = $("input[name=csrf_name]").val();
		$.ajax({

			data : {business_type : business_type, id : id, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "business_type/business_type_w_id",

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

	var business_type = $("#business_type").val();
	var id = $("#trans_id").val();

	if (business_type == ""){

		$("#update").prop("disabled", false);

		if (business_type == ""){
			$("#business_type").addClass("error");
		}

		swal({

			title : "Please input all required fields",

			type : "warning"

		})

	}else{

		var	csrf_name = $("input[name=csrf_name]").val();
		$.ajax({

			data : {business_type : business_type, id : id, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "business_type/update_business_type",

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

					title : "Successfully Update.",

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