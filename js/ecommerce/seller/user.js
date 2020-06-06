$(document).ready(function(){

  check_subscription();
  business_category();
  payment_type();
  delivery_type();
//   get_del_type();
  bank_list();
  remittance_list();

    //   $("#colorpicker").ColorPicker({
    //     color: '#77933c',
    //     onShow: function (colpkr) {
    //       $(colpkr).fadeIn(500);
    //       return false;
    //     },
    //     onHide: function (colpkr) {
    //       $(colpkr).fadeOut(500);
    //       return false;
    //     },
    //     onChange: function (hsb, hex, rgb) {
    //       $("#color-val").val(hex);
    //       $("#colorpicker").css('background', "#" + hex);
    //       $('.div-header').css('background', '#' + hex);
    //     }
    //   });



    $("#div-setting").hide();
    $("#div-my-orders").hide();
    $("#div_order").hide();
    $("#div-my-deliver").hide();
    $("#div-for-appointment").hide();
    $("#div-for-delivery").hide();
    $("#div-prod-ship-fee").hide();
    $("#span-linkname").hide();
    $("#span-linkname-error").hide();

    if ($(document).width() > 1200){
        $("#div-store-img-btn-1").hide();
        $("#div-store-img-btn-2").hide();
        $("#div-store-img-btn-3").hide();    
        $("#div-update-button").hide();
    }


    $("#div-remittance-list").hide();
    $("#div-bank-list").hide();

    $("#ship_w_mm").number(true, 2);
    $("#ship_o_mm").number(true, 2);
    $("#prod_price").number(true, 2);
    $("#prod_stock").number(true, 0);
    $("#prod_weight").number(true, 2);
    $(".div-img-update").hide();

    $("#ship_kg").number(true,2);
    $("#ship_mm").number(true,2);
    $("#ship_luz").number(true,2);
    $("#ship_vis").number(true,2);
    $("#ship_min").number(true,2);

    $("#prod_ship_fee_w_mm").number(true, 2);
    $("#prod_ship_fee_o_mm").number(true, 2);
        
    $("#span-aboutus").hide();
    $("#div-card-variation").hide();
    $("#div_variation_type").hide();

    $("#prod_price2").hide();
    $("#prod_stock2").hide();

    $("#delete_product").hide();

    $("#div-shipping-fee").hide();

    $("#btn-var-img-close").click(function(){
        $("#modal_variations").modal("show");
    });

    $("#div-prod-img").mouseover(function(){
        $("#div-update-button").show();
    });

    $("#div-prod-img").mouseout(function(){
        $("#div-update-button").hide();
    });

    $("#div-store-img-1").mouseover(function(){
        $("#div-store-img-btn-1").show();
    });

    $("#div-store-img-1").mouseout(function(){
        $("#div-store-img-btn-1").hide();
    });

    $("#div-store-img-2").mouseover(function(){
        $("#div-store-img-btn-2").show();
    });

    $("#div-store-img-2").mouseout(function(){
        $("#div-store-img-btn-2").hide();
    });

    $("#div-store-img-3").mouseover(function(){
        $("#div-store-img-btn-3").show();
    });

    $("#div-store-img-3").mouseout(function(){
        $("#div-store-img-btn-3").hide();
    });

    $("#div-store-img-btn-1").click(function(){
        $("#store_id").val(1);
        $("#modal_store_img").modal("show");
        var bg = $("#div-store-img-1").css("background-image");
        $("#div-img-store").css("background-image", bg);
        $("#div-img-store").css("background-size", "100% 100%");
        $("#div-img-store").css("background-repeat", "no-repeat");
        $("#div-img-store").css("background-position", "center center");
    });

    $("#div-store-img-btn-2").click(function(){
        $("#store_id").val(2);
        $("#modal_store_img").modal("show");
        var bg = $("#div-store-img-2").css("background-image");
        $("#div-img-store").css("background-image", bg);
        $("#div-img-store").css("background-size", "100% 100%");
        $("#div-img-store").css("background-repeat", "no-repeat");
        $("#div-img-store").css("background-position", "center center");
    });

    $("#div-store-img-btn-3").click(function(){
        $("#store_id").val(3);
        $("#modal_store_img").modal("show");
        var bg = $("#div-store-img-3").css("background-image");
        $("#div-img-store").css("background-image", bg);
        $("#div-img-store").css("background-size", "100% 100%");
        $("#div-img-store").css("background-repeat", "no-repeat");
        $("#div-img-store").css("background-position", "center center");
    });

    $(".div-list-img").mouseover(function(){
        var id = this.id
        $("#"+id+" .div-img-update").show();
    });

    $(".div-list-img").mouseout(function(){
        var id = this.id
        $("#"+id+" .div-img-update").hide();
    });

	$("#span_setting").click(function(){
        index();
		$("#div-home").hide();
		$("#div-payment").hide();
		$("#div-my-deliver").hide();
        $("#div-my-orders").hide();
        $("#div-my-closed").hide();
		$("#list_payment").removeClass("active");


		$("#div-setting").show("slow");
		$("#div-aboutus").show();
		$("#list_aboutus").addClass("active");

        lightOrDark($(".div-header").css("background-color"));

	});

	$("#span_home").click(function(){
		$("#div-setting").hide();
		$("#div-my-deliver").hide();
        $("#div-my-orders").hide();
        $("#div-my-closed").hide();

		$("#div-home").show("slow");
	});

	/* SETTINGS LINK */

	$("#list_aboutus").click(function(){
        var font_color = $(".div-left-setting").find("li").not(".active").css("color");

        $("#div-payment").hide();
		$("#list_payment").removeClass("active");

		$("#div-aboutus").show("slow");
        $("#list_aboutus").addClass("active");

        lightOrDark($(".div-header").css("background-color"));

	});

	$("#list_payment").click(function(){
        var font_color = $(".div-left-setting").find("li").not(".active").css("color");

        $("#div-aboutus").hide();
		$("#list_aboutus").removeClass("active");

		$("#div-payment").show("slow");
		$("#list_payment").addClass("active");

        lightOrDark($(".div-header").css("background-color"));

    });

	/* SETTINGS LINK */

	/* TEXTBOX */
	$("#input_aboutus").focus(function(){
		$("#span-aboutus").show("slow");
	});

	$("#input_aboutus").focusout(function(){
		$("#span-aboutus").hide();
	});

    $("#input_aboutus").keyup(function(){
    var length = $(this).val().length;
    $("#input_aboutus_length").text(length);
    });

    $("#input_linkname").focus(function(){
    $("#span-linkname").show("slow");
    });

    $("#input_linkname").focusout(function(){
        $("#span-linkname").hide();
        check_linkname();
    });

    $("#input_linkname").keyup(delay(function(){
        var length = $(this).val().length;
        $("#input_linkname_length").text(length);
        check_linkname();
    },500));


	/* TEXTBOX */

	/* MY ORDER */

	$("#img_process_order").click(function(){
        get_process_order();
		$("#div-setting").hide();
		$("#div-home").hide();
		$("#div_order").hide();
        $("#div-my-delivered").hide();
        $("#div-my-closed").hide();

		$("#div_order_table").show("slow");
		$("#div-my-orders").show("slow");
		$("#modal_myorders").modal("hide");

	});

	$("#img_close_order").click(function(){
        get_close_order();
		$("#div-setting").hide();
		$("#div-home").hide();
		$("#div-my-orders").hide();
        $("#div-my-delivered").hide();
        $("#div_closed").hide();

		$("#div_closed_table").show("slow");
		$("#div-my-closed").show("slow");
		$("#modal_myorders").modal("hide");
    });
    
	$("#img_delivered_order").click(function(){
        get_delivered_order();
		$("#div-setting").hide();
		$("#div-home").hide();
		$("#div-my-orders").hide();
        $("#div-my-closed").hide();
        $("#div_delivered").hide();

		$("#div_delivered_table").show("slow");
		$("#div-my-delivered").show("slow");
		$("#modal_myorders").modal("hide");
	});    

    $("#btn-delivered-back").click(function(){
        get_delivered_order();
		$("#div-setting").hide();
		$("#div-home").hide();
		$("#div-my-orders").hide();
        $("#div-my-closed").hide();
        $("#div_delivered").hide();

		$("#div_delivered_table").show("slow");
		$("#div-my-delivered").show("slow");
		$("#modal_myorders").modal("hide");
    });

    $("#btn-delivered-search").click(function(){
        get_delivered_order();
    });

  $(document).on("change", "#delivery_1", function(){
    if ($("#delivery_1").is(":checked") == true){
      $("#div-for-appointment").show("slow");
    }else{

      for (var i = 1; i < 8; i++) {
        $("#btn-day-"+i).removeClass("btn-success");  
        $("#btn-day-"+i).addClass("btn-outline-success");  
        $("#btn-day-"+i).val(0);
      }

      $('#ftime').timepicker({
          startTime: '8:00'      
      });

      $('#ttime').timepicker({
          startTime: '17:00'
      });



      $("#div-for-appointment").hide("slow");      
    }
  });

  $(document).on("change", "#delivery_3", function(){
    if ($("#delivery_3").is(":checked") == true){
      $("#div-for-delivery").show("slow");
    }else{
      $("#ship_w_mm").val(0);
      $("#ship_o_mm").val(0);
      $("#div-for-delivery").hide("slow");      
    }
  });


  $('#ftime').timepicker({
      timeFormat: 'h:mm p',
      interval: 30,
      defaultTime : '8',
      startTime: '8:00',
      dynamic: false,
      dropdown: true,
      scrollbar: true
  });

  $('#ttime').timepicker({
      timeFormat: 'h:mm p',
      interval: 30,
      defaultTime: '17',
      startTime: '17:00',
      dynamic: false,
      dropdown: true,
      scrollbar: true
  });

  $("#free_shipping").change(function(){
    if ($(this).is(":checked")){
      $("#div-shipping-fee").hide("slow");
    }else{
      $("#div-shipping-fee").show("slow");
    }
  });


	/* MY ORDER */

	$("#save_prof_pic").click(function(){
		save_prof_pic();
  });
  
  $("#save_store_img").click(function(){
    save_store_img();
  });

  $("#cancel_aboutus").click(function(){
    home();    
  });

  $("#save_aboutus").click(function(){
    check_aboutus();
  });

  $("#save_payment").click(function(){
    check_payment();
  });  

  $("#cancel_payment").click(function(){
    home();
  });

  $("#imgInp").change(function(){
    //   console.log(this);
      readURL(this, 2);
    // readProductURL(this);
  }); 

  $("#imgProf").change(function(){
      readURL(this, 1);
  })

  $("#imgStore").change(function(){
    readURL(this, 3);
  })

  $("#btn_add_variation").click(function(){
    add_variation();
  });

  $(document).on("click", "#btn_add_variation_type_1", function(){
    add_variation_type(1);
  });

  $(document).on("click", "#btn_add_variation_type_2", function(){
    add_variation_type(2);
  });

  $("#btn-variation").click(function(){
    variations();
  });


  $("#save_product").click(function(){
    check_product();
  });

  $("#delete_product").click(function(){
    swal({
      type : "warning",
      title : "Delete?",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes",
      cancelButtonText: "No",
    }, function(isConfirm){
      if (isConfirm){
        delete_product();
      }      
    })
  });

  $("#btn-post").click(function(){
    account_post();
  });

  $("#btn_cancel_acknowledge").click(function(){
    swal({
      type : "warning",
      title : "Cancel ?",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes",
      cancelButtonText: "No",
    }, function(isConfirm){
      if (isConfirm){
        cancel_acknowledge_order();
      }
    })
  })

  $("#btn_acknowledge").click(function(){
    swal({
      type : "warning",
      title : "Acknowledge?",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes",
      cancelButtonText: "No",
    }, function(isConfirm){
      if (isConfirm){
        acknowledge_order();
      }
    })
  });

  $("#btn_save_deliver").click(function(){

    var courier = jQuery.trim($("#delivery_courier").val()).length;
    var track_order = jQuery.trim($("#delivery_track").val()).length;

    if (courier == 0 || track_order == 0){
      swal({
        type : "warning",
        title : "Please input all required fields"
      })

      if (courier == 0){
        $("#delivery_courier").addClass("error");
      }

      if (track_order == 0){
        $("#delivery_track").addClass("error");
      }

    }else{

      swal({
        type : "warning",
        title : "Confirm Delivery?",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
      }, function(isConfirm){
        if (isConfirm){
          delivery_order();
        }
      })

    }

  });

  $("#btn_back_acknowledge").click(function(){
    get_process_order();
    $("#div-setting").hide();
    $("#div-home").hide();
    $("#div_order").hide();
    $("#div-my-deliver").hide();

    $("#div_order_table").show("slow");
    $("#div-my-orders").show("slow");
    $("#modal_myorders").modal("hide");    
  });

  $("#save-prod-variation").click(function(){
    save_prod_variation();
  });

  /*change username & password */

  $("#save_setting").click(function(){
    var csrf_name = $("input[name=csrf_name]").val();
    var password = $("#curr_pass").val();
    var new_pass = $("#new_pass").val();
    var conf_pass = $("#conf_pass").val();

    if (password == ""){
      swal({
        type : "warning",
        title : "Send?",
        text : "Password will not change",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
      }, function(isConfirm){
        if (isConfirm){
          save_setting();
        }
      })
    }else{
        if (new_pass != conf_pass){
            swal({
                type : "warning",
                title : "New Password and Confirm Password does not match",
            })
            $("#modal-setting").modal("show");
        }else{
            $.ajax({
                type : "POST",
                dataType : "JSON",
                url : base_url + "Outletko_profile/check_curr_password",
                data : {password : password, csrf_name : csrf_name},
                success : function(result){
                    $("input[name=csrf_name]").val(result.token);
                    console.log(result.result);
                    if (result.result > 0){
                        swal({
                            type : "warning",
                            title : "Current Password is Incorrect"
                        })                          
                        $("#modal-setting").modal("show");
                    }else{
                        swal({
                            type : "warning",
                            title : "Send?",
                            text : "Username & Password will change",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                          }, function(isConfirm){
                            if (isConfirm){
                              save_setting();
                            }
                          })                          
                    }
                }, error : function(err){
                    console.log(err.responseText);
                }
            })
        }
    }

  });

  $("#prod_std_delivery").change(function(){
    // if ($(this).val() == "3"){
    //   $("#div-prod-ship-fee").show("slow");
    // }else{
    //   $("#div-prod-ship-fee").hide("slow");
    // }
  });

  $("#save_category").click(function(){
    save_category();
  });

  $("#input_city").autocomplete({
		focus: function(event, ui){
			$("#input_province").val(ui.item.province);
		},
		select: function(event, ui){
			$("#input_province").val(ui.item.province);
			$("#input_city").attr("data-id", ui.item.city_id);
			$("#input_province").attr("data-id", ui.item.prov_id);
		},
		source: function(req, add){
      var csrf_name = $("input[name=csrf_name]").val();
			var city = $("#input_city").val();
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
              $("#outlet_city").val("");
              $("#outlet_province").val("");
                add('');
            }
          }, error: function(err){
            console.log("Error: " + err.responseText);
          }
        });
		}
	});

  $("#ship_courier").autocomplete({
		select: function(event, ui){
			$("#ship_courier").attr("data-id", ui.item.id);
		},
		source: function(req, add){
            var csrf_name = $("input[name=csrf_name]").val();
			var ship_courier = $("#ship_courier").val();
        $.ajax({
          url: base_url + "Outletko_profile/search_courier/", 
          dataType: "JSON",
          type: "POST",
          data: {'courier' : ship_courier, csrf_name : csrf_name},
          success: function(data){
            $("input[name=csrf_name]").val(data.token);
            if(data.response =="true"){
                add(data.result);
            }else{
              $("#ship_courier").val("");
                add('');
            }
          }, error: function(err){
            console.log("Error: " + err.responseText);
          }
        });
		}
	});  

  $("#btn-save-ship").click(function(){
    swal({
      type : "warning",
      title : "Save?",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes",
      cancelButtonText: "No",
    }, function(isConfirm){
      if (isConfirm){
        check_ship();
      }
    }); 

  }); 

  $("#payment_6").change(function(){
    if ($(this).is(":checked")){
      $("#div-remittance-list").show("slow");
    }else{
      $("#div-remittance-list").hide("slow");
    }
  });

  $("#payment_5").change(function(){
    if ($(this).is(":checked")){
      $("#div-bank-list").show("slow");
    }else{
      $("#div-bank-list").hide("slow");
    }
  });


  $("#btn_save_bank").click(function(){
    check_save_bank();
  });

  $("#btn_remitt_save").click(function(){
    check_remitt_save();
  });

});

