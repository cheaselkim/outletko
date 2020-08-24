$(document).ready(function(){
    // $("#div-body").hide();
    // $("#website_modal").modal("show");
    // $("#modal-image").modal("show");

    setTimeout(() => {
        user_country();
    }, 2000);

    $("#div-buyer-regisration").hide();

    $("#wrong_pass").hide();
    $("#div-body").css("display", "block");
	$("#signup_next").hide();
	$("#signup_back").hide();
	$("#btn_signup").hide();
	$("#div-confirm-email2").hide();
	$("#div-confirm-email").hide();
	$("#btn_confirm").hide();
	$("#btn_confirm2").hide();
	$("#div-form").hide();
	$("#login-error").hide();

	$("#signup_next").hide();
	$("#signup_back").hide();
	$("#btn_signup").hide();
	$("#div-confirm-email2").hide();
	$("#div-confirm-email").hide();
	$("#btn_confirm").hide();
	$("#btn_confirm2").hide();
	$("#div-form").hide();
    $("#login-error").hide();
    
    $("#span-email").hide();

    $(document).on('show.bs.modal', '#modal_signup', function () {
    });

    $("#btn-buyer-register").click(function(){
        $("#div-buyer-regisration").show("slow");
    })

    $("#go").click(function(){
        var password = $("#website_password").val();

        if (password == "ZugriffP@ssw0rd"){
            $("#website_modal").modal("hide");
            $("#div-body").css("display", "block");
            $("#wrong_pass").hide();
        }else{
            $("#div-body").css("display", "none");
            $("#website_modal").modal("show");     
            $("#wrong_pass").show();       
        }
    });

    $('.navbar-nav > li > a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    });

    $('.navbar-nav > li > button').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    });


    $("#btn_mod_signin").click(function(){
        $("#modal_signup").modal("hide");
        $("#modal-image").modal("hide");
    });

    $("#btn_mod_signup").click(function(){
        $("#modal_signup_user").modal("hide");
        $("#modal-image").modal("hide");
    });

	// business_category();
	$("#ads-2").hide();	
	$("#error_message").hide();
    $("#div-business").hide();
    $("#div-address").hide();
    $("#signup_save").hide();
    $("#signup_close").hide();
    $("#div-save").hide();

	if ($("#login_error").val() == "1"){
		$("#modal_login").modal("show");
		$("#error_message").show();
	}

    // setTimeout(function(){ 
    //     business_category();
    //  }, 1500);

	// setInterval(
	// 	function(){ 

	// 		if ($("#ads-1").is(":visible") == true){
	// 			$("#ads-1").hide();
	// 			$("#ads-2").fadeIn();
	// 		}else{
	// 			$("#ads-1").fadeIn();
	// 			$("#ads-2").hide();				
	// 		}

    // 	}, 5000);
    

    $(".show_conf_pass").click(function(){
        if ($("#signup_user_conf_password").attr("type") == "password"){
            $("#conf_pass_icon").removeClass("fa fa-eye-slash");
            $("#conf_pass_icon").addClass("fa fa-eye");
            $("#signup_user_conf_password").attr("type", "text");
        }else{
            $("#conf_pass_icon").removeClass("fa fa-eye");
            $("#conf_pass_icon").addClass("fa fa-eye-slash");
            $("#signup_user_conf_password").attr("type", "password");
        }
    });

    $(".show_pass").click(function(){
        if ($("#signup_user_password").attr("type") == "password"){
            $("#pass_icon").removeClass("fa fa-eye-slash");
            $("#pass_icon").addClass("fa fa-eye");
            $("#signup_user_password").attr("type", "text");
        }else{
            $("#pass_icon").removeClass("fa fa-eye");
            $("#pass_icon").addClass("fa fa-eye-slash");
            $("#signup_user_password").attr("type", "password");
        }
    });   

    $("#signup_user_fname").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_user_lname").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_user_email").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_user_password").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_user_conf_password").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_user_country").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_first_name").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_last_name").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_username").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_password").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_conf_password").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_businessname").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_bussiness_category").change(function(){
        $(this).removeClass("error");
    })

    $("#signup_address").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_town").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_country").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_mobile").keyup(function(){
        $(this).removeClass("error");
    })

    $("#signup_email").keyup(function(){
        $(this).removeClass("error");
    })

    $('#signup_email').focusout(function() {
        var email = $(this).val();
        var ret = isEmail(email)
        console.log(ret)
    });
    
    // $("#signup_town").autocomplete({
    //     minLength: 0,
    //     source: "Outletko_profile/search_field/",
    //     focus: function( event, ui ) {
    //         return false;
    //     },
    //     select: function( event, ui ) {
    //         $(this).val(ui.item.city_desc+","+ui.item.province_desc);
    //         $(this).attr("data-city_id",ui.item.city_id);
    //         $(this).attr("data-province_id",ui.item.province_id);
    //         return false; 
    //     }
    // })
    // .autocomplete( "instance" )._renderItem = function( ul, item ) {
    //     return $( "<li>" )
    //     .append( "<div>" + item.city_desc+","+item.province_desc + "</div>" )
    //     .appendTo( ul );
    // }; 
    
    $("#signup_next").click(function(){

        $("#signup_back").show();

        var fname = $("#signup_first_name").val()
        var mname = $("#signup_middle_name").val()
        var lname = $("#signup_last_name").val()
        var uname = $("#signup_username").val()
        var password = $("#signup_password").val()
        var conf_password = $("#signup_conf_password").val()
        var address = $("#signup_address").val()
        var town = $("#signup_town").val()
        var country = $("#signup_country").val()
        var mobile = $("#signup_mobile").val()
        var email = $("#signup_email").val()
        var business_type = $("#signup_bussiness_category").val()
        var business_name = $("#signup_businessname").val()

        if ($("#div-name").is(":visible")){

            if(jQuery.trim(fname).length <= 0 || jQuery.trim(lname).length <= 0 || 
                jQuery.trim(uname).length <= 0 || jQuery.trim(password).length <= 0
                || jQuery.trim(conf_password).length <= 0 ){
                
                swal({
                    type : "warning",
                    title : "Please fill up required fields."
                })

                if (jQuery.trim(fname).length <= 0){
                    $("#signup_first_name").addClass("error");
                }

                if (jQuery.trim(lname).length <= 0){
                    $("#signup_last_name").addClass("error");
                }

                if (jQuery.trim(uname).length <= 0){
                    $("#signup_username").addClass("error");
                }

                if (jQuery.trim(password).length <= 0){
                    $("#signup_password").addClass("error");
                }
                
                if (jQuery.trim(conf_password).length <= 0){
                    $("#signup_conf_password").addClass("error");
                }

            }else if (conf_password != password){

                swal({
                    type : "warning",
                    title : "Password does not match"
                })

                $("#signup_conf_password").addClass("error");
                $("#signup_password").addClass("error");

            }else{
                $("#next-1").removeClass("fas fa-circle");
                $("#next-1").addClass("fas fa-check-circle");
                $("#next-2").addClass("text-black");

                $("#div-name").hide();
                $("#div-business").show("slide", { direction: "left" }, 1500);
                $("#div-business").show();                
            }

        }else if ($("#div-business").is(":visible")){

            if( jQuery.trim(business_type).length <= 0 || jQuery.trim(business_name).length <= 0){
                
                swal({
                    type : "warning",
                    title : "Please fill up required fields."
                })

                
                if (jQuery.trim(business_type).length <= 0){
                    $("#signup_bussiness_category").addClass("error");
                }
                
                if (jQuery.trim(business_name).length <= 0){
                    $("#signup_businessname").addClass("error");
                }
            }else{
                $("#next-2").removeClass("fas fa-circle");
                $("#next-2").addClass("fas fa-check-circle");
                $("#next-3").addClass("text-black");

                $("#div-business").hide();
                $("#div-address").show("slide", { direction: "left" }, 1500);
                $("#div-address ").show();

                $("#signup_next").hide();
                $("#signup_save").show();                            
            }

        }

    });

    $("#signup_back").click(function(){

        if ($("#div-business").is(":visible")){

            $("#next-1").removeClass("fas fa-check-circle");
            $("#next-1").addClass("fas fa-circle");
            $("#next-2").removeClass("text-black");

            $("#div-business").hide();
            $("#div-name").show("slide", { direction: "right" }, 1500);
            $("#div-name").show();

        }else if ($("#div-address").is(":visible")){

            $("#next-2").removeClass("fas fa-check-circle");
            $("#next-2").addClass("fas fa-circle");
            $("#next-3").removeClass("text-black");

            $("#div-address").hide();
            $("#div-business").show("slide", { direction: "right" }, 1500);
            $("#div-business").show();

            $("#signup_next").show();
            $("#signup_save").hide();            

        }

    });


    $("#signup_town").keyup(function(){
        if ($(this).val() == ""){
            $("#outlet_province").val("");
        }
    });

    $("#signup_town").autocomplete({
        select: function(event, ui){
            $("#signup_town").attr("data-id", ui.item.city_id);
            $("#signup_town").attr("data-prov", ui.item.prov_id);
        },
        source: function(req, add){
          var csrf_name = $("input[name=csrf_name]").val();
            var city = $("#signup_town").val();
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
                        $("#signup_town").val("");
                        $("#signup_town").attr("data-id", "");
                        $("#signup_town").attr("data-prov", "");
                        add('');
                    }
                }, error: function(err){
                    console.log("Error: " + err.responseText);
                }
            });
        }
    });    

    $("#signup_close").click(function(){
        window.open(base_url, "_self");
    });

    $('#signup_save').click(function() {
        $(this).prop("disabled", true);
        check_required_fields();
    });
    
    $("#resend").click(function(){
        resend_email();
    });

	$("#a_login").click(function(){
		$("#div-signup-form").hide();
		$("#btn_signup").hide();

		$("#div-login-form").show();
		$("#btn_login").show();
	})

	$("#a_register").click(function(){
		$("#div-login-form").hide();
		$("#btn_login").hide();

		$("#div-signup-form").show();
		$("#btn_signup").show();
	})

	$("#a_register_store").click(function(){
		$("#div-signup-form").hide();
		$("#btn_signup2").hide();
		
		$("#div-business").hide();
		$("#div-address ").hide();

		$("#next-1").addClass("fas fa-circle");
		$("#next-2").addClass("fas fa-circle");
		$("#next-1").removeClass("fas fa-check-circle");
		$("#next-2").removeClass("fas fa-check-circle");
		$("#next-2").removeClass("text-black");
		$("#next-3").removeClass("text-black");
		$("#div-form").find(":input").val("");

		$("#div-name").show();
		$("#div-form").show();
		$("#signup_next").show();
		// $("#signup_back").show();
		// $("#signup_save").show();
	});

	$("#a_signup").click(function(){
		$("#div-form").hide();
		$("#signup_next").hide();
		$("#signup_back").hide();
		$("#signup_save").hide();

		$("#div-signup-form").find(":input").val("");
		$("#div-signup-form").show();
		$("#btn_signup2").show();		
	});

	$("#btn_signup").click(function(){
		check_signup_field();
	});

	$("#btn_signup2").click(function(){
		check_signup_field();
	});


	$("#btn_confirm").click(function(){
		confirm_account();
	});

	$("#btn_confirm2").click(function(){
		confirm_account();
	});


	$("#btn_login").click(function(){
		check_login_field();
	});

	$("#login_email").on('keypress',function(e) {
	    if(e.which == 13) {
			check_login_field();
	    }
	});

	$("#login_password").on('keypress',function(e) {
	    if(e.which == 13) {
			check_login_field();
	    }
	});

	$('#verify_code').bind("cut copy paste",function(e) {
		e.preventDefault();
    });    

    $("#signup_user_email").blur(function(){
        var email = $(this).val();
        var csrf_name = $("input[name='csrf_name']").val();
        $("#signup_user_email").attr("data-exists", "0");
        console.log(isEmail(email));
        if (isEmail(email)){
            $.ajax({
                data : {email : email, csrf_name : csrf_name},
                type : "POST",
                dataType : "JSON",
                url : base_url + "Store_register/check_email",
                success : function(result){
                    console.log(result);
                    $("input[name='csrf_name']").val(result.token);
                    if (result.result > 0){
                        $("#signup_user_email").attr("data-exists", "1");
                        $("#span-email").show();
                        // $("#signup_user_email").append('<br><span class="text-red">Email already exists</span>');
                    }else{
                        $("#span-email").hide();
                    }

                }, error : function(err){
                    console.log(err.responseText);
                }
            })
        }else{
            $(this).addClass("error");
        }
    });


    
});

