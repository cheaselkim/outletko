$(document).ready(function(){

    $("#div-details-2").hide();
    $("#prod_qty").number(true, 0);
    $("#div-product-details").hide();
    $("#alert-pc").hide();
    $("#alert-phone").hide();
    $(".div-store-img").css("background", "white");
    $id = $("#id").val();

    $("#div-pop-mm").hide();
    $("#div-pop-luz").hide();
    $("#div-pop-vis").hide();
    $("#div-pop-min").hide();
    $("#div-footer-btn-order").hide();
    $("#div-footer-btn-qty").hide();
    $("#div-footer-btn-cart").hide();

    // console.log($("input[name=csrf_name]").val());

//   get_profile($id);
    setTimeout(function(){ 
        get_profile($id);    
    }, 500);

    // $("#btn-del-info").popover({
    //     html: true,
    //     trigger: "click",
    //     title: "Delivery Coverage Area",
    //     content: $('#popover-content')
    // });

    // $("#btn-del-info-2").popover({
    //     html: true,
    //     trigger: "click",
    //     placement : "top",
    //     title: "Delivery Coverage Area",
    //     content: $('#popover-content')
    // });

    $("#link-products").click(function(){
        $("#div-display-products").show();
        $(".div-header-2").show();
        $(".div-header-3").show();
        $(".div-header-4").show();
        $("#div-product-details").hide();    
        $("#div-footer-btn-order").hide();
        $(window).scrollTop($('#div-posted-prod').offset().top - 100);    
            
    });

  $("#btn_back").click(function(){
    $("#div-display-products").show();
    $(".div-header-2").show();
    $(".div-header-3").show();
    $(".div-header-4").show();
    $("#div-product-details").hide();    
    $("#div-footer-btn-order").hide();
    $(window).scrollTop($('#div-posted-prod').offset().top);    
    // $("#btn-del-info").popover('hide');
    // $("#btn-del-info-2").popover('hide');

    // if ($("#comp-prod-id").val() != "0"){
    //     console.log(base_url + $("#link-name").val());
    //     window.open(base_url + $("#link-name").val(), "_self");
    // }

  });

  $("#btn_back2").click(function(){
    $("#div-display-products").show();
    $(".div-header-2").show();
    $(".div-header-3").show();
    $(".div-header-4").show();
    $("#div-product-details").hide();    
    $("#div-footer-btn-order").hide();
    $(window).scrollTop($('#div-posted-prod').offset().top);    
    // $("#btn-del-info").popover('hide');
    // $("#btn-del-info-2").popover('hide');

    // if ($("#comp-prod-id").val() != "0"){
    //     window.open(base_url + $("#link-name").val(), "_self");
    // }

})

$("#btn-footer-back").click(function(){
    $("#div-display-products").show();
    $(".div-header-2").show();
    $(".div-header-3").show();
    $(".div-header-4").show();
    $("#div-product-details").hide();    
    $("#div-footer-btn-order").hide();
    $("#div-store-img-1").show();
    $(window).scrollTop($('#div-posted-prod').offset().top);    
    // $("#btn-del-info").popover('hide');
    // $("#btn-del-info-2").popover('hide');

    // if ($("#comp-prod-id").val() != "0"){
    //     window.open(base_url + $("#link-name").val(), "_self");
    // }

})

  $("#btn-sel-prod").click(function(){
    $("#div-display-products").show();
    $(".div-header-2").show();
    $(".div-header-3").show();
    $(".div-header-4").show();
    $("#div-product-details").hide();    
    $(window).scrollTop($('#div-posted-prod').offset().top);    
  });

  $("#btn_cart").click(function(){
    check_session(1);
  });

  $("#btn_order").click(function(){
    check_session(2);
  });

  $("#prod_qty").keyup(function(){
    if ($(this).val() == "0"){
      $(this).val(1);
    }else if ($(this).val() == ""){
      $(this).val(1);
    }
    compute_total_amount($(this).val());
  });

  $("#btn_add").click(function(){
    var val = Number($("#prod_qty").val()) + 1;
    $("#prod_qty").val(val);
    compute_total_amount(val);
  });

  $("#btn_minus").click(function(){
    var val = Number($("#prod_qty").val()) - 1;
    if (val == 0){
      val = 1;
    } 
    $("#prod_qty").val(val);
    compute_total_amount(val);
  });

  $("#btn-footer-cart").click(function(){
    check_session(1);
  });

  $("#btn-footer-order").click(function(){
    check_session(2);
  });

  $("#prod-footer-qty").keyup(function(){
    if ($(this).val() == "0"){
      $(this).val(1);
    }else if ($(this).val() == ""){
      $(this).val(1);
    }
    compute_total_amount($(this).val());
  });

  $("#btn-footer-add").click(function(){
    var val = Number($("#prod-footer-qty").val()) + 1;
    $("#prod-footer-qty").val(val);
    compute_total_amount(val);
  });

  $("#btn-footer-minus").click(function(){
    var val = Number($("#prod-footer-qty").val()) - 1;
    if (val == 0){
      val = 1;
    } 
    $("#prod-footer-qty").val(val);
    compute_total_amount(val);
  });


  $("#prod-category").change(function(){
    product_by_cat($(this).val());
  });

});

function lightOrDark(color) {

    // Variables for red, green, blue values
    var r, g, b, hsp;
    
    // Check the format of the color, HEX or RGB?
    if (color.match(/^rgb/)) {

        // If HEX --> store the red, green, blue values in separate variables
        color = color.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);
        
        r = color[1];
        g = color[2];
        b = color[3];
    } 
    else {
        
        // If RGB --> Convert it to HEX: http://gist.github.com/983661
        color = +("0x" + color.slice(1).replace( 
        color.length < 5 && /./g, '$&$&'));

        r = color >> 16;
        g = color >> 8 & 255;
        b = color & 255;
    }
    
    // HSP (Highly Sensitive Poo) equation from http://alienryderflex.com/hsp.html
    hsp = Math.sqrt(
    0.299 * (r * r) +
    0.587 * (g * g) +
    0.114 * (b * b)
    );

    var font_color = "";

    // Using the HSP value, determine whether the color is light or dark
    if (hsp > 150) { //127.5
        font_color = "black";
        // return 'light';
    }else {
        font_color = "white";
        // return 'dark';
    }

    $("#text-buss-name").css("color", font_color);
    $("#text-buss-address").css("color", font_color);
    $("#text-buss-contact-no").css("color", font_color);
    $("#text-buss-email").css("color", font_color);
    $("#header_aboutus").css("color", font_color);
    $(".div-menu-bar a").css("color", font_color);
}

