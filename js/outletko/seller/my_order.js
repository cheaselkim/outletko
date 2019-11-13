$(document).ready(function(){

	get_billing();
	get_orders();
	$("#div-order-dtls").hide();
	// delivery_type();
	// payment_type();

	$("#div-checkout-details").hide();

	$(".prod_qty").number(true, 0);
	$(".prod_price").number(true, 2);
	$(".prod_total_price").number(true, 2);
	$("#sub_total").number(true, 2);

	// $(".btn_checkout").click(function(){
	// 	$("#div-home").hide();
	// 	$("#div-checkout-details").show();
	// 	get_order_checkout();
	// });

	$("#btn_confirm_order").click(function(){
		swal({
			type : "warning",
			title : "Confrim Order? ",
			text : "Once confirmed, you are no longer allowed to cancel unless the seller cancels the order",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
		}, function(isConfirm){
			if (isConfirm){
				check_confirm_order();
			}
		})
	});

	$("#btn_cancel_order").click(function(){
		cancel_order();
	});

	$("#delivery_type").change(function(){
			$("#sched_date").val("");
			$("#sched_time").val("");
			$("#sched_date").prop("readonly", true);
			$("#sched_time").prop("disabled", true);
			$("#payment_type").prop("disabled", true);

		if ($(this).val() == "1"){
			$("#sched_date").val($.datepicker.formatDate('yy-mm-dd', new Date()));
			$("#sched_date").prop("readonly", false);
			$("#sched_time").prop("disabled", false);
			$("#sched_time").addClass("bg-white");
		}else{
			$("#sched_time").removeClass("bg-white");
			$("#payment_type").prop("disabled", false);
		}

	});

	$(document).on("click", ".btn_plus", function(){
		var val = $(this).val();
		prod_operation(val, "+");
	});


	$(document).on("click", ".btn_minus", function(){
		var val = $(this).val();
		prod_operation(val, "-");
	});

	$(document).on("keyup", ".prod_qty", function(){
		var val = $(this).attr("data-id");
		prod_operation(val, "");
	});

	$("#btn-tab-cart").click(function(){
		$("#div-order-dtls").hide();
		// $("#div-order-dtls").addClass("fade");
/*		$("#div-cart").addClass("active");*/
		$("#div-cart").addClass("show");
		get_orders();
	});

	$("#btn-tab-ongoing").click(function(){
		$("#div-order-dtls").hide();
		// $("#div-order-dtls").addClass("fade");
		// $("#div-ongoing").addClass("active");
		$("#div-ongoing").addClass("show");
		// $("#div-ongoing").tab("show");
		get_ongoing_orders();
	});

	$("#btn-tab-complete").click(function(){
		$("#div-order-dtls").hide();
		// $("#div-order-dtls").addClass("fade");
		// $("#div-complete").addClass("active");
		$("#div-complete").addClass("show");
		get_complete_orders();
	});

	$("#btn-tab-transaction").click(function(){
		$("#div-order-dtls").hide();
		// $("#div-order-dtls").addClass("fade");
		// $("#div-transactions").addClass("active");
		$("#div-transactions").addClass("show");
		get_transactions_orders();
	});

	$("#btn-order-dtls-back").click(function(){
		$("#div-order-dtls").hide();
		// $("#div-order-dtls").addClass("fade");
		var div_no = $("#div-dtls-no").val();

		if (div_no == "1"){
			// $("#div-cart").addClass("active");
			$("#div-cart").addClass("show");
		}else if (div_no == "2"){
			// $("#div-ongoing").addClass("active");
			$("#div-ongoing").addClass("show");
		}else if (div_no == "3"){
			// $("#div-complete").addClass("active");
			$("#div-complete").addClass("show");
		}else if (div_no == "4"){
			// $("#div-transactions").addClass("active");
			$("#div-transactions").addClass("show");
		}

	});

	$("#bill_city").autocomplete({
		focus: function(event, ui){
			$("#bill_province").val(ui.item.province);
		},
		select: function(event, ui){
			$("#bill_province").val(ui.item.province);
			$("#bill_city").attr("data-id", ui.item.city_id);
			$("#bill_province").attr("data-id", ui.item.prov_id);
		},
		source: function(req, add){
		    var csrf_name = $("input[name=csrf_name]").val();
			var city = $("#bill_city").val();
        $.ajax({
          url: base_url + "Outletko_profile/search_city/", 
          dataType: "JSON",
          type: "POST",
          data: {'city' : city, csrf_name : csrf_name},
          success: function(data){
            $("input[name=csrf_name]").val(data.token);
            if(data.response =="true"){
                add(data.result);
            }else{
              $("#bill_city").val("");
              $("#bill_province").val("");
              $("#bill_city").attr("data-id", "0");
              $("#bill_province").attr("data-id", "0");
              add('');
            }
          }, error: function(err){
            console.log("Error: " + err.responseText);
          }
        });
		}
	});


});

