$(document).ready(function(){

	div_hide();
	$("#div-menu").show();

	$("#btn-order-back").click(function(){
		div_hide();
		$("#div-menu").show();
	});

});

function div_hide(){
	$("#div-menu").hide();
	$("#div-order").hide();
	$("#div-sales").hide();
	$("#div-account").hide();
	$("#div-password").hide();
}

function main_menu(type){

	div_hide();

	if (type == "1"){
		$("#div-order").show();
	}else if (type == "2"){
		$("#div-sales").show();
	}else if (type == "3"){
		$("#div-account").show();
	}else if (type == "4"){
		$("#div-password").show();
	}else{

	}

}