function get_profile(id){

 var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data: {csrf_name : csrf_name, id : id}, 
    type: "POST", 
    url : base_url +  "Profile/profile",
    dataType : "JSON",
    success : function(result){
    $("input[name=csrf_name]").val(result.token);

    reviews(result.ave_review);
    $("#div-user-reviews").html(result.review);

    var prod_cat = result.prod_cat;
    var profile = "";
    
    if (result.profile == "false"){
        profile = base_url + "assets/images/no-image.jpg";
    }else{      
        profile = base_url + "images/profile/" + result.profile;
    }
    
    var address = (result.result[0].street == null ? "" : (result.result[0].street == "" ? "" : result.result[0].street  + ", ")) + 
            (result.result[0].village == null ? "" : (result.result[0].village == "" ? "" : result.result[0].village + ", "))  + 
            (result.result[0].barangay == null ? "" : (result.result[0].barangay == "" ? "" : result.result[0].barangay + ", "))  + 
            (result.result[0].city_desc == null ? "" : (result.result[0].city_desc == "" ? "" : result.result[0].city_desc + ", ")) + 
            (result.result[0].province_desc == null ? "" : (result.result[0].province_desc == "" ? "" : result.result[0].province_desc)) ;

    if (prod_cat.length > 0){
        for (var i = 0; i < prod_cat.length; i++) {
            $("#prod-category").append("<option value='"+prod_cat[i].id+"'>"+prod_cat[i].product_category  +"</option>");
        }    
    }
        
    //for text
        $(".div-header").css("background", (result.result[0].bg_color == null ? "#77933c" : (result.result[0].bg_color == "" ? "#77933c" : result.result[0].bg_color) ) );
        $(".div-header-2").css("background", (result.result[0].bg_color == null ? "#77933c" : (result.result[0].bg_color == "" ? "#77933c" : result.result[0].bg_color) ) );
        $(".div-profile-footer").css("background", (result.result[0].bg_color == null ? "#77933c" : (result.result[0].bg_color == "" ? "#77933c" : result.result[0].bg_color)) );
        $(".div-menu-bar").css("background", (result.result[0].bg_color == null ? "#77933c" : (result.result[0].bg_color == "" ? "#77933c" : result.result[0].bg_color)));

        lightOrDark((result.result[0].bg_color == null ? "77933c" : (result.result[0].bg_color == "" ? "77933c" : result.result[0].bg_color)));

        $("#div-prod-img").css("background-image", "url('"+profile+"')");
        $("#div-footer-img").css("background-image", "url('"+profile+"')");

        $("#div-footer-img").css("background-size", "100% 100%");

        $("#account-post").text(result.result[0].account_post);
        $("#header_whats_new").text(result.result[0].account_post);

        $("#link-name").val(result.result[0].link_name);

        $("#text-buss-name").text(result.result[0].account_name);
        $("#owner_name_text").text(result.result[0].first_name+" "+result.result[0].middle_name+" "+result.result[0].last_name);
        $("#text-buss-type").text(result.result[0].desc_cat);
        $("#text-buss-address").text((address == "" ? "No Address" : address));
        
        $("#text_aboutus").text(result.result[0].about_us);
        $("#header_aboutus").text(result.result[0].about_us);

        $("#text-buss-email").text("Email : "+ (result.result[0].email == null ? "N/A" : (result.result[0].email == "" ? "N/A" : result.result[0].email)));
        $("#text-buss-contact-no").text("Mobile No. : "+(result.result[0].mobile_no == null ? "N/A" : (result.result[0].email == "" ? "N/A" : "+63"+result.result[0].mobile_no)));
        $("#text-buss-tel-no").text("Tel No. : "+(result.result[0].telephone_no == null ? "N/A" : (result.result[0].telephone_no == "" ? "N/A" : result.result[0].telephone_no)));
        $("#text-buss-facebook").text("Facebook : "+ (result.result[0].facebook == null ? "N/A" : (result.result[0].facebook == "" ? "N/A" : result.result[0].facebook)));

        

        
        $("#email_text").text(" "+ (result.result[0].email == null ? "" : result.result[0].email));
        $("#tel_text").text(" "+(result.result[0].telephone_no == null ? "" : result.result[0].telephone_no));
        $("#mobile_text").text(" "+(result.result[0].mobile_no == null ? "" : "+63"+result.result[0].mobile_no));
        $("#web_text").text(" "+ (result.result[0].website == null ? "" : result.result[0].website));
        $("#fb_text").text(" "+ (result.result[0].facebook == null ? "" : result.result[0].facebook));
        $("#twitter_text").text(" "+ (result.result[0].twitter == null ? "" : result.result[0].twitter));
        $("#insta_text").text(" "+ (result.result[0].instagram == null ? "" : result.result[0].instagram));
        $("#shopee_text").text(" "+ (result.result[0].shoppee == null ? "" : result.result[0].shoppee) );
        
        $("#email_text").prepend("<i class='fas fa-envelope-square'></i>");
        $("#tel_text").prepend("<i class='fas fa-phone-square'></i>");
        $("#mobile_text").prepend("<i class='fas fa-phone-square'></i>");
        $("#fb_text").prepend("<i class='fab fa-facebook-square'></i>");
        $("#twitter_text").prepend("<i class='fab fa-twitter-square'></i>");
        $("#insta_text").prepend("<i class='fab fa-instagram'></i>");
        $("#shopee_text").prepend("<i class='fas fa-shopping-bag'></i>");

        var link_website = result.result[0].website;
        var link_facebook = result.result[0].facebook;
        var link_instagram = result.result[0].instagram;

        if (link_website.length > 0){
            $("#link-website").attr("href", link_website);            
        }else{
            $("#link-website").hide();
        }

        if (link_facebook.length > 0){
            $("#link-facebook").attr("href", link_facebook);            
        }else{
            $("#link-facebook").hide();
        }

        if (link_instagram.length > 0){
            $("#link-instagram").attr("href", link_instagram);            
        }else{
            $("#link-instagram").hide();
        }

        if (link_website.length <= 0 && link_facebook.length <= 0 && link_instagram <= 0){
            $("#div-links").attr("hidden", true);
        }else{
            $("#div-links").attr("hidden", false);
        }


    //for text
    
    
    //for inputs
        $("#input_businessname").val(result.result[0].account_name);
        $("#input_aboutus").val(result.result[0].about_us);
        $("#input_bussinesscategory").val(result.result[0].business_category);

        $("#input_bldg").val();
        $("#input_subdivision").val();
        $("#input_barangay").val();
        $("#input_city").val(result.result[0].city_desc);
        $("#input_city").attr("data-id",result.result[0].city);
        $("#input_province").val(result.result[0].province_desc);
        $("#input_province").attr("data-id",result.result[0].province);
        
        $("#input_email").val(result.result[0].email);
        $("#input_mobile").val(result.result[0].mobile_no);
        $("#input_telephone").val(result.result[0].telephone_no);

        $("#input_website").val(result.result[0].facebook);
        $("#input_facebook").val(result.result[0].facebook);
        $("#input_twitter").val(result.result[0].twitter);
        $("#input_instagram").val(result.result[0].instagram);
        $("#input_shopee").val(result.result[0].shoppee);
    //for inputs
    
    //for prod_cat_list
        $('#prod_cat_list ul').empty();
        for(var x = 0; x<result.prod_cat.length; x++) {
            $("#prod_cat_list ul").append('<li class="pl-0 font-size-16">'+result.prod_cat[x]['product_category']+'</li>');
        }
    //for prod_cat_list
      
      // for (var i = 0; i < result.payment_type.length; i++) {
      //   var payment_type_id = result.payment_type[i].payment_type_id;
      //   var check = result.payment_type[i].payment_type_check;

      //   if (check == 1){
      //     $("#payment_"+ (i + 1) ).prop("checked", true);
      //   }
      // }


      // for (var i = 0; i < result.delivery_type.length; i++) {
      //   var delivery_type_id = result.delivery_type[i].delivery_type_id;
      //   var check = result.delivery_type[i].delivery_type_check;

      //   if (check == 1){
      //     $("#delivery_"+ (i + 1) ).prop("checked", true);
      //   }
      // }

      // $("#std_del").val(result.shipping_fee[0].std_delivery);
      // $("#ship_w_mm").val(result.shipping_fee[0].sf_w_mm);
      // $("#ship_o_mm").val(result.shipping_fee[0].sf_o_mm);



    //products
        $('#posted_prod').empty();
        var posted_rows = 0;
        var posted_rows2 = 0;
        var posted_rows3 = 0;

        if ($(document).width() <= 768){
            posted_rows = (result.products.length/6).toFixed(0);
            // console.log("posted_rows raw " + posted_rows);
            posted_rows2 = (result.products.length/ (6 * posted_rows));    
            posted_rows3 = (result.products.length/6) - posted_rows;
        }else{
            posted_rows = (result.products.length/8).toFixed(0);
            // console.log("posted_rows raw " + posted_rows);
            posted_rows2 = (result.products.length/ (8 * posted_rows));    
            posted_rows3 = (result.products.length/8) - posted_rows;
        }

        // console.log("Products Length "  + result.products.length);
        // console.log("posted_rows raw " + posted_rows);
        // console.log("posted_rows2 " + posted_rows2);
        // console.log((result.products.length / 6));
        // console.log("posted_rows2 remainder "  + ((result.products.length/6) - posted_rows ))

        if (posted_rows2 <= 1){
            posted_rows2 = 0;
        }else{
            posted_rows2 = posted_rows2.toFixed(0);
        }

        if (posted_rows3 > 0){
            posted_rows2 = 1;
        }else{
            posted_rows2 = 0;
        }

        // console.log("posted_rows2 " + posted_rows2);
        posted_rows = Number(posted_rows) + Number(posted_rows2);
        // console.log("posted_rows final " + posted_rows);
        var $style = "";
        var i =1;
      	var a = 0;
      	var mod = 0;

        // console.log(posted_rows);
        if (isFinite(posted_rows) == false){
          posted_rows = 1;
        }if (isNaN(posted_rows)){
          posted_rows = 1;
        }else if (posted_rows < 1){
          posted_rows = 1;
        }


        for (var i = 1; i <= posted_rows; i++) {
          if (i % 2 == 0){
            $style = ("style='background:"+ (result.result[0].bg_color == null ? "77933c" : result.result[0].bg_color)+"'");
          }else{
            $style = "background:white";
          }

          // $("#div-posted-prod .container").append("<div class='row posted-prod-"+i+"' id='posted-prod-"+i+"' "+$style+"></div>");          
          $("#div-posted-prod").append("<div class='col-12 div-row-prod-"+i+" pb-2' id='div-row-prod-"+i+"' "+$style+"></div>");
          $("#div-posted-prod .div-row-prod-"+i+"").append("<div class='container mx-auto'></div>");
          $("#div-posted-prod .container").append("<div class='row posted-prod-"+i+"' id='posted-prod-"+i+"' "+$style+"></div>");          

        }

        // console.log(result.products.length);
        var prod_price = "";
        var min_price = "";
        var max_price = "";

        for(var x = 0; x < result.products.length; x++) {
            var href_url = base_url +'images/products/'+result.products[x].img_location;
            var product_name = result.products[x].product_name;
            var margin = "";
            var margin_plus_image = "";
            var avail = result.products[x].avail;
            var percent_off = "";

            if (x > 3){
              margin = "mt-3";
            }else{
              margin = "";
            }

            if (x > 2){
              margin_plus_image = "mt-2";
            }else{
              margin_plus_image = "";
            }

            if ($(document).width() <= 600){
                if (product_name.length <= 30){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 30) + "....";
                }    
            }else if ($(document).width() <= 768 ){
                if (product_name.length <= 38){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 38) + "....";
                }    
            }else if ($(document).width() <= 1024 ){
                if (product_name.length <= 50){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 50) + "....";
                }    
            }else{
                if (product_name.length <= 42){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 42) + "....";
                }    
            }

            min_price = result.products[x]['min_price'];
            max_price = result.products[x]['max_price'];
            // console.log(product_name);
            // console.log(min_price);
            // console.log(max_price);
            // console.log(result.products[x]['product_unit_price']);

            if (min_price == null){
                prod_price = $.number(result.products[x]['product_unit_price'], 2)  
            }else{
                if (min_price != ""){
                    prod_price = $.number(min_price, 2) + " - " + $.number(max_price, 2);
                }else{
                    prod_price = $.number(min_price, 2) + " - " + $.number(max_price, 2);
                }
            } 

            if (result.products[x]['max_percent'] != 0){
                if (result.products[x]['min_discount'] == result.products[x]['max_discount']){
                    prod_price = $.number(result.products[x]['min_discount'], 2);
                }else{
                    prod_price = $.number(result.products[x]['min_discount'], 2) + " - " + $.number(result.products[x]['max_discount'], 2);
                }
            }

            discount_prod_price = '<span class="font-weight-600 font-size-14 text-red  list-prod-price">&#8369; '+ prod_price +'</span><br>' 

            if (result.products[x].avail != "0"){
                if (result.products[x]['max_percent'] != 0){
                    percent_off = '<h6 class="ribbon">' + $.number(result.products[x]['max_percent'], 0) + '% OFF</h6>';
                }
            }


            var e = $('<div class="col col-6 col-md-4 col-lg-3  mt-3 '+margin+' ">'+
            '<div class="div-list-img cursor-pointer mx-auto bd-green" id="div-list-prod-'+x+'">'+
                '<div id="div-list-img-'+x+'" class="div-list-prod" onclick="get_product_info('+result.products[x]['id']+');">' +  
            // '<img src="'+href_url+'" class="cursor-pointer"  alt="image" onclick="get_product_info('+result.products[x]['id']+');" >'+
                    percent_off +
                    '<div class="btn" onclick="get_product_info('+result.products[x]['id']+');" hidden>'+
                    // '<i class="fa fa-camera"></i>'+
                    '</div>'+
                '</div>' +
            '</div>'+
            '<div class=" text-center cursor-pointer div-list-img-btn py-1 mx-auto bg-white" onclick="get_product_info('+result.products[x]['id']+');" >' + 
              '<span class="font-weight-600 list-prod-name">'+product_name+'</span><br>' + 
              '<span class="font-weight-600 font-size-16 text-red list-prod-price"> '+ discount_prod_price +'</span>' + 
            '</div>' +
          '</div>');

          // for (var index = 1; index <= posted_rows; index++) {
          //   var total_rows = 8 * index;
          // }
          var index = 1;
          var div_row = 0;
          var div_row2 = 0;
          	a++;
            
            if ($(document).width() <= 768){
                div_row = (a/6).toFixed(0);
                div_row2 = (((a/6).toFixed(2)) % 1);   
            }else{
                div_row = (a/8).toFixed(0);
                div_row2 = (((a/8).toFixed(2)) % 1);    
            }


	        if (Number(div_row2.toFixed(2)) == 0){
	        	mod = 0;
	        }else if (Number((div_row2).toFixed(2)) < 0.50){
	        	mod = 1;
	        }else{
	        	mod = 0;
	        }


	        // console.log(a + " " + div_row2.toFixed(2) + " " + mod);


	        index = Number(div_row) + Number(mod);
            // console.log("index " + index);
            $('.div-row-prod-'+index+' .container #posted-prod-'+index+'').append(e);  


          // if (x < 8){
          //   $('.div-row-prod-'+index+' .container #posted-prod-'+index+'').append(e);  
          // }else{
          //   index++;
          //   $('.div-row-prod-'+index+' .container #posted-prod-'+index+'').append(e);  
          //   if (x > 15){
          //     index = 3;
          //     $('.div-row-prod-'+index+' .container #posted-prod-'+index+'').append(e);  
          //   }
          // }

            if (avail == "0"){
                $("#div-list-img-"+x+"").addClass("prod-not-avail");
                $('#div-list-img-'+x+'').css("background", "linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url('"+href_url+"')");
            }else{
                $('#div-list-img-'+x+'').css("background", "url('"+href_url+"')");
            }

            $('#div-list-img-'+x+'').css("background-repeat", "no-repeat");
            $('#div-list-img-'+x+'').css("background-position", "center");
            $('#div-list-img-'+x+'').css("height", "100%");
            $('#div-list-img-'+x+'').css("width", "100%");
            $('#div-list-img-'+x+'').css("background-size", "contain");

            // if ($(document).width() < 768){
            //     $('#div-list-img-'+x+'').css("background-size", "100px 100%");
            // }else{
            //     $('#div-list-img-'+x+'').css("background-size", "175px 200px");
            // }
        }
    //products
    
        // var e2 = $('<div class="col col-6 col-md-4 col-lg-4 mt-2">' +
        //     '<div class="div-list-img">' +
        //         '<img src="'+base_url+'images/products/plus2.png"  alt="image" data-toggle="modal" data-target="#img_upload" class=" cursor-pointer">' +
        //     '</div>' +
        //     '<div class="bd-green text-center cursor-pointer div-list-img-btn" data-toggle="modal" data-target="#img_upload">' +
        //       '<span class="">Add Product</span>' +
        //     '</div>' +
        //       '</div>'  );

        // $('#posted_prod').append(e2);

        var store = result.store_img;
        var store_img = "";

        // console.log(result);

        for (var i = 0; i < store.length; i++) {
          store_img = base_url + "images/store/" + store[i].image;
          if (store[i].img_order == "1"){
            $("#div-store-img-1").css("background-image", "url('"+store_img+"')");
            $('#div-store-img-1').css('background-repeat', "no-repeat");
            $('#div-store-img-1').css('background-position', "center center");    
          }else if (store[i].img_order == "2"){
            $("#div-store-img-2").css("background-image", "url('"+store_img+"')");
            $('#div-store-img-2').css('background-repeat', "no-repeat");
            $('#div-store-img-2').css('background-position', "center center");    
          }else{
            $("#div-store-img-3").css("background-image", "url('"+store_img+"')");
            $('#div-store-img-3').css('background-repeat', "no-repeat");
            $('#div-store-img-3').css('background-position', "center center");    
          }

          if ($(window).width() < 768){
            $('#div-store-img-1').css('background-size', "contain");
            $('#div-store-img-2').css('background-size', "contain");
            $('#div-store-img-3').css('background-size', "contain");
          }else{
            $('#div-store-img-1').css('background-size', "100% 100%");
            $('#div-store-img-2').css('background-size', "100% 100%");
            $('#div-store-img-3').css('background-size', "100% 100%");
          }

        }
        
        if ($("#comp-prod-id").val() != "0"){
            // console.log($("#comp-prod-id").val());
            get_product_info($("#comp-prod-id").val());
        }

    }, error: function(err){
      console.log(err.responseText);
    }
  });


}