function get_billing(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Buyer/get_billing",
		success : function(result){
			var data = result.result[0];
			$("input[name=csrf_name]").val(result.token);

			$("#bill_address").val(data.address);
			$("#bill_barangay").val(data.barangay);
			$("#bill_city").val(data.city_desc);
			$("#bill_province").val(data.province_desc);
			$("#bill_city").attr("data-id", data.citry);
			$("#bill_province").attr("data-id", data.province);
			$("#bill_mobile").val(data.mobile_no);
			$("#bill_email").val(data.email);

		}, error : function(err){
			console.log(err.responseText);
		}
	})

}


function delivery_type(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Buyer/delivery_type",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);

			for (var i = 0; i < result.result.length; i++) {
				$("#delivery_type").append("<option value='"+result.result[i].id+"'>"+result.result[i].delivery_type+"</option>");
			}

		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function payment_type(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Buyer/payment_type",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			for (var i = 0; i < result.result.length; i++) {
				$("#payment_type").append("<option value='"+result.result[i].id+"'>"+result.result[i].payment_type+"</option>");
			}
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function prod_operation(val, oper){

	var prod_qty = 0;
	var total_price = 0;
	var price = $("#prod_price_"+val).text().replace(/\,/g,'');

	if (oper == "+"){
		prod_qty = Number($("#prod_qty_"+val).val()) + 1;
	}else if (oper == "-"){
		prod_qty = Number($("#prod_qty_"+val).val()) - 1;		
	}else{
		prod_qty = Number($("#prod_qty_"+val).val());
	}

	total_price = prod_qty * price;

	$("#prod_qty_"+val).val(prod_qty);
	$("#prod_total_price_" + val).text($.number(total_price, 2));

}

function get_orders(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Buyer/get_orders",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-list-prod").html(result.result);
			$(".prod_qty").number(true, 0);
		}, error : function(err){
			console.log(err.responseText);
		}	
	})
}

