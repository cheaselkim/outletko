$(document).ready(function(){

	get_product();

});

function get_product(){

	var csrf_name = $("input[name='csrf_name']").val();

	$.ajax({
		type : "GET",
		data : {csrf_name : csrf_name},
		dataType : "JSON",
		url : base_url + "Sukifresh/get_product",
		success : function(result){
			console.log(result);

			$("input[name='csrf_name']").val(result.token);

			var veg_prod = result.prod_type;
			var prod_img = "";

			var products = result.products;
			var count = result.count;
			var total = 0;

			for (var i = 0; i < count; i++) {

				if (products[i].type == "1"){
					if (products[i].prod_type == "1"){
						prod_img = base_url + "assets/images/sukifresh/veg/cabbage/napa.png";
					}else if (products[i].prod_type == "2"){
						prod_img = base_url + "assets/images/sukifresh/veg/cabbage/green.png";
					}else if (products[i].prod_type == "3"){
						prod_img = base_url + "assets/images/sukifresh/veg/cabbage/red.png";
					}else if (products[i].prod_type == "4"){
						prod_img = base_url + "assets/images/sukifresh/veg/cabbage/shredded.png";
					}else{

					}
				}else{
					if (products[i].prod_type == "1"){
						prod_img = base_url + "assets/images/sukifresh/fruits/melons/watermelon.png";
					}else if (products[i].prod_type == "2"){
						prod_img = base_url + "assets/images/sukifresh/fruits/melons/honeydew.png";
					}else if (products[i].prod_type == "3"){
						prod_img = base_url + "assets/images/sukifresh/fruits/melons/cantaloupe.png";
					}else if (products[i].prod_type == "4"){
						prod_img = base_url + "assets/images/sukifresh/fruits/melons/sharlyn.png";
					}else if (products[i].prod_type == "5"){
						prod_img = base_url + "assets/images/sukifresh/fruits/melons/seedless.png";
					}else if (products[i].prod_type == "6"){
						prod_img = base_url + "assets/images/sukifresh/fruits/melons/chunks.png";
					}else if (products[i].prod_type == "7"){
						prod_img = base_url + "assets/images/sukifresh/fruits/melons/spears.png";
					}else if (products[i].prod_type == "8"){
						prod_img = base_url + "assets/images/sukifresh/fruits/melons/medley.png";
					}else{

					}
				}

				$("#tbl-products tbody").append("<tr><td> <img src='"+prod_img+"' class='img-prod-account'>&nbsp;&nbsp;" + products[i].prod_name +
					"</td><td class='text-center pt-4'>" + $.number(products[i].prod_qty, 0) + 
					"</td><td class='text-right pt-4'>" + $.number(products[i].prod_price, 2) + 
					"</td><td class='text-right pt-4'>" + $.number(products[i].prod_total_price, 2) + 
					"</td></tr>");

				total += Number(products[i].prod_total_price);

			}

			$("#hdr_total").text($.number(total,2));
			$("#order_total").text($.number(total,2));
			$("#tbl-total").text($.number(total,2));
			// $("#prod-name").text(result.prod_name);
			// $("#prod-qty").text($.number(result.prod_qty));
			// $("#prod-price").text($.number(result.prod_price, 2));
			// $("#prod-total-price").text($.number(result.prod_total_price, 2));
			// $("#prod-img").attr("src", prod_img);

		}, error : function(err){
			console.log(err.responseText);
		}
	})

}