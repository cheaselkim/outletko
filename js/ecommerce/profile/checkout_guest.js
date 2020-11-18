$(document).ready(function(){

    get_order_checkout();

    $("#div-del-not-avail").hide();
    $("#bill_mobile").ForceNumericOnly();
    $("#bill_phone").ForceNumericOnly();

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
            $("#bill_city").removeClass("error");
            $("#bill_province").removeClass("error");
        },
		source: function(req, add){
		    var csrf_name = $("input[name=csrf_name]").val();
			var city = $("#bill_city").val();
        $.ajax({
          url: base_url + "Guest/search_city/", 
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
    
    $("#summ-payment-type-list").change(function(){
		var payment_type = $("#payment_type_id").val();
		$("#div-bank-payment").hide();
		$("#div-remittance-payment").hide();
		$("#summ-payment-method").text($("#summ-payment-type-list :selected").text());
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
        }else{
            $(".div-modal-delivery-details").show();
            courier();
        }
    });

    $('#collapse-billing').on('hidden.bs.collapse', function () {
        check_delivery_address();
    });

    $("#collapse-billing").find("input[type='text']").keyup(function(){
        $(this).removeClass("error");
        if ($(this).attr("id") == "bill_mobile"){
            $("#bill_mobile_icon").removeClass("error");
        }
    });

    $("#btn_confirm_order").click(function(){

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
            swal({
                type : "warning",
                title : "Checkout your Order? ",
                text : "Once confirmed, you are no longer allowed to cancel unless the seller cancels the order",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            }, function(isConfirm){
                if (isConfirm){
                    setTimeout(function(){ 
                        checkout_order();
                    }, 500);				
                }
            })        
    
        }

    });

});

jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};

function validateEmail($email) {
    // var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    // return emailReg.test( $email);

    var csrf_name = $("input[name=csrf_name]").val();
    var email = $email;
    var valemail = 0;

    $.ajax({
        data : {csrf_name : csrf_name, email : email},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Guest/validate_email",
        async : false,
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            console.log(result.result);
            valemail = result.result;
        }, error : function (error){
            console.log(error.responseText);
        }
    })

    return valemail;
}