function reviews(data){
    var angry = 0;
    var sad = 0;
    var meh = 0;
    var happy = 0;
    var love = 0;

        angry = (data[0].angry / data[0].all_rating) * 100;
        sad = (data[0].sad / data[0].all_rating) * 100;
        meh = (data[0].meh / data[0].all_rating) * 100;
        happy = (data[0].happy / data[0].all_rating) * 100;
        love = (data[0].love / data[0].all_rating) * 100;        
    
    if (isNaN(angry)){
        angry = 0;
    }

    if (isNaN(sad)){
        sad = 0;
    }

    if (isNaN(meh)){
        meh = 0;
    }

    if (isNaN(happy)){
        happy = 0;
    }

    if (isNaN(love)){
        love = 0;
    }

    $(".progress-angry").width(angry+"%");
    $(".progress-sad").width(sad+"%");
    $(".progress-meh").width(meh+"%");
    $(".progress-happy").width(happy+"%");
    $(".progress-love").width(love+"%");

    $(".progress-angry").text(angry+"%");
    $(".progress-sad").text(sad+"%");
    $(".progress-meh").text(meh+"%");
    $(".progress-happy").text(happy+"%");
    $(".progress-love").text(love+"%");

    $(".span-progress-angry").text(data[0].angry);
    $(".span-progress-sad").text(data[0].sad);
    $(".span-progress-meh").text(data[0].meh);
    $(".span-progress-happy").text(data[0].happy);
    $(".span-progress-love").text(data[0].love);

}

