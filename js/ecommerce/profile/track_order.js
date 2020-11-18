$(document).ready(function(){

    $("#btn-track-order").click(function(){
        check_input();
    });

    $('#order-number').keypress(function (e) {
        if (e.which == 13) {
            check_input();
        }
    });

    $('#order-email').keypress(function (e) {
        if (e.which == 13) {
            check_input();
        }
    });

});

function check_input(){

    if(jQuery.trim($("#order-number").val()).length < 1 || jQuery.trim($("#order-email").val()).length < 1){
        swal({
            type : "warning",
            title : "Please input all fields",
            timer : 3000
        }, function(){
            location.reload();
        })
    }else{
        get_track_order();
    }

}

function get_track_order(){

    var csrf_name = $("input[name=csrf_name]").val();
    var order_no = $("#order-number").val();
    var email = $("#order-email").val();

    $(".track-progress").removeClass("active");
    $("#div-alert-track").attr("hidden", true);
    $("#div-track-status").attr("hidden", true);


    // console.log(email);
    // console.log(order_no);

    $.ajax({
        data : {csrf_name : csrf_name, order_no : order_no, email : email},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Guest/get_track_order", 
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            var status = "";
            var prog_order = "";
            var prog_confirm = "";
            var prog_payment = "";
            var prog_delivery = "";
            var prog_complete = "";
            
            if (result.result.length > 0){
                var data = result.result[0];
                var outlet = result.result[0].account_name;

                if (data.status == "1"){
                    status = "For Acknowledgement";
                    prog_order = "active";
                }else if (data.status == "2"){
                    status = "Acknowledgement/Confirmed Order";
                    prog_order="active";
                    prog_confirm = "active";
                }else if (data.status == "3"){
                    status = "Proof of Payment Sent";
                    prog_order="active";
                    prog_confirm = "active";
                    prog_payment = "active";
                }else if (data.status == "4"){
                    status = "Payment Denied by Seller";
                    prog_order="active";
                    prog_confirm = "active";
                    prog_payment = "active";
                }else if (data.status == "5"){
                    status = "Payment Accepted by Seller";
                    prog_order="active";
                    prog_confirm = "active";
                    prog_payment = "active";
                }else if (data.status == "6"){
                    status = "Order Delivery";
                    prog_order="active";
                    prog_confirm = "active";
                    prog_payment = "active";
                    prog_delivery = "active";
                }else if (data.status == "7"){
                    status = "Order Completed";
                    prog_order="active";
                    prog_confirm = "active";
                    prog_payment = "active";
                    prog_delivery = "active";
                    prog_complete = "active";
                }
                
                $("#track-order-no").text(order_no);
                $("#track-outlet").text(outlet);
                $("#track-status").text(status);

                $("#track-progress-order").addClass(prog_order);
                $("#track-progress-confirm").addClass(prog_confirm);
                $("#track-progress-payment").addClass(prog_payment);
                $("#track-progress-delivery").addClass(prog_delivery);
                $("#track-progress-completed").addClass(prog_complete);

                $("#div-track-status").attr("hidden", false);
            }else{
                $("#div-alert-track").attr("hidden", false);
            }

        }, error : function(err){
            console.log(err.responseText);
        }
    })

}