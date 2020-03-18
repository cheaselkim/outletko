$(document).ready(function(){

	all_access();
	transaction();

	setInterval(function() {
		transaction();
	}, 5000);

	if ($("#span_outlet_id").text() == "" || $("#span_outlet_id").text() == "ALL"){
		// $("#modal_outlet").modal("show");
		$("#li_last_trans").hide();
		if ($("#user_all_access").val() == "1"){
			$("#span_outlet_id").text("ALL") 
		}else{
			count_outlet();
		}

	}else{
		var width = $(window).width();

		if (width > 768){
			$("#modal_outlet").modal("hide");
		}
	}

	$("#btn_main_menu").click(function(){
		main_menu($("#main_menu_module").val());
	});

	if ($("#main_menu_module").val() <= 0){
		$("#btn_main_menu").attr("disabled", true);
	}

	$('.disabled').on('click',function(e){
		return false;
	})

	// $("#total_sales_for_today").number(true, 2);

// 	report_menu();

});

function transaction(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url :base_url + "header/get_transaction",
		success: function(result){
			var width = $(document).width();
			$("input[name=csrf_name]").val(result.token);
			if (width <= 768){
				$("#last_tran_no_tab").text(result.last_trans);
				$("#no_of_trans_tab").text(result.no_of_trans);
				// $("#total_sales_for_today_tab").text($.number(result.total_sales, 2));
			}else{
				$("#last_tran_no").text(result.last_trans);
				$("#no_of_trans").text(result.no_of_trans);
				$("#total_sales_for_today").text($.number(result.total_sales, 2));				
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});	
}

function count_outlet(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url :base_url + "header/count_outlet",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			if (result.count > 1 || result.outlet_no == "0"){
				$("#modal_outlet").modal("show");
				$("#div_list_outlet").html(result.outlet);

				if ($(window).width() <= 768){
					if (result.count == "2"){
						$(".modal-dialog").css("max-width", "350px");				
					}
				}else{				
					console.log(result.count);
					if (result.count == "1"){
						$(".modal-dialog").css("max-width", "250px");				
					}else if (result.count == "2"){
						$(".modal-dialog").css("max-width", "500px");				
					}else if (result.count == "3"){
						$(".modal-dialog").css("max-width", "650px");										
					}else{
						$(".modal-dialog").css("max-width", "850px");				
					}
				}

			}else{
				select_outlet(result.outlet);
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function find_user_outlet(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : "header/find_user_outlet",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div_list_outlet").html(result.result);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function select_outlet(id){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {"id" : id, "csrf_name" : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "header/select_outlet",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#modal_outlet").modal("hide");
			$("#span_outlet_id").text(result.result);
			if (result.result < 1){
				swal({
					type : 'warning',
					title : "No Available Outlets",
					text : "Please create outlet"
				})
			}
			all_access();
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function all_access(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "header/all_access",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			if (data.result == "1"){
				for (var i = 1; i <= 8; i++) {
					$("#menu_"+i).removeClass("disabled");
				}
			}else{
				var access = data.access;
				for (var i = 0; i < access.length; i++) {
					$("#menu_"+ access[i].module_id).removeClass("disabled");
				}
			}

			// $("#menu_7").addClass("disabled");
		}, error : function(err){
			console.log(err.responseText);
		}
	});	
}

function select_function($sub_module, $function){
    var $module = "";
    
    if ($("#main_menu_module").val() == "8"){
        $module = 8;
    }else{
        $module = $("#menu_module").val();
    }

	window.open(base_url + "app/" + $module + "/" + $sub_module + "/" + $function, "_self");
}

function main_menu($module){
    $("#main_menu_module").val($module);

	if ($module == "1" || $module == "3"){
		if ($("#span_outlet_id").text() == "ALL" || $("#span_outlet_id").text() == ""){
			count_outlet();
		}else{
			menu($module);
		}
	}else{
		if ($module == "7" || $module == "6"){
			if ($("#div-query").is(":visible") == true){
				window.open(base_url, "_self");
			}else{
				if ($module == "6"){
					window.open(base_url + "app/"+$module+"/0/4", "_self");
				}else{					
					window.open(base_url + "app/8/0/6", "_self");
				}
            }
        }else if ($module == "8"){
            if ($("#user_menu").val() == "0"){
                $("#user_modal").modal("show");
                $("#user_modal .modal-dialog").css("max-width", "600px");
                // $("#menu_module").val(8);
            }else{
                menu($module);
            }
		}else{
			menu($module);
		}
	}
}

function menu($module){
	var	csrf_name = $("input[name=csrf_name]").val();
    $("#user_modal").modal("hide");

    $.ajax({
		data : {"module" : $module, "sub_module" : "0", csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "header/roles",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);

			if ($module == "7" || $module == "6"){
				if ($("#div-query").is(":visible") == true){
					window.open(base_url, "_self");
				}else{
					window.open(base_url + "app/"+$module+"/0/4", "_self");
				}
			}else{
				// if (result.count == 1){
				// 	window.open(base_url + "app/"+$module+"/" + result.roles, "_self");
				// }else{
					var account_length = $("#span_account_id").text().length;

					$("#header-menu").text(result.menu);
					$("#menu-content").html(result.roles);
					$("#sales_modal").modal("show");
					$("#Entry").css("background-image", base_url + 'assets/icons/menu_2/entry.png');
					if ($module == "4"){
						$("#sales_modal").css("margin-top", "-10%");
					}else{
						$("#sales_modal").css("margin-top", "3%");						
					}

					if ($module == "5" || $module == "1"){
						if ($(window).width() > 768 && $(window).width() <= 1024){
							$("#sales_modal .modal-dialog").css("max-width", "750px");
						}else{
							$("#sales_modal .modal-dialog").css("max-width", "1000px");
						}
					}else if ( $module == "3"){
						$("#sales_modal .modal-dialog").css("max-width", "600px");
					}else if ($module == "4"){
						$("#sales_modal .modal").css("top", "15%");
						$("#sales_modal .modal-dialog").css("max-width", "900px");
					}else if ($module == "8"){
						if (account_length == "7"){
							$("#menu_config").hide();
							$("#sales_modal .modal-dialog").css("max-width", "800px");
							// $("#sales_modal .modal-dialog").css("max-width", "800px");
						}else{
							$("#menu_config").hide();
							$("#sales_modal .modal-dialog").css("max-width", "800px");
						}
					}else{
						if ($(window).width() <= "768"){
							$(".modal-dialog").css("max-width", "600px");
						}else{
							$(".modal-dialog").css("max-width", "800px");
						}
					}
				// }				
			}
		}, error : function(err){
			console.log(err.responseText);
		}
	});		


}

function product(){
	$("#prod_modal").modal("show");
}

function str_to_num(string){
	return string.replace(/,/g,"");
}

function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function convert_date(str_date){
	var date_string = "";    

	if (str_date != ""){
	    var from = str_date.split("-");
	    var f = new Date(str_date);
	    date_string = ('0' + (f.getMonth()+1)).slice(-2) + "/" + ('0' + f.getDate()).slice(-2) + "/" + f.getFullYear();		
	}else{
		date_string = "";
	}


    return date_string;
}

function report_menu(){
	var main_menu_module = $("#main_menu_module").val();
    var desktopView = $(document).width();

	if($("#div-report-menu").is(":visible")){
		$("#div-report-menu").hide(500);
		if (main_menu_module == 0){
			$(".div-body-menu").show(500);
		}else{
		}
	} else{
		$(".div-body-menu").hide(500);
		$("#div-report-menu").show(500);
	}	

}