function get_product_info(id){
  
var img_url = base_url + "assets/images/no-image.jpg";
var csrf_name = $("input[name=csrf_name]").val();
$("#prod_qty").val(1);
$("#div-details-2").hide();
$("#div-display-products").hide();
$("#div-btn-order").hide();
$("#std_lbl").hide();
$("#std_del").hide();
$(".div-header-3").hide();
$("#div-details").show();

if ($(document).width() < 768){
    $("#div-store-img-1").hide();
}

// $("#btn-del-info").popover('hide');
// $("#btn-del-info-2").popover('hide');
var window_width = $(document).width();

if (window_width > 768){
$(".div-header-2").removeClass("d-none d-md-block");
$(".div-header-4").removeClass("d-none d-md-block");
$(".div-header-2").hide();
$(".div-header-4").hide();  
$("#prod-desc").show();
$("#prod-desc-2").hide();
$("#div-sm-prod-dtls").hide();
$("#div-lg-prod-dtls").show();
}else{
    $("#prod-desc").hide();
    $("#prod-desc-2").show();
    $("#div-sm-prod-dtls").show();
    $("#div-lg-prod-dtls").hide();
}

$("#div-product-details").show();
//   $(window).scrollTop($('#div-product-details').offset().top);
$(window).scrollTop(0);
// $("#prod_del_city").hide();
$("#prod-name").text("");
$("#prod-dtls").text("");
// $("#prod_del_city").text("");
$("#prod-price").val("PHP 0.00");
$("#prod-condition").val("Condition : ");
$("#prod-stock").val("Stock : ");
$("#prod-weight").val("Weight : ");
$("#div-product-details-img").css("background-image", "url('"+img_url+"')");
$("#prod-var-1").show();
$("#prod-var-2").show();
$("#prod-var-1").empty();
$("#prod-var-2").empty();
$("#prod-var-1").removeClass("error");
$("#prod-var-2").removeClass("error");
$(".carousel-indicators").empty();
$(".carousel-inner").empty();

var min_price = "";
var max_price = "";

$.ajax({
    data : {id : id, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Profile/get_product_info",
    success : function(data){
        //   console.log(data);
        //   console.log(id);
        //   console.log(data.payment_type[0]);
        $("input[name=csrf_name]").val(data.token);

        var mm =  data.mm;
        var luz = data.luz;
        var vis = data.vis;
        var min = data.min;

        var result = {mm : mm, luz : luz, vis : vis, min : min};

        // console.log(result)
        // console.log(luz.length);

        // $('#btn-del-info').popover('show');
        // $('#btn-del-info-2').popover('show');
        $("#pop-min").text("");
        $("#pop-mm").text("");
        $("#pop-luz").text("");
        $("#pop-vis").text("");
                
        if (mm.length > 0){
            $("#div-pop-mm").show();
            $("#pop-mm").text(data.mm);
        }else{
            $("#div-pop-mm").hide();
        }

        if (luz.length > 0){
            $("#div-pop-luz").show();
            for (var i = 0; i < luz.length; i++) {
                $("#pop-luz").append("<p class='mb-0'>"+luz[i].city_desc+"</p>");
            }    
        }else{
            $("#div-pop-luz").hide();
        }

        if (vis.length > 0){
            $("#div-pop-vis").show();
            for (var i = 0; i < luz.length; i++) {
                $("#pop-vis").append("<p class='mb-0'>"+vis[i].city_desc+"</p>");
            }    
        }else{
            $("#div-pop-vis").hide();    
        }

        if (min.length > 0){
            $("#div-pop-min").show();
            for (var i = 0; i < min.length; i++) {
                $("#pop-min").append("<p class='mb-0'>"+min[i].city_desc+"</p>");
            }    
        }else{
            $("#div-pop-min").hide();    
        }

        if (mm.length == 0 && luz.length == 0 && vis.length == 0 && min.length == "0"){
            $("#div-del-area").css("min-height", "30px");
            $("#div-del-area-2").css("min-height", "50px");
        }else{
            $("#div-del-area").css("min-height", "50px");
            $("#div-del-area-2").css("min-height", "50px");
        }

        // $('#btn-del-info').popover('hide');
        // $('#btn-del-info-2').popover('hide');

        $("#prod-name").text(data.products[0].product_name);
        $("#prod-desc").text(data.products[0].product_description);
        $("#prod-desc-2").html(data.products[0].product_description + "<br>");
        $("#prod-other-details-1").text((data.products[0].product_other_details == null ? "" : (data.products[0].product_other_details == "" ? "" : data.products[0].product_other_details)));
        $("#prod-other-details-2").text((data.products[0].product_other_details == null ? "" : (data.products[0].product_other_details == "" ? "" : data.products[0].product_other_details)));
        $("#prod-price").html("&#8369; " + $.number(data.products[0].product_unit_price, 2));
        $("#cart_total_amount").text($.number(data.products[0].product_unit_price, 2));
        $("#prod-condition").text("Condition : " + (data.products[0].product_condition == "1" ? "New" : "Used"));
        $("#prod-stock").text("Stock : " + $.number(data.products[0].product_stock, 0));
        $("#prod-weight").text("Weight : " + $.number(data.products[0].product_weight, 2));
        $("#std_del").text(data.products[0].delivery_type);
        $("#prod_id").val(data.products[0].id);

        if (window_width <= 768){
            $("#div-comp-details").hide();
            $("#div-prod-details").show();
            $("#div-prod-other-details").css("margin-top", "0px");
            if (data.products[0].product_other_details == null){
                $("#div-prod-other-details").css("height", "40px");
                $("#div-prod-other-details").css("min-height", "0px");
                $("#prod-other-details").css("color", "gray");
            }else if (data.products[0].product_other_details == ""){
                $("#div-prod-other-details").css("height", "40px");
                $("#div-prod-other-details").css("min-height", "0px");
                $("#prod-other-details").css("color", "gray");
            }else{
                $("#div-prod-other-details").css("height", "auto");
                $("#div-prod-other-details").css("min-height", "150px");
                $("#prod-other-details").css("color", "black");
            }
        }else{
            $("#div-comp-details").show();
            $("#div-prod-details").hide();
            $("#div-prod-other-details").css("height", "auto");
            $("#div-prod-other-details").css("min-height", "150px");
            $("#div-prod-other-details").css("margin-top", "0px");

            if (data.products[0].product_other_details == null){
                $("#prod-other-details").css("color", "gray");
            }else if (data.products[0].product_other_details == ""){
                $("#prod-other-details").css("color", "gray");
            }else{
                $("#prod-other-details").css("color", "black");
            }

        }

        $("#cart-prod-name").text(data.products[0].product_name);
        $("#cart-prod-price").text($.number(data.products[0].product_unit_price, 2));


        $("#prod_payment_type").text((data.payment_type[0].payment_type == null ? "None" : data.payment_type[0].payment_type));
        $("#prod_delivery_type").text((data.products[0].delivery_type == null ? "None" : data.products[0].delivery_type));
        $("#prod_del_opt").text((data.prod_del_opt == null ? "None" : data.prod_del_opt));
        $("#prod_del_std").text((data.products[0].product_std_delivery == null ? "None" : data.products[0].product_std_delivery));
        $("#prod_return").text((data.products[0].product_return == null ? "None" : data.products[0].product_return));
        $("#prod_warranty").text((data.products[0].product_warranty == null ? "None" : data.products[0].product_warranty));

        $("#prod_payment_type-2").text((data.payment_type[0].payment_type == null ? "None" : data.payment_type[0].payment_type));
        $("#prod_delivery_type-2").text((data.products[0].delivery_type == null ? "None" : data.products[0].delivery_type));
        $("#prod_del_opt-2").text((data.prod_del_opt == null ? "None" : data.prod_del_opt));
        $("#prod_del_std-2").text((data.products[0].product_std_delivery == null ? "None" : data.products[0].product_std_delivery));
        $("#prod_return-2").text((data.products[0].product_return == null ? "None" : data.products[0].product_return));
        $("#prod_warranty-2").text((data.products[0].product_warranty == null ? "None" : data.products[0].product_warranty));

        var clone_del_opt = $('#popover-content').clone();

        if (window_width > 768){
            $("#div-del-area").empty();
            $("#div-del-area").append(clone_del_opt);
            $("#div-del-area").find("#popover-content").attr("hidden", false);
        }else{
            $("#div-del-area-2").empty();
            $("#div-del-area-2").append(clone_del_opt);
            $("#div-del-area-2").find("#popover-content").attr("hidden", false);
        }

        if (data.prod_del_opt == "Nationwide"){
            $("#div-del-area").hide();
            $("#div-del-area-2").hide();
        }else{
            $("#div-del-area").show();
            $("#div-del-area-2").show();
        }

        

        $("#shipp_w_mm").text($.number(data.products[0].ship_w_mm, 2));
        $("#shipp_o_mm").text($.number(data.products[0].ship_o_mm, 2));

        if (data.products[0].product_delivery == 3){
            $("#div-ship-fee").show();
        }else{
            $("#div-ship-fee").hide();
        }

        min_price = data.products[0]['min_price'];
        max_price = data.products[0]['max_price'];
        // console.log(product_name);
        // console.log(min_price);
        // console.log(max_price);
        // console.log(result.products[x]['product_unit_price']);

        var dis_percent = "";

        console.log(data.products[0]['max_discount']);

        if (data.products[0]['product_available'] != "0"){
            if (data.products[0]['max_percent'] != "0"){
                dis_percent = "<small class='text-yellow bg-green px-3 font-weight-600 ml-3'>" + data.products[0]['max_percent'] + "% OFF</small>";
                if (min_price == null){
                    prod_price = data.products[0]['max_discount'];
                }else{
                    min_price = data.products[0]['min_discount'];
                    max_price = data.products[0]['max_discount'];    
                }
            }else{
                // maxpercent = 0;
                if (data.products[0]['min_percent'] == "0"){
                    prod_price = data.products[0]['product_unit_price'];
                }
                // if (min_price == null){
                //     prod_price = data.products[0]['max_discount'];
                // }else{
                //     min_price = data.products[0]['min_discount'];
                //     max_price = data.products[0]['max_discount'];    
                // }
            }
        }else{
            dis_percent = "";
        }


        if (min_price == null){
            if (data.products[0]['max_discount'] != 0){
                prod_price = $.number(prod_price, 2);
            }else{
                prod_price = $.number(data.products[0].product_unit_price, 2)  
            }
            $("#prod-price").html("&#8369;  " + prod_price + dis_percent);
            $("#prod-price2").html("&#8369;  " + prod_price + dis_percent);
            $("#cart-prod-price").text($.number(data.products[0].product_unit_price, 2));
            $("#cart_total_amount").text($.number(data.products[0].product_unit_price, 2));
            $("#prod-price").show();
            $("#prod-price2").hide();

        }else{
            if (min_price != ""){
                prod_price = $.number(min_price, 2) + " - " + $.number(max_price, 2);
            }else{
                prod_price = $.number(min_price, 2) + " - " + $.number(max_price, 2);
            }
            $("#prod-price").html("&#8369;  " + $.number(min_price, 2) + dis_percent);
            $("#prod-price2").html("&#8369;  " + prod_price + dis_percent);
            $("#cart-prod-price").text($.number(0, 2));
            $("#cart_total_amount").text($.number(0, 2));
            $("#prod-price2").show();
            $("#prod-price").hide();
        } 

        // console.log(prod_price);
        // console.log(data.products[0].product_available);
        if (data.products[0].product_available == "0"){
            if ($(document).width() <= "768"){
                $("#div-btn-back > .row").addClass("pt-1");
                $("#alert-phone").show();

                $("#div-footer-btn-order").show();
                $("#div-footer-btn-qty").hide();
                $("#div-footer-btn-cart").hide();
            }else{
                $("#div-btn-back").hide();
                $("#alert-pc").show();

                $("#div-footer-btn-order").hide();
                $("#div-footer-btn-qty").hide();
                $("#div-footer-btn-cart").hide();
            }

            $("#div-btn-order").hide();
            $("#std_lbl").hide();
            $("#std_del").hide();
        }else{
            if (data.products[0].product_online == "1"){
                $("#div-btn-back > .row").removeClass("pt-1");
                $("#std_lbl").show();
                $("#std_del").show();

                if ($(document).width() <= "768"){
                    $("#div-footer-btn-order").show();
                    $("#div-footer-btn-qty").show();
                    $("#div-footer-btn-cart").show();
                }else{
                    $("#div-btn-order").show();
                }

            }else{
                if ($(document).width() <= "768"){
                    $("#div-btn-back > .row").addClass("pt-1");

                    $("#div-footer-btn-order").show();
                    $("#div-footer-btn-qty").hide();
                    $("#div-footer-btn-cart").hide();
    
                }else{
                    $("#div-btn-back").hide();

                    $("#div-btn-order").hide();
                }

                $("#std_lbl").hide();
                $("#std_del").hide();
            }
    
        }


        // console.log(data.products[0].img_location);
        var href_url = base_url +'images/products/'+data.products[0].img_location[0];
        // var href_url = "";
        // $("#img-upload").attr("src", href_url);
        // $("#div-product-details-img").css("background-image", "url('"+href_url+"')");
        // $("#div-product-details-img").css("background-repeat", "no-repeat");
        // $("#div-product-details-img").css("background-position", "center");
        // $("#div-product-details-img").css("background-size", "100% 100%");
        $("#prod-name").attr("data-ol", data.products[0].product_online);


        var variation = data.prod_var;
        var var_type = data.prod_var_type;

        for (var i = 0; i < variation.length; i++) {
            $("#prod-var-"+ (i + 1)).append("<option value='0' disabled selected>"+variation[i].variation+"</option>");

            for (var x = 0; x < var_type.length; x++) {
                if (variation[i].id == var_type[x].variation_id){
                    $("#prod-var-"+ (i + 1)).append("<option value='"+var_type[x].id+"' data-price='"+var_type[x].unit_price+"' data-percent='"+var_type[x].discount+"'>"+var_type[x].type+"</option>");
                }
            }
        }

        if (variation.length == 0){
            $("#prod-var-1").hide();
            $("#prod-var-2").hide();
        }else if (variation.length == 1){
            $("#prod-var-2").hide();
        }

        $(document).on('change', '#prod-var-1' , function() {
            // console.log($(this).find(':selected').attr("data-price"));
            var price = $(this).find(':selected').attr("data-price");
            var prod_var_discount = "";

            if ($(this).find(":selected").attr("data-percent") != 0){
                prod_var_discount = "<small class='bg-green font-weight-600 px-3 text-yellow ml-3'>"+$.number($(this).find(":selected").attr("data-percent"), 0)+"% OFF</small>";
            }

            $("#prod-price").html("&#8369; " + $.number(price, 2) + prod_var_discount);
            // $("#prod-price2").text($.number(price, 2));
            $("#cart_total_amount").text($.number(($("#prod_qty").val() * price), 2));
            $(this).removeClass("error");
            compute_total_amount();
        });

        $(document).on('change', '#prod-var-2' , function() {
            $(this).removeClass("error");
        });

        // $("#div-fotorama").empty();
        // $('#div-fotorama').html("");
        // $('#div-fotorama').empty();
        // $('.fotorama--hidden').remove();
        // $("#div-fotorama").html(data.img);
        // $('#div-fotorama').fotorama();
        var prod_img = data.prod_img;
        var arr_data = new Array();
        for (var i = 0; i < prod_img.length; i++) {
            if (prod_img[i].img != false){
                var img = base_url + "images/products/"+prod_img[i].img;
            }

            var data = {
                "img" : img,
                "thumb" : img,
                "width" : "250px",
                "height" : "300px"
            }

            arr_data.push(data);

            // $('#div-fotorama').fotorama({
            //     data: [
            //       {img: img, thumb: img}
            //     ]
            // }); 

            // $("#div-fotorama").append("<img src='"+img+"' >");

            // console.log(img);
            // $(".carousel-indicators").append("<li data-target='#carouselExampleIndicators' data-slide-to='"+i+"' class='"+ (i == "0" ? "active" : "") +"'></li>");
            // $(".carousel-inner").append("<div class='carousel-item "+ (i == "0" ? "active" : "") +"'>"+
            //     "<img class='div-product-details-img' src='"+img+"'>" +
            //     "</div>");
        }
            // console.log(arr_data);
            // $('#div-fotorama').fotorama({
            //     data: arr_data
            // }); 
            var $fotoramaDiv = $('#div-fotorama').fotorama();
            var fotorama = $fotoramaDiv.data('fotorama');
            fotorama.load(arr_data);    

    }, error : function(err){
        console.log(err.responseText);
    }
})

}   

function product_by_cat(id){
var csrf_name = $("input[name=csrf_name]").val();
var comp_id = $("#id").val();
$.ajax({
    data : {csrf_name : csrf_name, id : id, comp_id : comp_id},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Profile/product_by_cat",
    success : function(result){ 
        $("input[name=csrf_name]").val(result.token);

        $('#div-posted-prod').empty();
        $('#posted_prod').empty();
        var bg_color = $(".div-header").css("background-color");
        var posted_rows = 0;
        var posted_rows2 = 0;
        var posted_rows3 = 0;

        if ($(document).width() <= 768){
            posted_rows = (result.products.length/6).toFixed(0);
            // console.log("posted_rows raw " + posted_rows);
            posted_rows2 = (result.products.length/ (6 * posted_rows));   
            posted_rows3 =  (result.products.length/6) - posted_rows;
        }else{
            posted_rows = (result.products.length/8).toFixed(0);
            // console.log("posted_rows raw " + posted_rows);
            posted_rows2 = (result.products.length/ (8 * posted_rows));    
            posted_rows3 =  (result.products.length/8) - posted_rows;
        }

        if (posted_rows2 <= 1){
            posted_rows2 = 0;
        }else{
            posted_rows2 = posted_rows2.toFixed(0);
        }

        if (posted_rows3 > 0){
            posted_rows2 = 1;
        }else{
            posted_rows2 = 0;
        }


        // console.log("posted_rows2 " + posted_rows2);
        posted_rows = Number(posted_rows) + Number(posted_rows2);
        // console.log("posted_rows final " + posted_rows);
        var $style = "";
        var i =1;
      	var a = 0;
      	var mod = 0;

        // console.log(posted_rows);
        if (isFinite(posted_rows) == false){
          posted_rows = 1;
        }if (isNaN(posted_rows)){
          posted_rows = 1;
        }else if (posted_rows < 1){
          posted_rows = 1;
        }


        for (var i = 1; i <= posted_rows; i++) {
          if (i % 2 == 0){
            $style = ("style='background:"+ bg_color +"'");
          }else{
            $style = "background:white";
          }

          // $("#div-posted-prod .container").append("<div class='row posted-prod-"+i+"' id='posted-prod-"+i+"' "+$style+"></div>");          
          $("#div-posted-prod").append("<div class='col-12 div-row-prod-"+i+" pb-2' id='div-row-prod-"+i+"' "+$style+"></div>");
          $("#div-posted-prod .div-row-prod-"+i+"").append("<div class='container mx-auto'></div>");
          $("#div-posted-prod .container").append("<div class='row posted-prod-"+i+"' id='posted-prod-"+i+"' "+$style+"></div>");          

        }

        // console.log(result.products.length);

        for(var x = 0; x < result.products.length; x++) {
            var href_url = base_url +'images/products/'+result.products[x].img_location[0];
            var product_name = result.products[x].product_name;
            var margin = "";
            var margin_plus_image = "";

            if (x > 3){
              margin = "mt-3";
            }else{
              margin = "";
            }

            if (x > 2){
              margin_plus_image = "mt-2";
            }else{
              margin_plus_image = "";
            }

            if ($(document).width() <= 600){
                if (product_name.length <= 35){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 35) + "....";
                }    
            }else if ($(document).width() <= 768 ){
                if (product_name.length <= 38){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 38) + "....";
                }    
            }else if ($(document).width() <= 1024 ){
                if (product_name.length <= 50){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 50) + "....";
                }    
            }else{
                if (product_name.length <= 55){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 55) + "....";
                }    
            }
            var e = $('<div class="col col-6 col-md-4 col-lg-3  mt-3 '+margin+' ">'+
            '<div class="div-list-img cursor-pointer mx-auto" id="div-list-img-'+x+'" onclick="get_product_info('+result.products[x]['id']+');">'+
              // '<img src="'+href_url+'" class="cursor-pointer"  alt="image" onclick="get_product_info('+result.products[x]['id']+');" >'+
                '<div class="btn" onclick="get_product_info('+result.products[x]['id']+');" hidden>'+
                  // '<i class="fa fa-camera"></i>'+
                '</div>'+
            '</div>'+
            '<div class="bd-green text-center cursor-pointer div-list-img-btn py-1 mx-auto bg-white" onclick="get_product_info('+result.products[x]['id']+');" >' + 
              '<span class="font-weight-600 list-prod-name">'+product_name+'</span><br>' + 
              '<span class="font-weight-600 font-size-16 text-red list-prod-price">PHP '+$.number(result.products[x]['product_unit_price'], 2)+'</span>' + 
            '</div>' +
          '</div>');

          // for (var index = 1; index <= posted_rows; index++) {
          //   var total_rows = 8 * index;
          // }
          var index = 1;

          	a++;

            var div_row = 0;
            var div_row2 = 0;

            if ($(document).width() <= 768){
                div_row = (a/6).toFixed(0);
                div_row2 = (((a/6).toFixed(2)) % 1);    
            }else{
                div_row = (a/8).toFixed(0);
                div_row2 = (((a/8).toFixed(2)) % 1);    
            }

	        if (Number(div_row2.toFixed(2)) == 0){
	        	mod = 0;
	        }else if (Number((div_row2).toFixed(2)) < 0.50){
	        	mod = 1;
	        }else{
	        	mod = 0;
	        }

	        // console.log(a + " " + div_row2.toFixed(2) + " " + mod);


	        index = Number(div_row) + Number(mod);
            // console.log("index " + index);
            $('.div-row-prod-'+index+' .container #posted-prod-'+index+'').append(e);  


          // if (x < 8){
          //   $('.div-row-prod-'+index+' .container #posted-prod-'+index+'').append(e);  
          // }else{
          //   index++;
          //   $('.div-row-prod-'+index+' .container #posted-prod-'+index+'').append(e);  
          //   if (x > 15){
          //     index = 3;
          //     $('.div-row-prod-'+index+' .container #posted-prod-'+index+'').append(e);  
          //   }
          // }


            
          $('#div-list-img-'+x+'').css("background-image", "url('"+href_url+"')");
          $('#div-list-img-'+x+'').css("background-repeat", "no-repeat");
          $('#div-list-img-'+x+'').css("background-position", "center");
        //   $('#div-list-img-'+x+'').css("background-size", "200px 250px");
          $('#div-list-img-'+x+'').css("background-size", "contain");
          //   $('#div-list-img-'+x+'').css("background-size", "100% 100%");

        }


    }, error : function(err){
        console.log(err.responseText);
    }
})    

}