function isEmail(email) {
    var regex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return regex.test(email);
}

function business_category(){
    var href_url = "";
    var csrf_name = $("input[name=csrf_name]").val();

	if (document.location.href == base_url){
		href_url = "Signup/business_category";
	}else{
		href_url = base_url +  "Signup/business_category";
	}

    $.ajax({
        data : {csrf_name : csrf_name},
        type : "GET",
        url : href_url,
        dataType : "JSON",
        success : function(data){
        
        for (var i = 0; i < data.result.length; i++) {
            $("#signup_bussiness_category").append("<option value='"+data.result[i].id+"'>"+data.result[i].desc+"</option>");
        }
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function user_country(){
    
    var href_url = "";
    var csrf_name = $("input[name=csrf_name]").val();

	if (document.location.href == base_url){
		href_url = "Signup/country";
	}else{
		href_url = base_url +  "Signup/country";
	}

    $.ajax({
        data : {csrf_name : csrf_name},
        type : "GET",
        url : href_url,
        dataType : "JSON",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            console.log(data);
            for (var i = 0; i < data.result.length; i++) {
                $("#signup_user_country").append("<option value='"+data.result[i].id+"'>"+data.result[i].country+"</option>");
            }

            $("#signup_user_country").val(data.country);
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function check_login_field(){
	var username = jQuery.trim($("#login_email").val()).length;
	var password = jQuery.trim($("#login_password").val()).length;

	if (username <= 0 || password <= 0){
		swal({
			type : "warning",
			title : "Please input all required fields"
		})
	}else{
		check_login();
	}
}

function check_login(){

	var csrf_name = $("input[name=csrf_name]").val();
	var username = $("#login_email").val();
	var password = $("#login_password").val();

	var href_url = "";
	var link_url = document.location.href;
	// console.log("base_url  " + document.location.href);

	if (document.location.href == base_url){
		href_url = "Signup/check_login";
	}else{
		href_url = base_url +  "Signup/check_login";
	}

	// console.log("href_url " + href_url);

	$.ajax({
		data : { csrf_name : csrf_name, username : username, password : password },
		type : "POST",
		dataType : "JSON",
		url : href_url,
		success : function(result){	
			$("input[name=csrf_name]").val(result.token);
            // console.log(document.location.href);
            // console.log(base_url + "login");
            // console.log(result.user_type);
			if (result.login == "1"){
                if (result.otp == "1"){
                    window.open(base_url, "_self");
                }else{
                    if (result.user_type == "5"){
                        if (base_url == document.location.href){
                            // console.log(base_url);
                            window.open(base_url + "my-order", "_self");
                        }else if (document.location.href == base_url + "login"){
                            // console.log(base_url + "my-order");
                            window.open(base_url + "my-order", "_self");
                        }else{
                            // console.log("location");
                            if (result.session_prod_id == 1){
                                window.open(base_url + "my-order", "_self");
                            }else{
                                location.reload();
                            }
                        }
                    }else{
                        window.open(base_url, "_self");
                    }				    
                }
			}else{
				$("#login-error").show();
			}


			// window.open(base_url + "my-order", "_self");
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

/* LOGIN */

/* SIGNUP */

function check_signup_field(){

	var fname = jQuery.trim($("#signup_user_fname").val()).length;
	var lname = jQuery.trim($("#signup_user_lname").val()).length;
	var email = jQuery.trim($("#signup_user_email").val()).length;
	var password = jQuery.trim($("#signup_user_password").val()).length;
    var conf_pass = jQuery.trim($("#signup_user_conf_password").val()).length;
    var country = jQuery.trim($("#signup_user_country").val()).length;

    var error = 0;

    var $msg = "";

	if (fname <= 0 || lname <= 0 || email <= 0 || password <= 0 || conf_pass <= 0 || country <= 0){
        error++;
        $msg += "Please input all required fields.<br>";

        if (fname <= 0){
            $("#signup_user_fname").addClass("error");            
        }

        if (lname <= 0){
            $("#signup_user_lname").addClass("error");            
        }

        if (email <= 0){
            $("#signup_user_email").addClass("error");            
        }

        if (password <= 0){
            $("#signup_user_password").addClass("error");            
        }

        if (conf_pass <= 0){
            $("#signup_user_conf_password").addClass("error");            
        }

        if (country <= 0){
            $("#signup_user_country").addClass("error");            
        }
    }
    
    if ($("#signup_user_password").val() != $("#signup_user_conf_password").val() ){
        error++;
        $msg += "Password does not match<br>";
        $("#signup_user_password").addClass("error");
        $("#signup_user_conf_password").addClass("error");
    }
    
    if ($("#signup_user_email").attr("data-exists") == "1"){        
        error++;
        $msg += "Email already Exists<br>";
        $("#signup_user_email").addClass("error");
    }

    if (isEmail($("#signup_user_email").val()) != true){
        $("#signup_user_email").addClass("error");
        error++;
        $msg += "Invalid Email";
    }
    
    if (error > 0){
		swal({
            html : true,
			type : "warning",
            title : "Please see all fields",
            text : $msg
        })

    }else{
        console.log("insert user");
		insert_user();
	}

}

function insert_user(){

	// console.log("insert_user");
	
	var csrf_name = $("input[name=csrf_name]").val();

	var fname = $("#signup_user_fname").val();
	var lname = $("#signup_user_lname").val();
	var email = $("#signup_user_email").val();
	var password = $("#signup_user_password").val();
    var conf_pass = $("#signup_user_conf_password").val();
    var country = $("#signup_user_country").val();

	$.ajax({
		data : {csrf_name : csrf_name, fname : fname, lname : lname, email : email, password : password, conf_pass : conf_pass, country : country},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Signup/insert_user",
		beforeSend : function(){

			swal({
				title : "Saving....",
                  showCancelButton: false, 
                  showConfirmButton: false  
			})

		},success : function(result){
			// swal.close();
			$("input[name=csrf_name]").val(result.token);
			// $("#acc_id").val(result.comp_id);
			// $("#div-signup-form").hide();
			// $("#btn_signup2").hide();
			// $("#div-confirm-email2").show();
			// $("#btn_confirm2").show();

			swal({
                type : "success",
				title : "Successfully Saved"
			}, function(){
                // location.reload();
                window.open(base_url + "my-order", "_self");
            })


        }, error : function(err){
			console.log(err.responseText);
		}
	})

}

function confirm_account(){

	var verify_code = $("#verify_code").val();
	var acc_id = $("#acc_id").val();
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {verify_code : verify_code, csrf_name : csrf_name, id : acc_id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Signup/confirm_account",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);

			if (result.result == 1){
				$("#div-signup-form").hide();
				$("#btn_signup").hide();
				$("#div-confirm-email").hide();
				$("#btn_confirm2").hide();
				$("#div-login-form").show();
				$("#btn_login").show();

				$("#modal_signup_user").modal("hide");

				swal({
					type : "success",
					title : "Congratulations!",
					text : "You can start buying products"
				}, function(){
					location.reload();
				})
			}else{

				swal({
					type : "warning",
					title : "Invalid Verification Code",
					text : "Please try again"
				})

			}


		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function check_required_fields(){
    var fname = $("#signup_first_name").val()
    var mname = $("#signup_middle_name").val()
    var lname = $("#signup_last_name").val()
    var uname = $("#signup_username").val()
    var password = $("#signup_password").val()
    var conf_password = $("#signup_conf_password").val()
    var address = $("#signup_address").val()
    var town = $("#signup_town").val()
    var country = $("#signup_country").val()
    var mobile = $("#signup_mobile").val()
    var email = $("#signup_email").val()
    var business_type = $("#signup_bussiness_category").val()
    var business_name = $("#signup_businessname").val()

    
    var error = 0;    
    if(jQuery.trim(fname).length <= 0 || jQuery.trim(lname).length <= 0 || 
        jQuery.trim(uname).length <= 0 || jQuery.trim(password).length <= 0
        || jQuery.trim(conf_password).length <= 0 || jQuery.trim(address).length <= 0
        || jQuery.trim(town).length <= 0 || jQuery.trim(country).length <= 0
        || jQuery.trim(mobile).length <= 0 || jQuery.trim(email).length <= 0
        || jQuery.trim(business_type).length <= 0 || jQuery.trim(business_name).length <= 0){
        
        swal({
            type : "warning",
            title : "Please fill up required fields."
        })

        if (jQuery.trim(fname).length <= 0){
            $("#signup_first_name").addClass("error");
        }

        if (jQuery.trim(lname).length <= 0){
            $("#signup_last_name").addClass("error");
        }

        if (jQuery.trim(uname).length <= 0){
            $("#signup_username").addClass("error");
        }

        if (jQuery.trim(password).length <= 0){
            $("#signup_password").addClass("error");
        }
        
        if (jQuery.trim(conf_password).length <= 0){
            $("#signup_conf_password").addClass("error");
        }
        
        if (jQuery.trim(address).length <= 0){
            $("#signup_address").addClass("error");
        }
        
        if (jQuery.trim(town).length <= 0){
            $("#signup_town").addClass("error");
        }
        
        if (jQuery.trim(country).length <= 0){
            $("#signup_country").addClass("error");
        }
        
        if (jQuery.trim(mobile).length <= 0){
            $("#signup_mobile").addClass("error");
        }
        
        if (jQuery.trim(email).length <= 0){
            $("#signup_email").addClass("error");
        }
        
        if (jQuery.trim(business_type).length <= 0){
            $("#signup_bussiness_category").addClass("error");
        }
        
        if (jQuery.trim(business_name).length <= 0){
            $("#signup_businessname").addClass("error");
        }
        error++;
    }
    
    if (password != conf_password){
        error++
        swal({
            type : "warning",
            title : "Password does not match!"
        })   
    }
    
    var regex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    regex.test(email);
    if (!regex.test(email)) {
        error++

        swal({
            type : "warning",
            title : 'Invalid Email Address'
        })
    }

    
    if(error > 0){
        $("#signup_save").prop("disabled", false);
        return false;
    }else{
        save_signup();

    }
}

function save_signup(){
    var fname = $("#signup_first_name").val()
    var mname = $("#signup_middle_name").val()
    var lname = $("#signup_last_name").val()
    var uname = $("#signup_username").val()
    var password = $("#signup_password").val()
    var conf_password = $("#signup_conf_password").val()
    var address = $("#signup_address").val()
    var town = $("#signup_town").val()
    var country = $("#signup_country").val()
    var mobile = $("#signup_mobile").val()
    var email = $("#signup_email").val()
    var business_type = $("#signup_bussiness_category").val()
    var business_name = $("#signup_businessname").val()

    var city_id = $("#signup_town").attr("data-id");
    var prov_id = $("#signup_town").attr("data-prov");

    var link_name = business_name;
    link_name = $.trim(link_name.toString().toLowerCase());
    link_name = link_name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');

    
    var info_outletko = {
            account_id : "",
            account_name : business_name,
            link_name : link_name,
            account_status : 0,
            confirm_email : 0,
            business_category : business_type,
            username : uname,
            password : password,
            first_name : fname,
            middle_name : mname,
            last_name : lname,
            address : address,
            city : city_id,
            user_id : "0",
            province : prov_id,
            email : email,
            mobile_no  : mobile
    }
    
    var info_outletsuite = {
            
            account_id : "",
            status : 0,
            first_name : fname,
            middle_name : mname,
            last_name : lname,
            username : uname,
            password : password,
            email : email,
            
    } 
    
    var csrf_name = $("input[name=csrf_name]").val();
    var data = {info_outletsuite:info_outletsuite, info_outletko: info_outletko, csrf_name : csrf_name};
    // console.log(info_outletko);
    //return false;
    $.ajax({
            data : data
            , type: "POST"
            , url: "Signup/save_data"
            , dataType: 'json'
            , crossOrigin: false     
            , beforeSend : function(){
            //   swal({
            //       title : "Saving.....",
            //       showCancelButton: false, 
            //       showConfirmButton: false           
            //   })    
            
            }
            , success: function(result) {
                // console.log(result)
                $("input[name=csrf_name]").val(result.token);
                $("#signup_id").val(result.id);

                $("#signup_back").hide();
                $("#signup_next").hide();
                $("#signup_cancel").hide();
                $("#signup_save").hide();            
                $("#div-form").hide();
                $("#div-save").show();
                $("#signup_close").show();            

                // swal({
                //     type : "success",
                //     timer : 2000,
                //     title : "Successfully Save"
                // }, function(){
                //     location.reload();
                // });
                //location.reload();
            }, error: function(err) {
                console.log(err.responseText);
            }
    });  
}

function resend_email(){

    console.log("Resend Email");

    var signup_email = $("#signup_email").val();
    var signup_password = $("#signup_password").val();
    var signup_username = $("#signup_username").val();
    var signup_id = $("#signup_id").val();
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {email : signup_email, password : signup_password, username : signup_username, account_id : signup_id, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        crossOrigin: false,     
        url : "Signup/resend_email",
        success : function(result){
            console.log(result);
            $("input[name=csrf_name]").val(result.token);
            swal({
                type : "success",
                title : "Successfully Re-send Email."
            }, function(){
                location.reload();
            })
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}