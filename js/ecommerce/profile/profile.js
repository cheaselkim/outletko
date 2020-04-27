$(document).ready(function(){

  $("#div-details-2").hide();
  $("#prod_qty").number(true, 0);
  $("#div-product-details").hide();
  $(".div-store-img").css("background", "white");
  $id = $("#id").val();

    // console.log($("input[name=csrf_name]").val());

//   get_profile($id);
    setTimeout(function(){ 
        get_profile($id);    
    }, 500);

  $("#btn_back").click(function(){
    $("#div-display-products").show();
    $(".div-header-2").show();
    $(".div-header-3").show();
    $(".div-header-4").show();
    $("#div-product-details").hide();    
    $(window).scrollTop($('#div-posted-prod').offset().top);    
  });

  $("#btn_back2").click(function(){
    $("#div-display-products").show();
    $(".div-header-2").show();
    $(".div-header-3").show();
    $(".div-header-4").show();
    $("#div-product-details").hide();    
    $(window).scrollTop($('#div-posted-prod').offset().top);    
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
    compute_total_amount();
  });

  $("#btn_add").click(function(){
    var val = Number($("#prod_qty").val()) + 1;
    $("#prod_qty").val(val);
    compute_total_amount();
  });

  $("#btn_minus").click(function(){
    var val = Number($("#prod_qty").val()) - 1;
    if (val == 0){
      val = 1;
    } 
    $("#prod_qty").val(val);
    compute_total_amount();
  });

  $("#prod-category").click(function(){
    product_by_cat($(this).val());
  });

});

function get_profile(id){

 var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data: {csrf_name : csrf_name, id : id}, 
    type: "POST", 
    url : base_url +  "Profile/profile",
    dataType : "JSON",
    success : function(result){
    $("input[name=csrf_name]").val(result.token);

    var prod_cat = result.prod_cat;
    var profile = base_url + "images/profile/" + result.profile;    
    var address = (result.result[0].street == "" ? "" : result.result[0].street  + ", ") + 
            (result.result[0].village == "" ? "" : result.result[0].village + ", ")  + 
            (result.result[0].barangay == "" ? "" : result.result[0].barangay + ",")  + 
            (result.result[0].city_desc == "" ? "" : result.result[0].city_desc + ", ") + 
            (result.result[0].province_desc == "" ? "" : result.result[0].province_desc) ;

    if (prod_cat.length > 0){
        for (var i = 0; i < prod_cat.length; i++) {
            $("#prod-category").append("<option value='"+prod_cat[i].id+"'>"+prod_cat[i].product_category  +"</option>");
        }    
    }
        

    //for text
        $(".div-header").css("background", (result.result[0].bg_color == null ? "77933c" : result.result[0].bg_color) );
        $(".div-header-2").css("background", (result.result[0].bg_color == null ? "77933c" : result.result[0].bg_color) );
        $(".div-profile-footer").css("background", (result.result[0].bg_color == null ? "77933c" : result.result[0].bg_color) );

        $("#div-prod-img").css("background-image", "url('"+profile+"')");
        $("#div-footer-img").css("background-image", "url('"+profile+"')");

        $("#div-footer-img").css("background-size", "100% 100%");

        $("#account-post").text(result.result[0].account_post);
        $("#header_whats_new").text(result.result[0].account_post);

        $("#text-buss-name").text(result.result[0].account_name);
        $("#owner_name_text").text(result.result[0].first_name+" "+result.result[0].middle_name+" "+result.result[0].last_name);
        $("#text-buss-type").text(result.result[0].desc_cat);
        $("#text-buss-address").text((address == "" ? "No Address" : address));
        
        $("#text_aboutus").text(result.result[0].about_us);
        $("#header_aboutus").text(result.result[0].about_us);

        $("#text-buss-email").text("Email : "+ (result.result[0].email == null ? "" : result.result[0].email));
        $("#text-buss-contact-no").text("Mobile No. : "+(result.result[0].mobile_no == null ? "" : "+63"+result.result[0].mobile_no));
        $("#text-buss-tel-no").text("Tel No. : "+(result.result[0].telephone_no == null ? "" : result.result[0].telephone_no));
        $("#text-buss-facebook").text("Facebook : "+ (result.result[0].facebook == null ? "" : result.result[0].facebook));

        

        
        $("#email_text").text(" "+ (result.result[0].email == null ? "" : result.result[0].email));
        $("#tel_text").text(" "+(result.result[0].telephone_no == null ? "" : result.result[0].telephone_no));
        $("#mobile_text").text(" "+(result.result[0].mobile_no == null ? "" : "+63"+result.result[0].mobile_no));
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
        var posted_rows = (result.products.length/8).toFixed(0);
        // console.log("posted_rows raw " + posted_rows);
        var posted_rows2 = (result.products.length/ (8 * posted_rows));

        if (posted_rows2 <= 1){
            posted_rows2 = 0;
        }else{
            posted_rows2 = posted_rows2.toFixed(0);
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
            var e = $('<div class="col col-6 col-md-3 col-lg-3  mt-3 '+margin+' ">'+
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

	        var div_row = (a/8).toFixed(0);
	        var div_row2 = (((a/8).toFixed(2)) % 1);

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
          $('#div-list-img-'+x+'').css("background-size", "100% 100%");

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
            $('#div-store-img-1').css('background-size', "100% 100%");
            $('#div-store-img-1').css('background-repeat', "no-repeat");
            $('#div-store-img-1').css('background-position', "center center");    
          }else if (store[i].img_order == "2"){
            $("#div-store-img-2").css("background-image", "url('"+store_img+"')");
            $('#div-store-img-2').css('background-size', "100% 100%");
            $('#div-store-img-2').css('background-repeat', "no-repeat");
            $('#div-store-img-2').css('background-position', "center center");    
          }else{
            $("#div-store-img-3").css("background-image", "url('"+store_img+"')");
            $('#div-store-img-3').css('background-size', "100% 100%");
            $('#div-store-img-3').css('background-repeat', "no-repeat");
            $('#div-store-img-3').css('background-position', "center center");    
          }
        }
        

    }, error: function(err){
      console.log(err.responseText);
    }
  });


}

