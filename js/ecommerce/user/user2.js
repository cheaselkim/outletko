$(document).ready(function(){

	index();

	// $("#posted_prod").hide();
	// $("#div_textbox_post").hide();
	// $("#div-post-body").hide();
	// $("#div-body-left").hide();
	$("#div-my-orders").hide();
	$("#div_order").hide();
	$("#div-my-deliver").hide();


	$("#div_variation_type").hide();

	$("#div_setting").hide();
	$("#div_left_setting").hide();
	$("#div_payment").hide();

	$("#span-aboutus").hide();

	$("#div_variation_type").hide();

	$("#btn_add_variation_type").click(function(){
		$("#div_variation_type").show("slow");
	})

	$("#span_home").click(function(){
		$("#div_setting").hide();
		$("#div_left_setting").hide();

		$("#div-my-orders").hide();
		$("#div-my-deliver").hide();

		$("#div-body-left").show();
		$("#div-post-body").show();

		$("#div_textbox_post").show();
		$("#posted_prod").show();
		$("#div_left_aboutus").show();

	});

	$("#span_setting").click(function(){
		$("#posted_prod").hide();
		$("#div_payment").hide();
		$("#div_textbox_post").hide();
		$("#div_left_aboutus").hide();

		$("#div-my-orders").hide();
		$("#div-my-deliver").hide();

		$("#div-body-left").show();
		$("#div-post-body").show();

		$("#div_setting").show();
		$("#div_left_setting").show();

		$("#list_payment").removeClass("list_active");
		$("#list_aboutus").addClass("list_active");
	});

	$("#list_payment").click(function(){
		$(this).addClass("list_active");
		$("#list_aboutus").removeClass("list_active");
		$("#div_setting").hide();
		$("#div_payment").show();
	});

	$("#list_aboutus").click(function(){
		$(this).addClass("list_active");
		$("#list_payment").removeClass("list_active");
		$("#div_payment").hide();
		$("#div_setting").show();
	});

	$("#textbox_aboutus").focus(function(){
		$("#span-aboutus").show();
	});

	$("#textbox_aboutus").focusout(function(){
		$("#span-aboutus").hide();
	});


	$("#img_process_order").click(function(){
		$("#div-post-body").hide();
		$("#div-body-left").hide();
		$("#div-my-deliver").hide();
		$("#div-my-orders").show();
		$("#modal_myorders").modal("hide");
	});

	$("#img_close_order").click(function(){
		$("#div-post-body").hide();
		$("#div-body-left").hide();

		$("#div-my-orders").hide();
		$("#div-my-deliver").show();
		$("#modal_myorders").modal("hide");
		$("#div_deliver").hide();

	});

	$("#save_prof_pic").click(function(){
		save_prof_pic();
	});

});

function order_table(id){
	$("#div_order_table").hide();
	$("#div_order").show("slow");
}

function deliver_table(id){

	$("#div_deliver_table").hide();
	$("#div_deliver").show("slow");

}