function compute_total_amount(prod_qty){
    var result = "false";

    if ($("#prod-var-1").is(":visible")){
        if ($("#prod-var-1").val() == null){
            swal({
                type : "warning",
                title : "Please select product variations"
            })    
            $("#prod-var-1").addClass("error");
            $("#prod_qty").val("1");
        }else{
            if ($("#prod-var-1").val() == ""){
                swal({
                    type : "warning",
                    title : "Please select product variations"
                })        
                $("#prod-var-1").addClass("error");
                $("#prod_qty").val("1");
            }else{
                result = "true";
            }
        }
    }else{
        result = "true";
    }
  
    if (result == "true"){

        $("#prod-price2").hide();
        $("#prod-price").show();

        // var prod_qty = $("#prod_qty").val(); 
        // var prod_qty2 = $("#prod-footer-qty").val();
        var prod_price_raw = $("#prod-price").text();

        var sd2 = prod_price_raw.replace(/[^\d.]/g, '');
        var prod_price = parseInt(sd2, 10);

        var total = prod_qty * prod_price;

        //   console.log(sd2);
        //   console.log(prod_price);

        $("#cart_total_amount").text($.number(total, 2));
    }

}

function check_session(type){

var csrf_name = $("input[name=csrf_name]").val();
var prod_ol = $("#prod-name").attr("data-ol");
var comp_id = $("#id").val();

var prod_var1_visible = $("#prod-var-1").is(":visible"); 
var prod_var2_visible = $("#prod-var-2").is(":visible"); 
var prod_var1_val = "";
var prod_var2_val = "";

if (prod_var1_visible == true){
    prod_var1_val = $("#prod-var-1 :selected").val();
}

if (prod_var2_visible == true){
    prod_var2_val = $("#prod-var-2 :selected").val();
}

if (prod_ol == 0){

    swal({
    type : "warning",
    title : "This product is not for sale"
    })

}else{

    if (prod_var1_val == "0" || prod_var2_val == "0"){
        swal({
            type : "warning",
            title : "Please select product variations"
        })

        if (prod_var1_val == "0"){
            $("#prod-var-1").addClass("error");
        }

        if (prod_var2_val == "0"){
            $("#prod-var-2").addClass("error");
        }
        
    }else{

        // if (comp_id < 10){
        // }else{
        //     swal({
        //     type : "warning",
        //     title : "This Store is for viewing only."
        //     })    
        // }

        $.ajax({
            data : {csrf_name : csrf_name},
            type : "GET",
            dataType : "JSON",
            url : base_url + "Profile/check_session",
            success : function(result){
                $("input[name=csrf_name]").val(result.token);
                if (result.result == 1){
                    if (type == "1"){
                        add_to_cart();
                    }else{
                        order_now();
                    }
                }else{
                    add_to_cart_session(type);
                    if (type == "2"){
                        if ($(document).width() < 768){
                            setTimeout(() => {
                                window.open(base_url + "login", "_self");                                
                            }, 500);
                        }else{
                            $("#modal_signup_user").modal("show");        
                        }    
                    }
                }
            }, error : function(err){
                console.log(err.responseText);
            }
        })


        
    }


}


}                          

