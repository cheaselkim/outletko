$(document).ready(function(){

	currency();

    $(".btn-enter").hide();
    $(".btn-exit").hide();
    $("#currency").prop("disabled", true);
    $("#qty").number(true, 2);
    $("#prod_price").number(true, 2);
    $("#prod_total_price").number(true, 2);


    $("#recipient_code").keyup(function(){
        if ($(this).val() == ""){
            $("#recipient_name").val("");
            $("#recipient_code").data("id", "");
            $("#recipient_code").data("type_1", "");
        }
    });

    $("#recipient_name").keyup(function(){
        if ($(this).val() == ""){
            $("#recipient_code").val("");
            $("#recipient_code").data("id", "");
            $("#recipient_code").data("type_1", "");
        }
    });

	$("#recipient_code").autocomplete({
		focus: function(event, ui){
			$("#recipient_name").val(ui.item.recipient_name);
			$("#recipient_code").data("type_1", ui.item.recipient_type);
			$("#recipient_code").data("id", ui.item.recipient_id);
		},
		select: function(event, ui){
			$("#recipient_name").val(ui.item.recipient_name);
			$("#recipient_code").data("type_1", ui.item.recipient_type);
			$("#recipient_code").data("id", ui.item.recipient_id);
		},
		source: function(req, add){
			var recipient = $("#recipient_code").val();
            $.ajax({
                url: base_url + "inventory_return/search_recipient/"+1, 
                dataType: "json",
                type: "POST",
                data: {'recipient' : recipient},
                success: function(data){
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

	$("#recipient_name").autocomplete({
		focus: function(event, ui){
			$("#recipient_code").val(ui.item.recipient_code);
			$("#recipient_code").data("type_1", ui.item.recipient_type);
			$("#recipient_code").data("id", ui.item.recipient_id);
		},
		select: function(event, ui){
			$("#recipient_code").val(ui.item.recipient_code);
			$("#recipient_code").data("type_1", ui.item.recipient_type);
			$("#recipient_code").data("id", ui.item.recipient_id);
		},
		source: function(req, add){
			var recipient = $("#recipient_name").val();
            $.ajax({
                url: base_url + "inventory_return/search_recipient/"+2, 
                dataType: "json",
                type: "POST",
                data: {'recipient' : recipient},
                success: function(data){
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

	$("#prod_no").autocomplete({
		focus: function(event, ui){
            $("#prod_name").val(ui.item.prod_name);
            $("#prod_unit").val(ui.item.prod_unit);
            $("#prod_price").val(ui.item.prod_price);
            $("#prod_curr").val(ui.item.prod_curr);
            $("#prod_no").data("id", ui.item.prod_id);
		},
		select: function(event, ui){
            $("#prod_name").val(ui.item.prod_name);
            $("#prod_unit").val(ui.item.prod_unit);
            $("#prod_price").val(ui.item.prod_price);
            $("#prod_curr").val(ui.item.prod_curr);
            $("#prod_no").data("id", ui.item.prod_id);
		},
		source: function(req, add){
			var product = $("#prod_no").val();
            $.ajax({
                url: base_url + "inventory_transfer/search_products/"+1, 
                dataType: "json",
                type: "POST",
                data: {'product' : product},
                success: function(data){
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

	$("#prod_name").autocomplete({
		focus: function(event, ui){
            $("#prod_no").val(ui.item.prod_no);
            $("#prod_unit").val(ui.item.prod_unit);
            $("#prod_price").val(ui.item.prod_price);
            $("#prod_curr").val(ui.item.prod_curr);
            $("#prod_no").data("id", ui.item.prod_id);
		},
		select: function(event, ui){
            $("#prod_no").val(ui.item.prod_no);
            $("#prod_unit").val(ui.item.prod_unit);
            $("#prod_price").val(ui.item.prod_price);
            $("#prod_curr").val(ui.item.prod_curr);
            $("#prod_no").data("id", ui.item.prod_id);
		},
		source: function(req, add){
			var product = $("#prod_name").val();
            $.ajax({
                url: base_url + "inventory_transfer/search_products/"+2, 
                dataType: "json",
                type: "POST",
                data: {'product' : product},
                success: function(data){
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

    $(".btn-add").click(function(){
        if ($(".prod_entry").is(":visible") == true){
            $(".btn-enter").hide();
            $(".btn-exit").hide();
            $(".prod_entry").collapse('hide');
        }else{
            $(".btn-enter").show();
            $(".btn-exit").show();
            $(".prod_entry").collapse('show');            
        }
    });

    $(".btn-exit").click(function(){
        $(".btn-enter").hide();
        $(".btn-exit").hide();
        $(".prod_entry").collapse('hide');
        reset_item_input();
    }); 

	$("#enter_item").click(function(){
		if ($("#qty").val() != 0){
			if ($("#tbl_item_row").val() != ""){
				edit_item_table();
			}else{
				add_item_table();
			}
		}else{
			swal({
				type : "error",
				title : "Please input return qty",
				timer : 1000
			})
		}
	});

	jQuery(document).on("click", ".remove_item_table", function(){
		$(this).closest("tr").remove();		
        setTimeout(
          function() 
          {
            reset_item_input();
            $("#tbl_item_row").val("");
          }, 400);
	});	

	jQuery(document).on("click", ".item_row_table", function(){
		var row = $(this).closest("tr").index();
		var id = $(this).closest("tr").find(".tbl_prod_id").text();
		$("#tbl_item_row").val(row);
		select_row_table(row);
		find_onhand_qty(id);
	});	

    $("#qty").keyup(function(){
        compute_total();
    }); 

    $("#preview").click(function(){
    	preview();
    });

    $("#return_no").keyup(function(){
    	$(this).reomveClass("error");
    });

    $("#return_date").keyup(function(){
    	$(this).reomveClass("error");
    });

    $("#recipient_code").keyup(function(){
    	$(this).reomveClass("error");
    });

    $("#recipient_name").keyup(function(){
    	$(this).reomveClass("error");
    });

    $("#reason").keyup(function(){
    	$(this).reomveClass("error");
    });

    $("#cancel").click(function(){
    	window.open(base_url, "_self");
    });

	$("#save").click(function(){
        $("#save").prop("disabled", true);
		check_required_fields();
	});


});

function currency(){
    $.ajax({
        type : "GET",
        dataType : "JSON",
        url : base_url + "inventory_return/currency",
        success : function(data){
            $("#currency").append("<option value='"+data.id+"'>"+data.curr_code+"</option>");
        }, error : function(err){
            console.log(err.responseText);
        }
    });
}


function compute_total(){
    var qty = $("#qty").val();
    var price = $("#prod_price").val();

    var total = Number(qty) * Number(price);

    $("#prod_total_price").val(total);
}

function add_item_table(){
    var qty = $("#qty").val();
    $("#tbl-products tbody").append("<tr class='item_row_table'>"+
        "<td class='tbl_prod_no text-left' style='width: 2.5%;'>" + $("#prod_no").val() +
        "</td><td class='tbl_prod_name text-left' style='width: 7%;'>" + $("#prod_name").val() +
        "</td><td class='tbl_qty text-left' style='width: 1.5%;'>" + $.number($("#qty").val(), 2) +
        "</td><td class='tbl_unit text-left' style='width: 1%;'>" + $("#prod_unit").val() + 
        "</td><td class='tbl_currency text-left' style='width: 1.5%;'>" + $("#currency :selected").text() +
        "</td><td class='tbl_price text-left' style='width: 2%;'>"+ $.number($("#prod_price").val(),2) + 
        "</td><td class='tbl_total_price text-left' style='width: 2%;'>"+ $.number($("#prod_total_price").val(),2) + 
        "</td><td class='tbl_prod_id text-left' hidden>"+ $("#prod_no").data("id") + 
        "</td><td class='text-center text-red remove_item' style='width: 1%;'>"+ "<i class='fa fa-minus-circle remove_item_table' style='color:red;cursor:pointer;' id='remove_item_table'></i>" +
        "</td></tr>");
    reset_item_input();
}

function select_row_table(row){
	var table = "#tbl-products tbody tr:eq("+row+")";

	// console.log("prod_id " + $(table).find(".tbl_prod_id").text());

	$("#prod_no").data("id", $(table).find(".tbl_prod_id").text());
	$("#prod_no").val($(table).find(".tbl_prod_no").text());
	$("#prod_name").val($(table).find(".tbl_prod_name").text());
	$("#qty").val($(table).find(".tbl_qty").text());
	$("#prod_unit").val($(table).find(".tbl_unit").text());
	$("#prod_curr").val($(table).find(".tbl_currency").text());
	$("#prod_price").val($(table).find(".tbl_price").text());
	$("#prod_total_price").val($(table).find(".tbl_total_price").text());
	$(".btn-exit").show();
	$(".btn-enter").show();
    $(".prod_entry").collapse('show');
}

function find_onhand_qty(id){

}

function edit_item_table(){

	var row = $("#tbl_item_row").val();
	var table = "#tbl-products tbody tr:eq("+row+")";

	$(table).find(".tbl_prod_no").text($("#prod_no").val());
	$(table).find(".tbl_prod_name").text($("#prod_name").val());
	$(table).find(".tbl_unit").text($("#prod_unit").val());
	$(table).find(".tbl_qty").text($.number($("#qty").val(),2));
	$(table).find(".tbl_currency").text($("#prod_curr").val());
	$(table).find(".tbl_price").text($.number($("#prod_price").val(), 2));
	$(table).find(".tbl_total_price").text($.number(($("#prod_price").val() * $("#qty").val()), 2));
	$(table).find(".tbl_prod_id").text($("#prod_no").data("id"));

	reset_item_input();
}

function reset_item_input(){
	$(".prod_entry").find(":input").val("");
	$("#tbl_item_row").val("");
	$(".btn-exit").hide();
	$(".btn-enter").hide();
    $(".prod_entry").collapse('hide');
}

function preview(){
	var trans_no = $("#return_no").val();
	var trans_date  = convert_date($("#return_date").val());
	var trans_type = $("#tran_type :selected").text();
	var recipient_code = $("#recipient_code").val();
	var recipient_name = $("#recipient_name").val();
	var ref_trans_no = $("#ref_trans_no").val();
	var ref_trans_date = convert_date($("#ref_trans_date").val());
	var reason = $("#reason").val();
	var total_qty = 0;
	var total_amount = 0;

    $("#mod_trans_no").text(trans_no);    
    $("#mod_trans_date").text(trans_date);    
    $("#mod_tran_type").text(trans_type);
    $("#mod_recipient_code").text(recipient_code);    
    $("#mod_recipient_name").text(recipient_name);    
    $("#mod_ref_no").text(ref_trans_no);    
    $("#mod_ref_date").text(ref_trans_date);    
    $("#mod_ref_remarks").text(reason);    

    $("#mod-tbl-products tbody tr").empty();

	$('#tbl-products tbody tr').each(function (row, tr){
	    $("#mod-tbl-products tbody").append("<tr class='item_row_table'>"+
	        "<td class='tbl_prod_no text-left' style='width: 2.5%;'>" + $(tr).find(".tbl_prod_no").text() +
	        "</td><td class='tbl_prod_name text-left' style='width: 9%;'>" + $(tr).find(".tbl_prod_name").text() +
	        "</td><td class='tbl_qty text-left' style='width: 1.5%;'>" + $.number($(tr).find(".tbl_qty").text(), 2) +
	        "</td><td class='tbl_unit text-left' style='width: 1%;'>" + $(tr).find(".tbl_unit").text() + 
	        "</td><td class='tbl_currency text-left' style='width: 1.5%;'>" + $(tr).find(".tbl_currency").text() +
	        "</td><td class='tbl_price text-left' style='width: 2%;'>"+ $.number($(tr).find(".tbl_price").text(),2) + 
	        "</td><td class='tbl_total_price text-left' style='width: 2%;'>"+ $.number($(tr).find(".tbl_total_price").text(),2) + 
	        "</td></tr>"); 

	        total_qty += Number(str_to_num($(tr).find(".tbl_qty").text()));   
	        total_amount += Number(str_to_num($(tr).find(".tbl_total_price").text()));    
	});	

	$("#mod_total_qty").text($.number(total_qty, 2));
	$("#mod_total_amount").text($.number(total_amount, 2));

    $("#preview_modal").modal("show");
}

function check_required_fields(){

	var trans_no = $("#return_no").val();
	var trans_date  = $("#return_date").val();
	var recipient_code = $("#recipient_code").data("id");
	var recipient_name = $("#recipient_name").val();
	var ref_trans_no = $("#ref_trans_no").val();
	var ref_trans_date = $("#ref_trans_date").val();
	var reason = $("#reason").val();
	var rows = $('#tbl-products > tbody > tr').length;

	if (trans_no == "" || trans_date == "" || recipient_code == "" || recipient_name == "" || reason == "" || rows == 0){
        $("#save").prop("disabled", false);

		swal({
			type : "warning",
			title : "Please input all required fields",
		})

		if (trans_no == ""){
			$("#return_no").addClass("error");
		}

		if (trans_date == ""){
			$("#return_date").addClass("error");
		}

		if (recipient_code == ""){
			$("#recipient_code").addClass("error");
		}

		if (recipient_name == ""){
			$("#recipient_name").addClass("error");
		}

		if (reason == ""){
			$("#reason").addClass("error");
		}

	}else{
        $.ajax({
            url: base_url + "inventory_return/inv_no_wo_id/", 
            dataType: "json",
            type: "POST",
            data: {'return_no' : trans_no},
            success: function(result){
            	if (result > 0){
            		swal({
            			type : "error",
            			timer : 2000,
            			title : "Return no is already exists"
            		})
            	}else{
            		insert();
            	}
            }, error: function(err){
            	console.log("Error: " + err.responseText);
            }
        });
	}

}

function insert(){

	var trans_no = $("#return_no").val();
	var trans_date  = $("#return_date").val();
	var trans_type = $("#tran_type").val();
	var recipient_id = $("#recipient_code").data("id");
	var recipient_type = $("#recipient_code").data("type_1");
	var ref_trans_no = $("#ref_trans_no").val();
	var ref_trans_date = $("#ref_trans_date").val();
	var reason = $("#reason").val();
	
	var return_dtl = new Array();
	var return_hdr = {
		trans_no : trans_no,
		trans_date : trans_date,
		trans_type : trans_type,
		recipient_type : recipient_type,
		recipient_id : recipient_id, 
		ref_trans_no : ref_trans_no,
		ref_trans_date : ref_trans_date,
		reason : reason

	}

	$('#tbl-products tbody tr').each(function (row, tr){
	        var sub = {
	            'prod_id' : $(tr).find('.tbl_prod_id').text(),
	            'qty' : str_to_num($(tr).find('.tbl_qty').text()),
                'cost' : str_to_num($(tr).find('.tbl_price').text()),
                'total_cost' : str_to_num($(tr).find('.tbl_total_price').text())
	        } 
	        return_dtl.push(sub);            
	});	

	$.ajax({
		data : {"return_hdr" : return_hdr, "return_dtl" : return_dtl},
		type : "POST",
		dataType : "JSON",
		url : base_url + "inventory_return/insert_inventory_return",
		success : function(result){
			if (result == 1){
				swal({
					type : "success",
					timer : 2000,
					title : "Successfully Added"
				}, function(){
					location.reload();
				});
			}else{
				console.log(result);
			} 
		}, error : function(err){
			console.log(err.responseText);
		}
	});

}