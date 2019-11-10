$(document).ready(function(){

	get_roles_function();
	get_sales_force();

	jQuery(document).on("change", ".sales_check", function(e){
       e.preventDefault();
       $('.sales_check').not(this).prop('checked', false);
       $(this).prop('checked', true);
       get_roles($(this).val());
	});	

	jQuery(document).on("change", ".check_all", function(e){
		all_check();
	});	

	jQuery(document).on("change", ".add", function(e){
		check_all();
	});	

	jQuery(document).on("change", ".edit", function(e){
		check_all();
	});	

	jQuery(document).on("change", ".view", function(e){
		check_all();
	});	

	jQuery(document).on("change", ".cancel", function(e){
		check_all();
	});	

	jQuery(document).on("change", ".delete", function(e){
		check_all();
	});	

	$("#save").click(function(){
		$("#save").prop("disabled", true);
		save();
	});


});

function get_roles_function(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "User_roles/get_roles_function",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#user-function").html(result.result);
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function get_sales_force(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "User_roles/get_sales_force",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#user-table").html(result.result);
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function get_roles(id){
	$('#function_tbl tbody tr').find("input[type='checkbox']").prop("checked", false);
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {id : id, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "User_roles/get_roles",
		success : function(result){
			var module_id = "";
			var sub_module_id = "";
			var count = 0;

			$("input[name=csrf_name]").val(result.token);

			var data = result.result;
			$('#function_tbl tbody tr').each(function (row, tr){
				module_id = $(tr).find(".module_id").text();
				sub_module_id = $(tr).find(".sub_module_id").text();

				for (var i = 0; i < data.length; i++) {
					if (data[i].module_id == module_id && data[i].sub_module_id == sub_module_id){
						count++;
						if (data[i].function_id == "1"){
							$(tr).find(".add").prop("checked", true);
						}else if (data[i].function_id == "2"){
							$(tr).find(".edit").prop("checked", true);							
						}else if (data[i].function_id == "3"){
							$(tr).find(".view").prop("checked", true);							
						}else if (data[i].function_id == "4"){
							$(tr).find(".cancel").prop("checked", true);							
						}else if (data[i].function_id == "5"){
							$(tr).find(".delete").prop("checked", true);							
						}
						if (count == 4){
							$(tr).find(".check_all").prop("checked", true);
						}else{
							count = count;
						}
					}
				}
				count = 0;
			});		


		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function all_check(){

	$('#function_tbl tbody tr').each(function (row, tr){

		if ($(tr).find(".check_all").prop("checked") == true){
			$(tr).find(".add").prop("checked", true);
			$(tr).find(".edit").prop("checked", true);
			$(tr).find(".view").prop("checked", true);
			$(tr).find(".cancel").prop("checked", true);
			$(tr).find(".delete").prop("checked", true);			
		}else{
			$(tr).find(".add").prop("checked", false);
			$(tr).find(".edit").prop("checked", false);
			$(tr).find(".view").prop("checked", false);
			$(tr).find(".cancel").prop("checked", false);
			$(tr).find(".delete").prop("checked", false);				
		}

	})

}	

function check_all(){
	$('#function_tbl tbody tr').each(function (row, tr){
		if ($(tr).find(".add").prop("checked") == true && $(tr).find(".edit").prop("checked") == true && 
			$(tr).find(".view").prop("checked") == true && ($(tr).find(".cancel").prop("checked") == true || 
			$(tr).find(".delete").prop("checked") == true)){
			$(tr).find(".check_all").prop("checked", true);
		}else{
			$(tr).find(".check_all").prop("checked", false);
		}

	})	
}

function save(){

	var csrf_name = $("input[name=csrf_name]").val();
	var user_id = "";
	var outlet_id = "";
	var roles = new Array();

	$("#sales_force_tbl input[type='checkbox']:checked").each(function(){
			user_id = $(this).val();
			outlet_id = $(this).data("outlet");
	});

	$("#function_tbl input[type='checkbox']:checked").each(function(){
		var val = $(this).val();

		if (val != "0"){
			var sub = {
					'user_id' : user_id,
					'outlet_id' : outlet_id,
                    'module_id' :$(this).data('module'),
                    'sub_module_id' : $(this).data('submodule'),
                    'function_id' : val
				}			
			roles.push(sub);
		}

	});

	var data = {table_data:roles, csrf_name : csrf_name};
    $.ajax({

            data : data
            , type: "POST"
            , url: base_url + "Sales_force/save_user_roles"
            , dataType: 'json'
            , crossOrigin: false     
            , success: function(result) {
				$("input[name=csrf_name]").val(result.token);
              swal({
                title : "Successfully saved",
                type : "success",
                timer: 2000
              }, function(){
                location.reload();
              });
            }, error: function(err) {
                console.log(err.responseText);
            }
    });

}