function get_ongoing_orders(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/get_ongoing_orders",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-list-ongoing").html(result.result);
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function get_complete_orders(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/get_complete_orders",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-list-complete").html(result.result)
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function get_transactions_orders(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/get_transactions_orders",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-list-transactions").html(result.result);
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function view_order(type, id){

	var csrf_name = $("input[name=csrf_name]").val();

	if (type == "1"){
		// $("#div-cart").removeClass("active");
		$("#div-cart").removeClass("show");
	}else if (type == "2"){
		// $("#div-ongoing").removeClass("active");
		$("#div-ongoing").removeClass("show");
	}else if (type == "3"){
		// $("#div-complete").removeClass("active");
		$("#div-complete").removeClass("show");
	}else if (type == "4"){
		// $("#div-transactions").removeClass("active");
		$("#div-transactions").removeClass("show");
	}

	$("#div-dtls-no").val(type);

	$("#div-order-dtls").show("slow");
	// $("#div-order-dtls").addClass("show");


	$.ajax({
		data : {csrf_name : csrf_name, id : id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/view_order",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);

			var data = result.result;
			var products = result.products;
			var status = "";

			if (data[0].status == "1"){
				status = "Pending Acknowledge";
			}else if (data[0].status == "2"){
				status = "Acknowledge";
			}else if (data[0].status == "3"){
				status = "Delivery";
			}else if (data[0].status == "4"){
				status = "Completed Delivery";
			}else if (data[0].status == "0"){
				status = "Cancelled Order";
			}else{
				status = "";
			}

			$("#vw_order_no").text(data[0].order_no);
			$("#vw_order_date").text(data[0].order_date);
			$("#vw_outlet").text(data[0].account_name);
			$("#vw_status").text(status);

			$("#vw_delivery_type").text(data[0].delivery_type_desc);
			$("#vw_payment_type").text(data[0].payment_type_desc);
			$("#vw_schedule_date").text(data[0].scheduled_date);
			$("#vw_scheduled_time").text(data[0].scheduled_time);
			$("#vw_courier").text(data[0].courier);
			$("#vw_track_no").text(data[0].track_no);

			$("#vw_fullname").text(data[0].buyer_name);
			$("#vw_contact_person").text(data[0].contact_person);
			$("#vw_mobile").text(data[0].contact_no);
			$("#vw_email").text(data[0].email);

			$("#vw_address").text(data[0].delivery_address);
			$("#vw_barangay").text(data[0].barangay);
			$("#vw_city").text(data[0].city_desc);
			$("#vw_province").text(data[0].province_desc);

			$("#vw_notes").val(data[0].notes);

			$("#vw_sub_total").text($.number(data[0].sub_total, 2));
			$("#vw_shipping_fee").text($.number(data[0].shipping_fee, 2));
			$("#vw_total_amount").text($.number(data[0].total_amount, 2));

			for (var i = 0; i < products.length; i++) {

				$("#tbl-vw-products").append("<tr><td>" + products[i].product_name + 
					"</td><td>" + $.number(products[i].prod_qty, 0) + 					
					"</td><td>" + $.number(products[i].prod_price, 2) + 
					"</td><td>" + $.number((products[i].prod_qty * products[i].prod_price), 2) + 
					"</td></tr>");

			}


		}, error : function(err){
			console.log(err.responseText);
		}
	})

}


function remove_item(id){

	swal({
		type : "warning",
		title : "Delete Permanently?",
		text : "This will delete your item permanently",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes",
		cancelButtonText: "No",
	}, function(isConfirm){
		if (isConfirm){
			delete_item(id);
		}
	})

}

function delete_item(id){
	var csrf_name = $("input[name=csrf_name]").val();
	$("#div-list-prod").empty();

	$.ajax({
		data : {id : id, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/delete_item",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#order_no").text(result.result);
			get_orders();
			// location.reload();			
		}, error : function(err){	
			console.log(err.responseText);
		}
	})

}


