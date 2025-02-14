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
    $("#div-payment-method").hide();
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


    $("#div-del-not-avail").hide();

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

    $(".rating-emoji").click(function(){
        $(".rating-emoji").removeClass("emoji-active");
        $(this).addClass("emoji-active");
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
		// cancel_order();
    	$("#div-order-summary").hide();
    	$("#div-checkout-details").show("slow");
    });

	$("#btn_order_payment").click(function(){
		$("#div-home").hide();
		$("#div-order-confirm").hide();
		$("#div-checkout-details").show("slow");
		// $("#div-order-summary").show("slow");
	});

	$("#btn_confirm_order_2").click(function(){
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
            $("#div-del-not-avail").hide();
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

		if ($(this).val() == "2"){
            get_courier();
            $(".div-modal-delivery-details").hide();

            // $("#div-modal-payment-type-1").css("cursor", "not-allowed");
            // $("#div-modal-payment-type-1").css("background", "#dddddd");
            // $("#div-modal-payment-type-1").css("pointer-events", "none");

            // $("#div-courier").hide();
		}else{
            $(".div-modal-delivery-details").show();
            courier();
            // $("#div-courier").show();

            // $("#div-modal-payment-type-1").css("cursor", "pointer");
            // $("#div-modal-payment-type-1").css("background", "white");
            // $("#div-modal-payment-type-1").css("pointer-events", "auto");

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
            courier();
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
        
        if ($(this).val() != ""){
            $(".div-payment").css("background-color", "rgb(0, 128, 0, 0.2)");
            $("#payment-icon").empty();
            $("#payment-icon").append("<i class='fas fa-check-circle'></i>");        
            $("#div-hdr-payment").attr("data-id", "1");
        }else{
            $(".div-payment").css("background-color", "rgb(235, 241, 222)");
            $("#payment-icon").empty();
            $("#payment-icon").append("<i class='far fa-check-circle'></i>");
            $("#div-hdr-payment").attr("data-id", "0");
        }

	});

	$("#btn-modal-delivery").click(function(){
		get_courier();
	});
	
	$("#courier").change(function(){
		get_courier();
    });
    
    $("#review-save").click(function(){

        var emoji = $(".emoji-active").text();

        if (emoji != ""){
            save_rating();
        }else{
            swal({
                type : "warning",
                title : "Please select rating emoji"
            })
        }

    });

    $("#btn_delivery_payment_type").click(function(){

        if ($("#payment_type_id").val() == "5" || $("#payment_type_id").val() == "6"){
            if ($("#summ-payment-type-list").val() == "0"){
                $(".div-payment").css("background-color", "rgb(235, 241, 222)");
                $("#payment-icon").empty();
                $("#payment-icon").append("<i class='far fa-check-circle'></i>");
                $("#div-hdr-payment").attr("data-id", "0");
                swal({
                    type : "warning",
                    title : "Please select payment method"
                }, function(){
                    $("#modal_payment").modal("show");
                })

            }
        }
    });

    $("#btn-send-proof").click(function(){
        check_proof();
    });

    $("#btn-upload-proof").change(function(e){
        var fileName = e.target.files[0].name;
        $("#span-upload-proof").text(fileName);
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
    var city = $("#bill_city").attr("data-id");
    var prov = $("#bill_province").attr("data-id");
	var total_weight = "";
    $("#courier").empty();

    if ($("#delivery_type").attr("data-free") != "1"){

        $("#prod_dtls tbody").each(function(row, tr){
            var weight = $(tr).find(".prod_weight").text();
            var qty = $(tr).find(".prod_qty").text();
            var weight_qty = weight * qty;

            total_weight += weight_qty;
        })

        var data = {id : id, csrf_name : csrf_name, total_weight : total_weight, city : city, prov : prov};
        // console.log(data);

        $.ajax({
            data : {id : id, csrf_name : csrf_name, total_weight : total_weight, city : city, prov : prov},
            type : "POST",
            dataType : "JSON",
            url : base_url + "Buyer/courier",
            success : function(result){
                $("input[name=csrf_name]").val(result.token);
                $("#courier").empty();
                // console.log(result.result);
                for (var i = 0; i < result.result.length; i++) {
                    $("#courier").append("<option value='"+result.result[i].id+"'>"+result.result[i].courier+"</option>");
                }
                
                get_courier();

            }, error : function(err){
                console.log(err.responseText);
            }
        })
    }else{
        $("#div-shipping-method").attr("data-id", "1");
        $("#courier").append("<option value='0'>Free Delivery</option>");
    }
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

            $("#div_prod_"+result.session_div).find("input[type=checkbox]").prop("checked", false);
            $("#div_prod_"+result.session_div).find("input[value='"+result.session_prod_id+"']").prop("checked", true);

            if (result.session_prod_id != null){
                get_order_checkout(result.session_div);
            }

            get_ongoing_orders();

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
            $("#span-pending").text(result.pending);
            $("#span-acknowledge").text(result.acknowledge);
            $("#span-proof").text(result.proof);
            $("#span-confirm").text(result.confirm);
            $("#span-denied").text(result.denied);
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
    var total_items = 0;

    $("#tbl-vw-products").find("td").remove();
    $("#div-proof").hide();
    $("#div-proof-denied").hide();

    // $("#div-proof").removeClass("overlay");
    // $(".overlay-text").css("display", "none");

    // $("#vw_status").removeClass("alert alert-danger");
    // $("#vw_status").removeClass("alert alert-success");
    // $("#vw_status").addClass("alert alert-success");

    $("#vw_status").removeClass();

	if (type == "1"){
		// $("#div-cart").removeClass("active");
		$("#div-cart").removeClass("show");
	}else if (type == "2"){
		// $("#div-ongoing").removeClass("active");
		$("#div-ongoing").removeClass("show");
	}else if (type == "3"){
		// $("#div-complete").removeClass("active");
		// $("#div-complete").removeClass("show");
	}else if (type == "4"){
		// $("#div-transactions").removeClass("active");
		$("#div-transactions").removeClass("show");
	}

	$("#div-dtls-no").val(type);

    if (type != "3"){
        $("#div-order-dtls").show("slow");
		$(window).scrollTop($('#div-order-dtls').offset().top);
    }
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
				status = "Pending to Acknowledge";
                $("#vw_status").addClass("col-12 col-lg-12 col-md-12 col-sm-12 btn-light py-0 my-0 px-2 div-ong-status h4 py-1");
			}else if (data[0].status == "2"){
                status = "Acknowledged";
                $("#div-proof").show("slow");
                $("#vw_status").addClass("col-12 col-lg-12 col-md-12 col-sm-12 btn-primary py-0 my-0 px-2 div-ong-status h4 py-1");
            }else if (data[0].status == "3"){
                status = "Proof of Payment Sent";
                // $("#div-proof").show("slow");
                // $("#div-proof").addClass("overlay");
                // $(".overlay-text").css("display", "block");
                $("#vw_status").addClass("col-12 col-lg-12 col-md-12 col-sm-12 btn-warning py-0 my-0 px-2 div-ong-status h4 py-1");
            }else if (data[0].status == "4"){
                status = "Payment denied by Seller";
                $("#vw_status").addClass("col-12 col-lg-12 col-md-12 col-sm-12 btn-danger py-0 my-0 px-2 div-ong-status h4 py-1");
                $("#div-proof").show("slow");
                $("#div-proof-denied").show("slow");
            }else if (data[0].status == "5"){
                status = "Payment confirm by Seller";
                $("#vw_status").addClass("col-12 col-lg-12 col-md-12 col-sm-12 btn-info py-0 my-0 px-2 div-ong-status h4 py-1");
			}else if (data[0].status == "6"){
				status = "Delivery";
                $("#vw_status").addClass("col-12 col-lg-12 col-md-12 col-sm-12 py-0 my-0 px-2 div-ong-status h4 py-1");
			}else if (data[0].status == "7"){
				status = "Completed Order";
                $("#vw_status").addClass("col-12 col-lg-12 col-md-12 col-sm-12 py-0 my-0 px-2 div-ong-status h4 py-1");
			}else if (data[0].status == "0"){
				status = "Cancelled Order";
                $("#vw_status").addClass("col-12 col-lg-12 col-md-12 col-sm-12 py-0 my-0 px-2 div-ong-status h4 py-1");
			}else{
				status = "";
            }
            
            $("#review-store-name").text(data[0].account_name);
            $("#review-store-id").val(data[0].seller_id);

            $("#reason-denied").text(data[0].payment_message);

            $("#proof-order-no").val(data[0].order_no);
            $("#proof-order-no").attr("data-id", data[0].id);

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
			$("#vw_mobile").text("(+63) "+data[0].contact_no);
			$("#vw_email").text(data[0].email);

			$("#vw_address").text(data[0].delivery_address + ", " + data[0].barangay + ", " + data[0].city_desc + ", " + data[0].province_desc);
			// $("#vw_barangay").text(data[0].barangay);
			// $("#vw_city").text(data[0].city_desc);
			// $("#vw_province").text(data[0].province_desc);

			$("#vw_notes").text(data[0].notes);

			$("#vw_sub_total").text($.number(data[0].sub_total, 2));
			$("#vw_shipping_fee").text($.number(data[0].shipping_fee, 2));
			$("#vw_total_amount").text($.number(data[0].total_amount, 2));

            $("#div-order-prod").html(result.products);

			// for (var i = 0; i < products.length; i++) {

            //     total_items += Number(products[i].prod_qty);
            //     var img = base_url + "images/products/" + img_location;

            //     $("#div-order-prod").append('<div class="row mb-2">'+
            //     '<div class="col-3 col-lg-1 col-md-6 col-sm-6 px-2">'+
            //         '<div class="border text-center w-100 ong-prod-img">'+
            //             '<img src="'+img+'" alt="Product">'+
            //         '</div>'+
            //     '</div>'+
            //     '<div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details">'+
            //         '<div class="row">'+
            //             '<div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">'+
            //                 '<p>'+products[i].product_name+'</p>'+
            //             '</div>'+
            //             '<div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">'+
            //                 '<p><span class="d-inline-block d-sm-none">x</span> '+products[i].prod_qty+'</p>'+
            //             '</div>'+
            //             '<div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">'+
            //                 '<p class="font-weight-600 text-dark-green">&#8369; '+$.number(products[i].prod_price, 2)+'</p>'+
            //             '</div>'+                                                            
            //         '</div>'+
            //     '</div>'+
            // '</div>');
            // }
            
			$("#vw_total_items").text($.number(result.total_items, 0));


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
    $("#summ-payment-type-list").append("<option value='0' selected hidden>Payment Method</option>");

	if (id == "5"){
		bank_list();
        $("#div-payment-method").show("slow");
        $(".div-payment").css("background-color", "rgb(235, 241, 222)");
        $("#payment-icon").empty();
        $("#payment-icon").append("<i class='far fa-check-circle'></i>");
        $("#div-hdr-payment").attr("data-id", "0");

    }else if (id == "6"){
		remittance_list();
        $("#div-payment-method").show("slow");
        $(".div-payment").css("background-color", "rgb(235, 241, 222)");
        $("#payment-icon").empty();
        $("#payment-icon").append("<i class='far fa-check-circle'></i>");
        $("#div-hdr-payment").attr("data-id", "0");

    }else{
        $("#div-payment-method").hide("slow");
        $(".div-payment").css("background-color", "rgb(0, 128, 0, 0.2)");
        $("#payment-icon").empty();
        $("#payment-icon").append("<i class='fas fa-check-circle'></i>");    
        $("#div-hdr-payment").attr("data-id", "1");

    }
    
    // $(".div-payment").css("background-color", "rgb(0, 128, 0, 0.2)");

    $("#payment_type_id").val(id);
	$("#payment_type_id").attr("data-name", $("#div-modal-payment-type-" + id).find("span").text());
	$(".div-modal-payment-type").css("background", "white");
	$('#div-modal-payment-type-'+id).css("background", "yellowgreen");

    // if ($("#delivery_type").val() == "2"){
    //     $("#div-modal-payment-type-1").css("cursor", "not-allowed");
    //     $("#div-modal-payment-type-1").css("background", "#dddddd");
    //     $("#div-modal-payment-type-1").css("pointer-events", "none");
    // }

}

function get_order_checkout(div_id){
	$("#div_id").val(div_id);

    $("#div-payment").empty();
    $("#prod_dtls tbody").empty();

	var csrf_name = $("input[name=csrf_name]").val();
	var shipping_fee = "";
	// var prod_id = [];
	var prod_id = [];
    var products = [];
    var item_id = [];
    $.each($("#div_prod_"+div_id+" input[type='checkbox']:checked"), function(){
    	// prod_id = $(this).val();
        // prod_id.push($(this).val());
        prod_id.push($(this).val());
        item_id.push($(this).attr("data-item"));
        var id = $(this).attr("data-id");
        var sub = {
            "item_id" : $(this).attr("data-item"),
        	"prod_id" : $(this).val(),
        	"prod_qty" : $("#prod_qty_"+id).val(),
            "prod_var1" : $(this).attr("data-prod-var1"),
            "prod_var2" : $(this).attr("data-prod-var2")
        }
        products.push(sub);
    });	

    // console.log(products);
    // console.log(prod_id);
    // console.log(item_id);

	if (products.length == 0){
		swal({
			type : "warning",
			title : "No product selected"
		})
	}else{

		$("#div-home").hide();
		$("#div-checkout-details").show("slow");
        // console.log(prod_id);
        // console.log(item_id);

	    $.ajax({
	    	data : {csrf_name : csrf_name, prod_id : prod_id, item_id : item_id},
	    	type : "POST",
	    	dataType : "JSON",
	    	url : base_url + "Buyer/get_order_checkout",
	    	success : function(result){
                // console.log(result.seller_id);
                $("#prod_dtls tbody").empty();
	    		$("#seller_id").val(result.seller_id);
				$("input[name=csrf_name]").val(result.token);
				$("#delivery_type").empty();
				var img_src = "";
                $("#datepicker").attr("data-deldate", result.cust_del_date[0].del_date);
                check_delivery_address();

                // setTimeout(function(){ 
                //     courier();
                    // get_billing();
                    // console.log("get_billing");
                //  }, 500);

				if (result.cust_del_date[0].del_date == "1"){
					$('#datepicker').datepicker('enable');
                    $("#deliver_date_note").hide();
				}else{
                    $('#datepicker').datepicker('disable');
                    $("#deliver_date_note").show();
				}

                // console.log("Free Shipping " + result.cust_del_date[0].free_shipping );

                $("#delivery_type").attr("data-free", result.cust_del_date[0].free_shipping);

				if (result.cust_del_date[0].free_shipping == "1"){
					$("#courier").empty();
					$("#courier").attr("disabled", true);
					$("#courier").append("<option value='0'>Free Delivery</option>");
					$("#delivery_fee").val("0.00");

                    $(".div-arrive").css("background-color", "rgb(0, 128, 0, 0.2)");
                    $("#arrive-icon").empty();
                    $("#arrive-icon").append("<i class='fas fa-check-circle'></i>");
                    $("#div-shipping-method").attr("data-id", "1");
                    $("#div-del-not-avail").hide();
        
                }else{
					$("#courier").empty();
                    $("#courier").attr("disabled", false);
                    setTimeout(() => {
                        courier();
                    }, 500);
				}

                var font_color = "";

                // console.log(result.payment_type.length);
                var div_payment = "";

                if (result.payment_type.length > 2){
                    div_payment = "col-lg-4 col-md-4";
                }else if (result.payment_type.length > 1){
                    div_payment = "col-lg-6 col-md-6";
                }else{
                    div_payment = "col-lg-12 col-md-12";
                }

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
                    "<div class='col-12 "+div_payment+" col-sm-12 text-center mt-2 px-1'>" +
                        "<div class='div-modal-payment-type cursor-pointer' id='div-modal-payment-type-"+result.payment_type[i].id+"' onclick='payment_selected("+result.payment_type[i].id+")' style='border: 1px solid "+font_color+"'>"+
                            // "<img class='img-fluid' style='height: 70px;' src='"+img_src+"'>" +
                            "<span class='payment-name font-weight-600 font-size-30' style='color: "+font_color+"'>"+result.payment_type[i].payment_type+"</span>" +
                        "</div>" +
                    "</div>");

                    if (result.payment_type.length == 1){
                        payment_selected(result.payment_type[i].id);
                    }else{
                        // $(".div-payment").css("background-color", "rgb(235, 241, 222)");
                        $(".div-payment").css("background-color", "rgb(235, 241, 222)");
                        $("#payment-icon").empty();
                        $("#payment-icon").append("<i class='far fa-check-circle'></i>");
                        $("#div-hdr-payment").attr("data-id", "0");
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
                $("#prod_dtls tbody").empty();

                // console.log(prod_dtls);

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
                    var tbl_width = "";
                    
                    if ($(document).width() < 768){
                        img_width = "100%;";
                        tbl_width = "50%";
                        $("#div-order-summary table").find("td:eq(0)").css("width", "50%");
                    }else{  
                        img_width = "100%;";
                        tbl_width = "65%";
                        $("#div-order-summary table").find("td:eq(0)").css("width", "20%");
                    }

                    var variation = "";

                    if (prod_dtls[i].prod_var1 != ""){
                        variation = "<br>Variation : " + prod_dtls[i].prod_var1;
                    }

                    if (prod_dtls[i].prod_var2 != ""){
                        variation = "<br>Variation : " + prod_dtls[i].prod_var1 + ", " + prod_dtls[i].prod_var2;
                    }

                    $("#prod_dtls tbody").append("<tr><td class='tbl-checkout-img'><p><img src='"+prod_img+"' style='width: "+img_width+"'></p>" + 
					"</td><td class='text-left prod_name' width='"+tbl_width+"' style='padding-top: 1.5%;'><p>" + 
                     prod_dtls[i].product_name + variation + "</p>" +
					"</td><td class='text-right prod_qty' style='padding-top: 1.5%;'>" + $.number(prod_qty) + 
					"</td><td class='text-right prod_unit_price' style='padding-top: 1.5%;'>" + $.number(prod_dtls[i].product_unit_price, 2) + 
					"</td><td class='text-right prod_total_price' style='padding-top: 1.5%;'>" + $.number((prod_qty * prod_dtls[i].product_unit_price), 2) + 
					"</td><td class='text-right prod_id' hidden>" + prod_dtls[i].prod_id + 
					"</td><td class='text-right prod_weight' hidden>" + prod_dtls[i].product_weight + 
					"</td><td class='text-right item_id' hidden>" + prod_dtls[i].item_id + 
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

				// if ($("#bill_province").attr("data-id") == "52"){
				// 	shipping_fee = shipping_fee_w_mm;
				// }else if ($("#bill_province").attr("data-id") == "0"){
				// 	shipping_fee = 0;
				// }else{	
				// 	shipping_fee = shipping_fee_o_mm;
                // }
                
                shipping_fee = $("#delivery_fee").val();

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
                // console.log(sub_total);
                // console.log(shipping_fee);
                // bank_list();
				// remittance_list();
                $("#delivery_type").val("3");

                    // if ($("#div-shipping-method").attr("data-id") == "0"){
                    //     $("#collapse-shipping").addClass("show");
                    // }else{
                    //     $("#collapse-shipping").removeClass("show");
                    // }
    
                    // if ($("#div-hdr-payment").attr("data-id") == "0"){
                    //     $("#collapse-payment").addClass("show");
                    // }
                        

                if ($("#div-billing").attr("data-id") == "0"){
                    $("#collapse-billing").addClass("show");
                }

                $("#collapse-payment").addClass("show");
                $("#collapse-shipping").addClass("show");

                setTimeout(() => {
                    if ($("#div-checkout-details").is(":visible")){
                        swal({
                            type : "warning",
                            title : "You took long to checkout",
                            // timer : 3000
                        }, function(){
                            location.reload();
                        })
                    }
                }, 1000000);


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
    //|| jQuery.bill(bill_contact).length <= 0

    if (jQuery.trim(bill_name).length <= 0 || jQuery.trim(bill_address).length <= 0 || jQuery.trim(bill_city).length <= 0 || jQuery.trim(bill_province).length <= 0  
    || jQuery.trim(bill_mobile) <=0 || jQuery.trim(bill_email).length <= 0 ){
        $(".div-deliver").css("background-color", "rgb(235, 241, 222)");
        $("#deliver-icon").empty();
        $("#deliver-icon").append("<i class='far fa-check-circle'></i>");
		swal({
			type : "warning",
			title : "Please input all required fields"
        })
        $("#div-billing").attr("data-id", "0");

        if (jQuery.trim(bill_name).length <= 0){
            $(bill_name).addClass("error");
        }

        if (jQuery.trim(bill_address).length <= 0){
            $(bill_address).addClass("error");
        }

        if (jQuery.trim(bill_city).length <= 0){
            $(bill_city).addClass("error");
        }

        if (jQuery.trim(bill_province).length <= 0){
            $(bill_province).addClass("error");
        }

        if (jQuery.trim(bill_mobile).length <= 0){
            $(bill_mobile).addClass("error");
        }

        if (jQuery.trim(bill_email).length <= 0){
            $(bill_email).addClass("error");
        }

        // if (jQuery.trim(bill_contact).length <= 0){
        //     $(bill_email).addClass("error");
        // }

    }else{
        $("#div-billing").attr("data-id", "1");
        $(".div-deliver").css("background-color", "rgb(0, 128, 0, 0.2)");
        $("#deliver-icon").empty();
        $("#deliver-icon").append("<i class='fas fa-check-circle'></i>");
    }

}

function cancel_order(){
    get_billing();
	$("#div-order-summary").hide();
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
	$("#payment_type_id").val("");
	$("#payment_type_id").attr("data-name", "");

	$("#div-home").show("slow");

}

function confirm_order(){

$("#div-remittance-payment").hide();
$("#div-bank-payment").hide();
get_remittance();
check_delivery_address();

var payment_type = $("#payment_type_id").val();
var payment_method = $("#summ-payment-type-list").val();
var delivery_type = $("#delivery_type").val();
var courier = $("#courier").val();
var courier_name = "";

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

if (delivery_type == "2"){
    courier_name = "Pick Up";
}else{
    courier_name = $("#courier :selected").text();
}

// console.log(delivery_type);
// console.log(courier_name);

var address = $("#bill_address").val() + ", " + ($("#bill_barangay").val() == "" ? "" : ", ") + $("#bill_city").val() + ", " + $("#bill_province").val() + " " + $("#bill_zip").val();

$("#summ-address").text(address);
$("#summ-contact-no").text("+63" + $("#bill_mobile").val());
$("#summ-contact-person").text($("#bill_contact").val());
$("#summ-notes").text($("#bill_notes").val());

$("#summ-delivery").text($("#delivery_type :selected").text());
$("#summ-courier").text(courier_name);
$("#summ-payment-type").text($("#payment_type_id").attr("data-name"));
$("#summ-payment-method").text(($("#payment_type_id").val() == "1" ? "Cash on Delivery" : $("#summ-payment-type-list :selected").text()));

if (courier == null){
    courier = "";
}

if (delivery_type == "2"){
    courier = "n/a";
}

console.log($("#div-billing").attr("data-id"));
console.log($("#div-shipping-method").attr("data-id"));
console.log($("#div-hdr-payment").attr("data-id"));

if (payment_type != "0" && courier != "" || payment_method != "0"){

    if ($("#div-billing").attr("data-id") == "0" || $("#div-shipping-method").attr("data-id") == "0" || $("#div-hdr-payment").attr("data-id") == "0"){

        swal({
            type : "warning",
            title : "Please Complete all required fields",
        })    

        if ($("#div-shipping-method").attr("data-id") == "0"){
            $("#collapse-shipping").addClass("show");
        }else{
            $("#collapse-shipping").removeClass("show");
        }

        if ($("#div-hdr-payment").attr("data-id") == "0"){
            $("#collapse-payment").addClass("show");
        }
                        
        if ($("#div-billing").attr("data-id") == "0"){
            $("#collapse-billing").addClass("show");
        }
    
    }else{
        $("#div-home").hide();
        $("#div-checkout-details").hide();
        $("#div-order-summary").show("slow");    
    }
}else{
    if (courier == ""){
        swal({
            type : "warning",
            title : "Delivery is not available in your area.",
        })
    
    }else{
        swal({
            type : "warning",
            title : "Please Complete all required fields",
        })    
    }

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
    // var total_order = $("#vw_total_order").text().replace(/,/g, '');
    var total_order = $("#sub_total").attr("data-id");
    var shipping_fee = "";

    console.log(id);
    console.log($("#delivery_type").attr("data-free"));
    
	// if (id == "0"){
        if ($("#delivery_type").attr("data-free") == "1"){
            $(".div-arrive").css("background-color", "rgb(0, 128, 0, 0.2)");
            $("#arrive-icon").empty();
            $("#arrive-icon").append("<i class='fas fa-check-circle'></i>");
            $("#div-shipping-method").attr("data-id", "1");
            $("#div-del-not-avail").hide();
        }else{
            if (id != "0"){
                $.ajax({
                    data : {id : id, csrf_name : csrf_name},
                    type : "POST",
                    dataType : "JSON",
                    url : base_url + "Buyer/get_courier",
                    success : function(result){
                        $("input[name=csrf_name]").val(result.token);

                        if (result.result.length != 0){
                            // if (island_group == "1"){
                            //     shipping_fee = result.result[0].sf_mm;
                            // }else if (island_group == "2"){
                            //     shipping_fee = result.result[0].sf_luz;				
                            // }else if (island_group == "3"){
                            //     shipping_fee = result.result[0].sf_vis;
                            // }else if (island_group == "4"){
                            //     shipping_fee = result.result[0].sf_min;
                            // }else{
                            //     shipping_fee = "0";
                            // }    

                            shipping_fee = result.result[0].amount;
                        }else{
                            shipping_fee = "0";
                        }

                        if ($("#delivery_type").val() == "2"){
                            shipping_fee = 0;
                            // $(".div-arrive").css("background-color", "rgb(0, 128, 0, 0.2)");
                            $(".div-arrive").css("background-color", "rgb(0, 128, 0, 0.2)");
                            $("#arrive-icon").empty();
                            $("#arrive-icon").append("<i class='fas fa-check-circle'></i>");
                            $("#div-shipping-method").attr("data-id", "1");
                            // $("#collapse-shipping").removeClass("show");

                            $(".div-modal-delivery-details").hide();
                        }else{
                            shipping_fee = shipping_fee;
                            $(".div-modal-delivery-details").show();
                            if ($("#courier").val() != null){
                                // $(".div-arrive").css("background-color", "rgb(0, 128, 0, 0.2)");
                                $(".div-arrive").css("background-color", "rgb(0, 128, 0, 0.2)");
                                $("#arrive-icon").empty();
                                $("#arrive-icon").append("<i class='fas fa-check-circle'></i>");
                                $("#div-shipping-method").attr("data-id", "1");
                                // $("#collapse-shipping").removeClass("show");
                        
                                $("#div-del-not-avail").hide();
                                $("#courier").attr("disabled", false);
                            }else{
                                // $(".div-arrive").css("background-color", "rgb(235, 241, 222)");
                                $(".div-arrive").css("background-color", "rgb(235, 241, 222)");
                                $("#arrive-icon").empty();
                                $("#arrive-icon").append("<i class='far fa-check-circle'></i>");
                                $("#div-shipping-method").attr("data-id", "0");
                                // $("#collapse-shipping").addClass("show");
                        

                                $("#div-del-not-avail").show();
                            }    
                        }

                        var grand_total = Number(total_order) + Number(shipping_fee);

                        $("#delivery_fee").val($.number(shipping_fee, 2));			
                        $("#shipping_fee").text($.number(shipping_fee, 2));
                        $("#shipping_fee").attr("data-id", shipping_fee);
                        $("#total_amount").text($.number(grand_total, 2));
                        $("#total_amount").attr("data-id", grand_total);
                        $("#vw_delivery_fee").text($.number(shipping_fee, 2));			
                        $("#vw_grand_total").text($.number(grand_total, 2));			
                        $("#summ-total-order").text($.number(total_order, 2));			
                        $("#summ-shipping-fee").text($.number(shipping_fee, 2));
                        $("#summ-delivery-fee").text($.number(shipping_fee, 2));			
                        $("#summ-grand-total").text($.number(grand_total, 2));		


                    }, error : function(err){
                        console.log(err.responseText);
                    }
                })
            }        
        }
    // }
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
            console.log(result);
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

	if (jQuery.trim(bill_name).length <= 0 || jQuery.trim(bill_address).length <= 0 || jQuery.trim(bill_city).length <= 0 || jQuery.trim(bill_province).length <= 0  || jQuery.trim(bill_mobile) <=0 || jQuery.trim(bill_email).length <= 0){
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
            "item_id" : $(tr).find(".item_id").text(),
            "prod_id" : $(tr).find(".prod_id").text(),
            "prod_qty" : $(tr).find(".prod_qty").text(),
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

    // console.log(save_info);

    // console.log(prod_id);

    // console.log(prod_id);

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
				title : "Placed Order"
			}, function(){                
                if (payment_type == "1"){
                    location.reload();
                }else{
                    get_remittance();
                    get_bank();
                    $("#oc-payment-method").val($("#summ-payment-method").text());
                    $("#div-order-summary").hide();
                    $("#div-order-confirm").show("slow");            
                }
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
    // console.log("id " + id);
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {csrf_name : csrf_name, id : id},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Buyer/complete_order",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            $("#modal-review").modal("show");
            get_complete_orders();
            // swal({
            //     type : "success",
            //     title : "Successfully Completed the order"
            // }, function(){
            // })
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function save_rating(){
    var seller_id = $("#review-store-id").val();
    var rating = $(".emoji-active").text().codePointAt(0).toString(16);
    var review = $("#review-text").val();
    var csrf_name = $("input[name=csrf_name]").val();
    // var emo = String.fromCodePoint("0x"+rating);


    $.ajax({
        data : {seller_id : seller_id, rating : rating, review : review, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Buyer/save_review",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            swal({
                type : "success",
                title : "Successfully Completed the order",
                timer : 3000
            }, function(){
                location.reload();
            })
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function check_proof(){

    var message = jQuery.trim($("#proof-message").val()).length;
    var upload_file = $("#btn-upload-proof");

    console.log(upload_file.get(0).files.length);
    console.log(message);

    if (message <= 0 || upload_file.get(0).files.length <= 0){
        swal({
            type : "warning",
            title : "Please input all required fields"
        })
    }else{
        save_proof();
    }
}

function save_proof(){

    var csrf_name = $("input[name=csrf_name]").val();
    var id = $("#proof-order-no").attr("data-id");
    var message = $("#proof-message").val();
    var files = $('#btn-upload-proof')[0].files;

    var form_data = new FormData(); 

    for(var count = 0; count<files.length; count++) {
        var name = files[count].name;
        form_data.append("files[]", files[count]);
    }        
    form_data.append("id", id);
    form_data.append('csrf_name', csrf_name);
    form_data.append("message", message);

    $.ajax({
        data : form_data,
        type : "POST",
        dataType : "JSON",
        url : base_url + "Buyer/save_proof",
        crossOrigin : false,
        contentType: false,
        processData: false,
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            swal({
                type : "success",
                title : "Successfully Saved"
            }, function(){
                location.reload();
            })
        }, error : function(err){
            console.log(err.responseText)
        }
    })

}