$(document).ready(function(){

	// $("#adjustment_stock").number(true, 2);
	$("#adjustment_qty").number(true, 2);
	$("#adjustment_total_qty").number(true, 2);

	product_type();
	product_class();
    adjustment_type();
    
    var window_width = $(document).width();

    if (window_width < 800){
        $(".modal").css("top", "1%");
    }

	$("#search").click(function(){
		query();
	});

	$("#adjustment_qty").keyup(function(){
		adjustment();
	});

	$("#adjustment_type").change(function(){
		adjustment_no();
		adjustment();
	});

	$("#save").click(function(){
		var remarks = $("#adjustment_remarks").val();
		var adjustment_qty = $("#adjustment_qty").val();

		if (adjustment_qty == "0"){
			swal({
				type : "warning",
				title : "Please fill all required fields",
				timer : 2000
			})
		}else{	
			swal({
				type : "warning",
				title : "Are you sure yout want to adjust the Inventory?",
				text : "",
	            showCancelButton: true
			}, function(isConfirm){
	            if (isConfirm){
			        $("#save").prop("disabled", true);
					save();
	            }
	          })
		}
	});

	$("#search_box").keyup(function(){
		if ($(this).val() == ""){
			$("#search_box").attr("data-id",  "");
		}
	});

    $("#search_box").autocomplete({
        focus: function(event, ui){
            $("#search_box").attr("data-id", ui.item.prod_id);
            $("#product_type").val(ui.item.prod_type);
            $("#product_class").val(ui.item.prod_class);
            $("#product_status").val(ui.item.prod_status);
        },
        select: function(event, ui){
            $("#search_box").attr("data-id", ui.item.prod_id);
            $("#product_type").val(ui.item.prod_type);
            $("#product_class").val(ui.item.prod_class);
            $("#product_status").val(ui.item.prod_status);
        },
        source: function(req, add){
            var csrf_name = $("input[name=csrf_name]").val();
            var prod = $("#search_box").val();
            $.ajax({
                url: base_url + "Inventory_adjustment/search_item/"+1, 
                dataType: "json",
                type: "POST",
                data: {'prod' : prod, csrf_name : csrf_name},
                success: function(data){
                    $("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                        add('');
                    }
                }, error: function(err){
                    console.log("Error: " + err.responseText);
                }
            });
        }
    });

});