/* GENERAL FUNCTION */
function avoidSplChars(e) {
 e = e || window.event;
 var bad = /[^\sa-z\d]/i,
 key = String.fromCharCode( e.keyCode || e.which );
 
    if ( e.which !== 0 && e.charCode !== 0 && bad.test(key) ) {
      e.returnValue = false;
      if ( e.preventDefault ) {
        e.preventDefault(); 
      }
    } 
}

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
        // font_color_other = "#008080";
        font_color_other = "#800000";
        // return 'light';
    }else {
        font_color = "white";
        font_color_other = "yellow";
        // return 'dark';
    }

    console.log(hsp);

    $("#text-buss-type").css("color", font_color_other);
    $("#span_setting").css("color", font_color_other);
    $("#span_home").css("color", font_color);
    $("#text-buss-name").css("color", font_color);
    $("#text-buss-address").css("color", font_color);
    $("#text-buss-contact-no").css("color", font_color);
    $("#text-buss-email").css("color", font_color);
    $("#header_aboutus").css("color", font_color);
    $(".div-left-aboutus").find("span").css("color", font_color_other);
    $(".div-left-aboutus").find("p").css("color", font_color);
    $(".div-left-setting").find("li").css("color", font_color);
    $(".div-left-setting").find(".active").css("color", font_color_other);
}

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);

  if (element == "#input_facebook"){
    $temp.val("https://www.facebook.com/" + $(element).val()).select();
  }else if (element == "#input_instagram"){
    $temp.val("https://www.instagram.com/" + $(element).val()).select();
  }else{
    $temp.val($(element).val()).select();
  }

  document.execCommand("copy");
  $temp.remove();
}

function createColorPicker(color){

    const pickr = Pickr.create({
        el: '#colorpicker',
        theme: 'nano', // or 'monolith', or 'nano'
        default : color,
        swatches: [
            'rgb(0,0,0)',
            'rgb(0,0,128)',
            'rgb(0,0,255)',
            'rgb(0,128,0)',
            'rgb(0,255,255)',
            'rgb(128,0,0)',
            'rgb(128,0,128)',
            'rgb(128,128,0)',
            'rgb(128,128,128)',
            'rgb(192,192,192)',
            'rgb(255,0,0)',
            'rgb(255,0,255)',
            'rgb(255,255,0)',
            'rgb(255,255,255)'
        ],        
        components: {
            // Main components
            preview: true,
            opacity: false,
            hue: true,
    
            // Input / output Options
            interaction: {
                hex: false,
                rgba: false,
                hsla: false,
                hsva: false,
                cmyk: false,
                input: true,
                clear: true,
                save: true
            }
        }
    });
    
    pickr.on('init', instance => {
        // console.log('init', instance);
    }).on('save', (color, instance) => {
        console.log('save', color.toHEXA().toString());
        $(".pcr-app").removeClass("visible");
        $("#color-val").val(color.toHEXA().toString());
        $(".div-header").css("background", color.toHEXA().toString());
        $(".div-left-setting").css("background", color.toHEXA().toString());
        $(".div-left-aboutus").css("background", color.toHEXA().toString());
        lightOrDark(color.toHEXA().toString());
    }).on('clear', (color, instance) => {
        $("#color-val").val("#77933c");
        $(".div-header").css("background", "#77933c");
        $(".div-left-setting").css("background", "#77933c");
        $(".div-left-aboutus").css("background", "#77933c");
        $(".pcr-app").removeClass("visible");
        // console.log('clear', instance);
    });
    

}

