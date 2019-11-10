$(document).ready(function(){
    
  index();
  get_business_type();
  
  

  $('#save_info').click(function() {
        save_info();
  });
  
  $('#save_category').click(function() {
        save_category();
  });
  
  $('#save_contact').click(function() {
        save_contact();
  });
  
  $('#save_product').click(function() {
        save_product();
  });
  
  $('#save_prod_cat').click(function() {
        save_prod_cat();
  });

  
    $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find('.text-img'),
            log = label;
        
        if( input.length ) {
            input.text(log);
        } else {
            if( log ) alert(log);
        }
    
    });
  
    function readURL(input, type) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            if (type == "1"){
              reader.onload = function (e) {
                console.log(e.target.result);
                  $('#div-img-prof').css('background', 'url("' + e.target.result + '")');
                  $('#div-img-prof').css('background-size', "100% 100%");
                  $('#div-img-prof').css('background-repeat', "no-repeat");
                  $('#div-img-prof').css('background-position', "center center");
              }
            }else{
              reader.onload = function (e) {
                  $('#img-upload').attr('src', e.target.result);
              }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        //console.log(this);
        readURL(this, 2);
    }); 

    $("#imgProf").change(function(){
        readURL(this, 1);
    })



    $("#town").autocomplete({
        minLength: 0,
        source: base_url + "Outletko_profile/search_field/",
        focus: function( event, ui ) {
            return false;
        },
        select: function( event, ui ) {
            $(this).val(ui.item.city_desc+","+ui.item.province_desc);
            $(this).attr("data-city_id",ui.item.city_id);
            $(this).attr("data-province_id",ui.item.province_id);
            return false; 
        }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
        .append( "<div>" + item.city_desc+","+item.province_desc + "</div>" )
        .appendTo( ul );
    };   


});

function currency(){

  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Outlet/currency",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      $("#mod_currency").val(data.data);
    }, error : function(err){
      console.log(err.responseText);
    }
  })
}

function get_product_info(id){
    var csrf_name = $("input[name=csrf_name]").val();

     $.ajax({
        url : base_url + "Outletko_profile/get_product_info",
        type : "POST",
        dataType : "JSON",
        data : {'id' : id ,'csrf_name' : csrf_name},
        success : function(data){
            //console.log(data)
            $("#img_upload").modal("show");
            $("input[name=csrf_name]").val(data.token);
            $("#prod_name").val(data.products[0].product_name);
            $("#prod_desc").val(data.products[0].product_description);
            $("#prod_id").val(data.products[0].id);
            $("#unserialized_files").val(data.products[0].img_location[0]);
            var href_url = base_url +'images/products/'+data.products[0].img_location[0];
            $("#img-upload").attr("src", href_url);
            
            
        }, error: function(err){
          console.log(err.responseText);
        }
    });
}

function get_business_type(){
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    url : base_url + "Outletko_profile/business_type",
    type : "GET",
    dataType : "JSON",
    data : {csrf_name : csrf_name},
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#bus_category").append("<option value='"+result[i].id+"'>"+result[i].desc  +"</option>");
        $("#modal_buss_category").append("<option value='"+result[i].id+"'>"+result[i].desc  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });

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
    
        var e2 = $('<div class="col-6 col-md-3 pad-center '+margin_plus_image+' ">'+
        					'<div class="div-list-img" >'+
        						'<img src="'+base_url+'images/products/plus2.png"  alt="image" data-toggle="modal" data-target="#img_upload" style="cursor:pointer;">'+
        					'</div>'+
                  '<div class="text-center bg-white bd-green">' + 
                    '<span class="font-weight-600 font-size-16">Add Product</span>' + 
                  '</div>' +
        				'</div>');
        $('#posted_prod').append(e2);
        
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function save_info(){
  var csrf_name = $("input[name=csrf_name]").val();
  var business_name = $('#business_name').val();
  var first_name = $('#first_name').val();
  var mid_name = $('#mid_name').val();
  var last_name = $('#last_name').val();
  var address = $('#address').val();
  var town = $('#town').attr("data-city_id");
  var province = $('#town').attr("data-province_id");
  var country = $('#country').val();
  var account_id = $('#account_id').val();
  var modal_buss_category = $("#modal_buss_category").val();
  
  if(jQuery.trim(business_name).length <= 0 || jQuery.trim(first_name).length <= 0 || jQuery.trim(mid_name).length <= 0 
    || jQuery.trim(address).length <= 0 || jQuery.trim(last_name).length <= 0 || jQuery.trim(town).length <= 0) {
        swal("Please fill up required fields.", "", "warning")

        if (jQuery.trim(business_name).length <= 0){
          $("#business_name").addClass("error");
        }

        if (jQuery.trim(first_name).length <= 0){
          $("#first_name").addClass("error");
        }

        if (jQuery.trim(mid_name).length <= 0){
          $("#mid_name").addClass("error");
        }


        if (jQuery.trim(last_name).length <= 0){
          $("#last_name").addClass("error");
        }

        if (jQuery.trim(address).length <= 0){
          $("#address").addClass("error");
        }
        
        if (jQuery.trim(town).length <= 0){
          $("#town").addClass("error");
        }
        
        if (jQuery.trim(province).length <= 0){
          $("#province").addClass("error");
        }


        return false;
  }



  var account_hdr = {
        account_name : business_name,
        first_name : first_name,
        middle_name : mid_name,
        last_name : last_name,
        address : address,
        city : town,
        province : province,
        business_category : modal_buss_category
        //country : country, 
  } 

  var data = {account_id:account_id, account_hdr:account_hdr, csrf_name : csrf_name};
  //return false;
  $.ajax({

        data : data
        , type: "POST"
        , url: base_url + "Outletko_profile/update_profile"
        , dataType: 'json'
        , crossOrigin: false     
        , beforeSend : function(){
          swal({
              title : "Saving.....",
              showCancelButton: false, 
              showConfirmButton: false           
          })  
        }, success: function(result) {
                $("input[name=csrf_name]").val(result.token);
                swal({
                  title : "Successfully Save",
                  type : "success",
                  timer: 2000
                }, function(){
                  index()
                });
                
        }, error: function(err) {
            console.log("Error : " + err.responseText);
        }
  });  
};