function adjustment_no(){
	var csrf_name = $("input[name=csrf_name]").val();
	var adjustment_type = $("#adjustment_type").val();

	$.ajax({
		data : {csrf_name : csrf_name, tran_type : adjustment_type},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Inventory_adjustment/adjustment_no",
		success : function(data){
		    $("input[name=csrf_name]").val(data.token);
			var result = data.data;
			$("#adjustment_no").val(result);
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function product_type(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Inventory_adjustment/product_type",
		success : function(data){
		    $("input[name=csrf_name]").val(data.token);
			var result = data.data;
		    for (var i = 0; i < result.length; i++) {
	    	    $("#product_type").append("<option value='"+result[i].id+"'>"+result[i].prod_type_desc  +"</option>");
		    }
			query();
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function product_class(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Inventory_adjustment/product_class",
		success : function(data){
		    $("input[name=csrf_name]").val(data.token);
			var result = data.data;
		    for (var i = 0; i < result.length; i++) {
	    	    $("#product_class").append("<option value='"+result[i].id+"'>"+result[i].class_name+"</option>");
		    }
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function adjustment_type(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Inventory_adjustment/adjustment_type",
		success : function(data){
		    $("input[name=csrf_name]").val(data.token);
			var result = data.data;
		    for (var i = 0; i < result.length; i++) {
	    	    $("#adjustment_type").append("<option value='"+result[i].id+"'>"+result[i].inventory_ref_type+"</option>");
		    }
			adjustment_no();
		}, error : function(err){
			console.log(err.responseText);
		}
	})	
}

function query(){

	var product_type = $("#product_type").val();
	var product_class = $("#product_class").val();
	var product_id = $("#search_box").attr("data-id");
	var status = $("#product_status").val();
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {product_type : product_type, product_class : product_class, product_id : product_id, status : status, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Inventory_adjustment/entry_query",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#query-table").html(data.data);
			$("#no_products").val(data.count);
		}, error : function(err){
			console.log(err.responseText);
		}
	})


}

function adjust($id, $key){
	$("#modal_adjustment").modal("show");

	var table = "#tbl-query tbody tr:eq(" + $key + ")";
	var product_id = $id;
	var product_no = $(table).find(".product_no").text();
	var product_unit = $(table).find(".product_unit").text();
	var product_unit_price = $(table).find(".product_price").text().replace(/,/g, '');
	var product_tax = $(table).find(".product_tax").text();
	var product_grade = $(table).find(".product_grade").text();
	var product_grade_id = $(table).find(".product_grade_id").text();
	var product_qty = $(table).find(".product_qty").text();

	$("#adjustment_prod_no").attr("data-id", product_id);
	$("#adjustment_prod_no").attr("data-unitprice", product_unit_price);
	$("#adjustment_prod_no").attr("data-tax", product_tax);
	$("#adjustment_prod_no").val(product_no);
	$("#adjustment_prod_grade").val(product_grade);
	$("#adjustment_prod_grade").attr("data-id", product_grade_id);
	$("#adjustment_prod_unit").val(product_unit);
	$("#adjustment_stock").val(product_qty);
	$("#adjustment_total_qty").val(Number(product_qty) + 0);

}

function adjustment(){

	var adjustment_stock = $("#adjustment_stock").val();
 	var adjustment_type = $("#adjustment_type").val();
	var adjustment_qty = $("#adjustment_qty").val();
	var total = 0;

	if (adjustment_type == "12"){
		total = (Number(adjustment_stock) + 0) + Number(adjustment_qty);
	}else{
		total = (Number(adjustment_stock) + 0) - Number(adjustment_qty);
	}

	$("#adjustment_total_qty").val(Number(total) + 0);

}

function save(){

	var inv_type = "5";
	var inv_no = $("#adjustment_no").val();
	var inv_date = $("#adjustment_date").val();
	var tran_type = $("#adjustment_type").val();
	var remarks = $("#adjustment_remarks").val();
	
	var unit_price = $("#adjustment_prod_no").attr("data-unitprice");
	var product_id = $("#adjustment_prod_no").attr("data-id");
	var product_tax = $("#adjustment_prod_no").attr("data-tax");
	var product_grade = $("#adjustment_prod_grade").attr("data-id");
	var adjustment_qty = $("#adjustment_qty").val();

    var unit_price_w_o_vat = 0;
    var unit_price_w_vat = 0;
    var tax = "";

    if (Number(product_tax) != 0){
        unit_price_w_vat = unit_price;
        unit_price_w_o_vat = unit_price / 1.12;
        tax = "1";
    }else{
        unit_price_w_o_vat = unit_price;
        unit_price_w_vat = unit_price * 1.12;
        tax = "0";
    }

    var vat_cost = Number(unit_price_w_vat).toFixed(2) - Number(unit_price_w_o_vat).toFixed(2);

	var total_amount = Number(adjustment_qty) * Number(unit_price);
	var total_w_vat = Number(adjustment_qty) * Number(unit_price_w_vat);
	var total_w_o_vat = Number(adjustment_qty) * Number(unit_price_w_o_vat);	

	var total_vat = Number(total_w_vat).toFixed(2) - Number(total_w_o_vat).toFixed(2);
	var total_net_vat = Number(total_w_vat).toFixed(2) - Number(total_vat).toFixed(2);

	var adjustment_hdr = {
        inv_type : "5",
        inv_no : inv_no,
        tran_type : tran_type,
        recipient_id : 0,
        recipient_type : 0,
        remarks : remarks,
        total_amount : total_amount,
        total_vat : total_vat,
        total_net_vat  : total_net_vat,
        status : "1"
	}

	var adjustment_dtl = {
		prod_id : product_id,
		vat : tax,
		qty : adjustment_qty,
		currency : 121,
		cost : unit_price,
		vat_cost : 	vat_cost,
		cost_w_vat : unit_price_w_vat,
		cost_w_o_vat : unit_price_w_o_vat,
		total_cost : total_amount,
		net_vat : 	total_net_vat,
		w_vat : total_w_vat,
		w_o_vat : total_w_o_vat,
		prod_grade : product_grade
	}

	var csrf_name = $("input[name=csrf_name]").val();


	$.ajax({
		data : {csrf_name : csrf_name, adjustment_hdr : adjustment_hdr, adjustment_dtl : adjustment_dtl}
		, type: "POST"
		, url: base_url + "inventory_adjustment/insert_adjustment"
		, dataType: 'JSON'
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
				type : "success",
				timer : 2000,
				title : "Successfully Saved"
			}, function(){
				location.reload();
			});
		}, error: function(err) {
			console.log(err.responseText);
		}
	});  

}






