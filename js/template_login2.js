$(document).ready(function(){
    // $("#div-body").hide();
    // $("#website_modal").modal("show");
    $("#wrong_pass").hide();
    $("#div-body").css("display", "block");

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

    $("#btn_mod_signin").click(function(){
        $("#modal_signup").modal("hide");
    });

    $("#btn_mod_signup").click(function(){
        $("#modal_signup_user").modal("hide");
    });

	business_category();
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

	setInterval(
		function(){ 

			if ($("#ads-1").is(":visible") == true){
				$("#ads-1").hide();
				$("#ads-2").fadeIn();
			}else{
				$("#ads-1").fadeIn();
				$("#ads-2").hide();				
			}

		}, 5000);
		
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
                url: base_url + "Signup/search_city_prov/", 
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
        window.open("http://www.eoutletsuite.com/", "_self");
    });

    $('#signup_save').click(function() {
        $(this).prop("disabled", true);
        check_required_fields();
    });
    
    $("#resend").click(function(){
        resend_email();
    });


});

function isEmail(email) {
    var regex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return regex.test(email);
}

function business_category(){

$.ajax({
	type : "GET",
	url : base_url +  "Signup/business_category",
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
    
    var info_outletko = {
            account_id : "",
            account_name : business_name,
            account_status : 0,
            confirm_email : 0,
            business_category : business_type,
            username : uname,
            password : password,
            first_name : fname,
            middle_name : mname,
            last_name : lname,
            address : address,
            city : town,
            user_id : "0",
            province : "",
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
            , url: base_url +  "Signup/save_data"
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
        url : base_url + "Signup/resend_email",
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