$(document).ready(function(){

	div_hide();
	$("#div-veg").show();
	// $("#div-veg-prod-list").show();
	// $("#div-veg-prod").show();
	// $("#div-cart").show();

	$("#qty").number(true, 0);

	$("#btn_add").click(function(){
		var val = Number($("#qty").val()) + 1;
		$("#qty").val(val);
		compute_total_amount();
	});

	$("#btn_minus").click(function(){
		var val = Number($("#qty").val()) - 1;
		if (val == 0){
			val = 1;
		}	
		$("#qty").val(val);
		compute_total_amount();
	});

	$("#qty").keyup(function(){
		if ($(this).val() == "0"){
			$("#qty").val("1");
		}
		compute_total_amount();
	});

	$("#btn_back").click(function(){
		$("#div-veg-prod").hide();
		$("#div-veg-prod-list").show();
	});

	$("#btn_cart").click(function(){
		cart();
	});

	$("#btn_cancel").click(function(){
		div_hide();
		$("#div-veg-prod").show();
	});

	$("#btn_process").click(function(){
		process_order(1);
	});

	$("#btn_continue").click(function(){
		process_order(0);
	});


})

function div_hide(){
	$("#div-veg").hide();
	$("#div-veg-prod-list").hide();
	$("#div-veg-prod").hide();
	$("#div-cart").hide();
}

function veg(veg_type){
	div_hide();

	if (veg_type == 4){
		$("#div-veg-prod-list").show();
	}else{
		$("#div-veg").show();
	}

}

function compute_total_amount(){

	var price = $("#text-prod-price-number").text();
	var qty = $("#qty").val();
	var total = 0;


	if (qty < 25){
		total = qty * price;
	}else if (qty > 24 && qty < 51){
		total = qty * 80;
		price = 80;
	}else if (qty > 50 && qty < 76){
		total = qty * 70;
		price = 70;
	}else{
		total = qty * 60;
		price = 60;
	}

	// console.log(price);
	$("#text-prod-total-price").text($.number(total, 2));

}


function veg_prod(veg_type, veg_prod){
	div_hide();

	var prod_img = "";
	var prod_name = "";
	var prod_price = "";

	prod_name = $(".prod-" + veg_prod).find(".prod-name").text();
	prod_price = $(".prod-" + veg_prod).find(".prod-price").text();

	if (veg_prod == "1"){
		prod_img = base_url + "assets/images/sukifresh/veg/cabbage/napa_cabbage.png";
	}else if (veg_prod == "2"){
		prod_img = base_url + "assets/images/sukifresh/veg/cabbage/green_cabbage.png";
	}else if (veg_prod == "3"){
		prod_img = base_url + "assets/images/sukifresh/veg/cabbage/red_cabbage.png";
	}else if (veg_prod == "4"){
		prod_img = base_url + "assets/images/sukifresh/veg/cabbage/shredded_cabbage.png";
	}else{

	}

	var sd = prod_price.replace(/[^\d.]/g, ''); 
	var prod_price_number = parseInt(sd, 10);


	$("#text-prod-veg").text(veg_prod);
	$("#text-prod-name").text(prod_name);
	$("#text-prod-price").text(prod_price);
	$("#text-prod-total-price").text($.number(prod_price_number, 2));
	$("#text-prod-price-number").text(prod_price_number);
	$("#img-prod").attr("src", prod_img);

	$("#div-veg-prod").show();
}


function cart(){
	div_hide();

	var prod_name = $("#text-prod-name").text();
	var prod_price = $("#text-prod-price").text();
	var prod_price_number = $("#text-prod-price-number").text();
	var prod_total_price = $("#text-prod-total-price").text();
	var prod_qty = Number($("#qty").val());
	var qty = $("#qty").val();
	var prod_price_no = 0;

	// var sd = prod_price.replace(/[^\d.]/g, ''); 
	// var prod_price_number = parseInt(sd, 10)

	// var prod_total_price = prod_price_number * prod_qty;

	if (prod_qty < 25){
		prod_price_number = prod_price_number;
	}else if (prod_qty > 24 && prod_qty < 51){
		prod_price_number = 80;
	}else if (prod_qty > 50 && prod_qty < 76){
		prod_price_number = 70;
	}else{
		prod_price_number = 60;
	}

	console.log(qty);
	console.log("price no " + prod_price_number);

	$("#cart-prod-name").text(prod_name);
	$("#cart-prod-qty").text(prod_qty);
	$("#cart-prod-price").text("PHP " + $.number(prod_price_number, 2) + "/kg");
	$("#cart-prod-total-price").text("PHP " + prod_total_price);
	$("#cart-img-prod").attr("src", $("#img-prod").attr("src"));

	$("#div-cart").show();

}

function process_order(type){

	var prod_type = $("#text-prod-veg").text();
	var prod_name = $("#text-prod-name").text();
	var prod_price = $("#cart-prod-price").text();
	var prod_total_price = $("#text-prod-total-price").text();
	var prod_qty = $("#qty").val();


	var sd = prod_price.replace(/[^\d.]/g, ''); 
	var prod_price_number = parseInt(sd, 10)

	var sd2 = prod_total_price.replace(/[^\d.]/g, '');
	var prod_total_price_number = parseInt(sd2, 10);

	var csrf_name = $("input[name='csrf_name']").val();

	$.ajax({
		data : {
			type : '1',
			csrf_name : csrf_name,
			prod_type : prod_type,
			prod_name : prod_name,
			prod_qty : prod_qty,
			prod_price : prod_price_number,
			prod_total_price : prod_total_price_number
		}, 
		type : "POST",
		dataType : "JSON",
		url : base_url + "Sukifresh/process_order",
		success : function(result){
			$("#input[name='csrf_name']").val(result.csrf_name);

			console.log(result);

			if (type == "1"){
				if (result.login == "1"){
					window.open(base_url + "sukifresh/myaccount", "_self");
				}else{
					window.open(base_url + "sukifresh/account", "_self");
				}
			}else{
				window.open(base_url+"sukifresh", "_self");
			}

		}, error : function(err){
			console.log(err.responseText);
		}
	})

}