function index(){
//   var app_func = $("#outlet_func").val();
   var csrf_name = $("input[name=csrf_name]").val();
  
  //return false;
  $.ajax({
    data: {csrf_name : csrf_name}, 
    type: "GET", 
    url : base_url +  "Outletko_profile/get_profile_dtl",
    dataType : "JSON",
    success : function(result){

    $("input[name=csrf_name]").val(result.token);
    var profile = base_url + "images/profile/" + result.profile;    

    console.log(profile);

    //for text
        $("#div-prod-img").css("background-image", "url('"+profile+"')");

        $("#bus_name_text").text(result.result[0].account_name);
        $("#owner_name_text").text(result.result[0].first_name+" "+result.result[0].middle_name+" "+result.result[0].last_name);
        $("#business_cat").text(result.result[0].desc_cat);
        $("#location_text").text(result.result[0].address);
        
        $("#bus_category_text").text(result.result[0].desc_cat);
        
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
        $("#business_name").val(result.result[0].account_name);
        $("#first_name").val(result.result[0].first_name);
        $("#mid_name").val(result.result[0].middle_name);
        $("#last_name").val(result.result[0].last_name);
        $("#address").val(result.result[0].address);
        $("#town").val(result.result[0].city_desc+","+result.result[0].province_desc);
        $("#town").attr("data-city_id",result.result[0].city);
        $("#town").attr("data-province_id",result.result[0].province);
        $("#country").val();
        
        $("#bus_category").val(result.result[0].business_category);
        $("#modal_buss_category").val(result.result[0].business_category);
        
        $("#email").val(result.result[0].email);
        $("#mobile").val(result.result[0].mobile_no);
        $("#telephone").val(result.result[0].telephone_no);
        $("#facebook").val(result.result[0].facebook);
        $("#twitter").val(result.result[0].twitter);
        $("#instagram").val(result.result[0].instagram);
        $("#shoppee").val(result.result[0].shoppee);
    //for inputs
    
    //for prod_cat_list
        $('#prod_cat_list ul').empty();
        for(var x = 0; x<result.prod_cat.length; x++) {
            $("#prod_cat_list ul").append('<li class="pl-0 font-size-16">'+result.prod_cat[x]['product_category']+'</li>');
        }
    //for prod_cat_list
    
    //products
        $('#posted_prod').empty();
        for(var x = 0; x<result.products.length; x++) {
            var href_url = base_url +'images/products/'+result.products[x].img_location[0];
            var product_name = result.products[x].product_name;
            var margin = "";
            var margin_plus_image = "";

            if (x > 3){
              margin = "mt-2";
            }else{
              margin = "";
            }

            if (x > 2){
              margin_plus_image = "mt-2";
            }else{
              margin_plus_image = "";
            }

            var e = $('<div class="col-6 col-md-3 pad-center '+margin+' ">'+
        					'<div class="div-list-img" >'+
        						'<img src="'+href_url+'"  alt="image">'+
            					'<div class="btn" onclick="get_product_info('+result.products[x]['id']+');">'+
            						'<i class="fa fa-camera"></i>'+
            					'</div>'+
        					'</div>'+
                  '<div class="text-center bg-white bd-green">' + 
                    '<span class="font-weight-600 font-size-16">'+product_name+'</span>' + 
                  '</div>' +
        				'</div>');
        	$('#posted_prod').append(e);  
        }
    //products
    
        var e2 = $('<div class="col col-6 col-md-4 col-lg-4 pad-center ">' +
						'<div class="div-list-img">' +
								'<img src="'+base_url+'images/products/plus2.png"  alt="image" data-toggle="modal" data-target="#img_upload" class=" cursor-pointer">' +
						'</div>' +
						'<div class="bd-green text-center cursor-pointer div-list-img-btn">' +
							'<span class="">Add Product</span>' +
						'</div>' +
      				'</div>'  );

        $('#posted_prod').append(e2);
        
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function save_prof_pic(){

  var form_data = new FormData(); 
      var files = $('#imgProf')[0].files;
      for(var count = 0; count<files.length; count++) {
      var name = files[count].name;
      form_data.append("files[]", files[count]);
      }        
       //return false   
      var csrf_name = $("input[name=csrf_name]").val();
      form_data.append('csrf_name', csrf_name);

      $.ajax({
          data : form_data 
          ,type : "POST"
          , url:  base_url + "Outletko_profile/upload_profile_image"
          , dataType : "JSON" 
          , crossOrigin : false
          , contentType: false
          , processData: false
          , beforeSend : function() {
              swal({
                  title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })                 
          }
          , success : function(result) {
                $("input[name=csrf_name]").val(result.token);
                if(result.status == "success") {
                    $("#save_product").removeAttr('disabled');
                    swal({
                        title : "Successfully Save",
                        type : "success",
                        timer: 2000
                    }, function(){
                        clear_prod_model()
                        index()
                    });
                }else {
                    console.log(result.status);
                }
          }, failure : function(msg) {
              console.log("Error connecting to server...");
          }, error: function(err) {
                console.log(err.responseText);
          }, xhr: function(){
              var xhr = $.ajaxSettings.xhr() ;
              xhr.onprogress = function(evt){ 
                  $("body").css("cursor", "wait"); 
              };  
              xhr.onloadend = function(evt){ 
                  $("body").css("cursor", "default"); 
              };      
              return xhr ;
          }

      }); 

}