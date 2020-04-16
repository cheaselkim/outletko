$(document).ready(function(){

    div_hide();
    country();
    category();
    $("#div-plan").show();
    $("#info-mobile").mobilenumber();
    $("#info-phone").mobilenumber();
    $("#bill-mobile").mobilenumber();
    $("#bill-phone").mobilenumber();
    $("#cart-plan-outlet-qty").number(true, 0);

    $('#info-bday').datepicker({
        changeMonth : true,
        changeYear : true,
        dateFormat: 'mm/dd/yy', 
        onClose: function () {
            $(this).parsley().validate();
        }
    });    

    $("#info-town").autocomplete({
        focus: function(event, ui){
            $("#info-town").attr("data-id", ui.item.city_id);
            $("#info-town").attr("data-prov", ui.item.prov_id);
            $("#info-province").val(ui.item.province);
        },
        select: function(event, ui){
            $("#info-town").attr("data-id", ui.item.city_id);
            $("#info-town").attr("data-prov", ui.item.prov_id);
            $("#info-province").val(ui.item.province);
        },
        source: function(req, add){
          var csrf_name = $("input[name=csrf_name]").val();
            var city = $("#info-town").val();
            $.ajax({
                url: "Signup/search_city_prov/", 
                dataType: "json",
                type: "POST",
                data: {'city' : city, csrf_name : csrf_name},
                success: function(data){
                    $("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                        $("#info-town").val("");
                        $("#info-province").val("");
                        $("#info-town").attr("data-id", "");
                        $("#info-town").attr("data-prov", "");
                        add('');
                    }
                }, error: function(err){
                    console.log("Error: " + err.responseText);
                }
            });
        }
    });    

    $("#bill-town").autocomplete({
        focus: function(event, ui){
            $("#bill-town").attr("data-id", ui.item.city_id);
            $("#bill-town").attr("data-prov", ui.item.prov_id);
            $("#bill-province").val(ui.item.province);
        },
        select: function(event, ui){
            $("#bill-town").attr("data-id", ui.item.city_id);
            $("#bill-town").attr("data-prov", ui.item.prov_id);
            $("#bill-province").val(ui.item.province);
        },
        source: function(req, add){
          var csrf_name = $("input[name=csrf_name]").val();
            var city = $("#bill-town").val();
            $.ajax({
                url: "Signup/search_city_prov/", 
                dataType: "json",
                type: "POST",
                data: {'city' : city, csrf_name : csrf_name},
                success: function(data){
                    $("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                        $("#bill-town").val("");
                        $("#bill-province").val("");
                        $("#bill-town").attr("data-id", "");
                        $("#bill-town").attr("data-prov", "");
                        add('');
                    }
                }, error: function(err){
                    console.log("Error: " + err.responseText);
                }
            });
        }
    });    

    $("#info-partner").autocomplete({
        select: function(event, ui){
            $("#info-partner").attr("data-id", ui.item.partner_id);
            $("#info-partner").attr("data-lvl-2", ui.item.lvl_2);
            $("#info-partner").attr("data-lvl-3", ui.item.lvl_3);
        },
        source: function(req, add){
            var csrf_name = $("input[name=csrf_name]").val();
            var partner = $("#info-partner").val();
            $.ajax({
                url: "Signup/search_partner/", 
                dataType: "json",
                type: "POST",
                data: {'partner' : partner, csrf_name : csrf_name},
                success: function(data){
                    $("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                        $("#info-partner").val("");
                        $("#info-partner").attr("data-id", "");
                        add('');
                    }
                }, error: function(err){
                    console.log("Error: " + err.responseText);
                }
            });
        }
    });    
    
    $('#info-form').parsley({
        errors: {
            container: function ( elem ) {
                console.log(elem);
                return $( elem ).parent();
            }
        }
    });

    $('#bill-form').parsley({
        errors: {
            container: function ( elem ) {
                return $( elem ).parent();
            }
        }
    });    

    $("#cart-plan-outlet-qty").keyup(function(){
        if ($(this).val() == ""){
            $(this).val("0");
            $("#cart-pan-outlet-qty").val("0");
        }else{
            cart_outlet();
        }
        $("#cart-pan-outlet-qty").val($(this).val());
    });

    $(".div-payment-type").click(function(){
        $(".div-payment-type").css("background", "white");
        $("#" + $(this).attr("id")).css("background", "#ffa812");

        if ($(this).attr("id") == "div-card-payment"){
            $("#payment-type").val("1");
        }else{
            $("#payment-type").val("2");
        }
        check_payment();
    });

    $("#btn-next-info").click(function(){
        check_info();
    });

    $(".btn-plan").click(function(){
        check_plan($(this).val());
    });

    $("#btn-next-cart").click(function(){
        check_cart();
    });

    $("#btn-next-bill").click(function(){
        check_bill();
    });

    $("#btn-next-payment").click(function(){
        check_payment("10");
    });

    $("#btn-next-payment-details").click(function(){
        check_payment_details();
    });

    $("#btn-back-info").click(function(){
        div_hide();
        $("#div-plan").show();
    });

    $("#btn-back-cart").click(function(){
        div_hide();
        $("#div-info").show();
    });

    $("#btn-back-bill").click(function(){
        div_hide();
        $("#div-cart").show();
    });
    
    $("#btn-back-payment").click(function(){
        div_hide();
        $("#div-bill").show();
    });

    $("#btn-back-payment-details").click(function(){
        div_hide();
        $("#div-payment").show();
    });

    $("#btn-bank-payment").click(function(){
        check_payment_details();
    });

    
});

