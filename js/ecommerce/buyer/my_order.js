$(document).ready(function(){

	get_billing();
	get_orders();
	// bank_list();
	// remittance_list();
	// $("#div-home").hide();
	$("#div-order-dtls").hide();
	$("#div-checkout-details").hide();
	$("#div-order-summary").hide();
	$("#div-order-confirm").hide();
	// delivery_type();
	// payment_type();


	$("#div-bank-list").hide();
	$("#div-remittance-list").hide();
	$("#div-remittance-payment").hide();
	$("#div-bank-payment").hide();

	$(".prod_qty").number(true, 0);
	$(".prod_price").number(true, 2);
	$(".prod_total_price").number(true, 2);
	$("#sub_total").number(true, 2);

	// $(".btn_checkout").click(function(){
	// 	$("#div-home").hide();
	// 	$("#div-checkout-details").show();
	// 	get_order_checkout();
	// });

	// disabled datepicker
	// $("#datepicker").datepicker().datepicker('disable');

	$(function(){
		$('#datepicker').datepicker({
		  inline: true,
		  showOtherMonths: true,
		  dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
		  changeMonth: true,
		  changeYear : true
		});
	  });

	$("#payment_type").change(function(){
		$("#div-bank-list").hide();
		$("#div-remittance-list").hide();
		if ($(this).val() == "5"){
			$("#div-bank-list").show();			
		}else if ($(this).val() == "6"){
			$("#div-remittance-list").show();
		}
	});

	$("#btn_confirm_order").click(function(){
		confirm_order();
	});

	$("#btn_cancel_order").click(function(){
		cancel_order();
	});

	$("#btn_cancel_place").click(function(){
		cancel_order();
	});

	$("#btn_order_payment").click(function(){
		$("#div-home").hide();
		$("#div-order-confirm").hide();
		$("#div-checkout-details").show("slow");
		// $("#div-order-summary").show("slow");
	});

	$("#btn_confirm_order_2").click(function(){
		$("#oc-payment-method").val($("#summ-payment-method").text());
		$("#div-order-summary").hide();
		$("#div-order-confirm").show("slow");
	});

	$("#btn_cancel_place_2").click(function(){
		$("#div-order-confirm").hide();
		cancel_order();
	});

	$("#btn_place_order").click(function(){
		swal({
			type : "warning",
			title : "Place your Order? ",
			text : "Once confirmed, you are no longer allowed to cancel unless the seller cancels the order",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
		}, function(isConfirm){
			if (isConfirm){
                setTimeout(function(){ 
                    check_place_order();
                }, 500);				
			}
		})

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
			$("#bill_province").attr("data-island", ui.item.island_group);
			// get_order_checkout($("#div_id").val());
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
			  $("#bill_province").attr("data-island", "0");
              add('');
            }
          }, error: function(err){
            console.log("Error: " + err.responseText);
          }
        });
		}
	});

	// $('#btn_save_delivery_address').click(function(){
	// 	check_delivery_address();
	// });

	// $("#btn_save_delivery_details").click(function(){
	// 	check_delivery_details();
	// });

	// $("#btn_payment_type").click(function(){
	// 	check_payment_type();
	// });

	$("#summ-payment-type-list").change(function(){
		var payment_type = $("#payment_type_id").val();
		$("#div-bank-payment").hide();
		$("#div-remittance-payment").hide();
		$("#summ-payment-method").text($("#summ-payment-type-list :selected").text());
		if (payment_type == "1"){
			// $("#div-remittance-payment").show();
			// get_remittance();
		}else if (payment_type == "5"){
			$("#div-bank-payment").show();
			get_bank();
			get_remittance();
		}else if (payment_type == "6"){
			$("#div-remittance-payment").show();
			get_remittance();
		}
	});

	$("#btn-modal-delivery").click(function(){
		get_courier();
	});

	$("#delivery_type").change(function(){
		if ($(this).val() == "3"){
			$("#div-courier").show();
		}else{
			$("#div-courier").hide();
		}
	});
	
	$("#courier").change(function(){
		get_courier();
	});

});