function add_to_cart(){

  var order = Number($("#order_no").text());
  var prod_id = $("#prod_id").val();
  var prod_qty = $("#prod_qty").val();
  var prod_price = $("#prod-price").text().replace(/,/g, '');
  var prod_total_price = Number(prod_price) * Number(prod_qty);
  var cart = $("#total-cart").text().replace(/,/g, '');
  var csrf_name = $("input[name=csrf_name]").val();
  var prod_var1 = $("#prod-var-1").val();
  var prod_var2 = $("#prod-var-2").val();

  order = Number(order) + 1;
  var total_cart = Number(prod_total_price) + Number(cart);
  
  $("#cart-prod-qty").text($.number(prod_qty, 0));
  $("#cart-prod-price").text($.number(prod_price, 2));
  $("#cart-prod-total-price").text($.number(prod_total_price, 2));

  $.ajax({
    data : {prod_id : prod_id, prod_var1 : prod_var1, prod_var2 : prod_var2, prod_qty : prod_qty, csrf_name : csrf_name, order : order, order_now : 0},
    type : "POST",
    dataType : "JSON",
    url : base_url  + "Profile/insert_prod",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("#order_no").text(order);
      $("#total-cart").text($.number(total_cart, 2));
      $("#div-details").hide();
      $("#div-details-2").show();
      swal({
          type : "success",
          title : "Item has been added to your Cart",
          timer : 1000
      })
    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function order_now(){

  var order = Number($("#order_no").text());
  var prod_id = $("#prod_id").val();
  var prod_qty = $("#prod_qty").val();
  var csrf_name = $("input[name=csrf_name]").val();
  var prod_var1 = $("#prod-var-1").val();
  var prod_var2 = $("#prod-var-2").val();

  order = Number(order) + Number(prod_qty);

  $.ajax({
    data : {prod_id : prod_id, prod_var1 : prod_var1, prod_var2 : prod_var2, prod_qty : prod_qty, csrf_name : csrf_name, order : order, order_now : 1},
    type : "POST",
    dataType : "JSON",
    url : base_url  + "Profile/insert_prod",
    success : function(result){
        $("input[name=csrf_name]").val(result.token);
        window.open(base_url + "my-order", "_self");
      // $("#order_no").text(order);
    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function add_to_cart_session(type){

    var order = Number($("#order_no").text());
    var prod_id = $("#prod_id").val();
    var prod_qty = $("#prod_qty").val();
    var prod_price = $("#prod-price").text().replace(/,/g, '');
    var prod_total_price = Number(prod_price) * Number(prod_qty);
    var cart = $("#total-cart").text().replace(/,/g, '');
    var csrf_name = $("input[name=csrf_name]").val();
    var prod_var1 = $("#prod-var-1").val();
    var prod_var2 = $("#prod-var-2").val();
  
    order = Number(order) + 1;
    var total_cart = ( Number(prod_price) * Number(prod_qty)) + Number(cart);
  
    console.log(type);


    $("#cart-prod-qty").text($.number(prod_qty, 0));
    $("#cart-prod-price").text($.number(prod_price, 2));
    $("#cart-prod-total-price").text($.number(prod_total_price, 2));
    
    $.ajax({
      data : {prod_id : prod_id, prod_var1 : prod_var1, prod_var2 : prod_var2, prod_qty : prod_qty, csrf_name : csrf_name, order : order, total_cart : total_cart, order_now : type},
      type : "POST",
      dataType : "JSON",
      url : base_url  + "Profile/insert_prod_session",
      success : function(result){
        $("input[name=csrf_name]").val(result.token);
        $("#order_no").text(result.order);
        $("#total-cart").text($.number(total_cart, 2));
        $("#total-cart-2").text($.number(total_cart, 2));
        $("#div-details").hide();
        $("#div-details-2").show();

        if (type == "1"){
            swal({
                type : "success",
                title : "Item has been added to your Cart",
                timer : 1000
            })
        }
    }, error : function(err){
        console.log(err.responseText);
      }
    })
  

}