jQuery.fn.mobilenumber = function()
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

function div_hide(){

    $("#div-info").hide();
    $("#div-plan").hide();
    $("#div-cart").hide();
    $("#div-bill").hide();        
    $("#div-payment").hide();
    $("#div-payment-details").hide();
    
}

function country(){
    var csrf_name = $("input[name='csrf_name']").val();

    $.ajax({
        data : {csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Signup/Country",
        success : function(result){
            $("input[name='csrf_name']").val(result.csrf_name);
            var data = result.result;
            for (var i = 0; i < data.length; i++) {
                $("#info-country").append("<option value='"+data[i].id+"'>"+data[i].country+"</option>");
                $("#bill-country").append("<option value='"+data[i].id+"'>"+data[i].country+"</option>");
            }

            $("#info-country").val("136");
            $("#bill-country").val("136");
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function category(){
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        type : "GET",
        url : "Signup/business_category",
        dataType : "JSON",
        data : {csrf_name : csrf_name},
        success : function(data){
            $("input[name=csrf_name]").val(data.token);   
            for (var i = 0; i < data.result.length; i++) {
                $("#info-business-category").append("<option value='"+data.result[i].id+"'>"+data.result[i].desc+"</option>");
            }
        }, error : function(err){
            console.log(err.responseText);
        }
    })    

}

function cart_outlet(){
    var qty = $("#cart-plan-outlet-qty").val();
    var plan = $("#plan-type").val();
    var plan_price = $("#plan-price").val();
    var price = "";
    var total = "";

    if (qty > 0){
        if (plan == "1"){
            price = 1000;
        }else if (plan == "2"){
            price = 650;
        }else if (plan == "3"){
            price = 375;
        }else if (plan == "4"){
            price = 150;
        }else{

        }
    }else{
        qty = 0;
        price = 0;
    }

    total = qty * price; 
    grand_total = Number(plan_price) + Number(total);
    $("#cart-plan-outlet-qty-dp").val(qty);
    $("#cart-plan-outlet-price").text($.number(price, 2));
    $("#cart-plan-outlet-total-price").text("PHP " + $.number(total, 2));
    $("#cart-grand-total").text("PHP " + $.number(grand_total, 2));
    $("#total_amount").val(grand_total);
}

function check_info(){

    if (grecaptcha && grecaptcha.getResponse().length !== 0){
        if ($("#info-form").parsley().isValid()){
            div_hide();
            $("#div-cart").show();                    
        }else{
            swal({
                type : "warning",
                title : "Please input all required fields"
            })
        }

    }else{
        swal({
            type : "warning",
            title : "Please Check reCAPTCHA"
        })

    }


}

function check_plan(plan){
    div_hide();
    $("#div-info").show();
    $("#plan-type").val(plan);

    var plan_name = "";
    var plan_price = "";

    if (plan == "1"){
        plan_name = "Payment Plan A : Annually";
        plan_price = "9500.00";
    }else if (plan == "2"){
        plan_name = "Payment Plan B : Semi - Annual";
        plan_price = "5250.00";
    }else if (plan == "3"){
        plan_name = "Payment Plan C : Quarterly";
        plan_price = "2875.00"
    }else if (plan == "4"){
        plan_name = "Payment Plan D : Monthly";
        plan_price = "995.00"
    }else{

    }

    $("#plan-price").val(plan_price);
    $("#cart-plan-name").text(plan_name);
    $("#cart-plan-price").text("PHP " + $.number(plan_price, 2));
    $("#cart-plan-total-price").text("PHP " + $.number(plan_price, 2));
    $("#cart-grand-total").text("PHP " + $.number(plan_price, 2));
    $("#total_amount").val(plan_price);

    cart_outlet();

}

function check_cart(){
    div_hide();
    $("#div-payment").show();
    $("#payment-grand-total").text("PHP " + $.number($("#total_amount").val(), 2));

    $("#bill-fname").val($("#info-fname").val());
    $("#bill-lname").val($("#info-lname").val());
    $("#bill-address").val($("#info-business-address").val());
    $("#bill-town").val($("#info-town").val());
    $("#bill-province").val($("#info-province").val());
    $("#bill-town").attr("data-id", $("#info-town").attr("data-id"));
    $("#bill-town").attr("data-prov", $("#info-town").attr("data-prov"));
    $("#bill-zipcode").val($("#info-zipcode").val());
    $("#bill-email").val($("#info-email").val());
    $("#bill-mobile").val($("#info-mobile").val());
    $("#bill-phone").val($("#info-phone").val());
    $("#bill-phone-code").val($("#info-phone-code").val());

}

function check_bill(){
    div_hide();
    $("#div-payment").show();            

    if ($("#bill-form").parsley().isValid()){
    }else{
        swal({
            type : "warning",
            title : "Please input all required fields"
        })
    }

}

function check_payment(){

    if ($("#payment-type").val() != ""){

        div_hide();
        $("#div-payment-details").show();
        $("#div-card-payment-details").hide();
        $("#div-bank-payment-details").hide();

        if ($("#payment-type").val() == "1"){
            card_payment();
        }else{
            bank_payment();
        }

    }else{
        swal({
            type : "warning",
            title : "No Payment Method Selected",
            text : "Please select payment method"
        })
    }

    // check_payment_details();

}

function card_payment(){
    $("#div-card-payment-details").show();
    var total_amount = $("#total_amount").val();

    swal({
    	type : "warning",
    	title : "Payment Loading",
    	timer : 3000,
		showCancelButton: false,
		showConfirmButton: false
    })

    paypal.Buttons({
        createOrder: function(data, actions) {
          // This function sets up the details of the transaction, including the amount and line item details.
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: total_amount
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          // This function captures the funds from the transaction.
          return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.
            // alert('Transaction completed by ' + details.payer.name.given_name);

            check_payment_details();

          });
        }
      }).render('#paypal-button-container'); 
    //   $(".paypal-button-number-0").css("display", "none !important");

    //   function(n) {
    //     n.preventDefault(), n.stopPropagation();
    //     var t = P({
    //       payment: o
    //     });
    //     e.payPromise = t
    //   }

      //   $(".paypal-button-number-0").hide();

}

function bank_payment(){
    $("#div-bank-payment-details").show();

}

function check_payment_details(){

    var info_fname = $("#info-fname").val();
    var info_lname = $("#info-lname").val();
    var info_gender = $(".info-gender:checked").val();
    var info_bday = $("#info-bday").val();
    
    var info_business_name = $("#info-business-name").val();
    var info_business_category = $("#info-business-category").val();
    var info_address = $("#info-business-address").val();
    var info_town = $("#info-town").attr("data-id");
    var info_province = $("#info-town").attr("data-prov");
    var info_zipcode = $("#info-zipcode").val();
    var info_country = $("#info-country").val();
    var info_email = $("#info-email").val();
    var info_mobile = $("#info-mobile").val();
    var info_phone = $("#info-phone").val();
    var info_phone_area = $("#info-phone-code").val();
    var info_partner = $("#info-partner").attr("data-id");
    var info_partner_2 = $("#info-partner").attr("data-lvl-2");
    var info_partner_3 = $("#info-partner").attr("data-lvl-3");

    var plan_type = $("#plan-type").val();
    var plan_price = $("#plan-price").val();
    var plan_outlet_qty = $("#cart-plan-outlet-qty").val();
    var plan_outlet_price = $("#cart-plan-outlet-price").text().replace(",", "");;
    var plan_total_amount = $("#total_amount").val();
    var plan_total_vat = ((plan_total_amount * 0.12 ) / 1.12).toFixed(2);

    var bill_fname = $("#bill-fname").val();
    var bill_lname = $("#bill-lname").val();
    var bill_company = $("#bill-company").val();
    var bill_address = $("#bill-address").val();
    var bill_town = $("#bill-town").attr("data-id");
    var bill_province = $("#bill-town").attr("data-prov");
    var bill_zipcode = $("#bill-zipcode").val();
    var bill_country = $("#bill-country").val();
    var bill_email = $("#bill-email").val();
    var bill_mobile = $("#bill-mobile").val();
    var bill_phone = $("#bill-phone").val();
    var bill_phone_code = $("#bill-phone-code").val();

    var payment_type = $("#payment-type").val();

    var link_name = info_business_name;
    link_name = $.trim(link_name.toString().toLowerCase());
    link_name = link_name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');

    var info_user  = {
        info_fname : info_fname,
        info_lname : info_lname,
        info_gender : info_gender,
        info_bday : info_bday,
        info_business_name : info_business_name,
        info_business_category : info_business_category,
        info_address : info_address,
        info_town : info_town,
        info_province : info_province,
        info_zipcode : info_zipcode,
        info_country : info_country,
        info_email : info_email,
        info_mobile : info_mobile,
        info_phone : info_phone,
        info_phone_area : info_phone_area,
        info_partner : info_partner,
        info_level_2 : info_partner_2,
        info_level_3 : info_partner_3,
        plan_type : plan_type,
        plan_price : plan_price,
        plan_outlet_qty : plan_outlet_qty,
        plan_outlet_price : plan_outlet_price,
        plan_total_amount : plan_total_amount

    }

    var info_bill = {
        bill_fname : bill_fname,
        bill_lname : bill_lname,
        bill_company : bill_company,
        bill_address : bill_address,
        bill_town : bill_town,
        bill_province : bill_province,
        bill_zipcode : bill_zipcode,
        bill_country : bill_country,
        bill_email : bill_email,
        bill_mobile : bill_mobile,
        bill_phone : bill_phone,
        bill_phone_code : bill_phone_code,
        plan_type : plan_type,
        plan_price : plan_price,
        plan_outlet_qty : plan_outlet_qty,
        plan_outlet_price : plan_outlet_price,
        plan_total_vat : plan_total_vat,
        plan_total_amount : plan_total_amount,
        payment_type : payment_type
    }
    
    var info_outletko = {
            account_id : "",
            account_name : info_business_name,
            link_name : link_name,
            account_status : 0,
            confirm_email : 0,
            business_category : info_business_category,
            username : info_email,
            password : "password",
            first_name : info_fname,
            last_name : info_lname,
            address : info_address,
            city : info_town,
            user_id : "0",
            province : info_province,
            email : info_email,
            mobile_no  : info_mobile,
            gender : info_gender,
            birthday : info_bday
    }
    
    var info_outletsuite = {
            
            account_id : "",
            status : 0,
            first_name : info_fname,
            last_name : info_lname,
            username : info_email,
            password : "password",
            email : info_email,
            birthday : info_bday,
            gender : info_gender
    } 

    var csrf_name = $("input[name=csrf_name]").val();
    console.log(info_user);

    $.ajax({
        data : {csrf_name : csrf_name, info_user : info_user, info_bill : info_bill, info_outletko : info_outletko, info_outletsuite : info_outletsuite},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Store_register/save_account",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            swal({
                type : "success",
                title : "Account Registration Completed",
                text : "Please see your email for further instructions"
            }, function(){
                location.reload();
            })    
        }, error : function(err){
            console.log(err.responseText);
        }
    })

    // setTimeout(function () {
    //     swal({
    //         type : "success",
    //         title : "Transaction Completed",
    //         text : "Please see your email for further instructions"
    //     }, function(){
    //         location.reload();
    //     })    
    // }, 3000);

}