$(document).ready(function(){

    $(".show_cur_pass").on('click',function() {
        var $pwd = $(".cur_pass");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
            $("#cur_pass_icon").removeClass("fa fa-eye-slash");
            $("#cur_pass_icon").addClass("fa fa-eye");
        } else {
            $pwd.attr('type', 'password');
            $("#cur_pass_icon").addClass("fa fa-eye-slash");
            $("#cur_pass_icon").removeClass("fa fa-eye");
        }
    });

    $(".show_new_pass").on('click',function() {
        var $pwd = $(".new_pass");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
            $("#new_pass_icon").removeClass("fa fa-eye-slash");
            $("#new_pass_icon").addClass("fa fa-eye");
        } else {
            $pwd.attr('type', 'password');
            $("#new_pass_icon").addClass("fa fa-eye-slash");
            $("#new_pass_icon").removeClass("fa fa-eye");
        }
    });

    $(".show_confirm_pass").on('click',function() {
        var $pwd = $(".confirm_pass");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
            $("#confirm_pass_icon").removeClass("fa fa-eye-slash");
            $("#confirm_pass_icon").addClass("fa fa-eye");
        } else {
            $pwd.attr('type', 'password');
            $("#confirm_pass_icon").addClass("fa fa-eye-slash");
            $("#confirm_pass_icon").removeClass("fa fa-eye");
        }
    });

    $("#cancel").click(function(){
        window.open(base_url, "_self");
    })

    $("#update").click(function(){
        update_users();
    })

});

function update_users(){

    var username = $("#username").val();
    var password = $("#password").val();
    var new_password = $("#new_password").val();
    var confirm_password = $("#confirm_password").val();
    var csrf_name = $("input[name=csrf_name]").val();

    if (jQuery.trim(username).length <= 0 || jQuery.trim(password).length <= 0 || 
        jQuery.trim(new_password).length <= 0 || jQuery.trim(confirm_password).length <= 0){
        swal({
            type : "warning",
            title : "Please input all required fields",
            timer : 2000
        })
    }else if (new_password != confirm_password){
        swal({
            type : "warning",
            title : "Password does not match",
            timer : 2000
        })
    }else{
        $.ajax({
            data : {username : username , password : password, new_password : new_password, csrf_name : csrf_name},
            url : base_url + "User/update_user",
            type : "POST",
            dataType : "JSON",
            success : function(result){
                $("input[name=csrf_name]").val(result.token);
                if (result.status == 0){
                    if (result.username == "1"){
                        swal({
                            type : "warning",
                            title : "Username already exists",
                            timer : 2000
                        })
                    }
                    if (result.password == 0){
                        swal({
                            type : "warning",
                            title : "Wrong Password",
                            timer : 2000
                        })                    
                    }
                }else{
                    swal({
                        type : 'success',
                        title : "Successfully Updated",
                        timer : 2000
                    }, function(){
                        location.reload();
                    })
                }
            }, error : function(err){
                console.log("Error : " + err.responseText);
            }
        })
    }


}