function get_order_checkout(div_id){
	var csrf_name = $("input[name=csrf_name]").val();
	var shipping_fee = 0;
	// var prod_id = [];
	var prod_id = [];
	var products = [];
    $.each($("#div_prod_"+div_id+" input[type='checkbox']:checked"), function(){
    	// prod_id = $(this).val();
        prod_id.push($(this).val());
        var id = $(this).attr("data-id");
        var sub = {
        	"prod_id" : $(this).val(),
        	"prod_qty" : $("#prod_qty_"+id).val()
        }
        products.push(sub);
    });	


	if (products.length == 0){
		swal({
			type : "warning",
			title : "No product selected"
		})
	}else{

		$("#div-home").hide();
		$("#div-checkout-details").show("slow");

	    $.ajax({
	    	data : {csrf_name : csrf_name, prod_id : prod_id},
	    	type : "POST",
	    	dataType : "JSON",
	    	url : base_url + "Buyer/get_order_checkout",
	    	success : function(result){
	    		$("#seller_id").val(result.seller_id);
				$("input[name=csrf_name]").val(result.token);

				for (var i = 0; i < result.payment_type.length; i++) {
					$("#payment_type").append("<option value='"+result.payment_type[i].id+"'>"+result.payment_type[i].payment_type+"</option>");
				}

				for (var i = 0; i < result.delivery_type.length; i++) {
					$("#delivery_type").append("<option value='"+result.delivery_type[i].id+"'>"+result.delivery_type[i].delivery_type+"</option>");
				}

				console.log(result.sched_time);
				console.log(Number(result.sched_time[0].start_time.substring(0, 2)));
				console.log(result.sched_time[0].start_time.substring(0,5));
				console.log(result.sched_time[0].end_time.substring(0,5));

				var sched_day = "";

				$('#sched_time').timepicker({
					// defaultTime : Number(result.sched_time[0].start_time.substring(0, 2)),
					timeFormat: 'h:mm p',
					interval: 30,
					dynamic: false,
					dropdown: true,
					scrollbar: true,			
					minTime : result.sched_time[0].start_time.substring(0, 5),
					maxTime : result.sched_time[0].end_time.substring(0,5)
				});
							  
				sched_day += (result.sched_time[0].mon == "1" ? "M, " : "");
				sched_day += (result.sched_time[0].tue == "1" ? "T, " : "");
				sched_day += (result.sched_time[0].wed == "1" ? "W, " : "");
				sched_day += (result.sched_time[0].thu == "1" ? "TH, " : "");
				sched_day += (result.sched_time[0].fri == "1" ? "F, " : "");
				sched_day += (result.sched_time[0].sat == "1" ? "S, " : "");
				sched_day += (result.sched_time[0].sun == "1" ? "SU " : "");

				$("#sched_day").text(sched_day);

				$("#payment_type").prop("selectedIndex", 1);
				$("#delivery_type").prop("selectedIndex", 3);
				$("#payment_type").prop("disabled", false);

				$("#comp_name").text(result.result[0].account_name);

				var prod_dtls = result.result;
				var sub_total = 0;
				var total_items = 0;
				var prod_qty = 0;
				var shipping_fee_w_mm = 0;
				var shipping_fee_o_mm = 0;

				for (var i = 0; i < prod_dtls.length; i++) {
					total_items++;

					for (var a = 0; a < products.length; a++) {
						if (prod_dtls[i].prod_id == products[a].prod_id){
							prod_qty = products[a].prod_qty;
							console.log(products[a].prod_qty);
						}
					}

					$("#prod_dtls tbody").append("<tr><td>" + prod_dtls[i].product_name + 
					"</td><td class='text-right prod_qty'>" + $.number(prod_qty) + 
					"</td><td class='text-right prod_unit_price'>" + $.number(prod_dtls[i].product_unit_price, 2) + 
					"</td><td class='text-right prod_total_price'>" + $.number((prod_qty * prod_dtls[i].product_unit_price), 2) + 
					"</td><td class='text-right prod_id' hidden>" + prod_dtls[i].id + 
					"</td></tr>");

					shipping_fee_w_mm += prod_dtls[i].ship_fee_w_mm;
					shipping_fee_o_mm += prod_dtls[i].ship_fee_o_mm;

					sub_total += (prod_qty * prod_dtls[i].product_unit_price);
				}

				if ($("#bill_province").attr("data-id") == "52"){
					shipping_fee = shipping_fee_w_mm;
				}else{	
					shipping_fee = shipping_fee_o_mm;
				}

				$("#shipping_fee").text($.number(shipping_fee, 2));
				$("#shipping_fee").attr("data-id", shipping_fee);			
				$("#sub_total").text($.number(sub_total, 2));
				$("#sub_total").attr("data-id", sub_total);
				$("#total_amount").text("PHP " + $.number((Number(sub_total) + Number(shipping_fee)), 2));
				$("#total_amount").attr("data-id", (Number(sub_total) + Number(shipping_fee)));
				$("#comp_total_items").text($.number(total_items));
				$("#comp_total_amount").text($.number(sub_total, 2));

	    	}, error : function(err){
	    		console.log(err.responseText);
	    	}
	    })


	}


}

function cancel_order(){
	$("#div-checkout-details").hide();

	$("#prod_dtls tbody").empty();
	$("#shipping_fee").text("0.00");
	$("#shipping_fee").attr("data-id", 0);			
	$("#sub_total").text("0.00");
	$("#sub_total").attr("data-id", 0);
	$("#total_amount").text("PHP 0.00");
	$("#total_amount").attr("data-id", 0);
	$("#comp_total_items").text("0.00");
	$("#comp_total_amount").text("0.00");

	$("#div-home").show("slow");

}

