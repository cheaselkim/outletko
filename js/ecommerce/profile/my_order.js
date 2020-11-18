$(document).ready(function(){

    get_orders();

	$(document).on("click", ".btn_plus", function(){
		var val = $(this).val();
		prod_operation(val, "+");
	});

	$(document).on("click", ".btn_minus", function(){
		var val = $(this).val();
		prod_operation(val, "-");
	});

	$(document).on("keyup", ".prod_qty", function(){
		var val = $(this).attr("data-id");
		prod_operation(val, "");
	});

    $('#modal_signup_user').on('hidden.bs.modal', function (e) {
        $("#div-checkout-guest").attr("hidden", true);
    })

    $("#checkout-guest").click(function(){
        checkout_guest();
    });

})

function get_orders(){
    var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Profile/get_orders",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-list-prod").html(result.result);
            $("#order_no").text(result.order_no);
            $("#total-cart").text($.number(result.cart_total, 2));
            $("#total-cart-2").text($.number(result.cart_total, 2));
		}, error : function(err){
			console.log(err.responseText);
		}	
	})
}

function prod_operation(val, oper){

	var prod_qty = 0;
	var total_price = 0;
	var price = $("#prod_price_"+val).text().replace(/\,/g,'');

	if (oper == "+"){
		prod_qty = Number($("#prod_qty_"+val).val()) + 1;
	}else if (oper == "-"){
		prod_qty = Number($("#prod_qty_"+val).val()) - 1;		
	}else{
		prod_qty = Number($("#prod_qty_"+val).val());
	}

	if (prod_qty == 0){
        swal({
            type : "warning",
            title : "Remove Item?",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
		}, function(isConfirm){
			if (isConfirm){
                setTimeout(function(){ 
                    remove_item(val);
                }, 500);				
			}
		})
		// prod_qty = 1;
	}

	total_price = prod_qty * price;

	$("#prod_qty_"+val).val(prod_qty);
	$("#prod_total_price_" + val).text($.number(total_price, 2));

}

function remove_item(val){

    var prod_id = $("#checkbox_"+val).val();
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {csrf_name : csrf_name, prod_id : prod_id},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Profile/remove_item", 
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            get_orders();
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function get_order_checkout(id){
    $("#modal_signup_user").attr("data-id", id);
    $("#div-checkout-guest").attr("hidden", false);
    $("#modal_signup_user").modal("show");
}

function checkout_guest(){
    var seller_id = $("#modal_signup_user").attr("data-id");
    window.open(base_url + "checkout-guest/" + seller_id, "_self");
}