function bank_list(){
	var csrf_name = $("input[name=csrf_name]").val();
	var id = $("#seller_id").val();

	$.ajax({
		data : {csrf_name : csrf_name, id : id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/bank_list",
		success : function(result){
			$("input[name='csrf_name']").val(result.token);
			for (var i = 0; i < result.result.length; i++) {
				$("#summ-payment-type-list").append("<option value='"+result.result[i].id+"'> Pay via "+result.result[i].bank_name+"</option>");
				// $("#bank_list").append("<option value='"+result.result[i].id+"'> Pay via "+result.result[i].bank_name+"</option>");
			}
			get_bank();
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function remittance_list(){
	var csrf_name = $("input[name=csrf_name]").val();
	var id = $("#seller_id").val();
	// console.log("id " + id);

	$.ajax({
		data : {csrf_name : csrf_name, id : id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/remittance_list",
		success : function(result){
			$("input[name='csrf_name']").val(result.token);
			for (var i = 0; i < result.result.length; i++) {
				$("#summ-payment-type-list").append("<option value='"+result.result[i].id+"'>Pay via "+result.result[i].name+"</option>");
				$("#remittance_list").append("<option value='"+result.result[i].id+"'>Pay via "+result.result[i].name+"</option>");
			}
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

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
            if (result.result.length > 0){
                $("#bill_address").val(data.address);
                $("#bill_barangay").val(data.barangay);
                $("#bill_city").val(data.city_desc);
                $("#bill_province").val(data.province_desc);
                $("#bill_city").attr("data-id", data.city);
                $("#bill_province").attr("data-id", data.province);
                $("#bill_province").attr("data-island", data.island_group);
                $("#bill_contact").val(data.contact_person);
                $("#bill_zip").val(data.zip_code);
                $("#bill_phone").val(data.phone_no);
                $("#bill_mobile").val(data.mobile_no);
                $("#bill_email").val(data.email);    
            }
		}, error : function(err){
			console.log(err.status);
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

			// for (var i = 0; i < result.result.length; i++) {
			// 	$("#delivery_type").append("<option value='"+result.result[i].id+"'>"+result.result[i].delivery_type+"</option>");
			// }

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

function courier(){
	var id = $("#seller_id").val();
	var csrf_name = $("input[name=csrf_name]").val();
	var total_weight = "";
	$("#courier").empty();


	$("#prod_dtls tbody").each(function(row, tr){
		var weight = $(tr).find(".prod_weight").text();
		var qty = $(tr).find(".prod_qty").text();
		var weight_qty = weight * qty;

		total_weight += weight_qty;
	})

	$.ajax({
		data : {id : id, csrf_name : csrf_name, total_weight : total_weight},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/courier",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#courier").empty();

			for (var i = 0; i < result.result.length; i++) {
				$("#courier").append("<option value='"+result.result[i].id+"'>"+result.result[i].courier+"</option>");
			}

			get_courier();

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

	if (prod_qty == 0){
		prod_qty = 1;
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
            $("#order_no").text(result.order_no);
            $("#total-cart").text($.number(result.cart_total, 2));
            $("#total-cart-2").text($.number(result.cart_total, 2));
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

function payment_selected(id){

	$("#summ-payment-type-list").empty();

	if (id == "5"){
		bank_list();
	}else if (id == "6"){
		remittance_list();
	}

    $(".div-payment").css("background-color", "rgb(0, 128, 0, 0.2)");
	$("#payment_type_id").val(id);
	$("#payment_type_id").attr("data-name", $("#div-modal-payment-type-" + id).find("span").text());
	$(".div-modal-payment-type").css("background", "white");
	$('#div-modal-payment-type-'+id).css("background", "yellowgreen");
}

function get_order_checkout(div_id){
	$("#div_id").val(div_id);

	$("#div-payment").empty();

	var csrf_name = $("input[name=csrf_name]").val();
	var shipping_fee = "";
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
	    		// console.log(result.seller_id);
	    		$("#seller_id").val(result.seller_id);
				$("input[name=csrf_name]").val(result.token);
				$("#delivery_type").empty();
				var img_src = "";

				$("#datepicker").attr("data-deldate", result.cust_del_date[0].del_date);

				if (result.cust_del_date[0].del_date == "1"){
					$('#datepicker').datepicker('enable');
				}else{
					$('#datepicker').datepicker('disable');
				}

				if (result.cust_del_date[0].free_shipping == "1"){
					$("#courier").empty();
					$("#courier").attr("disabled", true);
					$("#courier").append("<option value='0'>Free Delivery</option>");
					$("#delivery_fee").val("0.00");
				}else{
					$("#courier").empty();
					$("#courier").attr("disabled", false);
					courier();
				}

                var font_color = "";

                // console.log(result.payment_type.length);

				for (var i = 0; i < result.payment_type.length; i++) {
					// $("#payment_type").append("<option value='"+result.payment_type[i].id+"'>"+result.payment_type[i].payment_type+"</option>");
					
					if (result.payment_type[i].id == "1"){
                        img_src = base_url + "assets/images/payment_type/cash.png";
                        font_color = "blue";
					}else if (result.payment_type[i].id == "2"){
						img_src = base_url + "assets/images/payment_type/visa.png";
					}else if (result.payment_type[i].id == "3"){
						img_src = base_url + "assets/images/payment_type/visa.png";
					}else if (result.payment_type[i].id == "4"){
						img_src = base_url + "assets/images/payment_type/visa.png";						
					}else if (result.payment_type[i].id == "5"){
                        img_src = base_url + "assets/images/payment_type/bank.png";
                        font_color = "green";
					}else if (result.payment_type[i].id == "6"){
                        img_src = base_url + "assets/images/payment_type/remittance.png";
                        font_color = "orange";
					}else{
						img_src = base_url + "assets/images/payment_type/visa.png";
					}


					$("#div-payment").append(
					"<div class='col-12 col-lg-12 col-md-12 col-sm-12 text-center mt-2 py-3 div-modal-payment-type cursor-pointer' id='div-modal-payment-type-"+result.payment_type[i].id+"' onclick='payment_selected("+result.payment_type[i].id+")' style='border: 1px solid "+font_color+"'>"+
						// "<img class='img-fluid' style='height: 70px;' src='"+img_src+"'>" +
						"<span class='payment-name font-weight-600 font-size-30' style='color: "+font_color+"'>"+result.payment_type[i].payment_type+"</span>" +
					"</div>");

                    if (result.payment_type.length == 1){
                        payment_selected(result.payment_type[i].id);
                    }
				}

				for (var i = 0; i < result.delivery_type.length; i++) {
					$("#delivery_type").append("<option value='"+result.delivery_type[i].id+"'>"+result.delivery_type[i].delivery_type+"</option>");
				}


				// console.log(result.sched_time);
				// console.log(Number(result.sched_time[0].start_time.substring(0, 2)));
				// console.log(result.sched_time[0].start_time.substring(0,5));
				// console.log(result.sched_time[0].end_time.substring(0,5));

				var sched_day = "";
				// console.log(result.sched_time.length);

				if (result.sched_time.length != 0){

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

				}


				$("#sched_day").text(sched_day);

				$("#payment_type").prop("selectedIndex", 1);
				$("#delivery_type").prop("selectedIndex", 3);
				$("#payment_type").prop("disabled", false);

				$("#comp_name").text(result.result[0].account_name);

				var prod_dtls = result.result;
				var img_prod = result.prod_img;
				var prod_img = "";
				var sub_total = 0;
				var total_items = 0;
				var prod_qty = 0;
				var shipping_fee_w_mm = 0;
				var shipping_fee_o_mm = 0;
				var prod_id = "";

				for (var i = 0; i < prod_dtls.length; i++) {
					total_items++;
					prod_id = prod_dtls[i].prod_id;

					for (var a = 0; a < products.length; a++) {
						if (prod_dtls[i].prod_id == products[a].prod_id){
							prod_qty = products[a].prod_qty;
							// console.log(products[a].prod_qty);
						}
					}

					for (var b = 0; b < img_prod.length; b++) {
						if (prod_id == img_prod[i].prod_id){
							prod_img = img_prod[i].prod_img;
						}
					}
                    prod_img = base_url + "images/products/" + prod_img;
                    var img_width = "";
                    
                    if ($(document).width() < 768){
                        img_width = "12%;";
                        $("#div-order-summary table").find("td:eq(0)").css("width", "50%");
                    }else{  
                        img_width = "6%;";
                        $("#div-order-summary table").find("td:eq(0)").css("width", "20%");
                    }

					$("#prod_dtls tbody").append("<tr><td><img src='"+prod_img+"' style='width: "+img_width+"'>&nbsp;&nbsp;" + prod_dtls[i].product_name + 
					"</td><td class='text-right prod_qty' style='padding-top: 1.5%;'>" + $.number(prod_qty) + 
					"</td><td class='text-right prod_unit_price' style='padding-top: 1.5%;'>" + $.number(prod_dtls[i].product_unit_price, 2) + 
					"</td><td class='text-right prod_total_price' style='padding-top: 1.5%;'>" + $.number((prod_qty * prod_dtls[i].product_unit_price), 2) + 
					"</td><td class='text-right prod_id' hidden>" + prod_dtls[i].id + 
					"</td><td class='text-right prod_weight' hidden>" + prod_dtls[i].product_weight + 
					"</td></tr>");

					shipping_fee_w_mm += Number(prod_dtls[i].ship_fee_w_mm);
					shipping_fee_o_mm += Number(prod_dtls[i].ship_fee_o_mm);

					sub_total += (Number(prod_qty) * Number(prod_dtls[i].product_unit_price));

                    if (prod_dtls.length == "1"){
                        if (prod_dtls[i].product_std_delivery == ""){
                            $("#std_delivery").val(result.std_delivery);
                        }else{
                            $("#std_delivery").val(prod_dtls[i].product_std_delivery);
                        }
                    }else{
                        $("#std_delivery").val(result.std_delivery);
                    }

                }
                

				// console.log($("#bill_province").attr("data-id"));

				if ($("#bill_province").attr("data-id") == "52"){
					shipping_fee = shipping_fee_w_mm;
				}else if ($("#bill_province").attr("data-id") == "0"){
					shipping_fee = 0;
				}else{	
					shipping_fee = shipping_fee_o_mm;
				}

				// console.log(sub_total);
				// console.log(shipping_fee);
				// console.log("Total " + $.number((Number(sub_total) + Number(shipping_fee)), 2));

				$("#vw_total_order").text($.number(sub_total, 2));
				$("#shipping_fee").text($.number(shipping_fee, 2));
				$("#shipping_fee").attr("data-id", Number(shipping_fee));			
				$("#sub_total").text($.number(sub_total, 2));
				$("#sub_total").attr("data-id", sub_total);
				$("#total_amount").text("PHP " + $.number((Number(sub_total) + Number(shipping_fee)), 2));
				$("#total_amount").attr("data-id", (Number(sub_total) + Number(shipping_fee)));
				$("#comp_total_items").text($.number(total_items));
				$("#comp_total_amount").text($.number(sub_total, 2));

				// bank_list();
				// remittance_list();
				$("#delivery_type").val("3");
                courier();
                check_delivery_address();
	    	}, error : function(err){
	    		console.log(err.responseText);
	    	}
	    })
	}

}

function check_delivery_address(){
    // console.log("check_del_address");

	var bill_name = $("#bill_name").val();
	var bill_address = $("#bill_address").val();
	var bill_city = $("#bill_city").attr("data-id");
	var bill_province = $("#bill_province").attr("data-id");
    var bill_mobile = $("#bill_mobile").val();
    var bill_email = $("#bill_email").val();
    var bill_contact = $("#bill_contact").val();

	// console.log(bill_name);
	// console.log(bill_address);
	// console.log(bill_city);
	// console.log(bill_province);
    // console.log(bill_mobile);
    // console.log(bill_email);
    // console.log(bill_contact);

	if (jQuery.trim(bill_name).length <= 0 || jQuery.trim(bill_address).length <= 0 || jQuery.trim(bill_city).length <= 0 || jQuery.trim(bill_province).length <= 0  || jQuery.trim(bill_mobile) <=0 || jQuery.trim(bill_email).length <= 0 ){
		swal({
			type : "warning",
			title : "Please input all required fields"
        })
    }else{
        $(".div-deliver").css("background-color", "rgb(0, 128, 0, 0.2)");
    }

}

function cancel_order(){
	$("#div-checkout-details").hide();
	$("#div-order-summary").hide();

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

function confirm_order(){

$("#div-remittance-payment").hide();
$("#div-bank-payment").hide();
get_remittance();

var payment_type = $("#payment_type_id").val();

if (payment_type == "1"){
	// $("#div-remittance-payment").show();
	$("#summ-payment-type-list").append("<option>Cash on Delivery</option>");
}else if (payment_type == "5"){
	$("#div-bank-payment").show();
	// bank_list();
	// get_bank();
	// get_remittance();
}else if (payment_type == "6"){
	$("#div-remittance-payment").show();
	// remittance_list();
	// get_remittance();
}else{
    $("#div-remittance-payment").hide();
    $("#div-bank-payment").hide();    
}

var address = $("#bill_address").val() + ", " + ($("#bill_barangay").val() == "" ? "" : ", ") + $("#bill_city").val() + ", " + $("#bill_province").val() + " " + $("#bill_zip").val();

$("#summ-address").text(address);
$("#summ-contact-no").text($("#bill_mobile").val());
$("#summ-contact-person").text($("#bill_contact").val());
$("#summ-notes").text($("#bill_notes").val());

$("#summ-delivery").text($("#delivery_type :selected").text());
$("#summ-courier").text($("#courier :selected").text());
$("#summ-payment-type").text($("#payment_type_id").attr("data-name"));
$("#summ-payment-method").text($("#summ-payment-type-list :selected").text());

if (payment_type != "0"){
	$("#div-home").hide();
	$("#div-checkout-details").hide();
	$("#div-order-summary").show("slow");
}else{

	swal({
		type : "warning",
		title : "Please Complete all required fields",
	})

}

// if (payment_type == "5"){
// 	$("#div-bank-payment").show();
// 	$("#summ-payment-type-list").val($("#bank_list :selected").text());	
// }else{
// 	$("#div-remittance-payment").show();
// 	if (payment_type != "1"){
// 		$("#summ-payment-type-list").val($("#remittance_list :selected").text());
// 	}else{
// 		$("#summ-payment-type-list").val("Cash on Delivery");		
// 	}
// }

}

function get_courier(){
	var id = $("#courier").val();
	var csrf_name = $("input[name=csrf_name]").val();
	var island_group = $("#bill_province").attr("data-island");
	var total_order = $("#vw_total_order").text().replace(/,/g, '');
	var shipping_fee = "";

	if (id != "0"){
		$.ajax({
			data : {id : id, csrf_name : csrf_name},
			type : "POST",
			dataType : "JSON",
			url : base_url + "Buyer/get_courier",
			success : function(result){
				$("input[name=csrf_name]").val(result.token);

                if (result.result.length != 0){
                    if (island_group == "1"){
                        shipping_fee = result.result[0].sf_mm;
                    }else if (island_group == "2"){
                        shipping_fee = result.result[0].sf_luz;				
                    }else if (island_group == "3"){
                        shipping_fee = result.result[0].sf_vis;
                    }else if (island_group == "4"){
                        shipping_fee = result.result[0].sf_min;
                    }else{
                        shipping_fee = "0";
                    }    
                }

				var grand_total = Number(total_order) + Number(shipping_fee);

				$("#delivery_fee").val($.number(shipping_fee, 2));			
				$("#shipping_fee").text($.number(shipping_fee, 2));
				$("#total_amount").text($.number(grand_total, 2));
				$("#vw_delivery_fee").text($.number(shipping_fee, 2));			
				$("#vw_grand_total").text($.number(grand_total, 2));			
				$("#summ-total-order").text($.number(total_order, 2));			
				$("#summ-shipping-fee").text($.number(shipping_fee, 2));
				$("#summ-delivery-fee").text($.number(shipping_fee, 2));			
				$("#summ-grand-total").text($.number(grand_total, 2));		

                $(".div-arrive").css("background-color", "rgb(0, 128, 0, 0.2)");


			}, error : function(err){
				console.log(err.responseText);
			}
		})
	}
}

function get_bank(){

	var bank_type = $("#summ-payment-type-list").val();
	var csrf_name = $("input[name=csrf_name]").val();
	var id = $("#seller_id").val();

	// console.log(bank_type);

	$.ajax({
		data : {csrf_name : csrf_name, bank_type : bank_type, id : id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/get_bank",
		success : function(result){
			// console.log(result);
			$("input[name=csrf_name]").val(result.token);
			$("#bank_name").text(result.account_name);
			$("#bank_no").text(result.account_no);
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function get_remittance(){
	var csrf_name = $("input[name=csrf_name]").val();
	var id = $("#seller_id").val();

	$.ajax({
		data : {csrf_name : csrf_name, id : id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Buyer/get_remittance",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#remittance_name").text(result.remitt_name);
			$("#remittance_mobile").text("+63" + result.remitt_contact);
			$("#summ-bank-mobile").text("+63" + result.mobile);
			$("#summ-remitt-mobile").text("+63" + result.mobile);
			$("#remittance_email").text(result.email);
			$("#summ-bank-email").text(result.email);
			$("#summ-remitt-email").text(result.email);
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function check_place_order(){

	var bill_name = $("#bill_name").val();
	var bill_address = $("#bill_address").val();
	var bill_city = $("#bill_city").attr("data-id");
	var bill_province = $("#bill_province").attr("data-id");
    var bill_mobile = $("#bill_mobile").val();
    var bill_email = $("#bill_email").val();
    var bill_contact = $("#bill_contact").val();

	// console.log(bill_name);
	// console.log(bill_address);
	// console.log(bill_city);
	// console.log(bill_province);
	// console.log(bill_mobile);

	if (jQuery.trim(bill_name).length <= 0 || jQuery.trim(bill_address).length <= 0 || jQuery.trim(bill_city).length <= 0 || jQuery.trim(bill_province).length <= 0  || jQuery.trim(bill_mobile) <=0 || jQuery.trim(bill_email).length <= 0 || jQuery.trim(bill_contact).length <= 0){
		swal({
			type : "warning",
			title : "Please input all required fields"
		})
	}else{
		place_order();
	}

}

function place_order(){

	var csrf_name = $("input[name=csrf_name]").val();
	var bill_name = $("#bill_name").val();
	var bill_address = $("#bill_address").val();
	var bill_barangay = $("#bill_barangay").val();
	var bill_city = $("#bill_city").attr("data-id");
	var bill_province = $("#bill_province").attr("data-id");
	var bill_zipcode = $("#bill_zip").val();
	var bill_phone = $("#bill_phone").val();
	var bill_mobile = $("#bill_mobile").val();
	var bill_email = $("#bill_email").val();
	var bill_contact = $("#bill_contact").val();
	var bill_notes = $("#bill_notes").val();

	var delivery_type = $("#delivery_type").val();
	var delivery_date = "";
	var sched_time = $("#sched_time").val();
	var sched_date = $("#sched_date").val();
	var payment_type = $("#payment_type_id").val();
	var courier = $("#courier").val();
	var payment_method = "";

	// var shipping_fee = $("#shipping_fee").attr("data-id");
	var shipping_fee = $("#delivery_fee").val();
	var sub_total = $("#sub_total").attr("data-id");
	var total_amount = $("#total_amount").attr("data-id");

	var prod_id = [];
	var sub = "";
	var save_info = 0;

	if ($("#datepicker").attr("data-deldate")){
		delivery_date = "0000-00-00";
	}else{
		delivery_date = $("#datepicker").val();
	}

	if (payment_type == "0"){
		payment_method = "0";
	}else{
		payment_method = $("#summ-payment-type-list").val();
	}

	if ($("#save_info").is(":checked")){
		save_info = 1;
	}else{
		save_info = 0;
    }
    
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

    // console.log(prod_id);

    var data = {
    	"delivery_address" : bill_address,
		"seller_id" : seller_id,
		"zip_code" : bill_zipcode,
    	"barangay" : bill_barangay,
    	"city" : bill_city,
		"province" : bill_province,
		"phone_no" : bill_phone,
    	"contact_no" : bill_mobile,
    	"contact_name" : bill_contact,
    	"notes" : bill_notes,
    	"payment_type" : payment_type,
    	"payment_method" : payment_method,
		"delivery_type" : delivery_type,
		"delivery_date" : delivery_date,
    	"scheduled_date" : sched_date,
    	"scheduled_time" : sched_time,
    	"shipping_fee" : shipping_fee,
    	"sub_total" : sub_total,
		"total_amount" : total_amount,
		"courier" : courier
	}
	
	var data_profile = {
		"phone_no" : bill_phone,
		"mobile_no" : bill_mobile,
		"address" : bill_address,
		"barangay" : bill_barangay,
		"city" : bill_city,
		"province" : bill_province,
		"zip_code" : bill_zipcode,
		"contact_person" : bill_contact
	}

    // 	beforeSend : function(){
    // 		swal({
    // 			title : "Saving....",
				// showCancelButton: false, 
				// showConfirmButton: false
    // 		})
    // 	},

    // console.log("save_info " + save_info);
    // console.log(data_profile);

    console.log(save_info);

    $.ajax({
    	data : {csrf_name : csrf_name, prod_id : prod_id, data : data, data_profile : data_profile, save_info : save_info},
    	type : "POST",
    	dataType : "JSON",
    	url : base_url + "Buyer/confirm_order",
		success : function(result){
			// console.log(result);
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

            insert_order(id);

		}
	})
}

function insert_order(id){
    console.log("id " + id);
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