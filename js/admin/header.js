$(document).ready(function(){
	all_access();

	$("#btn_main_menu").click(function(){
		main_menu($("#main_menu_module").val());
	});

});

function all_access(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Header/all_access",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			if (data.result == "1"){
				for (var i = 1; i <= 5; i++) {
					$("#menu_"+i).removeClass("disabled");
				}
			}else{
				var access = data.access;
				for (var i = 0; i < access.length; i++) {
					$("#menu_"+ access[i].module_id).removeClass("disabled");
				}
			}
		}, error : function(err){
			console.log(err.responseText);
		}
	});	
}

function select_function($sub_module, $function){
	var $module = Number($("#menu_module").val()) - 8;
	window.open(base_url + "admin/" + $module + "/" + $sub_module + "/" + $function, "_self");
}

function main_menu($module){
	var csrf_name = $("input[name=csrf_name]").val();
	$module = Number($module) + 8;
	$.ajax({
		data : {"module" : $module, "sub_module" : "0", csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Header/roles",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			if (result.count == 1){
				window.open(base_url + "app/1/" + result.roles, "_self");
			}else{
				$("#header-menu").text(result.menu);
				$("#menu-content").html(result.roles);
				$("#sales_modal").modal("show");
				if ($module == "4"){
					$("#sales_modal").css("margin-top", "-10%");
				}else if ($module == "12"){
					// $("#sales_modal").css("margin-top", "5%");
                    if ($(window).width() > 768){
                        $("#sales_modal .modal-dialog").css("max-width", "400px");
                    }else{
                        $("#sales_modal .modal-dialog").css("max-width", "600px");
                    }

                }
			}
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}