function save_category(){
  var csrf_name = $("input[name=csrf_name]").val();
  var bus_category = $('#bus_category').val();
  var account_id = $('#account_id').val();
  
  if(jQuery.trim(bus_category).length <= 0 ) {
        swal("Please fill up required fields.", "", "warning")

        if (jQuery.trim(bus_category).length <= 0){
          $("#bus_category").addClass("error");
        }

        return false;
  }


  var data = {account_id:account_id, bus_category:bus_category, csrf_name : csrf_name};
  //return false;
  $.ajax({

        data : data
        , type: "POST"
        , url: base_url + "Outletko_profile/update_category"
        , dataType: 'json'
        , crossOrigin: false     
        , beforeSend : function(){
          swal({
              title : "Saving.....",
              showCancelButton: false, 
              showConfirmButton: false           
          })  
        }, success: function(result) {
                $("input[name=csrf_name]").val(result.token);
                swal({
                  title : "Successfully Save",
                  type : "success",
                  timer: 2000
                }, function(){
                  index()
                });
                
        }, error: function(err) {
            console.log("Error : " + err.responseText);
        }
  });  
};

function save_contact(){
  var csrf_name = $("input[name=csrf_name]").val();
  var email = $('#email').val();
  var mobile = $('#mobile').val();
  var telephone = $('#telephone').val();
  var facebook = $('#facebook').val();
  var twitter = $('#twitter').val();
  var instagram = $('#instagram').val();
  var shoppee = $('#shoppee').val();
  var account_id = $('#account_id').val();
  
  if(jQuery.trim(email).length <= 0 || jQuery.trim(mobile).length <= 0 || jQuery.trim(telephone).length <= 0 
    || jQuery.trim(facebook).length <= 0 || jQuery.trim(twitter).length <= 0 || jQuery.trim(instagram).length <= 0 || jQuery.trim(shoppee).length <= 0) {
        swal("Please fill up required fields.", "", "warning")
        return false;
  }



  var contact = {
        email : email,
        mobile_no : parseInt(mobile),
        telephone_no : parseInt(telephone),
        facebook : facebook,
        twitter : twitter,
        instagram : instagram,
        shoppee : shoppee
        //country : country, 
  } 

  var data = {account_id:account_id, contact : contact, csrf_name : csrf_name};
  console.log(data)
  //return false;
  $.ajax({

        data : data
        , type: "POST"
        , url: base_url + "Outletko_profile/update_contact"
        , dataType: 'json'
        , crossOrigin: false     
        , beforeSend : function(){
          swal({
              title : "Saving.....",
              showCancelButton: false, 
              showConfirmButton: false           
          })  
        }, success: function(result) {
                $("input[name=csrf_name]").val(result.token);
                swal({
                  title : "Successfully Saved",
                  type : "success",
                  timer: 2000
                }, function(){
                  index()
                });
                
        }, error: function(err) {
            console.log("Error : " + err.responseText);
        }
  });  
};

