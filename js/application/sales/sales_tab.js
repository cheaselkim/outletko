$(document).ready(function(){

	var width = $(window).width();

	// if (width <= 768){
	// 	$("body").empty();
	// 	$("body").load(base_url + "menu/tab_menu/1/0/1/"+width);
	// }

	// open_transaction();

	$('[data-toggle="tooltip"]').tooltip();   

	// $("#stock_qty").number(true);
	// $("#reg_price").number(true,2);
	$("#sel_price").number(true, 2);
	$("#qty").number(true);
	$("#total_price").number(true,2);
	$("#volume_discount").number(true, 2);
	$("#volume_discount_per").number(true,2);
	$("#total_selling_price").number(true,2);
	$("#share_per").number(true,2);
	$("#share_amount").number(true,2);
	$("#pay_total_amount").number(true,2);
	$("#payment_amount").number(true,2);
	$("#sales_discount").number(true,2);
	$("#grand_total").number(true,2);
	// $("#mod-text-discount").number(true, 2);
	// $("#no_days").number(true,0);
	// $("#total_vat").number(true, 2);

	$("#check_date").attr("readonly", true);
	$("#bank_name").prop("disabled", true);
	$("#check_no").attr("readonly", true);
	$("#no_days").attr("readonly", true);
	$("#due_date").attr("readonly", true);

	// $("#dep_bank").attr("disabled", true);
	$("#mod-text-discount").prop("disabled", true);

	if (width <= 768){
		setTimeout(function(){
			max_transno();
			customer();
			currency();
			payment_type();
			payment_term();
			bank_list();
			item_type();
			item_category();
			item_class();
			item_brand();
			item_color();
			item_size();
			discount();
			comp_bank();
		}, 2000);
	}else{
		max_transno();
		customer();
		currency();
		payment_type();
		payment_term();
		bank_list();
		item_type();
		item_category();
		item_class();
		item_brand();
		item_color();
		item_size();
		discount();
		comp_bank();		
	}


	$("#next_page").click(function(){

        $("#table_sales").show();
        $("#sales_entry").hide();
        $("#prod_entry").hide();

	});

	var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output =  
        d.getFullYear() + '-'
       +((''+month).length<2 ? '0' : '') + month + "-"
       +((''+day).length<2 ? '0' : '') + day 
       
    //console.log(output);
    $('#payment_date').val(output);

    $("#item_category").change(function(){
    	item_class();
    });

    $("#span-discount").click(function(){
    	$("#mod-select-discount").val($("#dis_id").val());
    	$("#modal-discount").modal("show");
    });

    $("#mod-select-discount").change(function(){
    	$("#mod-text-discount").val($("#mod-select-discount option:selected").data("discount"));
    	$("#mod-text-type").text($("#mod-select-discount option:selected").data("type"));
    });

    $("#mod-discount-save").click(function(){
    	$("#volume_discount_per").val($("#mod-text-discount").val());
    	$("#dis_id").val($("#mod-select-discount").val());

	    if (parseInt($("#volume_discount_per").val()) >= 101){
			$("#volume_discount_per").val("");
		}
		var total_price = $("#total_price").val();
		var per = $("#volume_discount_per").val();
		$("#volume_discount").val(total_price*(per/100));
		compute_itemprice();
    });

	$("#save_trans").click(function(){

		swal({
			type : "warning",
			title : "Save Transaction No. " + $("#sales_trans_no").text() + " ?",
			text : "",
            showCancelButton: true
		}, function(isConfirm){
            if (isConfirm){
				$(this).prop("disabled", true);
				save_trans();
            }
          })

	});

	$("#cust_code").keyup(function(){
		if ($(this).val() == ""){
			$("#cust_name").val("");
			$("#cust_code").data("id", "");
		}
	});

	$("#cust_code").autocomplete({
		focus: function(event, ui){
			$("#cust_name").val(ui.item.cust_name);
			$("#cust_code").data("id", "");
		},
		select: function(event, ui){
			$("#cust_name").val(ui.item.cust_name);
			$("#cust_code").attr("data-id", ui.item.cust_id);
		},
		source: function(req, add){
			var cust_code = $("#cust_code").val();
			var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "sales/search_customer/"+1, 
                dataType: "json",
                type: "POST",
                data: {'customer' : cust_code, csrf_name : csrf_name},
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

	$("#cust_name").keyup(function(){
		if ($(this).val() == ""){
			$("#cust_code").val("");
			$("#cust_code").data("id", "");
		}
	});

	$("#cust_name").autocomplete({
		focus: function(event, ui){
			$("#cust_code").val(ui.item.cust_code);
			$("#cust_code").data("id", "");
		},
		select: function(event, ui){
			$("#cust_code").val(ui.item.cust_code);
			$("#cust_code").attr("data-id", ui.item.cust_id);
		},
		source: function(req, add){
			var csrf_name = $("input[name=csrf_name]").val();
			var cust_name = $("#cust_name").val();
            $.ajax({
                url: base_url + "sales/search_customer/"+2, 
                dataType: "json",
                type: "POST",
                data: {'customer' : cust_name, csrf_name : csrf_name},
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

	$("#btn_select_item").click(function(){
	    $('#table_item tbody').empty();
		$("#select_item_modal").find(":input").val("");
		var item_cat = $("#item_category").val();
		var item_keyword = $("#item_keyword").val();
		$("#tbl_item_row").val("");
		search_item();
	});
	
	$("#search").click(function(){
		var item_cat = $("#item_category").val();
		var item_keyword = $("#item_keyword").val();
		search_item();
	});

	$("#payment_type").change(function(){
		$("#check_date").val("");
		$("#bank_name").val("");
		$("#check_no").val("");
		$("#no_days").val("");
	    $("#due_date").val("");

	    /*&& $("#payment_type option:selected").val() != "2"*/
		if ($("#payment_type option:selected").val() != "1" ){
			$("#check_date").attr("readonly", false);
			$("#bank_name").prop("disabled", false);
			$("#check_no").attr("readonly", false);

			// $("#no_days").attr("readonly", false);
	  //       $("#due_date").attr("readonly", false);
	        // $("#dep_bank").attr("disabled", false);
	        
		}else{
			$("#check_date").attr("readonly", true);
			$("#bank_name").prop("disabled", true);
			$("#check_no").attr("readonly", true);
			// $("#no_days").attr("readonly", true);
	  //       $("#due_date").attr("readonly", true);
	        // $("#dep_bank").attr("disabled", true);
		}
	});

	$("#payment_term").change(function(){

		if ($(this).val() != "1"){
			$("#no_days").attr("readonly", false);
			$("#due_date").attr("readonly", false);
			$("#payment_date").attr("readonly", true);
			$("#payment_type").attr("disabled", true);
			$("#payment_amount").attr("readonly", true);
			$("#currency").attr("disabled", true);
			$("#dep_date").attr("readonly", true);
			$("#dep_bank").attr("disabled", true);
		}else{
			$("#no_days").attr("readonly", true);
			$("#due_date").attr("readonly", true);			
			$("#payment_date").attr("readonly", false);
			$("#payment_type").attr("disabled", false);
			$("#payment_amount").attr("readonly", false);
			$("#currency").attr("disabled", false);
			$("#dep_date").attr("readonly", false);
			$("#dep_bank").attr("disabled", false);
		}

	});

	$("#sel_price").keyup(function(){
		compute_itemprice();
	});	

	$("#qty").keyup(function(){
		compute_itemprice();
		$(this).removeClass("error");
	});
	
	$("#share_per").keyup(function(){
	    if (parseInt($(this).val()) >= 101){
			$("#share_per").val("");
		}
		compute_itemprice();
	});
	
	$("#share_amount").keyup(function(){
		var total_price = $("#total_selling_price").val();
		var volume_discount = $(this).val();
		share_per = (volume_discount / total_price)*100;
		$("#share_per").val($.number(share_per, 2));
		//compute_itemprice();
	});
	//new
	$("#volume_discount").keyup(function(){
		var total_price = $("#total_price").val();
		var volume_discount = $(this).val();
		share_per = (volume_discount / total_price)*100;
		$("#volume_discount_per").val($.number(share_per, 2));
		compute_itemprice();
	});
	
	$("#continue").click(function(){
		var type = $("#payment_type option:selected").text();
		$("#pay_hdr_type").val(type);
	});
	//new
	$("#volume_discount_per").keyup(function(){
	    if (parseInt($(this).val()) >= 101){
			$("#volume_discount_per").val("");
		}
		var total_price = $("#total_price").val();
		var per = $(this).val();
		$("#volume_discount").val(total_price*(per/100));
		compute_itemprice();
	});

	$("#sales_discount").keyup(function(){
		compute_grandtotal();
	});

	$("#add_item").click(function(){
		// console.log($("#stock_qty").val() + 0);

		if ($("#qty").val() != 0 && $('#partner_id').val() != ""){

			if ($("#stock_qty").val() == ""){
				if ($("#tbl_item_row").val() != ""){
					edit_item_table();
				}else{
					add_item_table();
				}				

	            $("#table_sales").show();
	            $("#sales_entry").hide();
	            $("#prod_entry").hide();

			}else if (Number($("#qty").val()) > Number($("#stock_qty").val() + 0) && $("#stock_uom").val() != "" ){
				swal({
					type : "warning",
					title : "Qty is greater than stock on hand. Proceed?",
					text : "",
		            showCancelButton: true
				}, function(isConfirm){
		            if (isConfirm){
						if ($("#tbl_item_row").val() != ""){
							edit_item_table();
						}else{
							add_item_table();
						}
			            $("#table_sales").show();
			            $("#sales_entry").hide();
			            $("#prod_entry").hide();

		            }
		          })
			}else{
				if ($("#tbl_item_row").val() != ""){
					edit_item_table();
				}else{
					add_item_table();
				}				
	            $("#table_sales").show();
	            $("#sales_entry").hide();
	            $("#prod_entry").hide();
			}

		}else{

			if ($("#qty").val() == 0){
				$("#qty").addClass("error");
			}

			if ($("#partner_id").val() == ""){
				$("#partner").addClass("error");
			}

		    swal({
              type : "warning",
              title : "Please fill up required fields",
              timer : 2000
            });
	
            $("#table_sales").show();
            $("#sales_entry").hide();
            $("#prod_entry").hide();
		}
	});

	jQuery(document).on("click", ".remove_item_table", function(){
		$(this).closest("tr").remove();	
		$("#tbl_item_row").val("");
		compute_grandtotal();
	    setTimeout(function(){
			reset_input();
	    }, 300);
	    
	});	

	jQuery(document).on("click", ".edit_item_table", function(){
		var row = $(this).closest("tr").index();
		var id = $(this).closest("tr").find(".tbl_prod_id").text();
		select_item(id);
		select_row_table(row);
	});

	$("#partner").keyup(function(){
		$("#partner").removeClass("error");
	});

	//ngayon
	//Auto-complete
	$("#partner").keyup(function(){
	    $("#partner").attr("data-id","");
		// if ($(this).val() == ""){
		// 	$("#cust_code").val("");
		// 	$("#cust_name").val("");
		// }
	});

	$("#partner").autocomplete({
		focus: function(event, ui){
			$("#partner").attr("data-id2",ui.item.id);
			$("#partner").attr("data-id",ui.item.id);
			$("#partner").attr("data-share",ui.item.share);
			$("#partner").attr("data-account",ui.item.account);
			$("#share_per").val(ui.item.share);
			$("#partner_id").val(ui.item.id);
		},
		select: function(event, ui){
			$("#partner").attr("data-id2",ui.item.id);
			$("#partner").attr("data-id",ui.item.id);
			$("#partner").attr("data-share",ui.item.share);
			$("#partner").attr("data-account",ui.item.account);
			$("#share_per").val(ui.item.share);
			$("#partner_id").val(ui.item.id);
			compute_itemprice()
		},
		source: function(req, add){
			var partner = $("#partner").val();
			var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "sales/search_partner", 
                dataType: "json",
                type: "POST",
                data: {'partner' : partner, csrf_name : csrf_name},
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
	
// 	$("#item_keyword").autocomplete({
//       minLength: 0,
//       source: base_url + "Sales/search_field/",
//       focus: function( event, ui ) {
//         return false;
//       },
//       select: function( event, ui ) {
//         $(this).val(ui.item.term);
//         return false; 
//       }
//     })
//     .autocomplete( "instance" )._renderItem = function( ul, item ) {
//         return $( "<li>" )
//         .append( "<div>" + item.term + "</div>" )
//         .appendTo( ul );
//     }; 
    $("#item_name").autocomplete({
		focus: function(event, ui){
			$("#item_no").val(ui.item.no);
			$("#item_type").val(ui.item.type);
			$("#item_category").val(ui.item.category);
			$("#item_class").val(ui.item.class);
			$("#item_brand").val(ui.item.brand);
			$("#item_color").val(ui.item.color);
			$("#item_size").val(ui.item.size);
			$("#item_model").val(ui.item.model);
		},
		select: function(event, ui){
			$("#item_no").val(ui.item.no);
			$("#item_type").val(ui.item.type);
			$("#item_category").val(ui.item.category);
			$("#item_brand").val(ui.item.brand);
			$("#item_color").val(ui.item.color);
			$("#item_size").val(ui.item.size);
			$("#item_model").val(ui.item.model);
			item_class();
			$("#item_class").val(ui.item.class);

		},
		source: function(req, add){
			var term = $("#item_name").val();
			var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "sales/search_field/1", 
                dataType: "json",
                type: "POST",
                data: {'term' : term, csrf_name : csrf_name},
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

    $("#item_no").autocomplete({
		focus: function(event, ui){
			$("#item_name").val(ui.item.name);
			$("#item_type").val(ui.item.type);
			$("#item_category").val(ui.item.category);
			$("#item_class").val(ui.item.class);
			$("#item_brand").val(ui.item.brand);
			$("#item_color").val(ui.item.color);
			$("#item_size").val(ui.item.size);
			$("#item_model").val(ui.item.model);
		},
		select: function(event, ui){
			$("#item_name").val(ui.item.name);
			$("#item_type").val(ui.item.type);
			$("#item_category").val(ui.item.category);
			$("#item_brand").val(ui.item.brand);
			$("#item_color").val(ui.item.color);
			$("#item_size").val(ui.item.size);
			$("#item_model").val(ui.item.model);
			item_class();
			$("#item_class").val(ui.item.class);

		},
		source: function(req, add){
			var term = $("#item_name").val();
			var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "sales/search_field/2", 
                dataType: "json",
                type: "POST",
                data: {'term' : term, csrf_name : csrf_name},
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

    $("#item_model").autocomplete({
		focus: function(event, ui){
			$("#item_name").val(ui.item.item_name);
			$("#item_no").val(ui.item.item_no);
			$("#item_type").val(ui.item.type);
			$("#item_category").val(ui.item.category);
			$("#item_class").val(ui.item.class);
			$("#item_brand").val(ui.item.brand);
			$("#item_color").val(ui.item.color);
			$("#item_size").val(ui.item.size);
		},
		select: function(event, ui){
			$("#item_name").val(ui.item.item_name);
			$("#item_name").val(ui.item.item_no);
			$("#item_type").val(ui.item.type);
			$("#item_category").val(ui.item.category);
			$("#item_brand").val(ui.item.brand);
			$("#item_color").val(ui.item.color);
			$("#item_size").val(ui.item.size);

			item_class();
			$("#item_class").val(ui.item.class);
		},
		source: function(req, add){
			var term = $("#item_model").val();
			var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "sales/search_field/3", 
                dataType: "json",
                type: "POST",
                data: {'term' : term, csrf_name : csrf_name},
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

    $("#no_days").keyup(function(){
    	var no_days = $(this).val();
		var curr_date = new Date();
		curr_date.setDate(curr_date.getDate() + Number(no_days));
		var due_date = $.datepicker.formatDate("yy-mm-dd", curr_date);    	
		$("#due_date").val(due_date);
    });

})

function open_transaction(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "sales/open_transaction",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			if (result.result > 0){
				swal({
					type : "warning",
					title : "Yesterday Transaction is still open",
					text : "Please closed the transaction yesterday"
				}, function(){
					window.open(base_url + "app/1/0/6/", "_self");
				})
			}else{
				closed_transaction();
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});	
}

function closed_transaction(){
  var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "sales/closed_transaction",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			if (result.result > 0){
				swal({
					type : "warning",
					title : "Today's Transaction is already Closed"
				}, function(){
					window.open(base_url, "_self");
				})
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});	
}

function item_type(){
  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		type : "GET",
		dataType : "JSON",
		url : base_url + "sales/item_type",
		data : {csrf_name : csrf_name},
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.result;
			for (var i = 0; i < result.length; i++) {
				$("#item_type").append("<option value='"+result[i].id+"'>"+result[i].prod_type_desc+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function item_category(){
  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		type : "GET",
		dataType : "JSON",
		url : base_url + "sales/item_category",
		data : {csrf_name : csrf_name},
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#item_category").append("<option></option>");
			var result = data.result;
			for (var i = 0; i < result.length; i++) {
				$("#item_category").append("<option value='"+result[i].id+"'>"+result[i].category_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function item_class(){
  var csrf_name = $("input[name=csrf_name]").val();
  var item_category = $("#item_category").val();
  $("#item_class").find('option').not(':first').remove();

	$.ajax({
		type : "POST",
		dataType : "JSON",
		url : base_url + "sales/item_class",
		data : {csrf_name : csrf_name, item_category : item_category},
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#item_class").append("<option></option>");
			var result = data.result;
			for (var i = 0; i < result.length; i++) {
				$("#item_class").append("<option value='"+result[i].id+"'>"+result[i].class_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function item_brand(){
  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		type : "GET",
		dataType : "JSON",
		url : base_url + "sales/item_brand",
		data : {csrf_name : csrf_name},
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#item_brand").append("<option></option>");
			var result = data.result;
			for (var i = 0; i < result.length; i++) {
				$("#item_brand").append("<option value='"+result[i].id+"'>"+result[i].brand_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function item_color(){
  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		type : "GET",
		dataType : "JSON",
		url : base_url + "sales/item_color",
		data : {csrf_name : csrf_name},
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#item_color").append("<option></option>");
			var result = data.result;
			for (var i = 0; i < result.length; i++) {
				$("#item_color").append("<option value='"+result[i].id+"'>"+result[i].color_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function item_size(){
  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		type : "GET",
		dataType : "JSON",
		url : base_url + "sales/item_size",
		data : {csrf_name : csrf_name},
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#item_size").append("<option></option>");
			var result = data.result;
			for (var i = 0; i < result.length; i++) {
				$("#item_size").append("<option value='"+result[i].id+"'>"+result[i].size_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function max_transno(){
  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		url : base_url + "sales/max_transno",
		type : "GET",
		dataType : "JSON",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#sales_trans_no").text(data.data);
			$("#trasaction_trans_no").text(data.data);
		}, error: function(err){
			console.log(err.responseText);
		}
	});	
}

function customer(){
  var csrf_name = $("input[name=csrf_name]").val();
    var cust_code = $("#cust_code").val();
	$.ajax({
	    data : {cust_code : cust_code, csrf_name : csrf_name},
		url : base_url + "sales/customer",
		type : "POST",
		dataType : "JSON",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#cust_code").val(data.result[0].cust_code);
		    $("#cust_code").attr("data-id", data.result[0].id);
		    $("#cust_id").attr("data-id", data.result[0].id);
		}, error: function(err){
			console.log(err.responseText);
		}
	});
    
}

function currency(){

  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		url : base_url + "sales/currency",
		type : "GET",
		dataType : "JSON",
		data : {csrf_name : csrf_name},
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#currency").append("<option value='"+result[i].id+"'>"+result[i].curr_code	+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function payment_type(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		url : base_url + "sales/payment_type",
		type : "GET",
		dataType : "JSON",
		data : {csrf_name : csrf_name},
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#payment_type").append("<option value='"+result[i].id+"'>"+result[i].type_desc+"</option>");
			}
			$("#pay_hdr_type").val($("#payment_type :selected").text());
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function payment_term(){
  var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		url : base_url + "sales/payment_term",
		type : "GET",
		dataType : "JSON",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#payment_term").append("<option value='"+result[i].id+"'>"+result[i].payment_term+"</option>");
			}
			$("#payment_term").val("1");
		}, error : function(err){
			console.log(err.responseText);
		}
	});	
}

function bank_list(){
  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		url : base_url + "sales/bank_list",
		type : "GET",
		dataType : "JSON",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#bank_name").append("<option value='"+result[i].id+"'>"+result[i].bank_name+" ("+result[i].bank_code+")</option>");
			}
		}, error : function(err){	
			console.log(err.responseText);
		}
	});
}

function comp_bank(){

  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		url : base_url + "sales/comp_bank",
		type : "GET",
		dataType : "JSON",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#dep_bank").append("<option value='"+result[i].id+"' data-account='"+result[i].account_id+"'>"+result[i].bank_name+" ("+result[i].bank_code+")</option>");
			}
		}, error : function(err){	
			console.log(err.responseText);
		}
	});	
}

function discount(){
  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		url : base_url + "sales/discount",
		type : "GET",
		dataType : "JSON",
		success : function(data){
			var discount = "";
			var type = "";
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {

				if (result[i].sales_discount_percent != 0){
					discount = result[i].sales_discount_percent;
					type = "%";
				}else{
					discount = result[i].sales_discount_amount;
					type = "&#8369;";
				}

				$("#mod-select-discount").append("<option value='"+result[i].id+"' data-discount = '"+discount+"' data-type = '"+type+"'>"+result[i].sales_discount_name+"</option>");
			}			
		}, error : function(err){
			console.log(err.responseText);
		}
	})
	
}

function agent(id){
  var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {id : id, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Sales/agent",
		success : function(result){
			$("#partner").val(result.name);
			$("#partner").attr("data-id2",result.id);
			$("#partner").attr("data-id",result.id);
			$("#partner").attr("data-share",result.share);
			$("#partner").attr("data-account",result.account);
			$("#share_per").val(result.share);
			$("#partner_id").val(result.id);
			$("input[name=csrf_name]").val(result.token);
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function search_item(){    
	var item_type = $("#item_type").val();
	var item_category = $("#item_category").val();
	var item_class = $("#item_class").val();
	var item_brand = $("#item_brand").val();
	var item_color = $("#item_color").val();
	var item_size = $("#item_size").val();
	var item_model = $("#item_model").val();

	var item_no = $("#item_no").val();
	var item_name = $("#item_name").val();

    var selected = new Array();
    $("#tbl-products tbody tr").each(function(row, tr){
        selected[row] = {
            "item" : ( $(tr).find('.tbl_prod_id').text() ? parseInt($(tr).find('.tbl_prod_id').text()) : "000" )
        }
    });

    var item_array = JSON.stringify(selected);
	var csrf_name = $("input[name=csrf_name]").val();
    
	$.ajax({
		data : {item_no : item_no, item_name : item_name, item_type : item_type, item_category : item_category, item_class : item_class, item_brand : item_brand, item_color : item_color,
				item_size : item_size, item_model : item_model, item_array : item_array, csrf_name : csrf_name},
		url : base_url + "sales/search_item",
		type : "POST",
		dataType : "JSON",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-tbl-items").html(result.result);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function select_item(id){	
	$(".modal-backdrop").remove();
	$("#select_item_modal").modal("hide");
	$("#select_item_modal").find(":input").val("");
	var csrf_name = $("input[name=csrf_name]").val();
	$("#prod_id").val(id);
	$.ajax({
		data : {"id" : id, csrf_name : csrf_name},
		url : base_url + "sales/select_item",
		type : "POST",
		dataType : "JSON",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var qty = "";
			var uom = "";

			if (data.stock == "0"){
				qty = "";
				uom = "";
			}else{
				qty = $.number(data.qty, 2);
				uom = data.uom;
			}

			$("#prod_no").val(data.prod_no);
			$("#prod_name").val(data.prod_name);
			$("#stock_qty").val(qty);
			$("#stock_uom").val(uom);
			$("#sel_price").attr("data-vat",data.vat);
			
			if ($("#tbl_item_row").val() != ""){
			}else{
				$("#reg_price").val(data.price); /*-((data.discount))*/
    			var share =  $("#partner").attr("data-share");
    			$("#share_per").val(share);
    			$("#sel_price").val(data.price-((data.discount)));
    			$("#sel_price").attr("data-discount",(data.discount));
    			
			}

            var unserialized_files = data.picture;
            var href_url = base_url +'images/products/'+unserialized_files[0];		

			$("#image-box").css("background-image", "url('"+href_url+"')");
			$("#image-box").css("background-size", "70% 100%"); /*150px 150px*/
			$("#image-box").css("background-repeat", "no-repeat");//SΣτ.†θ.κιLL
			$("#image-box").css("background-position", "center");
		}, error: function(err){
			console.log(err.responseText);
		}
	});	
}


//computation
function compute_itemprice(){

	var reg_price = $("#reg_price").val();
	var sel_price = $("#sel_price").val();
	var qty = $("#qty").val();
	var volume_discount = $("#volume_discount").val();
	var volume_discount_per = $("#volume_discount_per").val();
	var share_per = $("#share_per").val();

	var item_price = "";
	var total_price = "";
	var total_selling_price = "";
	var share_amount = "";
	var total_item_price = "";

	if (Number(sel_price) != 0){
		item_price = sel_price;
	}else{
		item_price = reg_price;
	}

	total_price = item_price * qty;
	total_selling_price = total_price - volume_discount;
	share_amount = total_selling_price * (share_per / 100);
	total_item_price = total_selling_price - share_amount;

	if ($("#prod_no").val() != ""){
		$("#total_price").val(total_price);
		$("#total_selling_price").val(total_selling_price);
		$("#share_amount").val(share_amount);
		$("#pay_total_amount").val(total_item_price);
				
	}else{
		$("#sel_price").val("0");
		$("#qty").val("0");
		$("#volume_discount").val("0");
	}

}

function compute_grandtotal(){

	var total_selling_price = 0;
	var total_amount = 0;
	var vat = 0;
	var net_vat = 0;
	var share_amount = 0;
	var sales_discount = $("#sales_discount").val();
	
	$("#tbl-products tbody tr").each(function(row, tr){
		total_selling_price += Number(str_to_num($(tr).find(".tbl_total_selling_price").text()));
		total_amount += Number($(tr).find(".tbl_total_amount").text()); 
		vat += Number(str_to_num($(tr).find(".tbl_vat").text())); 
		net_vat +=  Number(str_to_num($(tr).find(".tbl_net_vat").text()));
		share_amount +=  Number(str_to_num($(tr).find(".tbl_share_amount").text()));
	});	

	var grand_total = total_selling_price - sales_discount;
	$("#total_selling").val($.number(total_selling_price, 2));
	$("#total_selling").attr("data-vat",vat);
	$("#total_selling").attr("data-net_vat",net_vat);
	$("#total_selling").attr("data-share_amount",share_amount);
	$("#total_vat").val(vat);
	$("#grand_total").val(grand_total);
	$("#payment_amount").val(grand_total);
}

//table action
function add_item_table(){
	var selling_raw = $("#total_selling_price").val() - $("#share_amount").val();
	var selling_price = $("#total_selling_price").val();
	var vat_percent = ($("#sel_price").attr("data-vat") / 100) + 1;
	var vat = selling_price - (selling_price / vat_percent);
	var net_vat = selling_raw-vat;

	// var vat_percent = ($("#sel_price").attr("data-vat") / 100);
	// var vat = selling_price * vat_percent;
	// var net_vat = selling_raw-vat;

	$("#tbl-products tbody").append("<tr class='item_row_table'>"+
	    "<td class='tbl_prod_no' style='width: 4%;' hidden>"+ $("#prod_no").val() +
		"</td><td class='tbl_prod_name' style='width: 30%;'>"+ $("#prod_name").val() +
		"</td><td class='tbl_qty text-center' style='width: 10%;'>"+ $.number($("#qty").val()) +
		"</td><td class='tbl_stock_uom text-center' style='width: 2.5%;'  hidden>"+ $("#stock_uom").val() +
		"</td><td class='tbl_reg_price' hidden>"+ $.number($("#reg_price").val(), 2) +
		"</td><td class='tbl_sel_price text-right px-2' style='width: 15%;'>"+ $.number($("#sel_price").val(), 2) +
		"</td><td class='tbl_total_price text-right' hidden>"+ $.number($("#total_price").val(), 2) +
		"</td><td class='tbl_volume_discount'  hidden>"+ $("#volume_discount").val() +
		"</td><td class='tbl_total_selling_price text-right px-2'  style='width: 20%;'>"+ $.number($("#total_selling_price").val(), 2) +
		"</td><td class='tbl_share_per' hidden>"+ $("#share_per").val() +
		"</td><td class='tbl_share_amount' hidden>"+ $("#share_amount").val() +
		"</td><td class='tbl_total_amount' hidden>"+ $.number($("#total_price").val(), 2) +
		"</td><td class='text-center text-red remove_item' style='width: 10%;'>"+ "<i class='fa fa-minus-circle remove_item_table' style='color:red;cursor:pointer;' id='remove_item_table'></i>" 
		+"<i class='fa fa-edit edit_item_table' style='color:red;cursor:pointer;' id='edit_item_table'></i>" +
		"</td><td class='tbl_prod_id' hidden>"+ $("#prod_id").val() +
		"</td><td class='tbl_volume_discount_per'  hidden>"+ $("#volume_discount_per").val() +
		"</td><td class='tbl_vat'  hidden>"+ $.number(vat, 2) +
		"</td><td class='tbl_net_vat'  hidden>"+ $.number(net_vat, 2) +
		"</td><td class='tbl_dis_id'  hidden>"+ $("#dis_id").val() +
		"</td><td class='tbl_agent_id'  hidden>"+ $("#partner_id").val() +
		"</td><td class='tbl_agent_name'  hidden>"+ $("#partner").attr("data-account") +
		"</td></tr>");

	compute_grandtotal();
	reset_input();
}

function select_row_table(row){
	var table = "#tbl-products tbody tr:eq("+row+")";
    $("#reg_price").val($(table).find(".tbl_reg_price").text());
	$("#sel_price").val($(table).find(".tbl_sel_price").text());
	$("#qty").val($(table).find(".tbl_qty").text());
	$("#total_price").val($(table).find(".tbl_total_price").text());
	$("#volume_discount").val($(table).find(".tbl_volume_discount").text());
	$("#volume_discount_per").val($(table).find(".tbl_volume_discount_per").text());
	$("#total_selling_price").val($(table).find(".tbl_total_selling_price").text());
	$("#share_per").val($(table).find(".tbl_share_per").text());
	$("#share_amount").val($(table).find(".tbl_share_amount").text());
	$("#pay_total_amount").val($(table).find(".tbl_total_amount").text());
	$("#dis_id").val($(table).find(".tbl_dis_id").text());
	$("#tbl_item_row").val(row);

	agent($(table).find(".tbl_agent_id").text());
}

function edit_item_table(){
    var selling_raw = $("#total_selling_price").val() - $("#share_amount").val();
	var selling_price = $("#total_selling_price").val();
	var vat_percent = ($("#sel_price").attr("data-vat") / 100) + 1;
	var vat = selling_price - (selling_price / vat_percent);
	var net_vat = selling_raw-vat;
	var row = $("#tbl_item_row").val();
	var table = "#tbl-products tbody tr:eq("+row+")";

	$(table).find(".tbl_prod_no").text($("#prod_no").val());
	$(table).find(".tbl_prod_name").text($("#prod_name").val());
	$(table).find(".tbl_qty").text($("#qty").val());
	$(table).find(".tbl_stock_uom").text($("#stock_uom").val());
	$(table).find(".tbl_reg_price").text($.number($("#reg_price").val(), 2));
	$(table).find(".tbl_sel_price").text($.number($("#sel_price").val(), 2));
	$(table).find(".tbl_total_price").text($("#total_price").val());
	$(table).find(".tbl_volume_discount").text($("#volume_discount").val());
	$(table).find(".tbl_volume_discount_per").text($("#volume_discount_per").val());
	$(table).find(".tbl_total_selling_price").text($.number($("#total_selling_price").val(), 2));
	$(table).find(".tbl_share_per").text($("#share_per").val());
	$(table).find(".tbl_share_amount").text($("#share_amount").val());
	$(table).find(".tbl_total_amount").text($.number($("#total_price").val(), 2));
	$(table).find(".tbl_prod_id").text($("#prod_id").val());
	$(table).find(".tbl_vat").text($.number(vat, 2));
	$(table).find(".tbl_net_vat").text($.number(net_vat, 2));
	$(table).find(".tbl_dis_id").text($("#dis_id").val());
	$(table).find(".tbl_agent_id").text($("#partner_id").val());
	$(table).find(".tbl_agent_name").text($("#partner").attr("data-account"));

	$("#tbl_item_row").val("");
	compute_grandtotal();
	reset_input();
}

//reset
function reset_input(){
	$("#prod_id").val("");
	$("#prod_no").val("");
	$("#prod_name").val("");
	$("#stock_qty").val("");
	$("#stock_uom").val("");
	$("#reg_price").val("");
	$("#sel_price").val("");
	$("#sel_price").attr("data-discount","");
	$("#sel_price").attr("data-vat","");
	$("#qty").val("");
	$("#total_price").val("");
	$("#volume_discount").val("");
	$("#volume_discount_per").val("");
	$("#total_selling_price").val("");
	$("#share_amount").val("");
	$("#share_per").val("");
	$("#pay_total_amount").val("");
	$("#dis_id").val("0");
	$("#mod-text-discount").val("0");
	$("#image-box").css("background", "white");
}

//save
function save_trans(){
      //var agent_id =  $('#pr_no_modal').val();
      var agent_id = $('#partner').attr("data-id");
      var cust_id =  $('#cust_code').attr("data-id");
      var sales_discount =  $('#sales_discount').val();
      var grand_total =  $('#grand_total').val();
      var comp_id = $("#comp_id").val();
      var outlet_id = $("#outlet_id").val();
      var trans_no = $("#sales_trans_no").text();
      var vat_amount =  $('#total_selling').attr("data-vat");
      var net_vat =  $('#total_selling').attr("data-net_vat");
      
      //for payment
      var bank_id = $('#bank_name').val();
      var payment_date = $('#payment_date').val();
      var payment_type_id = $('#payment_type').val();
      var payment_term = $('#payment_term').val();
      var check_card_no = $('#check_no').val();
      var check_date = $('#check_date').val();
      var curr_id = $('#currency').val();
      var amount = $('#payment_amount').val();
      var dep_bank = $('#dep_bank').val();
      var no_days = $('#no_days').val();
      var due_date = $('#due_date').val();

    var bool = true;
    
      var dtl_data = [];
      var sales_hdr = {
            comp_id : comp_id,
            outlet_id : outlet_id,
            customer_id : cust_id,
            agent_id : agent_id,
            trans_no : trans_no,
            sales_discount : sales_discount,
            total_amount : grand_total,
            vat_amount : vat_amount,
            net_vat : net_vat
      } 
      var row_count = $('#tbl-products tr').length -1;
      if(row_count == 0){
          swal({
              type : "warning",
              title : "Please input Products",
              timer : 2000
          });
          $("#save_trans").prop("disabled", false);
          return false;
          // bool = false;
      }
      
      // if(parseInt(amount) < parseInt(grand_total)) {
      //     swal({
      //         type : "warning",
      //         title : "Insufficient amount paid ",
      //         timer : 2000
      //     })
          
      //       return false;
      //       // bool = false;
      // }
      
      // if(jQuery.trim(payment_date).length <= 0 || jQuery.trim(amount).length <= 0) {
      //     swal({
      //         type : "warning",
      //         title : "Please fill up required fields in Payment Details",
      //         timer : 2000
      //     })
      //       return false;
      //       // bool = false;
      // }
      
      

       
      $('#tbl-products tr').each(function (row, tr){
                var sub = {
                    'product_id' : $(tr).find('td:eq(13)').text(),
                    'qty' : $(tr).find('td:eq(2) ').text(),
                    'selling_price' : $(tr).find('td:eq(5) ').text().replace(/,/g, ""),
                    'share' : $(tr).find('td:eq(9) ').text(),
                    'share_amount' : $(tr).find('td:eq(10) ').text(),
                    'total_amount' : $(tr).find('td:eq(11) ').text().replace(/,/g, ""),
                    'total_price' : $(tr).find('td:eq(6) ').text().replace(/,/g, ""),
                    'volume_discount' : $(tr).find('td:eq(7) ').text(),
                    'volume_discount_percent' : $(tr).find('td:eq(14) ').text(),
                    'total_selling_price' :$(tr).find('td:eq(8) ').text().replace(/,/g, ""),
                    'vat' :$(tr).find('td:eq(15) ').text().replace(/,/g, ""),
                    'net_vat' :$(tr).find('td:eq(16) ').text().replace(/,/g, ""),
                    'discount_id' : $(tr).find('.tbl_dis_id').text(),
                    'agent_id' : $(tr).find('.tbl_agent_id').text()
                } 
                dtl_data.push(sub);            
       }); 

      var payment_data = {
      		payment_date : payment_date,
            payment_type_id : payment_type_id,
            payment_term : payment_term,
            bank_id : bank_id,
            check_card_no : check_card_no,
            check_date : check_date,
            curr_id : curr_id,
            amount : amount,
            dep_bank : dep_bank,
            no_days : no_days,
            due_date : due_date
      }
      
      dtl_data.shift();
	  var csrf_name = $("input[name=csrf_name]").val();
      var data = {sales_hdr:sales_hdr, sales_dtl: dtl_data,payment_dtl:payment_data, csrf_name : csrf_name};
      // console.log(data);
      //modal_trans_data();
            $.ajax({
                data : data 
                , type: "POST"
                , url: base_url + "sales/save_transaction"
                , dataType: 'JSON'
                , crossOrigin: false  
                , beforeSend : function() {
                    swal({
                        title : "Saving.....",
                        showCancelButton: false, 
                        showConfirmButton: false           
                    })
                }
                , success: function(result) {
					$("input[name=csrf_name]").val(result.token);
                	swal.close();
                	modal_trans_data();
	                // setTimeout(function(){ 
	                //   location.reload();
	                // }, 5000);              

            		// swal({
            		// 	title: "Successfully Insert",
            		// 	type: "success",
            		// 	timer: 2000
            		// }, function(){
            		// 	location.reload();
            		// });
                }, error: function(err) {
                    console.log(err.responseText);
                }
            });  
      
}

//modal data
function modal_trans_data(){
    
	$("#mod_trans_no").text($("#sales_trans_no").text());
	$("#mod_payment_type").text($("#pay_hdr_type").val());
	$("#mod_total_sales").text((Number($("#sales_discount").val()) + Number($("#grand_total").val())));
	$("#mod_discount").text($("#sales_discount").val());
	$("#mod_grand_total").text($("#grand_total").val());
	$("#mod_amount_paid").text($("#payment_amount").val());
	$("#mod_change").text(($("#payment_amount").val() - $("#grand_total").val()));
	$("#mod_partner").text($("#partner").val());
	$("#mod_share").text($("#total_selling").attr("data-share_amount"));
	$("#mod_share_per").text($("#partner").attr("data-share"));

	$("#mod_share").number(true,2);
	$("#mod_total_sales").number(true,2);
	$("#mod_discount").number(true,2);
	$("#mod_grand_total").number(true,2);
	$("#mod_change").number(true,2);
	$("#mod_amount_paid").number(true,2);
	$("#trans_modal").modal("show");

}

function preview_data(){
	$("#mod_prev_tbl tbody").empty();
	$("#mod_prev_trans_no").text($("#sales_trans_no").text());
	$("#mod_prev_customer").text($("#cust_code").val() + " " + $("#cust_name").val());
	$("#mod_prev_term").text($("#payment_term :selected").text());
	$("#mod_prev_due_date").text($("#due_date").val() == "" ? (convert_date($("#payment_date").val())) : convert_date($("#due_date").val())); //$.datepicker.formatDate('mm/dd/yy', new Date($("#payment_date").val()) )
	$("#mod_prev_pay_date").text(convert_date($("#payment_date").val()));
	$("#mod_prev_pay_type").text($("#payment_type :selected").text());
	$("#mod_prev_currency").text($("#currency :selected").text());
	// $("#tbl-products").clone().appendTo("#div-tbl-prev-items");
	// $("#div-tbl-prev-items").find(".remove_item").remove();
	// $("#div-tbl-prev-items").find(".remove_hdr").remove();
// 	$("#tbl-products thead th:nth-child(9)").css("width", "22%");
// 	$("#tbl-products tbody td:nth-child(9)").css("width", "22%");
	var total_discount = 0;
	var total_price = 0;
	var total_amount = 0;
	
      $('#tbl-products tbody tr').each(function (row, tr){

      		total_price += Number($(tr).find('.tbl_sel_price').text().replace(/,/g, "")); 
      		total_discount += Number($(tr).find('.tbl_volume_discount').text().replace(/,/g, "")); 
      		total_amount += Number($(tr).find('.tbl_total_selling_price').text().replace(/,/g, "")); 


      		$("#mod_prev_tbl tbody").append("<tr><td style='width : 8%'>" + $(tr).find('.tbl_prod_no').text() + 
      			"</td><td style='width: 30%;'>" + $(tr).find('.tbl_prod_name').text() + 
      			"</td><td style='width: 10%;'>" + $(tr).find('.tbl_agent_name').text() + 
      			"</td><td style='width: 5%;' class='text-center'>" + $(tr).find('.tbl_qty').text() + 
      			"</td><td style='width: 5%;' class='text-center'>" + $(tr).find('.tbl_stock_uom').text() + 
      			"</td><td style='width: 7%;' class='text-right'>" + $(tr).find('.tbl_sel_price').text() + 
      			"</td><td style='width: 10%;' class='text-right'>" + $(tr).find('.tbl_total_price').text() + 
      			"</td><td style='width: 10%;' class='text-right'>" + $(tr).find('.tbl_volume_discount').text() + 
      			"</td><td style='width: 10%;' class='text-right'>" + $(tr).find('.tbl_total_selling_price').text() + 
      			"</td></tr>");
       }); 

      $("#mod_prev_tbl").append("<tr><td style='width: 8%;' class=' border border-0'>"+
		"</td><td style='width: 30%;' class=' border border-0'>" +  
		"</td><td style='width: 10%;' class=' border border-0'>" +  
		"</td><td style='width: 5%;' class='text-center border border-0'>" +  
		"</td><td style='width: 5%;' class='text-center border border-0'>" +  
		"</td><td style='width: 7%;' class='text-right border border-0 pr-2 font-weight-600'> TOTAL"  +
		"</td><td style='width: 10%;' class='text-right bg-button'>" + $.number(total_amount, 2) + 
		"</td><td style='width: 10%;' class='text-right bg-button'>" + $.number(total_discount, 2) + 
		"</td><td style='width: 10%;' class='text-right bg-button'>" + $.number(total_amount, 2) + 
      	"</td></tr>")

      $("#mod_prev_tbl").append("<tr><td style='width: 8%;' class=' border border-0'>"+
		"</td><td style='width: 30%;' class=' border border-0'>" +  
		"</td><td style='width: 10%;' class=' border border-0'>" +  
		"</td><td style='width: 5%;' class='text-center border border-0'>" +  
		"</td><td style='width: 5%;' class='text-center border border-0'>" +  
		"</td><td style='width: 7%;' class='text-right border border-0 pr-2'>"  +
		"</td><td style='width: 20%;' class='text-right font-weight-600 border border-0 pr-2'> Transaction Discount" + 
		"</td><td style='width: 10%;' class='text-right '>" + ($("#sales_discount").val() == "" ? "0.00" : $("#sales_discount").val()) + 
      	"</td></tr>")

      $("#mod_prev_tbl").append("<tr><td style='width: 8%;' class=' border border-0'>"+
		"</td><td style='width: 30%;' class=' border border-0'>" +  
		"</td><td style='width: 10%;' class=' border border-0'>" +  
		"</td><td style='width: 5%;' class='text-center border border-0'>" +  
		"</td><td style='width: 5%;' class='text-center border border-0'>" +  
		"</td><td style='width: 7%;' class='text-right border border-0 pr-2'>"  +
		"</td><td style='width: 10%;' class='text-right border border-0'>" + 
		"</td><td style='width: 10%;' class='text-right font-weight-600 border border-0 pr-2'> Sub Total" + 
		"</td><td style='width: 10%;' class='text-right '>" + $("#total_selling").val() + 
      	"</td></tr>")

      $("#mod_prev_tbl").append("<tr><td style='width: 8%;' class=' border border-0'>"+
		"</td><td style='width: 30%;' class=' border border-0'>" +  
		"</td><td style='width: 10%;' class=' border border-0'>" +  
		"</td><td style='width: 5%;' class='text-center border border-0'>" +  
		"</td><td style='width: 5%;' class='text-center border border-0'>" +  
		"</td><td style='width: 7%;' class='text-right border border-0 pr-2'>"  +
		"</td><td style='width: 10%;' class='text-right border border-0'>" + 
		"</td><td style='width: 10%;' class='text-right font-weight-600 border border-0 pr-2'> VAT Amount" + 
		"</td><td style='width: 10%;' class='text-right '>" + $.number($("#total_vat").val(), 2) + 
      	"</td></tr>")

      $("#mod_prev_tbl").append("<tr><td style='width: 8%;' class=' border border-0'>"+
		"</td><td style='width: 30%;' class=' border border-0'>" +  
		"</td><td style='width: 10%;' class=' border border-0'>" +  
		"</td><td style='width: 5%;' class='text-center border border-0'>" +  
		"</td><td style='width: 5%;' class='text-center border border-0'>" +  
		"</td><td style='width: 7%;' class='text-right border border-0'>"  +
		"</td><td style='width: 10%;' class='text-right border border-0'>" + 
		"</td><td style='width: 10%;' class='text-right bg-button font-weight-600 border border-0 pr-2'> Total" + 
		"</td><td style='width: 10%;' class='text-right bg-button'>" + $.number($("#grand_total").val(), 2) + 
      	"</td></tr>")


	$("#mod_prev_discount").number(true,2);
	$("#mod_prev_grand_total").number(true,2);
	$("#preview_modal").modal("show");
}

function close_modal(){
	$("#div-tbl-prev-items").empty();
}

function close_trans_modal(){
	location.reload();
}