function readURL(input, type) {
    if (input.files.length != 0) {
        var reader = new FileReader();
        
        if (type == "1"){
          reader.onload = function (e) {
            // console.log(e.target.result);
              $('#div-img-prof').css('background', 'url("' + e.target.result + '")');
              $('#div-img-prof').css('background-size', "contain");
              $('#div-img-prof').css('background-repeat', "no-repeat");
              $('#div-img-prof').css('background-position', "center center");
              // $("#div-prod-img").css('background', 'url("' + e.target.result + '")');
              // $('#div-prod-img').css('background-size', "100% 100%");
              // $('#div-prod-img').css('background-repeat', "no-repeat");
              // $('#div-prod-img').css('background-position', "center center");
          }
        }else if (type == "2"){
            reader.onload = function (e) {
                // $('#img-upload').attr('src', e.target.result);
                $('#modal-img-upload').css('background', 'url("' + e.target.result + '")');
                $('#modal-img-upload').css('background-size', "contain");
                $('#modal-img-upload').css('background-repeat', "no-repeat");
                $('#modal-img-upload').css('background-position', "center center");
              }  
            // readProductURL(input);
        }else if (type == "3"){
          reader.onload = function (e) {
            $('#div-img-store').css('background', 'url("' + e.target.result + '")');
            $('#div-img-store').css('background-size', "contain");
            $('#div-img-store').css('background-repeat', "no-repeat");
            $('#div-img-store').css('background-position', "center center");
          }
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function readProductURL(evt){
    var arr_data = new Array();
    console.log(evt);
    var files = evt.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function (theFile) {
            return function (e) {
                // Render thumbnail.
                // var span = document.createElement('span');
                // span.innerHTML = ['<img class="thumb" src="', e.target.result,
                //     '" title="', escape(theFile.name), '"/>'].join('');
                // document.getElementById('previewImg').insertBefore(span, null);
                    var data = {
                        "img" : e.target.result,
                        "thumb" : e.target.result
                    }
                    arr_data.push(data);
            };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }    

    console.log(arr_data);
    // var $fotoramaDiv = $('#div-fotorama').fotorama();
    // console.log($fotoramaDiv);
    // var fotorama = $fotoramaDiv.data('fotorama');
    // console.log(fotorama);
    // fotorama.load(arr_data);    


}

/* GENERAL FUNCTION */

function check_subscription(){
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Outletko_profile/check_subscription",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);

            if (data.result == "1"){
                swal({
                    type : "warning",
                    title : "Friendly Reminder : Your Subscription will end on " + data.date + ". Please feel free to contact us 24/7 if you need any assistance."
                })
            }else if (data.result == "2"){
                swal({
                    html : true,
                    type : "warning",
                    title : "Your Outletko Subscription is Free. Happy Selling!"
                })
            }

        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function check_linkname(){
    var csrf_name = $("input[name=csrf_name]").val();
    var link_name = $("#input_linkname").val();

    $.ajax({
        data : {csrf_name : csrf_name, link_name : link_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Outletko_profile/check_linkname",
        success : function(result){ 
            $("input[name=csrf_name]").val(result.token);
            $("#span-linkname-error").attr("data-err", result.result);
            if (link_name != ""){
                if (result.result > 0){
                    $("#input_linkname").addClass("error");
                    $("#span-linkname-error").text('This "'+link_name+'" is not available');
                    $("#span-linkname-error").show();
                }else{
                    $("#span-linkname-error").hide();
                    $("#input_linkname").removeClass("error");
                }    
            }else{
                $("#input_linkname").addClass("error");
                $("#span-linkname-error").text('Link Name is required field');
                $("#span-linkname-error").show();
            }
            return result.result;
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function business_category(){
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
        $("#input_bussinesscategory").append("<option value='"+result[i].id+"'>"+result[i].desc  +"</option>");
      }
      index();
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function delivery_type(){
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    url : base_url + "Outletko_profile/delivery_type",
    type : "GET",
    dataType : "JSON",
    data : {csrf_name : csrf_name},
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      var div = "";

      for (var i = 0; i < result.length; i++) {
        div += '<div class="row pt-2 mt-3">' +
                      '<div class="col-lg-3 col-md-5 col-sm-6 col-6 pl-4">' +
                        '<span class="text-capitalize">'+result[i].delivery_type+'</span>' +
                      '</div>' +
                      '<div class="col-lg-1 col-md-1 col-sm-2 col-2">' +
                        // '<input type="checkbox" name="checkboxG4" id="delivery_'+result[i].id+'" class="css-checkbox delivery_type" value="'+result[i].id+'">' +
                        // '<label for="delivery_'+result[i].id+'" id="check_box_'+result[i].id+'" class="css-label"></label>' +
                        '<div class="custom-control custom-checkbox checkbox-xl cursor-pointer" style="padding-left: 1.0rem;">'+
                            '<input type="checkbox" id="delivery_'+result[i].id+'" class="custom-control-input cursor-pointer delivery_type" value="'+result[i].id+'" >'+
                            '<label for="delivery_'+result[i].id+'" id="check_box_'+result[i].id+'" class="custom-control-label cursor-pointer"></label>'+
                        '</div>'+

                        '</div>' + 
                    '</div>';
      }

      $("#div-delivery-type").append(div);

    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function payment_type(){
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    url : base_url + "Outletko_profile/payment_type",
    type : "GET",
    dataType : "JSON",
    data : {csrf_name : csrf_name},
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      var div = "";
      var disabled = "";
      var message = "";

      for (var i = 0; i < result.length; i++) {
        disabled = "";
        message = "";

        if (result[i].id == "3"){
            disabled = "disabled";
            message = "Please contact support@outletko.com for activation of Card Payment";
        }

        // div += '<div class="row pt-2">' +
        //               '<div class="col-lg-3 col-md-5 col-sm-6 col-6 pl-4">' +
        //                 '<span class="text-capitalize">'+result[i].payment_type+'</span>' +
        //               '</div>' +
        //               '<div class="col-lg-1 col-md-1 col-sm-2 col-2">' +
        //                 '<input type="checkbox" name="checkboxG4" id="payment_'+result[i].id+'" class="css-checkbox payment_type" value="'+result[i].id+'" '+disabled+'>' +
        //                 '<label for="payment_'+result[i].id+'" class="css-label"></label>' +
        //               '</div>' + 
        //               '<div class="col-lg-8 col-md-5 col-sm-4 col-4">' +
        //                 '<span style="color:green;">'+message+'</span>' + 
        //                '</div>' +
        //             '</div>';

        div += '<div class="row pt-2 mt-3">' +
                    '<div class="col-lg-3 col-md-5 col-sm-6 col-6 pl-4">' +
                        '<span class="text-capitalize">'+result[i].payment_type+'</span>' +
                    '</div>' +
                    '<div class="col-lg-1 col-md-1 col-sm-2 col-2">' +
                        '<div class="custom-control custom-checkbox checkbox-xl cursor-pointer" style="padding-left: 1.0rem;">'+
                            '<input type="checkbox" id="payment_'+result[i].id+'" class="custom-control-input cursor-pointer payment_type" value="'+result[i].id+'" '+disabled+'>'+
                            '<label for="payment_'+result[i].id+'" class="custom-control-label cursor-pointer"></label>'+
                        '</div>'+
                    '</div>' + 
                    '<div class="col-lg-8 col-md-5 col-sm-4 col-4">' +
                        '<span style="color:green;">'+message+'</span>' + 
                    '</div>' +
                '</div>';

    
    }

      $("#div-payment-types").append(div);

    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function bank_list(){
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {csrf_name : csrf_name},
    type : "GET",
    dataType : "JSON",
    url : base_url + "Outletko_profile/bank_list",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      var data = result.data;
      for (var i = 0; i < data.length; i++) {
        $("#bank_name").append("<option value='"+data[i].id+"'>"+data[i].bank_name  +"</option>");
      }

    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function remittance_list(){
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {csrf_name : csrf_name},
    type : "GET",
    dataType : "JSON",
    url : base_url + "Outletko_profile/remittance_list",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);

      var data = result.data;

      for (var i = 0; i < data.length; i++) {
        $("#div-remitt-list").append("<div class='col-12 col-lg-3 col-md-4 col-sm-12'>"+
                            "<div class='custom-control custom-checkbox'>"+
                                "<input type='checkbox' class='custom-control-input remitt_check' id='remitt_"+data[i].id+"' name='remitt_"+i+"' value='"+data[i].id+"'>"+
                                "<label class='custom-control-label' for='remitt_"+data[i].id+"'>"+ data[i].name +"</label>"+
                            "</div>"+                          
                          "</div>");
      }
    //   console.log(result.data);
    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function btn_day(type){
  var btn = "#btn-day-"+type;

  if ($(btn).hasClass("btn-outline-success")){
    $(btn).removeClass("btn-outline-success");  
    $(btn).addClass("btn-success");  
    $(btn).val(1);
  }else{
    $(btn).removeClass("btn-success");  
    $(btn).addClass("btn-outline-success");  
    $(btn).val(0);
  }
}

function home(){
  $("#div-setting").hide();
  $("#div-my-deliver").hide();
  $("#div-my-orders").hide();

  $("#div-home").show("slow");  
}

function index(){
   var csrf_name = $("input[name=csrf_name]").val();
   $("#tbl-ship-fee tbody tr").remove();
   $("#prod_cat_tbl tbody tr").remove();
   $("#list-category").empty();
   $("#prod_category").empty();

  $.ajax({
    data: {csrf_name : csrf_name}, 
    type: "GET", 
    url : base_url +  "Outletko_profile/get_profile_dtl",
    dataType : "JSON",
    success : function(result){
        
    $("input[name=csrf_name]").val(result.token);

    var profile = base_url + "images/profile/" + result.profile;    
    var address = (result.result[0].street == null ? "" : (result.result[0].street == "" ? "" : result.result[0].street  + ", ") ) + 
    			  (result.result[0].village == null ? "" : (result.result[0].village == "" ? "" : result.result[0].village + ", ") )  + 
    			  (result.result[0].barangay == null ? "" : (result.result[0].barangay == "" ? "" : result.result[0].barangay + ",") )  + 
    			  (result.result[0].city_desc == null ? "" : (result.result[0].city_desc == "" ? "" : result.result[0].city_desc + ", ") ) + 
    			  (result.result[0].province_desc == null ? "" : (result.result[0].province_desc == "" ? "" : result.result[0].province_desc)) ;

    //for text
        $(".div-header").css("background", result.result[0].bg_color);
        $(".div-left-aboutus").css("background", result.result[0].bg_color);
        $(".div-left-setting").css("background", result.result[0].bg_color);
        $("#colorpicker").css("background", result.result[0].bg_color);
        $("#color-val").val(result.result[0].bg_color);

        if ($("#pickr-setting").val() == "0"){
            $("#pickr-setting").val("1");
            if (result.result[0].bg_color == null){
                createColorPicker("#77933c");
                lightOrDark("#77933c");
            }else if (result.result[0].bg_color == ""){
                createColorPicker("#77933c");
                lightOrDark("#77933c");
            }else{
                createColorPicker(result.result[0].bg_color);
                lightOrDark(result.result[0].bg_color);
            }    
        }

        if (result.result[0].account_pro == "0"){
            $("#upgrade-outletko").removeAttr("hidden");
            $("#renew-outletko").attr("hidden", true); 
        }else{
            $("#renew-outletko").removeAttr("hidden");
            $("#upgrade-outletko").attr("hidden", true); 
        }

        // console.log(result.result[0].bg_color);

        // Pickr.setColorRepresentation("#" + result.result[0].bg_color);
        // $("#colorpicker").ColorPicker({
        //   color: '#'+ result.result[0].bg_color,
        // });

        if (result.result[0].del_date == "1"){
          $("#cust_del_date").prop("checked", true);
        }else{

        }

        $("#div-prod-img").css("background-image", "url('"+profile+"')");
        $("#div-img-prof").css("background-image", "url('"+profile+"')");
        $('#div-img-prof').css('background-size', "100% 100%");
        $('#div-img-prof').css('background-repeat', "no-repeat");
        $('#div-img-prof').css('background-position', "center center");
        
        $("#account_post").val(result.result[0].account_post);

        $("#text-buss-name").text(result.result[0].account_name);
        $("#owner_name_text").text(result.result[0].first_name+" "+result.result[0].middle_name+" "+result.result[0].last_name);
        $("#text-buss-type").text(result.result[0].desc_cat);
        $("#text-buss-address").text((address == "" ? "No Address" : address));
        
        $("#text_aboutus").text((result.result[0].about_us == null ? "" : result.result[0].about_us.substring(0, 400)));
       
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
    
    	var aboutus_length = result.result[0].about_us.substring(0, 400)

    //for inputs
        $("#input_businessname").val(result.result[0].account_name);
        $("#input_linkname").val(result.result[0].link_name);
        $("#input_linkname_length").text(result.result[0].link_name.length);
        $("#input_aboutus").val(result.result[0].about_us.substring(0, 400));
        $("#input_aboutus_length").text(aboutus_length.length);
        $("#input_bussinesscategory").val(result.result[0].business_category);

        $("#input_bldg").val((result.result[0].street == null ? result.result[0].address : result.result[0].street));
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
   
        $("#remitt_acct_name").val(result.result[0].remitt_name);
        $("#remitt_contact_no").val(result.result[0].remitt_contact);

        $("#input_store_assoc").val(result.store_assoc);
   
        
        //for inputs

        if (result.result[0].free_shipping == 0){
          $("#div-shipping-fee").show();
        }else{
          $("#free_shipping").prop("checked", true);
          $("#div-shipping-fee").hide();
        }
    
    //for prod_cat_list
        $('#prod_cat_list ul').empty();
        for(var x = 0; x<result.prod_cat.length; x++) {
            $("#prod_cat_list ul").append('<li class="pl-0 font-size-16">'+result.prod_cat[x]['product_category']+'</li>');
        }
    //for prod_cat_list
      
      for (var i = 0; i < result.payment_type.length; i++) {
        var payment_type_id = result.payment_type[i].payment_type_id;
        var check = result.payment_type[i].payment_type_check;


        if (check == 1){
          $("#payment_"+ payment_type_id ).prop("checked", true);
        }

        if (payment_type_id == "5" && check == 1){
          $("#div-bank-list").show();
        }

        if (payment_type_id == "6" && check == 1){
          $("#div-remittance-list").show();
        }

        if (i == 0){
          $("#div-for-appointment").show("slow");
        }else if (i == 2){
          $("#div-for-delivery").show("slow");
        }

      }


      for (var i = 0; i < result.delivery_type.length; i++) {
        var delivery_type_id = result.delivery_type[i].delivery_type_id;
        var check = result.delivery_type[i].delivery_type_check;


        if (check == 1){
            $("#delivery_"+ delivery_type_id ).prop("checked", true);
            // $("#prod_std_delivery").find(".del_"+(Number(i) + 1)).removeClass("opt-hide");
        }
      }

      if (result.shipping_fee.length != 0){
        // $("#prod_del_opt").val(result.shipping_fee[0].std_delivery);
        $("#prod_std_delivery").val(result.shipping_fee[0].std_delivery);
        $("#std_del").val(result.shipping_fee[0].std_delivery);
        $("#ship_w_mm").val(result.shipping_fee[0].sf_w_mm);
        $("#ship_o_mm").val(result.shipping_fee[0].sf_o_mm);        
      }

      if (result.appointment.length != 0){

        if (result.appointment[0].mon == 1){
          $("#btn-day-1").removeClass("btn-outline-success");  
          $("#btn-day-1").addClass("btn-success");  
          $("#btn-day-1").val(1);
        }

        if (result.appointment[0].tue == 1){
          $("#btn-day-2").removeClass("btn-outline-success");  
          $("#btn-day-2").addClass("btn-success");  
          $("#btn-day-2").val(1);
        }

        if (result.appointment[0].wed == 1){
          $("#btn-day-3").removeClass("btn-outline-success");  
          $("#btn-day-3").addClass("btn-success");  
          $("#btn-day-3").val(1);
        }

        if (result.appointment[0].thu == 1){
          $("#btn-day-4").removeClass("btn-outline-success");  
          $("#btn-day-4").addClass("btn-success");  
          $("#btn-day-4").val(1);
        }

        if (result.appointment[0].fri == 1){
          $("#btn-day-5").removeClass("btn-outline-success");  
          $("#btn-day-5").addClass("btn-success");  
          $("#btn-day-5").val(1);
        }

        if (result.appointment[0].sat == 1){
          $("#btn-day-6").removeClass("btn-outline-success");  
          $("#btn-day-6").addClass("btn-success");  
          $("#btn-day-6").val(1);
        }

        if (result.appointment[0].sun == 1){
          $("#btn-day-7").removeClass("btn-outline-success");  
          $("#btn-day-7").addClass("btn-success");  
          $("#btn-day-7").val(1);
        }

        $("#ftime").val(result.appointment[0].start_time);
        $("#ttime").val(result.appointment[0].end_time);

        $("#ftime").timepicker({
          startTime : result.appointment[0].startTime
        });

        $("#ttime").timepicker({
          startTime : result.appointment[0].startTime
        });
      }
      // console.log(result.warranty);
      if (result.warranty.length != 0){
        $("#inp_warranty").val(result.warranty[0].account_warranty);
        $("#inp_return").val(result.warranty[0].account_return);
        $("#prod_warranty").val(result.warranty[0].account_warranty);
        $("#prod_return").val(result.warranty[0].account_return);
      }

      var bank_list = result.bank_list;
      $("#tbl-bank tbody").empty();
 
      for(var i = 0; i < bank_list.length; i++){

        $("#tbl-bank tbody").append("<tr><td class='bank_name'>" + bank_list[i].bank_name + 
          "</td><td class='account_name'>" + bank_list[i].account_name + 
          "</td><td class='account_no'>" + bank_list[i].account_no +
          "</td><td class='status'>" + (bank_list[i].status == "1" ? "Active" : "Inactive") + 
          "</td><td class='bank_id' hidden>" + bank_list[i].bank_id +
          "</td><td class='status_id' hidden>" + bank_list[i].status +
          "</td><td>" + "<button class='btn btn-sm btn-block btn-primary' onclick='edit_bank("+bank_list[i].id+", "+i+")'><i class='far fa-edit'></i></button>" +
          "</td><td>" + "<button class='btn btn-sm btn-block btn-danger' onclick='delete_bank("+bank_list[i].id+")'><i class='fas fa-trash-alt'></i></button>" +
          "</td></tr>");

      }

      var remittance_list = result.remittance_list;

      for(var i = 0; i < remittance_list.length; i++){      
        $("#remitt_"+remittance_list[i].id).prop("checked", true);
      }      

      if (result.area_coverage.length != 0){
        $("#prod_del_opt").empty();

        $("#cov_mm").prop("checked", (result.area_coverage[0].cov_mm == "1" ? true : false));
        $("#cov_luz").prop("checked", (result.area_coverage[0].cov_luz == "1" ? true : false));
        $("#cov_vis").prop("checked", (result.area_coverage[0].cov_vis == "1" ? true : false));
        $("#cov_min").prop("checked", (result.area_coverage[0].cov_min == "1" ? true : false));

        var cov_mm = result.area_coverage[0].cov_mm;
        var cov_luz = result.area_coverage[0].cov_luz;
        var cov_vis = result.area_coverage[0].cov_vis;
        var cov_min = result.area_coverage[0].cov_min;

        if (cov_mm == "1" && cov_luz == "1" && cov_vis == "1" && cov_min == "1"){
            $("#prod_del_opt").append("<option value='0'>Nationwide</option>");
        }

        if (cov_mm == "1" || cov_luz == "1"){
            $("#prod_del_opt").append("<option value='1'>Metro Manila Only</option>");
        }

        if (cov_luz == "1" ){
            $("#prod_del_opt").append("<option value='2'>Luzon Only</option>");
        }

        if (cov_vis == "1"){
            $("#prod_del_opt").append("<option value='3'>Visayas Only</option>");
        }

        if (cov_min == "1"){
            $("#prod_del_opt").append("<option value='4'>Mindanao Only</option>");
        }

        if (cov_mm == "1" && cov_luz == "0" && cov_vis == "1"){
            $("#prod_del_opt").append("<option value='5'>Metro Manila & Visayas</option>");
        }

        if (cov_mm == "1" && cov_luz == "0" && cov_min == "1"){
            $("#prod_del_opt").append("<option value='6'>Metro Manila & Mindanao</option>");
        }

        if (cov_luz == "1" && cov_vis == "1"){
            $("#prod_del_opt").append("<option value='7'>Luzon & Visayas</option>");
        }

        if (cov_luz == "1" && cov_min == "1"){
            $("#prod_del_opt").append("<option value='8'>Luzon & Mindanao</option>");
        }

        if (cov_vis == "1" && cov_min == "1"){
            $("#prod_del_opt").append("<option value='9'>Visayas & Mindanao</option>");
        }

        $("#prod_del_opt").val("00");

      }


    //products
        var pad = "";
        var prod_price = "";
        var min_price = "";
        var max_price = "";
        $('#posted_prod').empty();
        for(var x = 0; x<result.products.length; x++) {
            var href_url = base_url +'images/products/'+result.products[x].img_location[0];
            var product_name = result.products[x].product_name;
            var prod_unit_price = result.products[x].product_unit_price;
            var margin = "";
            var margin_plus_image = "";

            if (x > 3){
              margin = "mt-4";
            }else{
              margin = "mt-3";
            }

            if (x > 2){
              margin_plus_image = "mt-3";
            }else{
              margin_plus_image = "";
            }


            if ($(document).width() <= 600){
                if (product_name.length <= 25){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 25) + "....";
                }    
            }else if ($(document).width() <= 768 ){
                if (product_name.length <= 40){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 40) + "....";
                }    
            }else if ($(document).width() <= 1024 ){
                if (product_name.length <= 30){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 30) + "....";
                }    
            }else{
                if (product_name.length <= 45){
                    product_name = product_name;
                }else{
                    product_name = product_name.substring(0, 45) + "....";
                }    
            }


            // pad = "pad-center";
            min_price = result.products[x]['min_price'];
            max_price = result.products[x]['max_price'];
            // console.log(product_name);
            // console.log(min_price);
            // console.log(max_price);
            // console.log(prod_unit_price);

            if (min_price == null){
                prod_price = $.number(prod_unit_price, 2);    
            }else{
                if (min_price != ""){
                    prod_price = $.number(min_price, 2) + " - " + $.number(max_price, 2);
                }else{
                    prod_price = $.number(min_price, 2) + " - " + $.number(max_price, 2);
                }
            } 

            // if (min_price == null){
            //     prod_price = $.number(prod_unit_price, 2);    
            // }

            pad = "";
            var e = $('<div class="col col-6 col-md-6 col-lg-3 '+margin+' '+pad+' "   >'+
                        '<div class="div-list-img cursor-pointer mx-auto" id="div-list-img-'+x+'" alt="image" onclick="get_product_info('+result.products[x]['id']+');" data-toggle="modal" data-target="#img_upload">'+
        						// '<img src="'+href_url+'" class="cursor-pointer"  alt="image" onclick="get_product_info('+result.products[x]['id']+');" data-toggle="modal" data-target="#img_upload">'+
            					'<div class="btn" onclick="get_product_info('+result.products[x]['id']+');">'+
            						// '<i class="fa fa-camera"></i>'+
                      '</div>'+
                      '<div class="col-lg-12 text-center py-4 div-img-update" style="margin-top: 40%;background:rgb(0,0,0,0.3);height:45%;" id="div-img-update-'+x+'">' +
                        '<i class="fas fa-camera text-white"></i><br>' +
                        '<span class="font-size-18 font-weight-600 text-white">Update</span>' +
                      '</div>' +
        					'</div>'+
                  '<div class="bd-green text-center cursor-pointer div-list-img-btn py-1" onclick="get_product_info('+result.products[x]['id']+');" data-toggle="modal" data-target="#img_upload">' + 
                    '<span class="font-weight-600 list-prod-name" >'+ product_name +'</span><br>' + 
                    '<span class="font-weight-600 font-size-14 text-red  list-prod-price">PHP '+ prod_price +'</span>' +
                    '</div>' +
        				'</div>');

                $('#posted_prod').append(e);  
                $("#div-img-update-"+x+"").hide();

                $('#div-list-img-'+x+'').css("background-image", "url('"+href_url+"')");
                $('#div-list-img-'+x+'').css("background-repeat", "no-repeat");
                $('#div-list-img-'+x+'').css("background-position", "center");
                $('#div-list-img-'+x+'').css("background-size", "contain");
      
                $(".div-list-img").mouseover(function(){
                  var id = this.id
                  $("#"+id+" .div-img-update").show();
                });
              
                $(".div-list-img").mouseout(function(){
                  var id = this.id
                  $("#"+id+" .div-img-update").hide();
                });
              

                min_price = "";
                max_price = "";
            }
    //products
        var product_allowed = 0;
        if (result.result[0].account_pro == 1){
            product_allowed = 100;
        }else{
            product_allowed = 12;
        }

        if (result.product_rows < product_allowed){
            var e2 = $('<div class="col col-6 col-md-6 col-lg-3 '+margin+' '+pad+' ">' +
            '<div class="div-list-img">' +
                    '<img src="'+base_url+'images/products/plus2.png"  alt="image" data-toggle="modal" onclick="clear_prod_model();" data-target="#img_upload" id="btn-img-upload-1" class=" cursor-pointer">' +
            '</div>' +
            '<div class="bd-green text-center cursor-pointer div-list-img-btn py-1"  onclick="clear_prod_model();" id="btn-img-upload-2" data-toggle="modal" data-target="#img_upload">' +
                '<span class="font-weight-600 font-size-16 list-prod-name">Add Product</span><br>' +
                '<span class="font-weight-600 font-size-14 text-red list-prod-price">PHP 0.00</span>' +
            '</div>' +
            '</div>'  );

            $('#posted_prod').append(e2);
        }
    
        var prod_cat = result.prod_category;

        if (prod_cat.length != 0){
          // $("#prod_cat_tbl tbody").remove();

          for (var i = 0; i < prod_cat.length; i++) {
            $("#prod_cat_tbl tbody").append("<tr><td>"+ prod_cat[i].product_category +
              "<td onclick='edit_category("+prod_cat[i].id+", "+i+")' class='cursor-pointer'><i class='fa fa-edit'></i>" +
              "</td><td onclick='delete_category("+prod_cat[i].id+")' class='text-red cursor-pointer'><i class='fas fa-trash-alt'></i>" +
              "</td></tr>");

            $("#list-category").append("<li>"+prod_cat[i].product_category+"</li>")

            $("#prod_category").append("<option value='"+prod_cat[i].id+"'>"+prod_cat[i].product_category+"</option>");

          }

        }

        var courier = result.courier;

        if (courier.length != 0){
          for(var i = 0; i < courier.length; i++){
            $("#tbl-ship-fee tbody").append("<tr><td class='tbl-courier-id' hidden>" + courier[i].id + 
            "</td><td class='tbl-courier-name'>" + courier[i].courier_name + 
            "</td><td class='tbl-ship-kg'>" + courier[i].ship_kg + 
            "</td><td class='tbl-sf-mm'>" + courier[i].sf_mm + 
            "</td><td class='tbl-sf-luz'>" + courier[i].sf_luz +
            "</td><td class='tbl-sf-vis'>" + courier[i].sf_vis + 
            "</td><td class='tbl-sf-min'>" + courier[i].sf_min +  
            "</td><td><button class='btn btn-primary py-0' onclick='edit_ship("+courier[i].id+", "+i+")'><i class='far fa-edit'></i></button>" +  
            "</td><td><button class='btn btn-danger py-0' onclick='delete_ship("+courier[i].id+")'><i class='far fa-trash-alt'></i></button>" +  
            "</td></tr>");
          }

        }

        if (result.store_img.length != 0){
          var store = result.store_img;
          var store_img = "";

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
        }

        $("#payment_6").change(function(){
          if ($(this).is(":checked")){
            $("#div-remittance-list").show("slow");
          }else{
            $("#div-remittance-list").hide("slow");
          }
        });
      
        $("#payment_5").change(function(){
          if ($(this).is(":checked")){
            $("#div-bank-list").show("slow");
          }else{
            $("#div-bank-list").hide("slow");
          }
        });
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function get_del_type(){

  var csrf_name = $("input[name=csrf_name]").val();
  
  $.ajax({
    data : {csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Outletko_profile/get_del_type",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("#prod_std_delivery").append("<option hidden></option>");
      for (var i = 0; i < result.data.length; i++) {
        $("#prod_std_delivery").append("<option value='"+result.data[i].id+"' class='del_"+(Number(i) + 1)+" opt-hide' >"+result.data[i].delivery_type+"</option>");
      }

    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function order_table(id){
  $("#div_order_table").hide();
  $("#div_order").show("slow");
  var csrf_name = $("input[name=csrf_name]").val();
  $("#tbl-po-products tbody tr").remove();
  $("#acknowledge_order_id").val(id);

  $.ajax({
    data : {id : id, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Seller/get_order_id",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);

      var data = result.result;
      var products = result.products;
      var subtotal = 0;
      var shipping_fee = data[0].shipping_fee;

      $("#title_order").text("Order " + data[0].order_no);
      $("#tbl_order_no").text(data[0].order_no);
      $("#tbl_order_date").text(data[0].order_date);
      $("#tbl_from").text(data[0].buyer_name);

      $("#addr_1").val(data[0].delivery_address);
      $("#addr_barangay").val(data[0].barangay);
      $("#addr_city").val(data[0].city_desc);
      $("#addr_prov").val(data[0].province_desc);
      $("#addr_mobile").val(data[0].contact_no);
      $("#addr_email").val(data[0].email);
      $("#addr_contact_person").val(data[0].contact_name);
      $("#addr_notes").val(data[0].notes);
      $("#addr_zip").val(data[0].zip_code);
      $("#addr_phone").val(data[0].phone_no);

      $("#po_delivery_type").text(data[0].delivery_type_desc);
      $("#po_delivery_date").text((data[0].delivery_date == "0000-00-00" ? "No Delivery Date" : data[0].delivery_date_format));
      $("#po_delivery_courier").text(data[0].courier_name);
      $("#po_payment_type").text(data[0].payment_type_desc);
      $("#po_delivery_type_id").val(data[0].delivery_type_id);
      $("#po_payment_type_id").val(data[0].payment_type_id);

      if (data[0].payment_type_id == "5" || data[0].payment_type_id == "6"){
        $("#po_payment_method").text(data[0].payment_method_desc);
        $("#po_payment_method_id").text(data[0].payment_method_id);
      }else{
        $("#po_payment_method").text(data[0].payment_type_desc);
        $("#po_payment_method_id").text(data[0].payment_method_id);
      }

      for (var i = 0; i < products.length; i++) {

        $("#tbl-po-products tbody").append("<tr><td>"+ products[i].product_name + 
        "</td><td>" + (products[i].prod_var1 == "" ? "N/A" : products[i].prod_var1) + (products[i].prod_var2 == "" ? "" : "," + products[i].prod_var2) + 
        "</td><td>" + $.number(products[i].prod_qty) + 
        "</td><td>" + $.number(products[i].product_unit_price, 2) +           
        "</td><td>" + $.number((products[i].prod_qty * products[i].product_unit_price), 2) +
        "</td></tr>");
        subtotal += (products[i].prod_qty * products[i].product_unit_price);
      }

      $("#tbl_subtotal").text($.number(subtotal, 2));
      $("#tbl_ship").text($.number(shipping_fee, 2))
      $("#tbl_total").text($.number((Number(subtotal) + Number(shipping_fee)), 2));

    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function closed_table(id){

  $("#div_closed_table").hide();
  $("#div_closed").show("slow");

  var csrf_name = $("input[name=csrf_name]").val();
  $("#tbl-close-products tbody tr").remove();
  $("#close_order_id").val(id);

  $.ajax({
    data : {id : id, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Seller/get_order_id",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);

      var data = result.result;
      var products = result.products;
      var subtotal = 0;
      var shipping_fee = data[0].shipping_fee;

      $("#close_title").text("Order " + data[0].order_no);
      $("#tbl_close_order_no").text(data[0].order_no);
      $("#tbl_close_order_date").text(data[0].order_date);
      $("#tbl_close_from").text(data[0].buyer_name);

      $("#close_addr_1").val(data[0].delivery_address);
      $("#close_addr_barangay").val(data[0].barangay);
      $("#close_addr_city").val(data[0].city_desc);
      $("#close_addr_prov").val(data[0].province_desc);
      $("#close_addr_mobile").val(data[0].contact_no);
      $("#close_addr_email").val(data[0].email);
      $("#close_addr_contact_person").val(data[0].contact_name);

      $("#close_delivery_type").text(data[0].delivery_type_desc);
      $("#close_payment_type").text(data[0].payment_type_desc);
      $("#close_delivery_type_id").val(data[0].delivery_type_id);
      $("#close_payment_type_id").val(data[0].payment_type_id);


      for (var i = 0; i < products.length; i++) {

        $("#tbl-close-products tbody").append("<tr><td>"+ products[i].product_name + 
        "</td><td>" + (products[i].prod_var1 == "" ? "N/A" : products[i].prod_var1) + (products[i].prod_var2 == "" ? "" : "," + products[i].prod_var2) + 
        "</td><td>" + $.number(products[i].prod_qty) + 
        "</td><td>" + $.number(products[i].product_unit_price, 2) +           
        "</td><td>" + $.number((products[i].prod_qty * products[i].product_unit_price), 2) +
        "</td></tr>");
        subtotal += (products[i].prod_qty * products[i].product_unit_price);
      }

      $("#tbl_close_subtotal").text($.number(subtotal, 2));
      $("#tbl_close_ship").text($.number(shipping_fee, 2))
      $("#tbl_close_total").text($.number((Number(subtotal) + Number(shipping_fee)), 2));

    }, error : function(err){
      console.log(err.responseText);
    }
  })


}

function delivered_table(id){

    $("#div_delivered_table").hide();
    $("#div_delivered").show("slow");
  
    var csrf_name = $("input[name=csrf_name]").val();
    $("#tbl-delivered-products tbody tr").remove();
    $("#delivered_order_id").val(id);
  
    $.ajax({
      data : {id : id, csrf_name : csrf_name},
      type : "POST",
      dataType : "JSON",
      url : base_url + "Seller/get_order_id",
      success : function(result){
        $("input[name=csrf_name]").val(result.token);
  
        var data = result.result;
        var products = result.products;
        var subtotal = 0;
        var shipping_fee = data[0].shipping_fee;
  
        if (data[0].status == "2"){
            status_desc = "For Delivery";            
        }else if (data[0].status == "3"){
            status_desc = "Closed Order";
        }

        $("#span-delivered-status").text(status_desc);
        $("#delivered_title").text("Order " + data[0].order_no);
        $("#tbl_delivered_order_no").text(data[0].order_no);
        $("#tbl_delivered_order_date").text(data[0].order_date);
        $("#tbl_delivered_from").text(data[0].buyer_name);
  
        $("#delivered_addr_1").val(data[0].delivery_address);
        $("#delivered_addr_barangay").val(data[0].barangay);
        $("#delivered_addr_city").val(data[0].city_desc);
        $("#delivered_addr_prov").val(data[0].province_desc);
        $("#delivered_addr_mobile").val(data[0].contact_no);
        $("#delivered_addr_email").val(data[0].email);
        $("#delivered_addr_contact_person").val(data[0].contact_name);
  
        $("#delivered_delivery_type").text(data[0].delivery_type_desc);
        $("#delivered_payment_type").text(data[0].payment_type_desc);
        $("#delivered_delivery_type_id").val(data[0].delivery_type_id);
        $("#delivered_payment_type_id").val(data[0].payment_type_id);
  
  
        for (var i = 0; i < products.length; i++) {
  
        $("#tbl-delivered-products tbody").append("<tr><td>"+ products[i].product_name + 
        "</td><td>" + (products[i].prod_var1 == "" ? "N/A" : products[i].prod_var1) + (products[i].prod_var2 == "" ? "" : "," + products[i].prod_var2) + 
        "</td><td>" + $.number(products[i].prod_qty) + 
        "</td><td>" + $.number(products[i].product_unit_price, 2) +           
        "</td><td>" + $.number((products[i].prod_qty * products[i].product_unit_price), 2) +
        "</td></tr>");
          subtotal += (products[i].prod_qty * products[i].product_unit_price);
        }
  
        $("#tbl_delivered_subtotal").text($.number(subtotal, 2));
        $("#tbl_delivered_ship").text($.number(shipping_fee, 2))
        $("#tbl_delivered_total").text($.number((Number(subtotal) + Number(shipping_fee)), 2));
  
      }, error : function(err){
        console.log(err.responseText);
      }
    })
  
  
}
  
function variations(){

  var csrf_name = $("input[name=csrf_name]").val();
  var prod_id = $("#prod_id").val();
  var var_length = $("#div-card-variation .card").length;
  $("#modal_variations").modal("show");
  $("#div-card-variation").hide();      

  for (var i = 1; i < (Number(var_length) + 1); i++) {
    $("#div-card-variation div").remove();
  }

  $.ajax({
    data : {csrf_name : csrf_name, prod_id : prod_id},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Outletko_profile/variations",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);

      var data = result.data;
      var var_type = result.var_type;

      for (var i = 0; i < data.length; i++) {

        $("#div-card-variation").append(
        '<div class="col-12 col-md-12 col-lg-12">'+
            '<div class="card">'+
                '<div class="card-header py-1 pl-2">'+
                // '<label class="font-weight-600 mb-0" id = "var-title-'+(Number(i) + 1)+'" >'+data[i].variation+'</label>'+
                    '<div class="row">' +
                        '<div class="col-9">' +
                        '<input type="text" class="form-control font-weight-600 mb-0" id="var-title-'+(Number(i) + 1)+'" value='+data[i].variation+' data-id='+data[i].id+'>'+
                        '</div>' +                
                        '<div class="col-1 text-center px-0">' +
                            '<button class="btn btn-info" onclick="update_var('+(Number(i) + 1)+');"><i class="fas fa-save"></i></button>'+
                        '</div>' +
                        '<div class="col-2 text-right ">' +
                            '<button class="btn btn-danger" onclick="del_var('+data[i].id+');"><i class="fas fa-trash-alt"></i></button>' +
                        '</div>' +
                    '</div>' +
                '</div>'+
                '<div class="card-body py-1 pl-1">'+
                    '<div class="row" id="div_variation_type">'+
                        '<div class="col-10 col-md-10 col-lg-10">'+
                            '<div class="row">' + 
                                '<div class="col-8 pad-right">' + 
                                    '<input type="text" class="form-control textbox-green2" placeholder="'+data[i].variation+'" id="variation_type'+(Number(i) + 1)+'">'+
                                '</div>' +  
                                '<div class="col-4 pad-center" hidden>' + 
                                    '<input type="text" class="form-control textbox-green2 text-right variation_qty" placeholder="Qty" id="variation_qty'+(Number(i) + 1)+'">'+
                                '</div>' +
                                '<div class="col-4 pad-left">' + 
                                    '<input type="text" class="form-control textbox-green2 text-right variation_price" placeholder="Price" id="variation_price'+(Number(i) + 1)+'">'+
                                '</div>' +
                            '</div>' + 
                            '<div class="row" hidden>' +
                                '<div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-2">' +
                                    '<span class="btn btn-block btn-success btn-file btn-block" style="border-top: 0;border-radius: 0;">'+
                                        'Upload Image'+
                                        '<input type="file" id="var-upload-img-'+(Number(i) + 1)+'" class=" btn btn-success">'+
                                    '</span>'+
                                '</div>' +
                            '</div>' +
                        '</div>'+
                        '<div class="col-2 col-md-2 col-lg-2 pad-left">'+
                            '<button class="btn btn-success btn-block btn_add_variation_type_'+(Number(i) + 1)+'" id="btn_add_variation_type_'+ (Number(i) + 1) +'">Save</button>'+
                            '</div>'+
                    '</div>'+
                    '<div class="row pt-2">'+
                        '<div class="col-lg-12 col-md-12 col-sm-12" id="div-variation-type_'+(Number(i) + 1)+'">'+
                            '<table class="table table-sm table-bordered">'+
                                '<thead>' + 
                                    '<tr>' + 
                                        '<th>'+data[i].variation+'</th>' +
                                        '<th hidden>Quantity</th>' +
                                        '<th>Price</th>' +
                                        '<th hidden>Image</th>' +
                                        '<th colspan="2" style="width: 1%;">Action</th>' +
                                    '</tr>' +
                                '</thead>' +
                                '<tbody>' + 
                                '</tbody>' +  
                            '</table>'  +                      
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>');
      }

      $(".variation_qty").number(true, 0);
      $(".variation_price").number(true, 2);
      $("#variation_price2").attr("readonly", true);

      var type = 0;

      for (var i = 0; i < data.length; i++) {
        type += 1;
        for (var x = 0; x < var_type.length; x++) {
          if (data[i].id == var_type[x].variation_id){
            $("#div-variation-type_"+type+ " table tbody").append(
                  '<tr>' + 
                    '<td class="var_type">'+var_type[x].type+'</td>' +
                    '<td class="var_qty text-right" hidden>'+$.number(var_type[x].qty)+'</td>' + 
                    '<td class="var_price text-right">'+$.number(var_type[x].unit_price, 2)+'</td>' + 
                    '<td class="cursor-pointer text-center view-image" hidden><i class="far fa-image" data-img="'+var_type[x].img_location+'"></i></td>' + 
                    '<td class="cursor-pointer text-center edit-var-type" ><i class="far fa-edit" ></i></td>' + 
                    '<td class="text-red cursor-pointer text-center" onclick="del_var_type('+var_type[x].id+')"><i class="fas fa-trash-alt" ></i></td>' + 
                    '<td class="type" hidden>'+type+'</td>' +
                    '<td class="id" hidden>'+var_type[x].id+'</td>' +
                  '</tr>');
          }

        }
      }

      $("#div-card-variation").show("slow");      

        // $(document).on('click', '.view-image' , function() {
        //     var image = $(this).closest("tr").find(".fa-image").attr("data-img");

        //     if (image != ""){
        //         if (image != "false"){
        //             img_location = base_url + "images/products/" + image;                    
        //         }else{
        //             img_location = base_url + "assets/images/no-image.jpg";
        //         }
        //     }else{
        //         img_location = base_url + "assets/images/no-image.jpg";
        //     }

        //     $("#variation-img").css("background-image", "url('"+img_location+"')");
        //     $("#variation-img").css("background-size", "100% 100%");
        //     $("#variation-img").css("background-repeat", "no-repeat");
        //     $("#variation-img").css("background-position", "center center");
        //     $("#modal-variation-image").modal("show");
        //     $("#modal_variations").modal("hide");
        // })

        $(document).on("click", ".edit-var-type", function(){
            var color = $(this).closest("tr").find(".var_type").text();
            var qty = $(this).closest("tr").find(".var_qty").text();
            var price = $(this).closest("tr").find(".var_price").text();
            var type = $(this).closest("tr").find(".type").text();
            var id = $(this).closest("tr").find(".id").text();


            $("#variation_type" + type).attr("data-id",id);
            $("#variation_type" + type).val(color);
            $("#variation_qty" + type).val(qty);
            $("#variation_price" + type).val(price);

        });

    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function add_variation(){
  var prod_id = $("#prod_id").val();
  var variation = $("#variation").val();
  var csrf_name = $("input[name=csrf_name]").val();
  var var_length = $("#div-card-variation .card").length;
  var var_class = "";
  var id = "";

  if (var_length == "0"){
      var_class = "1";
  }else{
      var_class = "2";
  }

  if (variation == ""){
    $("#variation").addClass("error");
  }else{

    if (var_length < 2){

        $.ajax({
            data : {variation : variation, var_class : var_class, csrf_name : csrf_name, id : id, prod_id : prod_id},
            type : "POST",
            dataType : "JSON",
            url : base_url + "Outletko_profile/save_variation",
            success : function(result){
                $("input[name=csrf_name]").val(result.token);
                variations();
            }, error : function(err){
                console.log(err.responseText);
            }
        })

    }else{
      swal({
        type : "warning",
        title : "Up to 2 variation can be added per product"
      })
    }

  }

  $("#variation").val("");

}

function update_var(num){
    var variation = $("#var-title-"+num).val();
    var id = $("#var-title-"+num).attr("data-id");
    var prod_id = $("#prod_id").val();
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {variation : variation, csrf_name : csrf_name, id : id, prod_id : prod_id},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Outletko_profile/save_variation",
        success : function(result){
            console.log(result);
            $("input[name=csrf_name]").val(result.token);
            variations();
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function del_var(id){
    var csrf_name = $("input[name=csrf_name]").val();

    swal({
        type : "warning",
        title : "Delete?",
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
                url : base_url + "Outletko_profile/del_variation",
                success : function(result){
                    $("input[name=csrf_name]").val(result.token);
                    variations();
                }, error : function(err){
                    console.log(err.responseText);
                }
            })        
        }
    });


}

function add_variation_type(type){

$("#prod_price").hide();
$("#prod_stock").hide();

$("#prod_price2").show();
$("#prod_stock2").show();

var csrf_name = $("input[name=csrf_name]").val();
var variation = $("#var-title-" + type).attr("data-id");
var variation_type = $("#variation_type"+type).val();
var id = $("#variation_type"+type).attr("data-id");
var variation_qty = $("#variation_qty"+type).val();
var variation_price = $("#variation_price"+type).val();
var var_title = $("#var-title-"+type).text();
var upload_img = $("#var-upload-img-" + type);

console.log(id);

if (variation_type == ""){
    $("#variation_type"+type).addClass("error");
}else{
    //$("#div-variation-type_"+type).append('<button class="btn btn-outline-primary mr-2">'+variation_type+'</button>');

    $.ajax({
        data : {csrf_name, csrf_name, variation : variation, variation_type : variation_type, variation_qty : variation_qty, variation_price : variation_price, id : id},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Outletko_profile/save_variation_type",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            console.log(result);
            if (upload_img.get(0).files.length <= 0){
                variations();
            }else{
                save_variation_img(type, result.result);
            }
        }, error : function(err){
            console.log(err.responseText);
        }
    })
    
    // $("#div-variation-type_"+type + " table tbody").append(
    //     '<tr>' + 
    //     '<td class="var_type">'+variation_type+'</td>' +
    //     '<td class="var_qty">'+$.number(variation_qty)+'</td>' + 
    //     '<td class="var_price">'+$.number(variation_price, 2)+'</td>' + 
    //     '<td class="cursor-pointer text-center"><i class="far fa-edit"></i></td>' + 
    //     '<td class="text-red cursor-pointer text-center"><i class="fas fa-trash-alt"></i></td>' + 
    //     '</tr>');
}

var var_price = [];
var var_qty = [];

$("#div-variation-type_"+type + " table tbody tr").each(function(row, tr){
var_price.push(Number($(tr).find(".var_price").text().replace(/,/g, ''))  );
var_qty.push(Number($(tr).find(".var_qty").text().replace(/,/g, ''))  );
});

var min_price = Math.min(...var_price);
var max_price = Math.max(...var_price);
var min_qty = Math.min(...var_qty);
var max_qty = Math.max(...var_qty);


$("#prod_price2").val($.number(min_price,2) + " - " + $.number(max_price, 2));
$("#prod_stock2").val($.number(min_qty,2) + " - " + $.number(max_qty, 2));

$("#variation_type"+type).val("");
$("#variation_qty"+type).val("");
$("#variation_price"+type).val("");

}

function save_variation_img(type, id){


    var form_data = new FormData(); 
    var files = $('#var-upload-img-' + type)[0].files;
    for(var count = 0; count<files.length; count++) {
    var name = files[count].name;
    form_data.append("files[]", files[count]);
    form_data.append('id', id); 
    }        
        //return false   
    var csrf_name = $("input[name=csrf_name]").val();
    form_data.append('csrf_name', csrf_name);
  
    $.ajax({
        data : form_data 
        ,type : "POST"
        , url:  base_url + "Outletko_profile/upload_variation_image"
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
                    swal.close();
                    variations();
                    // swal({
                    //     title : "Successfully Save",
                    //     type : "success",
                    //     timer: 2000
                    // }, function(){
                    // });
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
 
function del_var_type(id){
    var csrf_name = $("input[name=csrf_name]").val();

    swal({
        type : "warning",
        title : "Delete?",
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
                url : base_url + "Outletko_profile/del_variation_type",
                success : function(result){
                    $("input[name=csrf_name]").val(result.token);
                    variations();
                }, error : function(err){
                    console.log(err.responseText);
                }
            })        
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
                        index()
                        clear_prod_model()
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

function save_store_img(){

  var form_data = new FormData(); 
      var files = $('#imgStore')[0].files;
      for(var count = 0; count<files.length; count++) {
      var name = files[count].name;
      form_data.append("files[]", files[count]);
      }        
       //return false   
      var csrf_name = $("input[name=csrf_name]").val();
      var store_id = $("#store_id").val();
      form_data.append('csrf_name', csrf_name);
      form_data.append('store_order', store_id);

      $.ajax({
          data : form_data 
          ,type : "POST"
          , url:  base_url + "Outletko_profile/upload_store_image"
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
                        index()
                        clear_prod_model()
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

function check_aboutus(){

    check_linkname();
    var business_name = $("#input_businessname").val();
    var link_name = $("#input_linkname").val();
    var aboutus = $("#input_aboutus").val();
    var business_category = $("#input_bussinesscategory").val();

    var bldg = $("#input_bldg").val();
    var subdivison = $("#input_subdivision").val();
    var barangay = $("#input_barangay").val();
    var city = $("#input_city").attr("data-id");
    var province = $("#input_province").attr("data-id");

    var email = $("#input_email").val();
    var mobile = $("#input_mobile").val();
    var telephone = $("#input_telephone").val();

    var website = $("#input_website").val();
    var facebook = $("#input_facebook").val();
    var twitter = $("#input_twitter").val();
    var instagram = $("#input_instagram").val();
    var shoppee = $("#input_shopee").val();
    var link_name_result = $("#span-linkname-error").attr("data-err");
    console.log(link_name_result);

    if(jQuery.trim(business_name).length <= 0 || jQuery.trim(link_name).length <= 0 || jQuery.trim(business_category).length <= 0 || jQuery.trim(bldg).length <= 0 
    || jQuery.trim(city).length <= 0 || jQuery.trim(province).length <= 0 || jQuery.trim(email).length <= 0 || jQuery.trim(mobile).length <= 0) {
        swal("Please fill up required fields.", "", "warning")
        return false;
    }else{
        if (link_name_result > 0){
            swal("Please check Link Name", "", "warning")
            return false;
        }else{
            save_aboutus();
        }
    }


}

function check_payment(){

  var error = 0;

  var payment_type = 0;
  var delivery_type = 0;
  var inp_return = jQuery.trim($("#inp_return").val()).length;
  var inp_warranty = jQuery.trim($("#inp_warranty").val()).length;
  var switchbox = "";

  if ($("#cust_del_date").is(":checked")){
    switchbox = 1;
  }else{
    switchbox = 0;
  }

  $('.payment_type').each(function () {
   if (this.checked) {
    payment_type++;
   }
  });

  $('.delivery_type').each(function () {
   if (this.checked) {
    delivery_type++;
   }
  });

//   console.log(delivery_type);
//   console.log(payment_type);
//   console.log(inp_return);
//   console.log(inp_warranty);

  if (payment_type == 0 || delivery_type == 0 || inp_return == 0 || inp_warranty == 0){
    swal({
      type : "warning",
      title : "Please input all required Fields"
    })
  }else{
    save_remittance();
    save_payment();
  }

}

function check_product_online(){
var id = $("#prod_id").val();
var csrf_name = $("input[name=csrf_name]").val();

$.ajax({
    data : {id : id, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Outletko_profile/check_product_online",
    success : function(result){
        $("input[name=csrf_name]").val(result.token);
        var products = result.ol_products;

        if (result.account_pro == 0){
            if (result.ol_products_rows >= 12){
                if (id != ""){
                    $("#prod_id").val(id);
                    for (var i = 0; i < products.length; i++) {
                        if (id == products[i].id){
                            $("#prod_online").removeAttr("disabled");
                        }
                    }    
                }else{
                    $("#prod_online").attr("disabled", true);
                    $("#prod_online").val("0");
                    $("#prod_id").val("");
                }
            }else{
                // $("#prod_online").attr("disabled", true);
                // $("#prod_online").val("0");
            }
        }else{
            if (result.ol_products_rows >= 100){
                if (id != ""){
                    $("#prod_id").val(id);
                    for (var i = 0; i < products.length; i++) {
                        if (id == products[i].id){
                            $("#prod_online").removeAttr("disabled");
                        }
                    }    
                }else{
                    $("#prod_online").attr("disabled", true);
                    $("#prod_online").val("0");
                    $("#prod_id").val("");
                }
            }
        }        

    }, error : function(err){
        console.log(err.responseText);
    }
});

}

function check_product(){

  var prod_name = $("#prod_name").val();
  var prod_desc = $("#prod_desc").val();
  var prod_online = $("#prod_online").val();
  var prod_unit = $("#prod_price").val();
  var prod_cat = $("#prod_category").val();
  var prod_condition = $("#prod_condition").val();
  var prod_stock = $("#prod_stock").val();
  var prod_weight = $("#prod_weight").val();
  var prod_del_opt = $("#prod_del_opt").val();
  var prod_return = $("#prod_return").val();
  var prod_warranty = $("#prod_warranty").val();
  var imgInp = $("#imgInp").val();
  product_category = 1;

  var error = 0;

  if (prod_name == "" || prod_desc == "" || prod_online == "" || prod_unit == ""  || prod_condition == ""){ //|| prod_category == ""
    error++;
  }

  if (prod_online == "1"){
    if (prod_del_opt == "" || prod_return == "" || prod_warranty == ""){
      error++;
    }
  }

  if (error > 0){
    swal({
      type : "error",
      title : "Please input all required fields"
    })
  }else{
    save_product();
  }

}

function save_aboutus(){

  var business_name = $("#input_businessname").val();
  var link_name = $("#input_linkname").val().toLowerCase();
  var aboutus = $("#input_aboutus").val();
  var business_category = $("#input_bussinesscategory").val();

  var bldg = $("#input_bldg").val();
  var subdivison = $("#input_subdivision").val();
  var barangay = $("#input_barangay").val();
  var city = $("#input_city").attr("data-id");
  var province = $("#input_province").attr("data-id");

  var email = $("#input_email").val();
  var mobile = $("#input_mobile").val();
  var telephone = $("#input_telephone").val();

  var website = $("#input_website").val();
  var facebook = $("#input_facebook").val();
  var twitter = $("#input_twitter").val();
  var instagram = $("#input_instagram").val();
  var shoppee = $("#input_shopee").val();
  var csrf_name = $("input[name=csrf_name]").val();

  var bgcolor = $("#color-val").val();

  var store_assoc = $("#input_store_assoc").val();

  var data = {
    business_name : business_name,
    link_name : link_name,
    aboutus : aboutus,
    business_category : business_category,
    bldg : bldg,
    subdivison : subdivison, 
    barangay : barangay,
    city : city, 
    province : province, 
    email : email,
    mobile : mobile,
    telephone : telephone,
    website : website,
    facebook : facebook,
    twitter : twitter,
    instagram : instagram, 
    shoppee : shoppee,
    bgcolor : bgcolor,
    store_assoc : store_assoc,
    csrf_name : csrf_name
  }

  $.ajax({
    data: data, 
    type: "POST", 
    url : base_url +  "Outletko_profile/update_aboutus",
    dataType : "JSON",
    beforeSend : function() {
        swal({
            title : "Saving.....",
            showCancelButton: false, 
            showConfirmButton: false           
        })                 
    },
    success : function(result){

      $("input[name=csrf_name]").val(result.token);

      swal({
        type : "success",
        title : "Successfully Updated!"
      }, function(){
        location.reload();
        // index();
        // home();
      })
    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function save_payment(){

  var csrf_name = $("input[name=csrf_name]").val();
  var payment_type = new Array();
  var delivery_type = new Array();
  var appointment = new Array();
  var inp_return = $("#inp_return").val();
  var inp_warranty = $("#inp_warranty").val();
  var remitt_acct_name = $("#remitt_acct_name").val();
  var remitt_contact_no = $("#remitt_contact_no").val();
  var cust_del_date = "";
  var shipping_fee = "";
  var sub = "";
  var i = 0;

  if ($("#cust_del_date").is(":checked")){
    cust_del_date = 1;
  }else{
    cust_del_date = 0;
  }

  if ($("#free_shipping").is(":checked")){
    shipping_fee = 1;
  }else{
    shipping_fee = 0;
  }


  $('.payment_type').each(function () {
    if (this.checked) {
      sub = {
        "payment_type_id" : $(this).val(),
        "payment_type_check" : "1"
      }
    }else{
      sub = {
        "payment_type_id" : $(this).val(),
        "payment_type_check" : "0"
      }
    }

    payment_type.push(sub);

  });

  i = 0;

  $('.delivery_type').each(function () {
    if (this.checked) {
      delivery_type[i] = {
        "delivery_type_id" : $(this).val(),
        "delivery_type_check" : "1"
      }
    }else{
      delivery_type[i] = {
        "delivery_type_id" : $(this).val(),
        "delivery_type_check" : "0"
      }
    }
    i++;
  });

  appointment = {
    "mon" : $("#btn-day-1").val(),
    "tue" : $("#btn-day-2").val(),
    "wed" : $("#btn-day-3").val(),
    "thu" : $("#btn-day-4").val(),
    "fri" : $("#btn-day-5").val(),
    "sat" : $("#btn-day-6").val(),
    "sun" : $("#btn-day-7").val(),
    "start_time" : $("#ftime").val(),
    "end_time" : $("#ttime").val(),
  }

  var cov_area = {
      "cov_mm" : ($("#cov_mm").is(":checked") == true ? 1 : 0),
      "cov_luz" : ($("#cov_luz").is(":checked") == true ? 1 : 0),
      "cov_vis" : ($("#cov_vis").is(":checked") == true ? 1 : 0),
      "cov_min" : ($("#cov_min").is(":checked") == true ? 1 : 0)
  }

  var std_del = $("#std_del").val();
  var ship_w_mm = $("#ship_w_mm").val();
  var ship_o_mm = $("#ship_o_mm").val();

//   console.log(cov_area);

  $.ajax({
    data : {csrf_name : csrf_name, payment_type : payment_type, delivery_type : delivery_type, std_del : std_del, ship_w_mm : ship_w_mm, ship_o_mm : ship_o_mm, appointment : appointment, inp_return : inp_return, inp_warranty : inp_warranty, cust_del_date : cust_del_date, shipping_fee : shipping_fee, remitt_contact_no : remitt_contact_no, remitt_acct_name : remitt_acct_name, cov_area : cov_area},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Outletko_profile/save_payment",
    beforeSend : function(){

    }, success : function(result){
        index();
      swal({
        type : "success",
        title : "Successfully Saved"
      })
    }, error : function(err){
      console.log(err.responseText);
    }  
  })

}

function save_product(){

  var prod_name = $("#prod_name").val();
  var prod_desc = $("#prod_desc").val();
  var prod_remarks = $("#prod_remarks").val();
  var prod_online = $("#prod_online").val();
  var prod_unit = $("#prod_price").val();
  var prod_cat = $("#prod_category").val();
  var prod_condition = $("#prod_condition").val();
  var prod_stock = $("#prod_stock").val();
  var prod_weight = $("#prod_weight").val();
  var prod_std_delivery = $("#prod_std_delivery").val();
  var prod_del = "";
  var prod_del_opt = $("#prod_del_opt").val();
  var prod_return = $("#prod_return").val();
  var prod_warranty = $("#prod_warranty").val();
  var prod_ship_fee_w_mm = $("#prod_ship_fee_w_mm").val();
  var prod_ship_fee_o_mm = $("#prod_ship_fee_o_mm").val();
  var imgInp = $("#imgInp").val();
  var check_img = $('#imgInp');
  var csrf_name = $("input[name=csrf_name]").val();
  var prod_id = $("#prod_id").val();
  var action = 1;

 
  var product = {
    product_name : prod_name,
    product_description : prod_desc,
    product_other_details : prod_remarks,
    product_online : prod_online,
    product_unit_price : prod_unit,
    product_category : prod_cat, 
    product_condition : prod_condition,
    product_stock : prod_stock,
    product_weight : prod_weight,
    product_std_delivery : prod_std_delivery,    
    // product_delivery : prod_del,
    product_del_opt : prod_del_opt,
    product_return : prod_return,
    product_warranty : prod_warranty,
    ship_fee_w_mm : prod_ship_fee_w_mm,
    ship_fee_o_mm : prod_ship_fee_o_mm
  } 

  var data = {product : product, action : action,prod_id : prod_id, csrf_name : csrf_name};
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
                            // get_product_info(prod_id);
                        });
                    }else{    
                        image_update($('#imgInp').prop('files')[0],result.id,unserialized_files);
                    }
                }
                
                
        }, error: function(err) {
            console.log("Error : " + err.responseText);
        }
  });    
}

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
              console.log(result);
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
                        $("#img_upload").modal("hide");
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

       console.log(files);
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
              console.log(result);
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
                        $("#img_upload").modal("hide");
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

function delete_product(){
  var id = $("#prod_id").val(); 
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {id : id, csrf_name : csrf_name},
    url : base_url + "Outletko_profile/delete_product",
    type : "POST",
    dataType : "JSON",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("body").removeClass("stop-scrolling");
    //   index();
        swal({
            type : "success",
            title : "Succesfully Deleted",
        }, function(){
            location.reload();
        })
    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function clear_prod_model(){
    $("#prod_id").val("");
    $("#prod_desc").val("");
    $("#prod_name").val("");
    $("#prod_remarks").val("");
    $("#prod_online").val("1");
    $("#prod_condition").val("1");
    $("#prod_ship_fee_w_mm").val(0);
    $("#prod_ship_fee_o_mm").val(0);
    $("#unserialized_files").val("");
    $("#imgInp").val("");
    // $("#img-upload").attr("src", base_url + "assets/images/add_pic.png");
    var image = base_url + "assets/images/add_pic.png";
    $('#modal-img-upload').css('background', 'url("' + image + '")');
    $('#modal-img-upload').css('background-size', "100% 100%");
    $('#modal-img-upload').css('background-repeat', "no-repeat");
    $('#modal-img-upload').css('background-position', "center center");
    $("#prod_price").val(0);
    $("#prod_price2").val(0);
    $("#prod_stock").val(0);
    $("#prod_weight").val(0);
    $("#prod_std_delivery").val($("#std_del").val());
    $("#prod_return").val($("#inp_return").val());
    $("#prod_warranty").val($("#inp_warranty").val());
    $("#delete_product").hide();
    $('input[type=file]').val(null);
    check_product_online();
}

function get_product_info(id){
    var csrf_name = $("input[name=csrf_name]").val();
    var min_price = "";
    var max_price = "";
    var prod_price = "";
    $("#delete_product").show();
    $.ajax({
        url : base_url + "Outletko_profile/get_product_info",
        type : "POST",
        dataType : "JSON",
        data : {'id' : id ,'csrf_name' : csrf_name},
        success : function(data){
            $("#img_upload").modal("show");
            $("input[name=csrf_name]").val(data.token);
            $("#prod_name").val(data.products[0].product_name);
            $("#prod_desc").val(data.products[0].product_description);
            $("#prod_online").val(data.products[0].product_online);
            $("#prod_price").val(data.products[0].product_unit_price);
            $("#prod_category").val(data.products[0].product_category);
            $("#prod_condition").val(data.products[0].product_condition);
            $("#prod_stock").val(data.products[0].product_stock);
            $("#prod_weight").val(data.products[0].product_weight);
            $("#prod_del_opt").val(data.products[0].product_del_opt);
            $("#prod_return").val(data.products[0].product_return);
            $("#prod_warranty").val(data.products[0].product_warranty);
            $("#prod_id").val(data.products[0].id);
            $("#unserialized_files").val(data.products[0].img_location[0]);
            var href_url = base_url +'images/products/'+data.products[0].img_location[0];
            // $("#img-upload").attr("src", href_url);
            $('#modal-img-upload').css('background', 'url("' + href_url + '")');
            $('#modal-img-upload').css('background-size', "contain");
            $('#modal-img-upload').css('background-repeat', "no-repeat");
            $('#modal-img-upload').css('background-position', "center center");

            if (data.products[0].product_std_delivery != null){
                $("#prod_std_delivery").val(data.products[0].product_std_delivery);
            }else{
                index();
            }

            min_price = data.products[0].min_price;
            max_price = data.products[0].max_price;

            if (min_price == null){
                prod_price = $.number(data.products[0].product_unit_price, 2);    
                $("#prod_price").show();
                $("#prod_price2").hide();
                $("#prod_price").val(prod_price);
                $("#prod_price2").val(prod_price);
            }else{
                if (min_price != ""){
                    prod_price = $.number(min_price, 2) + " - " + $.number(max_price, 2);
                }else{
                    prod_price = $.number(min_price, 2) + " - " + $.number(max_price, 2);
                }
                $("#prod_price").val(min_price);
                $("#prod_price2").val(prod_price);
                $("#prod_price2").show();
                $("#prod_price").hide();
                $("#prod_price2").attr("readonly", true);
            } 

            // if (data.products[0].product_delivery == "3"){
            //   $("#div-prod-ship-fee").show("slow");
            // }

            $("#prod_ship_fee_w_mm").val(data.products[0].ship_fee_w_mm);
            $("#prod_ship_fee_o_mm").val(data.products[0].ship_fee_o_mm);
            
            if (jQuery.trim(data.products[0].product_return).length != 0){
              $("#prod_return").val(data.products[0].product_return);
            }else{
              $("#prod_return").val($("#inp_return").val());
            }

            if (jQuery.trim(data.products[0].product_warranty).length != 0){
              $("#prod_warranty").val(data.products[0].product_warranty);
            }else{
              $("#prod_warranty").val($("#inp_warranty").val());
            }

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
                "thumb" : img
            }

            arr_data.push(data);
        }
        // console.log(arr_data);
        // var $fotoramaDiv = $('#div-fotorama').fotorama();
        // console.log($fotoramaDiv);
        // var fotorama = $fotoramaDiv.data('fotorama');
        // console.log(fotorama);
        // fotorama.load(arr_data);    



        check_product_online();

        }, error: function(err){
            console.log(err.responseText);
        }
    });
}

function get_process_order(){
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
      data : {csrf_name : csrf_name},
      type : "POST",
      dataType : "JSON",
      url : base_url + "Seller/get_process_order",
      success : function(result){
        $("input[name=csrf_name]").val(result.token);
        $("#div-tbl-process-order").html(result.result);
      }, error : function(err){
        console.log(err.responseText);
      }
    })

}

function get_close_order(){

    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
      data : {csrf_name : csrf_name},
      type : "POST",
      dataType : "JSON",
      url : base_url + "Seller/get_close_order",
      success : function(result){
        $("input[name=csrf_name]").val(result.token);
        $("#div-tbl-close-order").html(result.result);
      }, error : function(err){
        console.log(err.responseText);
      }
    })

}

function get_delivered_order(){

    var csrf_name = $("input[name=csrf_name]").val();
    var status = $("#delivered-status").val();
    var fdate = $("#delivered-fdate").val();
    var tdate = $("#delivered-tdate").val();

    $.ajax({
      data : {csrf_name : csrf_name, fdate : fdate, tdate : tdate, status : status},
      type : "POST",
      dataType : "JSON",
      url : base_url + "Seller/get_delivered_order",
      success : function(result){
        $("input[name=csrf_name]").val(result.token);
        $("#div-tbl-delivered-order").html(result.result);
      }, error : function(err){
        console.log(err.responseText);
      }
    })

}

function acknowledge_order(){

  var csrf_name = $("input[name=csrf_name]").val();
  var id = $("#acknowledge_order_id").val();
  var order_no = $("#order_no").val();

  $.ajax({
    data : {id : id, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Seller/acknowledge_order",
    async : true,
    beforeSend : function(){
        swal({
            type : "warning",
            title : "Sending....",
            showCancelButton: false, // There won't be any cancel button
            showConfirmButton: false 
        })
    },
    success : function(result){      
        $("input[name=csrf_name]").val(result.token);

        setTimeout(function(){             
            swal({
            type : "success",
            title : "Order " + order_no + "is acknowledged"
            }, function(){
                // location.reload();
                get_process_order();
                $("#div-setting").hide();
                $("#div-home").hide();
                $("#div_order").hide();
                $("#div-my-deliver").hide();

                $("#div_order_table").show("slow");
                $("#div-my-orders").show("slow");
                $("#modal_myorders").modal("hide");  
            })
        }, 500);      
    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function cancel_acknowledge_order(){

  var csrf_name = $("input[name=csrf_name]").val();
  var id = $("#acknowledge_order_id").val();
  var order_no = $("#order_no").val();

  $.ajax({
    data : {id : id, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Seller/cancel_acknowledge_order",
    async : true,
    beforeSend : function(){
        swal({
            type : "warning",
            title : "Sending....",
            showCancelButton: false, // There won't be any cancel button
            showConfirmButton: false 
        })
    },
    success : function(result){      
        $("input[name=csrf_name]").val(result.token);

        setTimeout(function(){ 
            swal({
                type : "success",
                title : "Order " + order_no + "is cancelled"
            }, function(){
                get_process_order();
                $("#div-setting").hide();
                $("#div-home").hide();
                $("#div_order").hide();
                $("#div-my-deliver").hide();

                $("#div_order_table").show("slow");
                $("#div-my-orders").show("slow");
                $("#modal_myorders").modal("hide");
            })
        }, 500);      
    }, error : function(err){
      console.log(err.responseText);
    }
  })


}

function delivery_order(){

  var csrf_name = $("input[name=csrf_name]").val();
  var id = $("#close_order_id").val();
  var courier = $("#delivery_courier").val();
  var track_no = $("#delivery_track").val();
  var order_no = $("#tbl_close_order_no").val();

  $.ajax({
    data : {id : id, csrf_name : csrf_name, courier : courier, track_no : track_no},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Seller/delivery_order",
    async : true,
    beforeSend : function(){
        swal({
            type : "warning",
            title : "Sending....",
            showCancelButton: false, // There won't be any cancel button
            showConfirmButton: false 
        })
    },
    success : function(result){
        $("input[name=csrf_name]").val(result.token);

        setTimeout(function(){ 
            swal({
                type : "success",
                title : "Order " + order_no + "is delivered"
            }, function(){
                get_close_order();
                $("#div-setting").hide();
                $("#div-home").hide();
                $("#div-my-orders").hide();
                $("#div_closed").hide();

                $("#div_closed_table").show("slow");
                $("#div-my-closed").show("slow");
                $("#modal_deliver").modal("hide");

            })
        }, 500);
    }, error : function(err){
      console.log(err.responseText);
    }
  })


} 

function save_prod_variation(){

  var csrf_name = $("input[name=csrf_name]").val();
  var prod_id = $("#prod_id").val();
  var var_name_1 = $("#var-title-1").text();
  var var_name_2 = $("#var-title-2").text();

  var var_type_1 = [];
  var var_type_2 = [];

  $("#div-variation-type_1 table tbody tr").each(function(row, tr){
    var sub = {
      "type" : $(tr).find(".var_type").text(),
      "qty" : $(tr).find(".var_qty").text().replace(/,/g, ''),
      "unit_price" : $(tr).find(".var_price").text().replace(/,/g, '')
    }

    var_type_1.push(sub);
  });

  $("#div-variation-type_2 table tbody tr").each(function(row, tr){
    var sub = {
      "type" : $(tr).find(".var_type").text(),
      "qty" : $(tr).find(".var_qty").text().replace(/,/g, ''),
      "unit_price" : $(tr).find(".var_price").text().replace(/,/g, '')
    }

    var_type_2.push(sub);
  });

  var data = {csrf_name : csrf_name, prod_id : prod_id, var_name_1 : var_name_1, var_name_2 : var_name_2, var_type_1 : var_type_1, var_type_2 : var_type_2};

  $.ajax({
    data : {csrf_name : csrf_name, prod_id : prod_id, var_name_1 : var_name_1, var_name_2 : var_name_2, var_type_1 : var_type_1, var_type_2 : var_type_2},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Outletko_profile/save_prod_variation",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      swal({
        type : "success",
        title : "Successfully Saved!"
      })
    }, error : function(err){
      console.log(err.responseText);
    }
  })


}

function save_setting(){

    var csrf_name = $("input[name=csrf_name]").val();
    var username = $("#uname").val();
    var curr_pass = $("#curr_pass").val();
    var new_pass = $("#new_pass").val();

    $.ajax({
        url : base_url + "Outletko_profile/save_setting",
        data : {csrf_name : csrf_name, username : username, curr_pass : curr_pass, new_pass : new_pass},
        type : "POST",
        dataType : "JSON",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            if (result.password > 0){
                swal({
                    type : "warning",
                    title : "Current Password is Incorrect"
                })
            }else{
                swal({
                    type : "success",
                    title : "Successfully Saved"
                }, function(){
                    location.reload();
                })
            }
        }, error : function(err){
            console.log(err);
            console.log(err.responseText);
        }
    })

}

function account_post(){

  var data = $("#account_post").val();
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {csrf_name : csrf_name, data : data},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Outletko_profile/account_post",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);

      swal({
        type : "success",
        title : "Successfully Posted"
      })

    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function save_category(){

  var category = $("#prod_cat").val();
  var id = $("#prod_cat_id").val();
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {category : category, id : id, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Outletko_profile/prod_category",
    beforeSend : function(){
      $("#save_category").attr("disabled",true);
      $("#prod_cat").attr("disabled", true);
      swal({
        type : "warning",
        title : "Saving....",
        showCancelButton : false,
        showConfirmButton : false
      })
    },
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      index();
      // swal.close();
      
      swal({
        type : "success",
        title : "Successfully Saved."
      }, function(){
        $("#prod_cat").attr("disabled", false);
        $("#save_category").attr("disabled", false);
        $("#prod_cat").val("");
        $("#prod_cat_id").val("");
      })

    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function edit_category(id, key){
  $("#prod_cat_id").val(id);
  $("#prod_cat").val($("#prod_cat_tbl tbody tr:eq("+key+")").find("td:eq(0)").text());

}

function delete_category(id){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name, id : id},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Outletko_profile/delete_prod_category",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      swal({
        type : "success",
        title : "Successfully Deleted"
      }, function(){
        $("#list-category").empty();
        $("#prod_category").empty();
        $("#prod_cat_tbl tbody tr").remove();
        index();
      })
    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function check_ship(){
  var ship_courier = $("#ship_courier").attr("data-id");
  var ship_mm = $("#ship_mm").val();
  var ship_luz = $("#ship_luz").val();
  var ship_vis = $("#ship_vis").val();
  var ship_min = $("#ship_min").val();

  if (ship_courier == "" || ship_mm == "" || ship_luz == "" || ship_vis == "" || ship_min == ""){
    swal({
      type : "warning",
      title : "Please input all required fields",
      text : "If there is no shipping fee value for other region, please input zero(0)."
    })
  }else{
    save_ship();
  }

}

function save_ship(){

  var csrf_name = $("input[name=csrf_name]").val();
  var ship_courier = $("#ship_courier").attr("data-id");
  var ship_kg = $("#ship_kg").val();
  var ship_mm = $("#ship_mm").val();
  var ship_luz = $("#ship_luz").val();
  var ship_vis = $("#ship_vis").val();
  var ship_min = $("#ship_min").val();
  var ship_id = $("#ship_id").val();

  $.ajax({
    data : {csrf_name : csrf_name, ship_courier : ship_courier, ship_kg : ship_kg, ship_mm : ship_mm, ship_luz : ship_luz, ship_vis : ship_vis, ship_min : ship_min, ship_id : ship_id},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Outletko_profile/save_ship_fee",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("#modal_ship").find(":input").val("");

      swal({
        type : "success",
        title : "Successfull Saved."
      }, function(){
        index();
      })

    }, error : function(err){
      console.log(err.responseText);
    }
  })


}

function edit_ship(id, key){

  $("#ship_id").val(id);

  var table = "#tbl-ship-fee tbody tr:eq("+key+")";

  $("#ship_courier").attr("data-id", $(table).find(".tbl-courier-id").text());
  $("#ship_courier").val($(table).find(".tbl-courier-name").text());
  $("#ship_kg").val($(table).find(".tbl-courier-kg").text());
  $("#ship_mm").val($(table).find(".tbl-sf-mm").text());
  $("#ship_luz").val($(table).find(".tbl-sf-luz").text());
  $("#ship_vis").val($(table).find(".tbl-sf-vis").text());
  $("#ship_min").val($(table).find(".tbl-sf-min").text());

  $("#modal_ship").modal("show");

}

function delete_ship(id){

  var csrf_name = $("input[name=csrf_name]").val();

  swal({
    type : "warning",
    title : "Delete?",
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
        url : base_url + "Outletko_profile/delete_ship",
        success : function(result){
          $("input[name=csrf_name]").val(result.token);

          swal({
            type : "success",
            title : "Successfully Deleted!"
          }, function(){
            index();
          })

        }, error : function(err){
          console.log(err.responseText);
        }
      })

    }
  })

}

function check_save_bank(){
  var bank_name = $("#bank_name").val();
  var account_name = $("#account_name").val();
  var account_no = $("#account_no").val();
  var status = $("#bank_status").val();

  if (bank_name == "" || account_name == "" || account_no == "" || status == ""){
    swal({
      type : "warning",
      title : "Please input all required fields"
    })

  }else{
    swal({
      type : "warning",
      title : "Save?",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes",
      cancelButtonText: "No",
    }, function(isConfirm){
      if (isConfirm){
        save_bank();
      }
    })
  }

}

function save_bank(){
  var csrf_name = $("input[name=csrf_name]").val();
  var bank_id = $("#bank_id").val();
  var bank_name = $("#bank_name").val();
  var account_name = $("#account_name").val();
  var account_no = $("#account_no").val();
  var status = $("#bank_status").val();

  $.ajax({
    data : {csrf_name : csrf_name, bank_id : bank_id, bank_name : bank_name, account_name : account_name, account_no : account_no, status : status},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Outletko_profile/save_bank",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("#bank_id").val("0");
      $("#bank_name").val("2");
      $("#account_name").val("");
      $("#account_no").val("");
      $("#bank_status").val("1");
      swal({
        type : "success",
        title : "Successfully Saved"
      })
      index();
      $("#btn_save_bank").text("Add");
    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function edit_bank(id, row){
  var bank_name = $("#tbl-bank tbody tr:eq("+row+")").find(".bank_id").text();
  var account_name = $("#tbl-bank tbody tr:eq("+row+")").find(".account_name").text();
  var account_no = $("#tbl-bank tbody tr:eq("+row+")").find(".account_no").text();
  var status = $("#tbl-bank tbody tr:eq("+row+")").find(".status_id").text();

  $("#btn_save_bank").text("Update");

  $("#bank_id").val(id);
  $("#bank_name").val(bank_name);
  $("#account_name").val(account_name);
  $("#account_no").val(account_no);
  $("#bank_status").val(status);
}

function delete_bank(id){
  var csrf_name = $("input[name=csrf_name]").val();

  swal({
    type : "warning",
    title : "Delete?",
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
        url : base_url + "Outletko_profile/delete_bank",
        success : function(result){
          $("input[name=csrf_name]").val(result.token);
          swal({
            type : "success",
            title : "Successfully Deleted"
          })
          index();
        }, error : function(err){
          console.log(err.responseText);
        }
      })
    }
  });

}

function check_remitt_save(){

  var count = 0;

  $.each($(".remitt_check:checked"), function(){
    count++;
  });


  if (count == 0){
    swal({
      type : "warning",
      title : "Please check atleast one remittance"
    })
  }else{
    swal({
      type : "warning",
      title : "Save?",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes",
      cancelButtonText: "No",
    }, function(isConfirm){
      if (isConfirm){
        save_remittance();
      }
    })

  }

}

function save_remittance(){

var array = [];
var csrf_name = $("input[name=csrf_name]").val();

$.each($(".remitt_check:checked"), function(){
  // var sub = {
  //   id : $(this).val(),
  //   status : "1"
  // }

  array.push($(this).val());
});

$.ajax({
  data : {csrf_name : csrf_name, array : array},
  type : "POST",
  dataType : "JSON",
  url : base_url + "Outletko_profile/save_remittance",
  success : function(result){
    $("input[name=csrf_name]").val(result.token);
    swal({
      type : "success",
      title : "Successfully Saved"
    })
  }, error : function(err){
    console.log(err.responseText);
  }
})

}

function get_image(){
    
var id = $("#prod_id").val();
var csrf_name = $("input[name=csrf_name]").val();
var check_img = $('#imgInp');
$("#impInp").val(null);
// console.log(check_img.get(0).files.length);
// $("#div-fotorama").empty();
// $('#div-fotorama').html("");
// $('#div-fotorama').empty();
// $('.fotorama--hidden').remove();

// if(check_img.get(0).files.length <= 0) {
        $("#modal-product-image").modal("show");

        $.ajax({
            url : base_url + "Outletko_profile/get_product_info",
            type : "POST",
            dataType : "JSON",
            data : {'id' : id ,'csrf_name' : csrf_name},
            success : function(data){
                $("input[name=csrf_name]").val(data.token);
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
                        "thumb" : img
                    }

                    arr_data.push(data);
                }
                console.log(arr_data);
                var $fotoramaDiv = $('#div-fotorama').fotorama();
                console.log($fotoramaDiv);
                var fotorama = $fotoramaDiv.data('fotorama');
                console.log(fotorama);
                fotorama.load(arr_data);    
            }, error: function(err){
                console.log(err.responseText);
            }
        });
    // }else{
    //     $("#modal-product-image-2").modal("show");
    //     $("#div-fotorama-2").removeAttr("class");
    //     $("#div-fotorama-2").empty();
    //     $('#div-fotorama-2').html("");
    //     $('#div-fotorama-2').empty();
    //     // $('.fotorama--hidden').remove();

    //     console.log($("#imgInp").get(0).files);
    //     files = $("#imgInp").get(0).files;
    //     var arr_data = new Array();
    //     var data = "";
    //     var img = "";
        // readProductURL($("#impInp"));

            // // Loop through the FileList and render image files as thumbnails.
            // for (var i = 0, f; f = files[i]; i++) {

            //     // Only process image files.
            //     if (!f.type.match('image.*')) {
            //         continue;
            //     }
        
            //     var reader = new FileReader();
        
            //     // reader.onload = function (e) {
            //     //     $('#img-upload').attr('src', e.target.result);    
            //     // }  
    
            //     // Closure to capture the file information.
            //     reader.onload = (function (theFile) {
            //         return function (e) {
            //             img = e.target.result;
            //         };
            //     })(f);

            //     console.log(f.name);
            //     data = {
            //         "img" : f.name,
            //         "thumb" : f.name
            //     }
            //     arr_data.push(data);

            //     // Read in the image file as a data URL.
            //     reader.readAsDataURL(f);

            // }    
        

            // var filesAmount = files.length;

            // for (i = 0; i < filesAmount; i++) {
            //     var reader = new FileReader();

            //     reader.onload = function(event) {
            //         $($.parseHTML('<img>')).attr('src', event.target.result).addClass("img-fotorama").appendTo("#div-fotorama-2");
                    // data = {
                    //     "img" : event.target.result,
                    //     "thumb" : event.target.result
                    // }
                    // return data;
                    // arr_data.concat(data);
                    // arr_data.push(data);
                    // arr_data.merge(data);
                    // arr_data += data;
                // }
                // console.log(data);
            //     reader.readAsDataURL(files[i]);
            // }
            // var img_length = $("#div-fotorama-2").children("img").length;
            // var img_data = $("#div-fotorama-2").find("img");
            // console.log(img_length);
            // console.log(img_data);
            
            // img_data.each(function(){
            //     img = $(this).attr("src");
            //     console.log(img);
                // data = {
                //     img : img,
                //     thumb : img
                // }
                // arr_data.push(data);
            // });

            // console.log(arr_data);

    
            // $('#div-fotorama-2').fotorama();
            // console.log(arr_data);
            // console.log(arr_data.length);
            // for (var i = 0; i < arr_data.length; i++) {
            //     console.log(arr_data[i].img);                
            // }
            // console.log("array data : ");
            // console.log(arr_data);
            // var data_arr = JSON.stringify(arr_data);
            // var $fotoramaDiv = $('#div-fotorama').fotorama();
            // console.log($fotoramaDiv);
            // var fotorama = $fotoramaDiv.data('fotorama');
            // console.log(fotorama);
            // fotorama.load(arr_data);    
            // console.log(fotorama.load(data_arr));
            // $('input[type=file]').val(null);

    // }

}








