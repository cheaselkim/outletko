$(document).ready(function(){


	business_type();


	$("#business_type").keyup(function(){
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


function business_type(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "business_type/entry_query",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-query").html(result.output);
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}


function check_business_type(){

	var business_type = $("#business_type").val();

	if (business_type == ""){

		$("#save").prop("disabled", false);
		$("#business_type").addClass("error");

		swal({

			title : "Please input all required fields",

			type : "warning"

		})

	}else{
		var	csrf_name = $("input[name=csrf_name]").val();

		$.ajax({

			data : {business_type : business_type, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "business_type/business_type_wo_id",

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



	var business_type = $("#business_type").val();


	if (business_type == ""){

		$("#save").prop("disabled", false);
		$("#business_type").addClass("error");

		swal({

			title : "Please input all required fields",

			type : "warning"

		})

	}else{

		var	csrf_name = $("input[name=csrf_name]").val();
		$.ajax({

			data : {business_type : business_type, csrf_name : csrf_name},

			type : "POST",

			dataType : "JSON",

			url : base_url + "business_type/insert_business_type",

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

						title : "Successfully Save.",

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