function save_product(action){
    var csrf_name = $("input[name=csrf_name]").val();
    var imgInp = $('#imgInp').val();
    var prod_name = $('#prod_name').val();
    var prod_desc = $('#prod_desc').val();
    var account_id = $('#account_id').val();
    var prod_id = $('#prod_id').val();
    var check_img = $('#imgInp');
    var unserialized_files = $("#unserialized_files").val();
    
  
  
    if(jQuery.trim(prod_name).length <= 0 || jQuery.trim(prod_desc).length <= 0 ) {
        swal("Please fill up required fields.", "", "warning")
        return false;
    }
    
    if(prod_id == ""){
        if(check_img.get(0).files.length <= 0) {
            //alert("walang laman");
            swal("Please fill up required fields.", "", "warning")
            return false;
        }else{
            var file_size = $('#imgInp').prop('files')[0].size/1024/1024; // in MB
            if (file_size > 1) {
                swal({
                    type : "error",
                    title : "File size exceeds 1 MB"
                })
            $("#save_product").prop("disabled", false);
              //alert('This file size is: ' + $('#imgInp').prop('files')[0].size/1024/1024 + "MB");
              return false
              } else {
              }
         }
    }
    

  var product = {
        product_name : prod_name,
        product_description : prod_desc
  } 

  var data = {account_id:account_id, product : product, action : action,prod_id : prod_id, csrf_name : csrf_name};
  //return false;
  $.ajax({

        data : data
        , type: "POST"
        , url: base_url + "Outletko_profile/save_product"
        , dataType: 'json'
        , crossOrigin: false     
        , beforeSend : function(){
          
        }, success: function(result) {
                
                $("input[name=csrf_name]").val(result.token);
                if(prod_id == ""){
                    image_file($('#imgInp').prop('files')[0],result.id);
                }else{
                    if(check_img.get(0).files.length <= 0) {
                        swal({
                            title : "Successfully Save",
                            type : "success",
                            timer: 2000
                        }, function(){
                            clear_prod_model()
                            index()
                        });
                    }else{    
                        image_update($('#imgInp').prop('files')[0],result.id,unserialized_files);
                    }
                }
                
                
        }, error: function(err) {
            console.log("Error : " + err.responseText);
        }
  });  
};

function image_file(img,id){
  var form_data = new FormData(); 
      var files = $('#imgInp')[0].files;
      for(var count = 0; count<files.length; count++) {
      var name = files[count].name;
      form_data.append("files[]", files[count]);
      }        
      form_data.append('id', id); 
       //return false   
      var csrf_name = $("input[name=csrf_name]").val();
      form_data.append('csrf_name', csrf_name);

      $.ajax({
          data : form_data 
          ,type : "POST"
          , url:  base_url + "Outletko_profile/upload_image_file"
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

function image_update(img,id,unserialized_files){
    var form_data = new FormData(); 
    var files = $('#imgInp')[0].files;
    for(var count = 0; count<files.length; count++) {
        var name = files[count].name;
        form_data.append("files[]", files[count]);
     }        
        form_data.append('id', id); 
        form_data.append('curr_img[]', unserialized_files);
        var csrf_name = $("input[name=csrf_name]").val();
        form_data.append('csrf_name', csrf_name);
       //return false   
      $.ajax({
          data : form_data 
          ,type : "POST"
          , url: base_url + "Outletko_profile/update_img_file"
          , dataType : "json" 
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
          }, error: function(status) {
                    
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

function save_prod_cat(){
    var csrf_name = $("input[name=csrf_name]").val();
    var account_id = $('#account_id').val();
    var sub_dtl = new Array();
    
    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();
    
    var output = d.getFullYear() + '-' +
        (month<10 ? '0' : '') + month + '-' +
        (day<10 ? '0' : '') + day;
    var x = 0;
    $("#prod_tbl tbody tr").each(function(row, tr){
        if(jQuery.trim($(tr).find('.prod_inp').val()).length <= 0) {
            return;
        }
        sub_dtl [x] = {
            'product_category':$(tr).find('.prod_inp').val(),
            'account_id':account_id,
            'date_insert':output
        }
        x++;
    }); 
    
    var data = {account_id:account_id, sub_dtl : sub_dtl, csrf_name : csrf_name};
    console.log(data)
    //return false;
    $.ajax({
        data : data
        , type: "POST"
        , url: base_url + "Outletko_profile/update_prod_cat"
        , dataType: 'json'
        , crossOrigin: false     
        , beforeSend : function(){
            swal({
                title : "Saving.....",
                showCancelButton: false, 
                showConfirmButton: false           
            })  
            }, success: function(result) {
                    $("input[name=csrf_name]").val(result.token);
                    swal({
                      title : "Successfully Save",
                      type : "success",
                      timer: 2000
                    }, function(){
                      index()
                    });
                    
            }, error: function(err) {
                console.log("Error : " + err.responseText);
            }
    });  
};

function clear_prod_model(){
    $("#prod_desc").val("");
    $("#prod_name").val("");
    $("#prod_id").val("");
    $("#unserialized_files").val("");
    $("#imgInp").val("");
    $("#img-upload").attr("src", "images/products/a.png");
}