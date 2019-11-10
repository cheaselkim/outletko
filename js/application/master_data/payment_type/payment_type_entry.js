$(document).ready(function(){

	company();
	outlet();

	$("#save").click(function(){
		save();
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
		url : base_url + "Payment_type/company",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#payment_type_comp").val(data.data);
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
		url : base_url + "Payment_type/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#payment_type_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function save(){

	var outlet = $("#payment_type_outlet").val();
	var type_desc = $("#payment_type_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	if (type_desc == ""){
		swal({
			title : "Please input all required fields",
			type : "warning"
		})
	}else{
		$.ajax({
			data : {outlet : outlet, type_desc : type_desc, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "Payment_type/insert_payment_type",
			crossOrigin: false,
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