function get_product_info(id){
  
  var img_url = base_url + "assets/images/no-image.jpg";
  var csrf_name = $("input[name=csrf_name]").val();
  $("#div-details-2").hide();
  $("#div-display-products").hide();
  $("#div-btn-order").hide();
  $("#std_lbl").hide();
  $("#std_del").hide();
  $(".div-header-3").hide();
  $("#div-details").show();
 
  var window_width = $(document).width();

  if (window_width > 768){
    $(".div-header-2").removeClass("d-none d-md-block");
    $(".div-header-4").removeClass("d-none d-md-block");
    $(".div-header-2").hide();
    $(".div-header-4").hide();  
  }

  $("#div-product-details").show();
//   $(window).scrollTop($('#div-product-details').offset().top);
  $(window).scrollTop(0);

  $("#prod-name").text("");
  $("#prod-dtls").text("");
  $("#prod-price").val("PHP 0.00");
  $("#prod-condition").val("Condition : ");
  $("#prod-stock").val("Stock : ");
  $("#prod-weight").val("Weight : ");
  $("#div-product-details-img").css("background-image", "url('"+img_url+"')");

  $.ajax({
    data : {id : id, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Profile/get_product_info",
    success : function(data){
    //   console.log(data.products[0]);
    //   console.log(data.payment_type[0]);
      $("input[name=csrf_name]").val(data.token);

      $("#prod-name").text(data.products[0].product_name);
      $("#prod-desc").text(data.products[0].product_description);
      $("#prod-other-details").text((data.products[0].product_other_details == null ? "No Other Details" : (data.products[0].product_other_details == "" ? "No Other Details " : data.products[0].product_other_details)));
      $("#prod-price").text("PHP " + $.number(data.products[0].product_unit_price, 2));
      $("#cart_total_amount").text($.number(data.products[0].product_unit_price, 2));
      $("#prod-condition").text("Condition : " + (data.products[0].product_condition == "1" ? "New" : "Used"));
      $("#prod-stock").text("Stock : " + $.number(data.products[0].product_stock, 0));
      $("#prod-weight").text("Weight : " + $.number(data.products[0].product_weight, 2));
      $("#std_del").text(data.products[0].delivery_type);
      $("#prod_id").val(data.products[0].id);

      $("#cart-prod-name").text(data.products[0].product_name);
      $("#cart-prod-price").text($.number(data.products[0].product_unit_price, 2));


      $("#prod_payment_type").text((data.payment_type[0].payment_type == null ? "None" : data.payment_type[0].payment_type));
      $("#prod_delivery_type").text((data.products[0].delivery_type == null ? "None" : data.products[0].delivery_type));
      $("#prod_del_opt").text((data.products[0].product_del_opt == null ? "None" : data.products[0].product_del_opt));
      $("#prod_del_std").text((data.products[0].product_std_delivery == null ? "None" : data.products[0].product_std_delivery));
      $("#prod_return").text((data.products[0].product_return == null ? "None" : data.products[0].product_return));
      $("#prod_warranty").text((data.products[0].product_warranty == null ? "None" : data.products[0].product_warranty));


      $("#shipp_w_mm").text($.number(data.products[0].ship_w_mm, 2));
      $("#shipp_o_mm").text($.number(data.products[0].ship_o_mm, 2));

      if (data.products[0].product_delivery == 3){
        $("#div-ship-fee").show();
      }else{
        $("#div-ship-fee").hide();
      }

      var href_url = base_url +'images/products/'+data.products[0].img_location[0];
      // $("#img-upload").attr("src", href_url);
      $("#div-product-details-img").css("background-image", "url('"+href_url+"')");
      $("#div-product-details-img").css("background-repeat", "no-repeat");
      $("#div-product-details-img").css("background-position", "center");
      $("#div-product-details-img").css("background-size", "100% 100%");
      $("#prod-name").attr("data-ol", data.products[0].product_online);

      if (data.products[0].product_online == "1"){
        $("#div-btn-back > .row").removeClass("pt-1");
        $("#div-btn-order").show();
        $("#std_lbl").show();
        $("#std_del").show();
      }else{
        $("#div-btn-back > .row").addClass("pt-1");
        $("#div-btn-order").hide();
        $("#std_lbl").hide();
        $("#std_del").hide();
      }

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
        var posted_rows = (result.products.length/8).toFixed(0);
        // console.log("posted_rows raw " + posted_rows);
        var posted_rows2 = (result.products.length/ (8 * posted_rows));

        if (posted_rows2 <= 1){
            posted_rows2 = 0;
        }else{
            posted_rows2 = posted_rows2.toFixed(0);
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
            var e = $('<div class="col col-6 col-md-3 col-lg-3  mt-3 '+margin+' ">'+
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

	        var div_row = (a/8).toFixed(0);
	        var div_row2 = (((a/8).toFixed(2)) % 1);

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
          $('#div-list-img-'+x+'').css("background-size", "100% 100%");

        }


    }, error : function(err){
        console.log(err.responseText);
    }
})    

}

function compute_total_amount(){
  
  var prod_qty = $("#prod_qty").val(); 
  var prod_price_raw = $("#prod-price").text();

  var sd2 = prod_price_raw.replace(/[^\d.]/g, '');
  var prod_price = parseInt(sd2, 10);

  var total = prod_qty * prod_price;

//   console.log(sd2);
//   console.log(prod_price);

  $("#cart_total_amount").text($.number(total, 2));

}

function check_session(type){
  var csrf_name = $("input[name=csrf_name]").val();
  var prod_ol = $("#prod-name").attr("data-ol");

  if (prod_ol == 0){

    swal({
      type : "warning",
      title : "This product is not for sale"
    })

  }else{

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
            if ($(document).width() < 768){
                window.open(base_url + "login", "_self");
            }else{
                $("#modal_signup_user").modal("show");        
            }
        }
      }, error : function(err){
        console.log(err.responseText);
      }
    })

  }


}                          

function add_to_cart(){

  var order = Number($("#order_no").text());
  var prod_id = $("#prod_id").val();
  var prod_qty = $("#prod_qty").val();
  var prod_price = $("#cart_total_amount").text().replace(/,/g, '');
  var cart = $("#total-cart").text().replace(/,/g, '');
  var csrf_name = $("input[name=csrf_name]").val();

  order = Number(order) + 1;
  var total_cart = Number(prod_price) + Number(cart);

  $("#cart-prod-qty").text($.number(prod_qty, 0));
  $("#cart-prod-total-price").text($.number(prod_price, 2));

  $.ajax({
    data : {prod_id : prod_id, prod_qty : prod_qty, csrf_name : csrf_name, order : order},
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

  order = Number(order) + Number(prod_qty);

  $.ajax({
    data : {prod_id : prod_id, prod_qty : prod_qty, csrf_name : csrf_name, order : order},
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

