$(document).ready(function(){

    get_payment_details();

    $("#btn-send-proof").click(function(){
        check_proof();
    });

});

function get_payment_details(){

    var csrf_name = $("input[name=csrf_name]").val();
    var id = $("#order-id").val();

    $.ajax({
        data : {csrf_name : csrf_name, id : id},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Guest/get_payment_details",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);

            console.log(result.result);

            var payment_type = result.result.payment_type;
            var payment_method = result.result.payment_method;
            var query = result.result.query;
            var payvia = query[0].payvia;

            $("#payment-method").val("Pay via " + payvia);
            $("#proof-order-no").val(result.result.order_no);

            if (query.length > 0){
 
                if (payment_type == "5"){
                    $("#payment-table").append("<table class='table table-sm'>"+
                    "<tbody>"+
                        "<tr>" +
                            "<th>Bank</th>" + 
                            "<td>"+query[0].payvia+"</td>" +
                        "</tr>"+
                        "<tr>" +
                            "<th>Name</th>" + 
                            "<td>"+query[0].account_name+"</td>" +
                        "</tr>"+
                        "<tr>" +
                            "<th>Account No</th>" + 
                            "<td>"+query[0].account_no+"</td>" +
                        "</tr>"+
                    "</tbody>" +
                    "</table>");
                }else if (payment_type == "6"){

                    $("#payment-table").append("<table class='table table-sm'>"+
                    "<tbody>"+
                        "<tr>" +
                            "<th>Name</th>" + 
                            "<td>"+query[0].account_name+"</td>" +
                        "</tr>"+
                        "<tr>" +
                            "<th>Account No</th>" + 
                            "<td>"+query[0].account_no+"</td>" +
                        "</tr>"+
                    "</tbody>" +
                    "</table>");

                }

                            

            }
                        
        }, error : function(err){
            console.log(err.responseText);
        }
    })

    
}


function check_proof(){

    var message = jQuery.trim($("#proof-message").val()).length;
    var upload_file = $("#btn-upload-proof");

    console.log(upload_file.get(0).files.length);
    console.log(message);

    if (message <= 0 || upload_file.get(0).files.length <= 0){
        swal({
            type : "warning",
            title : "Please input all required fields"
        })
    }else{
        save_proof();
    }
}

function save_proof(){

    var csrf_name = $("input[name=csrf_name]").val();
    var id = $("#order-id").val();
    var message = $("#proof-message").val();
    var files = $('#btn-upload-proof')[0].files;

    var form_data = new FormData(); 

    for(var count = 0; count<files.length; count++) {
        var name = files[count].name;
        form_data.append("files[]", files[count]);
    }        
    form_data.append("id", id);
    form_data.append('csrf_name', csrf_name);
    form_data.append("message", message);

    $.ajax({
        data : form_data,
        type : "POST",
        dataType : "JSON",
        url : base_url + "Guest/save_proof",
        crossOrigin : false,
        contentType: false,
        processData: false,
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            swal({
                type : "success",
                title : "Your Proof of Payment has been sent",
                text : "Please wait to approved your payment and proceed to deliver your order. Thank you"
            }, function(){
                // location.reload();
                window.open(base_url, "_self");
            })
        }, error : function(err){
            console.log(err.responseText)
        }
    })

}