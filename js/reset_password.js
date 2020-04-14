$(document).ready(function(){

    $("#div-buyer").hide();
    $("#div-success").hide();
    $("#div-seller").hide();
    $("#div-alert").hide();

    $("#btn-buyer").click(function(){
        $("#div-alert").hide();
        $("#div-success").hide();
        $("#div-btn").hide();
        $("#div-buyer").show("slow");
        $(document).find("input[type=text]").val("");
    });

    $("#btn-seller").click(function(){
        $("#div-alert").hide();
        $("#div-success").hide();
        $("#div-btn").hide();
        $("#div-seller").show("slow");
        $(document).find("input[type=text]").val("");
    });

    $("#btn-buyer-cancel").click(function(){
        $("#div-alert").hide();
        $("#div-buyer").hide();
        $("#div-btn").show("slow");
    });

    $("#btn-seller-cancel").click(function(){
        $("#div-alert").hide();
        $("#div-seller").hide();
        $("#div-btn").show("slow");
    });

    $("#btn-buyer-reset").click(function(){
        check_buyer();
    });

    $("#btn-seller-reset").click(function(){
        check_seller();
    })

	$("#buyer-email").on('keypress',function(e) {
	    if(e.which == 13) {
			check_buyer();
	    }
	});

	$("#seller-email").on('keypress',function(e) {
	    if(e.which == 13) {
			check_seller();
	    }
	});

	$("#seller-username").on('keypress',function(e) {
	    if(e.which == 13) {
			check_seller();
	    }
	});

});

function isEmail(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

function check_buyer(){

    var buyer_email = $("#buyer-email").val();

    if (jQuery.trim(buyer_email).length == 0){
        $("#div-alert").show();
        $("#alert-message").text("Please input Email");
    }else if (!isEmail(buyer_email)){
        $("#div-alert").show();
        $("#alert-message").text("Invalid Email");
    }else{
        reset_buyer(buyer_email);
    }

}

function check_seller(){

    var seller_email = $("#seller-email").val();
    var seller_username = $("#seller-username").val();

    if (jQuery.trim(seller_email).length == 0 || jQuery.trim(seller_username).length == 0){
        $("#div-alert").show();
        $("#alert-message").text("Please input Email and Username");
    }else if (!isEmail(seller_email)){
        $("#div-alert").show();
        $("#alert-message").text("Invalid Email");
    }else{
        reset_seller(seller_email, seller_username);
    }

}

function reset_buyer(email){

    var csrf_name = $("input[name=csrf_name]").val();
    
    $.ajax({
        data : {csrf_name : csrf_name, email : email},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Reset_password/reset_buyer",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            $("#div-alert").hide();
            $("#div-success").hide();

            if (result.result == "1"){
                $("#div-success").show();
                $("#success-message").text("We have e-mailed your password link!");
       
            }else{
                $("#div-alert").show();
                $("#alert-message").text("Email not found");            
            }

        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function reset_seller(email, username){

    var csrf_name = $("input[name=csrf_name]").val();
    
    $.ajax({
        data : {csrf_name : csrf_name, email : email, username : username},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Reset_password/reset_seller",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            $("#div-alert").hide();
            $("#div-success").hide();

            if (result.result == "1"){
                $("#div-success").show();
                $("#success-message").text("We have e-mailed your password link!");
       
            }else{
                $("#div-alert").show();
                $("#alert-message").text("Email / Username not found");            
            }

        }, error : function(err){
            console.log(err.responseText);
        }
    })

}