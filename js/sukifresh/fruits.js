$(document).ready(function(){

	div_hide();
	$("#div-fruits").show();

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
		$("#div-fruits-prod").hide();
		$("#div-fruits-prod-list").show();
	});

	$("#btn_cart").click(function(){
		cart();
	});

	$("#btn_cancel").click(function(){
		div_hide();
		$("#div-fruits-prod").show();
	});

	$("#btn_process").click(function(){
		process_order(1);
	});

	$("#btn_continue").click(function(){
		process_order(0);
	});



})

function div_hide(){
	$("#div-fruits").hide();
	$("#div-fruits-prod-list").hide();
	$("#div-fruits-prod").hide();
	$("#div-cart").hide();
}

function fruit(fruit_type){
	div_hide();

	if (fruit_type == 6){
		$("#div-fruits-prod-list").show();
	}else{
		$("#div-fruits").show();
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
	}else if (qty > 50 && qty < 76){
		total = qty * 70;
	}else{
		total = qty * 60;
	}

	console.log(price);
	$("#text-prod-total-price").text($.number(total, 2));

}

function fruit_prod(fruit_type, fruit_prod){
	div_hide();

	var prod_img = "";
	var prod_name = "";
	var prod_price = "";

	prod_name = $(".prod-" + fruit_prod).find(".prod-name").text();
	prod_price = $(".prod-" + fruit_prod).find(".prod-price").text();

	if (fruit_prod == "1"){
		prod_img = base_url + "assets/images/sukifresh/fruits/melons/watermelon.png";
	}else if (fruit_prod == "2"){
		prod_img = base_url + "assets/images/sukifresh/fruits/melons/honeydew.png";
	}else if (fruit_prod == "3"){
		prod_img = base_url + "assets/images/sukifresh/fruits/melons/cantaloupe.png";
	}else if (fruit_prod == "4"){
		prod_img = base_url + "assets/images/sukifresh/fruits/melons/sharlyn.png";
	}else if (fruit_prod == "5"){
		prod_img = base_url + "assets/images/sukifresh/fruits/melons/seedless.png";
	}else if (fruit_prod == "6"){
		prod_img = base_url + "assets/images/sukifresh/fruits/melons/chunks.png";
	}else if (fruit_prod == "7"){
		prod_img = base_url + "assets/images/sukifresh/fruits/melons/spears.png";
	}else if (fruit_prod == "8"){
		prod_img = base_url + "assets/images/sukifresh/fruits/melons/medley.png";
	}else{

	}

	var sd = prod_price.replace(/[^\d.]/g, ''); 
	var prod_price_number = parseInt(sd, 10);


	$("#text-prod-fruit").text(fruit_prod);
	$("#text-prod-name").text(prod_name);
	$("#text-prod-price").text(prod_price);
	$("#text-prod-price-number").text(prod_price_number);
	$("#text-prod-total-price").text($.number(prod_price_number, 2));
	$("#img-prod").attr("src", prod_img);

	$("#div-fruits-prod").show();
}


function cart(){
	div_hide();

	var prod_name = $("#text-prod-name").text();
	var prod_price = $("#text-prod-price").text();
	var prod_price_number = $("#text-prod-price-number").text();
	var prod_total_price = $("#text-prod-total-price").text();
	var prod_qty = $("#qty").val();

	// var sd = prod_price.replace(/[^\d.]/g, ''); 
	// var prod_price_number = parseInt(sd, 10)

	// var prod_total_price = prod_price_number * prod_qty;

	if (prod_qty < 25){
		prod_price_number = prod_price_number;
	}else if (prod_qty > 24 && prod_qty < 51){
		prod_price_number = "80.00";
	}else if (prod_qty > 50 && prod_qty < 76){
		prod_price_number = "70.00";
	}else{
		prod_price_number = "60.00";
	}



	$("#cart-prod-name").text(prod_name);
	$("#cart-prod-qty").text(prod_qty);
	$("#cart-prod-price").text(prod_price_number);
	$("#cart-prod-total-price").text("PHP " + $.number(prod_total_price, 2));
	$("#cart-img-prod").attr("src", $("#img-prod").attr("src"));

	$("#div-cart").show();

}

function process_order(type){

	var prod_type = $("#text-prod-fruit").text();
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
			type : '2',
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















