function check_confirm_order(){

	var bill_name = $("#bill_name").val();
	var bill_address = $("#bill_address").val();
	var bill_city = $("#bill_city").attr("data-id");
	var bill_province = $("#bill_province").attr("data-id");
	var bill_mobile = $("#bill_mobile").val();

	if (jQuery.trim(bill_name).length <= 0 || jQuery.trim(bill_address).length <= 0 || jQuery.trim(bill_city).length <= 0 || jQuery.trim(bill_province).length <= 0  || jQuery.trim(bill_mobile) <=0 ){
		swal({
			type : "warning",
			title : "Please input all required fields"
		})
	}else{
		confirm_order();
	}

}

function confirm_order(){

	var csrf_name = $("input[name=csrf_name]").val();
	var bill_name = $("#bill_name").val();
	var bill_address = $("#bill_address").val();
	var bill_barangay = $("#bill_barangay").val();
	var bill_city = $("#bill_city").attr("data-id");
	var bill_province = $("#bill_province").attr("data-id");
	var bill_mobile = $("#bill_mobile").val();
	var bill_email = $("#bill_email").val();
	var bill_contact = $("#bill_contact").val();
	var bill_notes = $("#bill_notes").val();

	var delivery_type = $("#delivery_type").val();
	var sched_time = $("#sched_time").val();
	var sched_date = $("#sched_date").val();
	var payment_type = $("#payment_type").val();

	var shipping_fee = $("#shipping_fee").attr("data-id");
	var sub_total = $("#sub_total").attr("data-id");
	var total_amount = $("#total_amount").attr("data-id");

	var prod_id = [];
	var sub = "";
    // $.each($("input[type='checkbox']:checked"), function(){
    // 	sub = {
    // 		"prod_id" : $(this).val()
    // 	};
	   //  prod_id.push(sub);
    // });	

    $("#prod_dtls tbody tr").each(function(row, tr){
    	sub = {
    		"prod_id" : $(tr).find(".prod_id").text(),
    		"prod_price" : $(tr).find(".prod_unit_price").text().replace(/,/g, ''),
    		"prod_total_price" : $(tr).find(".prod_total_price").text().replace(/,/g, '')
    	}
    	prod_id.push(sub);
    })

    var seller_id = $("#seller_id").val();

    console.log(prod_id);

    var data = {
    	"delivery_address" : bill_address,
    	"seller_id" : seller_id,
    	"barangay" : bill_barangay,
    	"city" : bill_city,
    	"province" : bill_province,
    	"contact_no" : bill_mobile,
    	"contact_name" : bill_contact,
    	"notes" : bill_notes,
    	"payment_type" : payment_type,
    	"delivery_type" : delivery_type,
    	"scheduled_date" : sched_date,
    	"scheduled_time" : sched_time,
    	"shipping_fee" : shipping_fee,
    	"sub_total" : sub_total,
    	"total_amount" : total_amount
    }

    $.ajax({
    	data : {csrf_name : csrf_name, prod_id : prod_id, data : data},
    	type : "POST",
    	dataType : "JSON",
    	url : base_url + "Buyer/confirm_order",
    	beforeSend : function(){
    		swal({
    			title : "Saving....",
				showCancelButton: false, 
				showConfirmButton: false
    		})
    	},success : function(result){
			$("input[name=csrf_name]").val(result.token);
			swal({
				type : "success",
				title : "Confirmed Order"
			}, function(){
				location.reload();
			})
    	}, error : function(err){
    		console.log(err.responseText);
    	}
    	
    })

}

function complete_order(id){

	var csrf_name = $("input[name=csrf_name]").val();


	swal({
		type : "warning",
		title : "Complete Order? ",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes",
		cancelButtonText: "No",
	}, function(isConfirm){
		if (isConfirm){

			$.ajax({
				data : {csrf_name : csrf_name, id : id},
				type : "POST",
				dataType : "JSON",
				url : base_url + "Buyer/complete_order",
				success : function(result){
					$("input[name=csrf_name]").val(result.token);
					swal({
						type : "success",
						title : "Successfully Completed the order"
					}, function(){
						get_complete_orders();
					})
				}, error : function(err){
					console.log(err.responseText);
				}
			})

		}
	})
}