function get_order_checkout(){

    var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Guest/get_order_checkout",
		success : function(result){
            $("input[name=csrf_name]").val(result.token);
            
            var prod_id = result.result;
            $("#seller_id").val(result.seller_id);

            //Delivery Type

            
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

            for (var i = 0; i < result.delivery_type.length; i++) {
                $("#delivery_type").append("<option value='"+result.delivery_type[i].id+"'>"+result.delivery_type[i].delivery_type+"</option>");
            }


            //Payment Type

            var div_payment = "";

            if (result.payment_type.length > 2){
                div_payment = "col-lg-4 col-md-4";
            }else if (result.payment_type.length > 1){
                div_payment = "col-lg-6 col-md-6";
            }else{
                div_payment = "col-lg-12 col-md-12";
            }

            if (result.payment_type.length > 0){
                for (let i = 0; i < result.payment_type.length; i++) {                    
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
            }

            //Products

            var prod_dtls = result.result;
            var img_prod = result.prod_img;
            var prod_img = "";
            var sub_total = 0;
            var total_items = 0;
            var prod_qty = 0;
            var shipping_fee_w_mm = 0;
            var shipping_fee_o_mm = 0;
            var shipping_fee = 0;
            var prod_id = "";
            $("#prod_dtls tbody").empty();

            // console.log(prod_dtls);

            for (var i = 0; i < prod_dtls.length; i++) {
                total_items++;
                prod_id = prod_dtls[i].prod_id;
                prod_qty = prod_dtls[i].prod_qty;
                // for (var a = 0; a < products.length; a++) {
                //     if (prod_dtls[i].prod_id == products[a].prod_id){
                //         // console.log(products[a].prod_qty);
                //     }
                // }

                // for (var b = 0; b < img_prod.length; b++) {
                //     if (prod_id == img_prod[i].prod_id){
                //         prod_img = img_prod[i].prod_img;
                //         prod_qty = products[i].prod_qty;
                //     }
                // }

                prod_img = base_url + "images/products/" + prod_dtls[i].img_prod;
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
                "</td><td class='text-right prod_var1' hidden>" + prod_dtls[i].prod_var1_id + 
                "</td><td class='text-right prod_var2' hidden>" + prod_dtls[i].prod_var2_id + 
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

            $("#vw_total_order").text($.number(sub_total, 2));
            $("#shipping_fee").text($.number(shipping_fee, 2));
            $("#shipping_fee").attr("data-id", Number(shipping_fee));			
            $("#sub_total").text($.number(sub_total, 2));
            $("#sub_total").attr("data-id", sub_total);
            $("#total_amount").text($.number((Number(sub_total) + Number(shipping_fee)), 2));
            $("#total_amount").attr("data-id", (Number(sub_total) + Number(shipping_fee)));
            $("#comp_total_items").text($.number(total_items));
            $("#comp_total_amount").text($.number(sub_total, 2));


            $("#total-cart").text($.number(result.cart_total, 2));
            $("#total-cart-2").text($.number(result.cart_total, 2));
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
            url : base_url + "Guest/courier",
            success : function(result){
                $("input[name=csrf_name]").val(result.token);
                $("#courier").empty();
                // console.log(result.result);
                for (var i = 0; i < result.result.length; i++) {
                    $("#courier").append("<option value='"+result.result[i].courier_id+"'>"+result.result[i].courier+"</option>");
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

function get_courier(){
	var id = $("#courier").val();
	var csrf_name = $("input[name=csrf_name]").val();
	var island_group = $("#bill_province").attr("data-island");
    // var total_order = $("#vw_total_order").text().replace(/,/g, '');
    var total_order = $("#sub_total").attr("data-id");
    var shipping_fee = "";

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
                    url : base_url + "Guest/get_courier",
                    success : function(result){
                        $("input[name=csrf_name]").val(result.token);

                        if (result.result.length != 0){
                            shipping_fee = result.result[0].amount;
                        }else{
                            shipping_fee = "0";
                        }

                        console.log(result.result);

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
    
    $("#payment_type_id").val(id);
	$("#payment_type_id").attr("data-name", $("#div-modal-payment-type-" + id).find("span").text());
	$(".div-modal-payment-type").css("background", "white");
	$('#div-modal-payment-type-'+id).css("background", "yellowgreen");

}

function bank_list(){
	var csrf_name = $("input[name=csrf_name]").val();
	var id = $("#seller_id").val();

	$.ajax({
		data : {csrf_name : csrf_name, id : id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Guest/bank_list",
		success : function(result){
			$("input[name='csrf_name']").val(result.token);
			for (var i = 0; i < result.result.length; i++) {
				$("#summ-payment-type-list").append("<option value='"+result.result[i].id+"'> Pay via "+result.result[i].bank_name+"</option>");
			}
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
		url : base_url + "Guest/remittance_list",
		success : function(result){
			$("input[name='csrf_name']").val(result.token);
			for (var i = 0; i < result.result.length; i++) {
				$("#summ-payment-type-list").append("<option value='"+result.result[i].id+"'>Pay via "+result.result[i].name+"</option>");
			}
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function check_delivery_address(){
    // console.log("check_del_address");

    var bill_fname = $("#bill_fname").val();
    var bill_lname = $("#bill_lname").val();
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

    if (jQuery.trim(bill_fname).length <= 0 || jQuery.trim(bill_lname).length <= 0 || jQuery.trim(bill_address).length <= 0 || jQuery.trim(bill_city).length <= 0 || jQuery.trim(bill_province).length <= 0  || jQuery.trim(bill_mobile) <=0 || jQuery.trim(bill_email).length <= 0 ){
        $(".div-deliver").css("background-color", "rgb(235, 241, 222)");
        $("#deliver-icon").empty();
        $("#deliver-icon").append("<i class='far fa-check-circle'></i>");
		swal({
			type : "warning",
			title : "Please input all required fields"
        })
        $("#div-billing").attr("data-id", "0");

        if (jQuery.trim(bill_fname).length <= 0){
            $("#bill_fname").addClass("error");
        }

        if (jQuery.trim(bill_lname).length <= 0){
            $("#bill_lname").addClass("error");
        }

        if (jQuery.trim(bill_address).length <= 0){
            $("#bill_address").addClass("error");
        }

        if (jQuery.trim(bill_city).length <= 0){
            $("#bill_city").addClass("error");
        }

        if (jQuery.trim(bill_province).length <= 0){
            $("#bill_province").addClass("error");
        }

        if (jQuery.trim(bill_mobile).length <= 0){
            $("#bill_mobile").addClass("error");
            $("#bill_mobile_icon").addClass("error");
        }

        if (jQuery.trim(bill_email).length <= 0){
            $("#bill_email").addClass("error");
        }

        // if (jQuery.trim(bill_contact).length <= 0){
        //     $(bill_email).addClass("error");
        // }
        $("#collapse-billing").addClass("show");
    }else{
        
        var valemail = validateEmail(bill_email);
        console.log("valemail " + valemail);

        if (valemail == 0){
            $("#div-billing").attr("data-id", "0");
            if (jQuery.trim(bill_email).length <= 0){
                $(bill_email).addClass("error");
            }    
            $("#collapse-billing").addClass("show");
            swal({
                type : "warning",
                title : "Invalid Email",
                timer : 4000
            })
        }else if (valemail == 1){
            $("#div-billing").attr("data-id", "0");
            $("#collapse-billing").addClass("show");
            swal({
                type : "warning",
                title : "Email already registered",
                text : "Please use your account to checkout",
                timer : 4000
            }, function(){
                location.reload();
            })
        }else{
            $("#div-billing").attr("data-id", "1");
            $(".div-deliver").css("background-color", "rgb(0, 128, 0, 0.2)");
            $("#deliver-icon").empty();
            $("#deliver-icon").append("<i class='fas fa-check-circle'></i>");    
        }

    }

}

function checkout_order(){

var csrf_name = $("input[name=csrf_name]").val();

var seller_id = $("#seller_id").val();

var bill_fname = $("#bill_fname").val();
var bill_mname = $("#bill_mname").val();
var bill_lname = $("#bill_lname").val();
var bill_email = $("#bill_email").val();
var bill_mobile = $("#bill_mobile").val();
var bill_phone = $("#bill_phone").val();
var bill_address = $("#bill_address").val();
var bill_barangay = $("#bill_barangay").val();
var bill_city = $("#bill_city").attr("data-id");
var bill_province = $("#bill_province").attr("data-id");
var bill_zip = $("#bill_zip").val();
var bill_contact = $("#bill_contact").val();
var bill_notes = $("#bill_notes").val();

var del_type = $("#delivery_type").val();
var del_courier = $("#courier").val();
var del_fee = $("#delivery_fee").val();

var payment_type = $("#payment_type_id").val();
var payment_method = $("#summ-payment-type-list").val();

var total_amount = $("#total_amount").attr("data-id") ;
var total_items = $("#comp_total_items").val();

var prod_id = [];

$("#prod_dtls tbody tr").each(function(row, tr){
    sub = {
        "item_id" : $(tr).find(".item_id").text(),
        "prod_id" : $(tr).find(".prod_id").text(),
        "prod_var1" : $(tr).find(".prod_var1").text(),
        "prod_var2" : $(tr).find(".prod_var2").text(),
        "prod_qty" : $(tr).find(".prod_qty").text(),
        "prod_price" : $(tr).find(".prod_unit_price").text().replace(/,/g, ''),
        "prod_total_price" : $(tr).find(".prod_total_price").text().replace(/,/g, '')
    }
    prod_id.push(sub);
})


$.ajax({
    data : {csrf_name : csrf_name, seller_id : seller_id, bill_fname : bill_fname, bill_mname : bill_mname, bill_lname : bill_lname, bill_email : bill_email, bill_mobile : bill_mobile, bill_phone : bill_phone, bill_address : bill_address, bill_barangay : bill_barangay, bill_city : bill_city, bill_province : bill_province, bill_zip : bill_zip, bill_contact : bill_contact, bill_notes : bill_notes,del_type : del_type, del_courier : del_courier, del_fee : del_fee, payment_type : payment_type, payment_method : payment_method, total_amount : total_amount, total_items : total_items, prod_id : prod_id},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Guest/place_order",
    success : function(result){
        $("#input[name=csrf_name]").val(result.token);
        swal({
            type : "success",
            title : "Successfully Order",
            text : "Please wait for email for approval of your order"
        }, function(){
            window.open(base_url + "my-order", "_self"      );
        })
    }, error : function(err){
        console.log(err.responseText)
    }
})

}