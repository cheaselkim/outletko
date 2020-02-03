$(document).ready(function(){

	list_menu_hide();
	menu_hide();
	header_menu();

	$("#main_menu").show();
	$("#div-main-menu").show();
	$("#div-header-menu").hide();

})

function header_menu(){

	$(".list-menu").css("color", "white");

}

function list_menu_hide(){

	$("#main_menu").hide();
	$("#sales_menu").hide();
	$("#master_data_menu").hide();

}

function menu_hide(){
	$("#div-main-menu").hide();
	$("#div-sales-menu").hide();
	$("#div-master-data-menu").hide();
}

function main_menu(menu_type){

	var div_menu = "";
	var list_menu = "";
	var hdr_menu = "";

	if (menu_type == "1"){
		div_menu = "div-sales-menu";
		list_menu = "sales_menu";
		hdr_menu = "list-sales-admin";
		$("#div-header-menu").show();
	}else if (menu_type == "2"){
		div_menu = "div-main-menu";
		list_menu = "main_menu";
	}else if (menu_type == "3"){
		div_menu = "div-main-menu";
		list_menu = "main_menu";
	}else if (menu_type == "4"){
		div_menu = "div-main-menu";
		list_menu = "main_menu";
	}else if (menu_type == "5"){
		div_menu = "div-main-menu";
		list_menu = "main_menu";
	}else if (menu_type == "6"){
		div_menu = "div-master-data-menu";
		list_menu = "master_data_menu";
		hdr_menu = "list-master-data";
		$("#div-header-menu").show();
	}else if (menu_type == "7"){
		div_menu = "div-main-menu";
		list_menu = "main_menu";
	}else if (menu_type == "8"){
		div_menu = "div-main-menu";
		list_menu = "main_menu";
	}

	menu_hide();
	list_menu_hide();
	header_menu();
	$("#" + list_menu).show();
	$("#" + div_menu).show();
	$("." + hdr_menu).css('color', 'yellow');
}