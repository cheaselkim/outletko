$(document).ready( function() {

    $(".btn-enter").hide();
    $(".btn-exit").hide();
    $("#qty").number(true, 0);
    $("#cost").number(true, 2);
    $("#net_vat").number(true, 2);
    $("#tot_w_vat").number(true, 2);
    $("#tot_w_o_vat").number(true, 2);
    $("#uc_w_vat").number(true, 2);
    $("#uc_w_o_vat").number(true, 2);
    $("#prod_qty_received_transfer").number(true, 0);
    $("#prod_qty_issued_transfer").number(true, 0);
    $("#prod_unit_price_transfer").number(true, 2);
    $("#prod_total_amount_transfer").number(true, 2);
    $("#receive_no").prop("disabled", true);
    $("#cost").prop("readonly", true);
    $("#div-prod-transfer-dtl-1").hide();
    $("#div-prod-transfer-dtl-2").hide();
    $("#tbl-transfer-products").hide();

    trans_type();
    currency();
    account_currency();

    var window_width = $(document).width();

    if (window_width < 800){
        $("#rtn_qty").text("Rtn Qty");
        $("#iss_qty").text("Qty Iss");
        $("#rcvd_qty").text("Qty Rcvd");
        $("#pre-rtn-qty").text("Rtn Qty");
        $("#pre-iss-qty").text("Qty Iss");
        $("#pre-rcvd-qty").text("Qty Rcvd");
        $("#div-receive-inventory").css("padding-left", "0px");
        $("#div-receive-inventory").css("padding-right", "0px");
    }else{
        $("#rtn_qty").text("Returned Qty");
        $("#iss_qty").text("Qty Issued");
        $("#rcvd_qty").text("Qty Received");
        $("#pre-rtn-qty").text("Returned Qty");
        $("#pre-iss-qty").text("Qty Issued");
        $("#pre-rcvd-qty").text("Qty Received");
    }

    $("#btn_outlet").click(function(){

        setTimeout(function(){ 
            session_outlet();
         }, 2000);
        
    });

    $("#create_recipient").click(function(){
        var trans_type = $("#trans_type").val();

        if (trans_type == "1"){
            window.open(base_url + "/app/4/7/1", "_self");
        }else if (trans_type == "2"){
            window.open(base_url + "/app/2/0/1", "_self");
        }else{
            window.open(base_url + "/app/4/7/1", "_self");
        }

    });

    $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find('.text-img'),
            log = label;
        
        if( input.length ) {
            input.text(log);
        } else {
            if( log ) alert(log);
        }
    
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
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
        reset_input()
        $(".btn-enter").hide();
        $(".btn-exit").hide();
        $(".prod_entry").collapse('hide');
    }); 

    $("#sales_register").click(function(){
        sales_register();
    });

    $("#sales_register_search").click(function(){
        sales_register();
    });

    $("#enter_item").click(function(){
        var trans_type = $("#trans_type").val();
        if (trans_type == "2"){
            if ($("#prod_qty_received_transfer").val() != 0 && $("#prod_unit_price_transfer").val() != 0){
                if ($("#tbl_item_row").val() != ""){
                    edit_item_table();
                }else{
                    add_item_table();
                }
            }else{
                swal({
                    type : "error",
                    title : "Fill up required fields!"
                });
            }
        }else{
            if ($("#qty").val() != 0 && $("#cost").val() != 0){
                if ($("#tbl_item_row").val() != ""){
                    edit_item_table();
                }else{
                    add_item_table();
                }
            }else{
                swal({
                    type : "error",
                    title : "Fill up required fields!"
                });
            }            
        }

    }); 

    jQuery(document).on("click", ".remove_item_table", function(){
        $(this).closest("tr").remove(); 
        setTimeout(
          function() 
          {
            reset_input();
            $("#tbl_item_row").val("");
          }, 400);
    }); 

    //AUTOCOMPLETE FOR RECIPIENT
    $("#outlet_code").keyup(function(){
        if ($(this).val() == ""){
            $("#outlet_name").val("");
            $("#outlet_code").val("");
            $("#outlet_code").attr('data-type_1', "");
            $("#outlet_code").attr('data-id', "");
        }
    });

    $("#outlet_name").keyup(function(){
        if ($(this).val() == ""){
            $("#outlet_name").val("");
            $("#outlet_code").val("");
            $("#outlet_code").attr('data-type_1', "");
            $("#outlet_code").attr('data-id', "");
        }
    });

    $("#outlet_code").autocomplete({
        focus: function(event, ui){
            $("#outlet_name").val(ui.item.outlet_name);
        },
        select: function(event, ui){
            $("#outlet_name").val(ui.item.outlet_name);
            $("#outlet_code").attr('data-type_1',ui.item.type1);
            $("#outlet_code").attr('data-id',ui.item.id);
        },
        source: function(req, add){
            var outlet_code = $("#outlet_code").val();
            var trans_type = $("#trans_type").val();
            var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "/inventory_receive/search_outlet/"+ 1 , 
                dataType: "json",
                type: "POST",
                data: {keyword : outlet_code, trans_type : trans_type, csrf_name : csrf_name},
                success: function(data){
                    $("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                        add('');
                    }
                }, error: function(request, status, error){
                    console.log(error);
                    console.log("Error: " + request.responseText);
                }
            });
        }
    });  

    $("#outlet_name").autocomplete({
        focus: function(event, ui){
            $("#outlet_code").val(ui.item.outlet_code);
        },
        select: function(event, ui){
            $("#outlet_code").val(ui.item.outlet_code);
            $("#outlet_code").attr('data-type_1',ui.item.type1);
            $("#outlet_code").attr('data-id',ui.item.id);
        },
        source: function(req, add){
            var outlet_name = $("#outlet_name").val();
            var trans_type = $("#trans_type").val();
            var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "inventory_receive/search_outlet/"+2, 
                dataType: "json",
                type: "POST",
                data: {keyword : outlet_name, trans_type : trans_type, csrf_name : csrf_name},
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

    $("#sales_register_cust_code").autocomplete({
        focus: function(event, ui){
            $("#sales_register_cust_code").val(ui.item.outlet_name);
        },
        select: function(event, ui){
            $("#sales_register_cust_name").val(ui.item.outlet_name);
            $("#sales_register_cust_code").attr('data-id',ui.item.id);
        },
        source: function(req, add){
            var outlet_code = $("#cust_code").val();
            var trans_type = $("#trans_type").val();
            var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "/inventory_receive/search_outlet/"+ 1 , 
                dataType: "json",
                type: "POST",
                data: {keyword : outlet_code, trans_type : trans_type, csrf_name : csrf_name},
                success: function(data){
                    $("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                        add('');
                    }
                }, error: function(request, status, error){
                    console.log(error);
                    console.log("Error: " + request.responseText);
                }
            });
        }
    });  

    $("#sales_register_cust_name").autocomplete({
        focus: function(event, ui){
            $("#sales_register_cust_code").val(ui.item.outlet_code);
        },
        select: function(event, ui){
            $("#sales_register_cust_code").val(ui.item.outlet_code);
            $("#sales_register_cust_code").attr('data-id',ui.item.id);
        },
        source: function(req, add){
            var outlet_name = $("#sales_register_cust_name").val();
            var trans_type = $("#trans_type").val();
            var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "inventory_receive/search_outlet/"+2, 
                dataType: "json",
                type: "POST",
                data: {keyword : outlet_name, trans_type : trans_type, csrf_name : csrf_name},
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

    $("#sales_register_agent").autocomplete({
        focus: function(event, ui){
            $("#sales_register_agent").attr("data-id",ui.item.id);
        },
        select: function(event, ui){
            $("#sales_register_agent").attr("data-id",ui.item.id);
        },
        source: function(req, add){
            var csrf_name = $("input[name=csrf_name]").val();
            var partner = $("#sales_register_agent").val();
            $.ajax({
                url: base_url + "sales/search_partner", 
                dataType: "json",
                type: "POST",
                data: {'partner' : partner, csrf_name  : csrf_name},
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


    //AUTOCOMPLETE FOR PRODUCT
    $("#prod_no").keyup(function(){
        if ($(this).val() == ""){
            $("#prod_name").val("");
        }
    });

    $("#prod_name").keyup(function(){
        if ($(this).val() == ""){
            $("#prod_no").val("");
        }
    });

    $("#prod_no").autocomplete({
        focus: function(event, ui){
            $("#prod_name").val(ui.item.prod_name);
            $("#prod_unit").val(ui.item.prod_unit);
            $("#prod_no").attr("data-id", ui.item.prod_id);
        },
        select: function(event, ui){
            $("#prod_name").val(ui.item.prod_name);
            $("#prod_no").attr("data-id", ui.item.prod_id);
            $("#prod_unit").val(ui.item.prod_unit);

            if ($("#trans_type").val() == "1"){
                $("#cost").val(ui.item.unit_price);
            }
        },
        source: function(req, add){
            var csrf_name = $("input[name=csrf_name]").val();
            var prod_no = $("#prod_no").val();
            $.ajax({
                url: base_url + "inventory_receive/search_item/"+1, 
                dataType: "json",
                type: "POST",
                data: {'prod' : prod_no, csrf_name : csrf_name},
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

    $("#prod_name").autocomplete({
        focus: function(event, ui){
            $("#prod_no").val(ui.item.prod_no);
            $("#prod_no").attr("data-id", ui.item.prod_id);
            $("#prod_unit").val(ui.item.prod_unit);
            if ($("#trans_type").val() == "1"){
                $("#cost").val(ui.item.unit_price);
            }

        },
        select: function(event, ui){
            $("#prod_no").val(ui.item.prod_no);
            $("#prod_unit").val(ui.item.prod_unit);
            $("#prod_no").attr("data-id", ui.item.prod_id);

            if ($("#trans_type").val() == "1"){
                $("#cost").val(ui.item.unit_price);
            }

        },
        source: function(req, add){
            var prod_name = $("#prod_name").val();
            var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "inventory_receive/search_item/"+2, 
                dataType: "json",
                type: "POST",
                data: {'prod' : prod_name, csrf_name : csrf_name},
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

    $("#prod_no_transfer").autocomplete({
        focus: function(event, ui){
            $("#prod_name_transfer").val(ui.item.prod_name);
            $("#prod_unit_transfer").val(ui.item.prod_unit);
            $("#prod_no_transfer").attr("data-id", ui.item.prod_id);
        },
        select: function(event, ui){
            $("#prod_name_transfer").val(ui.item.prod_name);
            $("#prod_unit_transfer").val(ui.item.prod_unit);
            $("#prod_no_transfer").attr("data-id", ui.item.prod_id);
            $("#prod_unit_price_transfer").val(ui.item.unit_price);

        },
        source: function(req, add){
            var csrf_name = $("input[name=csrf_name]").val();
            var prod_no = $("#prod_no_transfer").val();
            $.ajax({
                url: base_url + "inventory_receive/search_item/"+1, 
                dataType: "json",
                type: "POST",
                data: {'prod' : prod_no, csrf_name : csrf_name},
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

    $("#prod_name_transfer").autocomplete({
        focus: function(event, ui){
            $("#prod_no_transfer").val(ui.item.prod_no);
            $("#prod_no_transfer").attr("data-id", ui.item.prod_id);
            $("#prod_unit_transfer").val(ui.item.prod_unit);
            $("#prod_unit_price_transfer").val(ui.item.unit_price);
        },
        select: function(event, ui){
            $("#prod_no_transfer").val(ui.item.prod_no);
            $("#prod_no_transfer").attr("data-id", ui.item.prod_id);
            $("#prod_unit_transfer").val(ui.item.prod_unit);
            $("#prod_unit_price_transfer").val(ui.item.unit_price);
        },
        source: function(req, add){
            var csrf_name = $("input[name=csrf_name]").val();
            var prod_name = $("#prod_name_transfer").val();
            $.ajax({
                url: base_url + "inventory_receive/search_item/"+2, 
                dataType: "json",
                type: "POST",
                data: {'prod' : prod_name, csrf_name : csrf_name},
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

    jQuery(document).on("click", ".item_row_table", function(){
        var row = $(this).closest("tr").index();
        var id = $(this).closest("tr").find(".tbl_prod_id").text();
        select_row_table(row);
    }); 

    $("#trans_type").change(function(){
        transaction_type();
        max_transno();
        sales_returns();
        $("#tbl-products tbody").empty();
        $("#outlet_code").attr('data-id', "");
        $("#outlet_code").attr('data-type_1', "");
        $("#outlet_code").val("");
        $("#outlet_name").val("");
        $("#trans_no").val("");
        $("#trans_date").val("");
        $("#remarks").val("");
        $("#outlet_name").prop("readonly", false);
        $("#outlet_code").prop("readonly", false);
        $("#trans_no").prop("readonly", false);
        $("#trans_date").prop("readonly", false);
        $("#remarks").prop("readonly", false);
    });

    $("#prod_transfer_continue").click(function(){
        get_product_transfer($("#issuance_no").val());
    });

    $("#sales_register_continue").click(function(){
        $("#modal_sales_register").modal("hide");
        sales_register_add_table();
    });

    $("#sales_register_cancel").click(function(){
        $("#modal_sales_register").modal("hide");
    });

    $("#sales_returns_continue").click(function(){
        $("#sales_returns_modal").modal("hide");
        sales_returns_details();
    });

    $("#sales_returns_cancel").click(function(){
        $("#sales_returns_modal").modal("hide");
    });

    jQuery(document).on("click", ".sales_row_table", function(){
        $("#sales_returns_row").val($(this).closest("tr").index());
        $("#sales_returns_type").val("2");

        if ($(this).closest("tr").find(".tbl-reference").text() == ""){
            var row = $(this).closest("tr").index();
            var id = $(this).closest("tr").find(".tbl-prod-id").text();
            select_row_table(row);            
        }else{
            edit_sales_returns($(this).closest("tr").index());
        }
    }); 

    jQuery(document).on("click", ".sales_register_remove", function(){
        $(this).closest("tr").remove(); 
        setTimeout(
          function() 
          {
            $("#sales_returns_row").val("");
            $("#sales_returns_type").val("");
            $("#sales_returns_modal").modal("hide");
          }, 400);

    }); 


    $("#cost").keyup(function(){
        compute_vat();
    });

    $("#vat").change(function(){
        compute_vat();
    });

    $("#qty").keyup(function(){
        compute_vat();
    });

    $("#prod_qty_received_transfer").keyup(function(){
        compute_vat();
    });

    $("#cancel").click(function(){
        window.open(base_url, "_self");
    });

    $("#preview").click(function(){
        preview();
    });

    $("#save").click(function(){
        $(this).prop("disabled", true);
        check_required_fields();
    });

});

function session_outlet(){
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {csrf_name : csrf_name},
        type : "GET",
        dataType : "JSON",
        url : base_url + "inventory_receive/session_outlet",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            $("#outlet_rec").val(data.data);
        }, error : function(err){
            console.log(err.responseText);
        }
    })
}

function trans_type(){
    var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
        type : "GET",
        dataType : "JSON",
        url : base_url + "inventory_receive/trans_type",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            var result = data.data;
            for (var i = 0; i < result.length; i++) {
                $("#trans_type").append("<option value='"+result[i].id+"'>"+result[i].inventory_ref_type+"</option>");
            }
            $("#tbl-products").hide();
            $("#tbl-sales-products").show();
            max_transno();
            sales_returns();
        }, error : function(err){
            console.log(err.responseText);
        }
    });    
}

function currency(){
    var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
        type : "GET",
        dataType : "JSON",
        url : base_url + "inventory_receive/currency",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            var result = data.data;
            for (var i = 0; i < result.length; i++) {
                $("#currency").append("<option value='"+result[i].id+"'>"+result[i].curr_code   +"</option>");
            }
        }, error : function(err){
            console.log(err.responseText);
        }
    });
}

function account_currency(){
    var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
        type : "GET",
        dataType : "JSON",
        url : base_url + "inventory_receive/account_currency",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            $("#account_currency").val(data.data);
        }, error : function(err){
            console.log(err.responseText);
        }
    });    
}

function max_transno(){
    var csrf_name = $("input[name=csrf_name]").val();
    var trans_type = $("#trans_type").val();

    $.ajax({
        data : {trans_type : trans_type, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "inventory_receive/max_transno",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            $("#receive_no").val(data.data);
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function sales_returns(){
    var trans_type = $("#trans_type").val();

    if (trans_type == "1"){
        $("#div-type-action").show();
        $("#div-sales-register").show();
        $("#div-btn-item").removeClass("col-md-6");
        $("#div-btn-item").addClass("col-md-2");
    }else{
        $("#div-type-action").hide();
        $("#div-sales-register").hide();
        $("#div-btn-item").removeClass("col-md-4");
        $("#div-btn-item").addClass("col-md-6");
    }
}

function sales_register(){
    $("#modal_sales_register").modal("show");

    var trans_date = $("#sales_register_trans_date").val();
    var trans_no = $("#sales_register_trans_no").val();
    var cust_id = $("#cust_code").attr("data-id");
    var agent_id = $("#agent").attr("data-id");
    var arr_id = new Array();

    $('#tbl-sales-products tbody tr').each(function (row, tr){
        arr_id[row] = $(tr).find(".tbl-id").text();
    });    

 
    $("#sales_register_hdr").html("");
    $("#sales_register_dtl").html("");
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {trans_date : trans_date, trans_no : trans_no, cust_id : cust_id, agent_id : agent_id, arr_id : arr_id, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "inventory_receive/sales_register",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            $("#sales_register_hdr").html(result.result);
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function sales_register_products(id){
    var arr_id = new Array();
    var csrf_name = $("input[name=csrf_name]").val();
    var window_width = $(document).width();

    $('#tbl-sales-products tbody tr').each(function (row, tr){
        arr_id[row] = $(tr).find(".tbl-id").text();
    });    


    $.ajax({
        data : {id : id, arr_id : arr_id, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "inventory_receive/sales_register_products",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            $("#sales_register_dtl").html(result.result);
            if (window_width < 800){
                $(document).find("#sales-rtn").text("Rtn");
            }
        }, error : function(err){
            console.log(err.responseText);
        }
    })
}

function return_sales($id, $key){
    $("#sales_returns_modal").modal("show");
    $("#sales_returns_row").val($key);
    $("#sales_returns_type").val("1");
    // $("#sales_returns_qty").val($("#tbl-sales-register-dtl tbody tr:eq("+$key+")").find(".tbl-qty").text());
    $("#sales_returns_unit").val($("#tbl-sales-register-dtl tbody tr:eq("+$key+")").find(".tbl-unit").text());
}

function edit_sales_returns($key){
    $("#sales_returns_qty").val($("#tbl-sales-products tbody tr:eq("+$key+")").find(".tbl-qty-return").text());
    $("#sales_returns_unit").val($("#tbl-sales-products tbody tr:eq("+$key+")").find(".tbl-unit").text());
    $("#sales_returns_product_grade").val($("#tbl-sales-products tbody tr:eq("+$key+")").find(".tbl-prod-grade").text());
    $("#sales_returns_date").val($("#tbl-sales-products tbody tr:eq("+$key+")").find(".tbl-date-return").text());
    $("#sales_returns_reason").val($("#tbl-sales-products tbody tr:eq("+$key+")").find(".tbl-reason").text());
    $("#sales_returns_modal").modal("show");
}

function sales_returns_details(){
    var row = $("#sales_returns_row").val();
    var type = $("#sales_returns_type").val();
    var table = "";

    if (type == "1"){
        table = "#tbl-sales-register-dtl tbody tr:eq("+row+")";
    }else{
        table = "#tbl-sales-products tbody tr:eq("+row+")";
    }

    $(table).find(".tbl-qty-return").text($("#sales_returns_qty").val());
    $(table).find(".tbl-prod-grade").text($("#sales_returns_product_grade").val());
    $(table).find(".tbl-date-return").text($("#sales_returns_date").val());
    $(table).find(".tbl-reason").text($("#sales_returns_reason").val());

}

function sales_register_add_table(){

    var unit_price = "";
    var vat_cost = "";
    var vat = "";
    var total_amount = "";
    var qty = "";
    var total_vat = 0;
    var total_net_vat = 0;
    var total_w_vat = 0;
    var total_w_o_vat = 0;
    var unit_vat = 0;
    var unit_price_w_vat = 0;
    var unit_price_w_o_vat = 0;

    $('#tbl-sales-register-dtl tbody tr').each(function (row, tr){
        var tbl_qty_return = $(tr).find(".tbl-qty-return").text() == '' ? 0 : Number($(tr).find(".tbl-qty-return").text());

        if (tbl_qty_return != 0){

            var qty = $(tr).find(".tbl-qty-return").text();
            var unit_price = $(tr).find(".tbl-unit-price").text();
            var vat_cost = Number($(tr).find(".tbl-vat").text());

            if (vat_cost != 0){
                vat = "1";
            }else{
                vat = "0";
            }

            if (vat == "1"){
                unit_vat = unit_price * 0.12;
                unit_price_w_vat = unit_price;
                unit_price_w_o_vat = unit_price / 1.12;
            }else{
                total_vat = 0;
                unit_price_w_o_vat = unit_price;
                unit_price_w_vat = unit_price * 1.12;
            }

            total_w_vat = qty * Number(unit_price_w_vat).toFixed(2);
            total_w_o_vat = qty * Number(unit_price_w_o_vat).toFixed(2);
            total_vat = Number(total_w_vat).toFixed(2) - Number(total_w_o_vat).toFixed(2);



            $("#tbl-sales-products").append("<tr class='sales_row_table cursor-pointer'>"+
                "<td style='width: 2.5%;' class='tbl-prod-no'>" + $(tr).find(".tbl-prod-no").text() + 
                "</td><td style='width: 7%;' class='tbl-prod-name d-none d-lg-table-cell'>" + $(tr).find(".tbl-prod-name").text() + 
                "</td><td style='width: 2%;' class='tbl-qty-return'>" + $(tr).find(".tbl-qty-return").text() + 
                "</td><td style='width: 1.5%;' class='tbl-unit  d-none d-lg-table-cell'>" + $(tr).find(".tbl-unit").text() + 
                "</td><td style='width: 1.5%;' class='tbl-reference  d-none d-lg-table-cell'>" + $(tr).find(".tbl-reference").text() + 
                "</td><td style='width: 1.5%;' class='tbl-date-return' hidden>" + $(tr).find(".tbl-date-return").text() + 
                "</td><td style='width: 1.5%;'class='tbl-prod-grade' hidden>" + $(tr).find(".tbl-prod-grade").text() + 
                "</td><td style='width: 1.5%;' class='tbl-reason' hidden>" + $(tr).find(".tbl-reason").text() + 
    
                "</td><td style='width: 1%;' class='tbl_curr text-left  d-none d-lg-table-cell' hidden data-id = '"+ $("#account_currency").val() +"'>"+ $("#account_currency").val() +
                "</td><td style='width: 1%;' class='tbl_purchase text-left' hidden>"+ $(tr).find(".tbl-unit-price").text() +
                "</td><td style='width: 1%;' class='tbl_vat text-center' hidden data-id = '"+vat+"'>"+ vat +
                "</td><td style='width: 2%;' class='tbl_total_price text-left' hidden>"+ $.number((qty * unit_price), 2) +
                "</td><td style='width: 1%;' class='tbl_net_vat text-left' hidden>"+ $.number(total_vat, 2) +
                "</td><td style='width: 1%;' class='tbl_w_vat text-center' hidden>"+ $.number(total_w_vat, 2) +
                "</td><td style='width: 2%;' class='tbl_w_o_vat text-left' hidden>"+ $.number(total_w_o_vat, 2) +
                "</td><td style='width: 1%;' class='tbl_uc_w_vat text-center' hidden>"+ $.number(unit_price_w_vat, 2) +
                "</td><td style='width: 2%;' class='tbl_uc_w_o_vat text-left' hidden>"+ $.number(unit_price_w_o_vat, 2) +

                "</td><td style='width: 1.5%;' class='tbl-id' hidden>" + $(tr).find(".tbl-id").text() + 
                "</td><td style='width: 1.5%;' class='tbl-prod-id' hidden>" + $(tr).find(".tbl-prod-id").text() + 
                "</td><td style='width: 1%;' class='text-center text-red sales_register_remove'>"+ "<i class='fa fa-minus-circle sales_register_remove' style='color:red;cursor:pointer;' id='sales_register_remove'></i>" +
                "</tr>");
        }        

    });


}

function add_item_table(){
    var tran_type = $("#trans_type").val();
    var qty = $("#qty").val();
    var cost = $("#cost").val();
    var prod = qty * cost;

    if (tran_type == "1"){
        $("#tbl-sales-products tbody").append("<tr class='sales_row_table cursor-pointer'>"+
            "<td style='width: 2.5%;' class='tbl-prod-no'>" + $("#prod_no").val() + 
            "</td><td style='width: 7%;' class='tbl-prod-name d-none d-lg-table-cell'>" + $("#prod_name").val() + 
            "</td><td style='width: 2%;' class='tbl-qty-return'>" + $("#qty").val() + 
            "</td><td style='width: 1.5%;' class='tbl-unit d-none d-lg-table-cell'>" + $("#prod_unit").val() + 
            "</td><td style='width: 1.5%;' class='tbl-reference d-none d-lg-table-cell'>" +  
            "</td><td style='width: 1.5%;' class='tbl-date-return' hidden>" +  
            "</td><td style='width: 1.5%;'class='tbl-prod-grade' hidden>" + $("#prod_grade").val() + 
            "</td><td style='width: 1.5%;' class='tbl-reason' hidden>" +  
            "</td><td style='width: 1%;' class='tbl_curr text-left' data-id = '"+ $("#currency :selected").val() +"' hidden>"+ $("#currency :selected").text() +
            "</td><td style='width: 1%;' class='tbl_purchase text-left' hidden>"+ $.number($("#cost").val(), 2) +
            "</td><td style='width: 1%;' class='tbl_vat text-center' data-id = '"+ $("#vat :selected").val() +"' hidden>"+ $("#vat :selected").text() +
            "</td><td style='width: 2%;' class='tbl_total_price text-left' hidden>"+ $.number(prod, 2) +
            "</td><td style='width: 1%;' class='tbl_net_vat text-left' hidden>"+ $.number($("#net_vat").val(), 2) +
            "</td><td style='width: 1%;' class='tbl_w_vat text-center' hidden>"+ $.number($("#tot_w_vat").val(), 2) +
            "</td><td style='width: 2%;' class='tbl_w_o_vat text-left' hidden>"+ $.number($("#tot_w_o_vat").val(), 2) +
            "</td><td style='width: 1%;' class='tbl_uc_w_vat text-center' hidden>"+ $.number($("#uc_w_vat").val(), 2) +
            "</td><td style='width: 2%;' class='tbl_uc_w_o_vat text-left' hidden>"+ $.number($("#uc_w_o_vat").val(), 2) +
            "</td><td style='width: 1.5%;' class='tbl-id' hidden>" +  
            "</td><td style='width: 1.5%;' class='tbl-prod-id' hidden>" + $("#prod_no").attr("data-id") +   
            "</td><td style='width: 1%;' class='text-center text-red sales_register_remove'>"+ "<i class='fa fa-minus-circle sales_register_remove' style='color:red;cursor:pointer;' id='sales_register_remove'></i>" +
            "</tr>");
    }else if (tran_type == "2"){
        $("#tbl-transfer-products tbody").append("<tr class='item_row_table cursor-pointer'>"+
            "<td style='width: 2.5%;' class='tbl_prod_no text-left'>"+ $("#prod_no_transfer").val() +
            "</td><td style='width: 7%;' class='tbl_prod_name text-left d-none d-lg-table-cell'>"+ $("#prod_name_transfer").val() +
            "</td><td style='width: 2%;' class='tbl_qty_issue text-left'>"+ $.number($("#prod_qty_issued_transfer").val(), 2) +
            "</td><td style='width: 2%;' class='tbl_qty text-left'>"+ $.number($("#prod_qty_received_transfer").val(), 2) +
            "</td><td style='width: 1.5%;' class='tbl_unit text-left d-none d-lg-table-cell'>"+ $("#prod_unit_transfer").val() +
            "</td><td style='width: 1%;' class='tbl_curr text-left' data-id = '"+ $("#prod_curr_transfer :selected").val() +"' hidden>"+ $("#prod_curr_transfer :selected").text() +
            "</td><td style='width: 1.5%;' class='tbl_purchase text-left'>"+ $.number($("#prod_unit_price_transfer").val(), 2) +
            "</td><td style='width: 1%;' class='tbl_vat text-center' data-id = '"+ $("#vat :selected").val() +"' hidden>"+ $("#vat :selected").text() +
            "</td><td style='width: 2%;' class='tbl_total_price text-left'>"+ $.number(($("#prod_qty_received_transfer").val() * $("#prod_unit_price_transfer").val()), 2) +
            "</td><td style='width: 1%;' class='tbl_net_vat text-left' hidden>"+ $.number($("#net_vat").val(), 2) +
            "</td><td style='width: 1%;' class='tbl_w_vat text-center' hidden>"+ $.number($("#tot_w_vat").val(), 2) +
            "</td><td style='width: 2%;' class='tbl_w_o_vat text-left' hidden>"+ $.number($("#tot_w_o_vat").val(), 2) +
            "</td><td style='width: 1%;' class='tbl_uc_w_vat text-center' hidden>"+ $.number($("#uc_w_vat").val(), 2) +
            "</td><td style='width: 2%;' class='tbl_uc_w_o_vat text-left' hidden>"+ $.number($("#uc_w_o_vat").val(), 2) +
            "</td><td style='width: 1.5%;'class='tbl_prod_grade' hidden>" + $("#prod_grade").val() + 
            "</td><td style='width: 1%;' class='text-center text-red remove_item'>"+ "<i class='fa fa-minus-circle remove_item_table' style='color:red;cursor:pointer;' id='remove_item_table'></i>" +
            "</td><td style='width: 2%;' class='tbl_prod_id text-left' hidden>"+ $("#prod_no").attr("data-id") +
            "</tr>");
    }else{  

        $("#tbl-products tbody").append("<tr class='item_row_table'>" + 
            "<td style='width: 2%;' class='tbl_prod_no text-left'>"+ $("#prod_no").val() +
            "</td><td style='width: 8%;' class='tbl_prod_name text-left d-none d-lg-table-cell'>"+ $("#prod_name").val() +
            "</td><td style='width: 1%;' class='tbl_qty text-left'>"+ $.number($("#qty").val(), 2) +
            "</td><td style='width: 1%;' class='tbl_unit text-left  d-none d-lg-table-cell'>"+ $("#prod_unit").val() +
            "</td><td style='width: 1%;' class='tbl_curr text-left  d-none d-lg-table-cell' data-id = '"+ $("#currency :selected").val() +"'>"+ $("#currency :selected").text() +
            "</td><td style='width: 1%;' class='tbl_purchase text-left  d-none d-lg-table-cell'>"+ $.number($("#cost").val(), 2) +
            "</td><td style='width: 1%;' class='tbl_vat text-center  d-none d-lg-table-cell' data-id = '"+ $("#vat :selected").val() +"'>"+ $("#vat :selected").text() +
            "</td><td style='width: 2%;' class='tbl_total_price text-left'>"+ $.number(prod, 2) +
            "</td><td style='width: 1%;' class='tbl_net_vat text-left' hidden>"+ $.number($("#net_vat").val(), 2) +
            "</td><td style='width: 1%;' class='tbl_w_vat text-center' hidden>"+ $.number($("#tot_w_vat").val(), 2) +
            "</td><td style='width: 2%;' class='tbl_w_o_vat text-left' hidden>"+ $.number($("#tot_w_o_vat").val(), 2) +
            "</td><td style='width: 1%;' class='tbl_uc_w_vat text-center' hidden>"+ $.number($("#uc_w_vat").val(), 2) +
            "</td><td style='width: 2%;' class='tbl_uc_w_o_vat text-left' hidden>"+ $.number($("#uc_w_o_vat").val(), 2) +
            "</td><td style='width: 1.5%;'class='tbl_prod_grade' hidden>" + $("#prod_grade").val() + 
            "</td><td style='width: 1%;' class='text-center text-red remove_item'>"+ "<i class='fa fa-minus-circle remove_item_table' style='color:red;cursor:pointer;' id='remove_item_table'></i>" +
            "</td><td style='width: 2%;' class='tbl_prod_id text-left' hidden>"+ $("#prod_no").attr("data-id") +
            "</td></tr>");
        

    }


    reset_input();
}

function select_row_table(row){
    var trans_type = $("#trans_type").val();
    var table = "";

    if (trans_type == "1"){
        table = "#tbl-sales-products tbody tr:eq("+row+")";
        $("#tbl_item_row").val(row);
        $("#prod_no").val($(table).find(".tbl-prod-no").text());
        $("#prod_name").val($(table).find(".tbl-prod-name").text());
        $("#qty").val($(table).find(".tbl-qty-return").text());
        $("#prod_unit").val($(table).find(".tbl-unit").text());
        $("#currency").val($(table).find(".tbl_curr").data("id"));
        $("#cost").val($(table).find(".tbl_purchase").text());
        $("#vat").val($(table).find(".tbl_vat").data("id"));
        $("#total_price").val($(table).find(".tbl_total_price").text());
        $("#net_vat").val($(table).find(".tbl_net_vat").text());
        $("#tot_w_vat").val($(table).find(".tbl_total_price").text());
        $("#tot_w_o_vat").val($(table).find(".tbl_w_o_vat").text());
        $("#uc_w_vat").val($(table).find(".tbl_uc_w_vat").text());
        $("#uc_w_o_vat").val($(table).find(".tbl_uc_w_o_vat").text());
        $("#prod_grade").val($(table).find(".tbl-prod-grade").text());
    }else if (trans_type == "2"){
        table = "#tbl-transfer-products tbody tr:eq("+row+")";
        $("#tbl_item_row").val(row);
        $("#prod_no_transfer").val($(table).find(".tbl_prod_no").text());
        $("#prod_name_transfer").val($(table).find(".tbl_prod_name").text());
        $("#prod_qty_received_transfer").val($(table).find(".tbl_qty").text());
        $("#prod_qty_issued_transfer").val($(table).find(".tbl_qty_issue").text());
        $("#prod_unit_transfer").val($(table).find(".tbl_unit").text());
        $("#prod_curr_transfer").val($(table).find(".tbl_curr").data("id"));
        $("#prod_unit_price_transfer").val($(table).find(".tbl_purchase").text());
        $("#vat").val($(table).find(".tbl_vat").data("id"));
        $("#prod_total_amount_transfer").val($(table).find(".tbl_total_price").text());
        $("#net_vat").val($(table).find(".tbl_net_vat").text());
        $("#tot_w_vat").val($(table).find(".tbl_total_price").text());
        $("#tot_w_o_vat").val($(table).find(".tbl_w_o_vat").text());
        $("#uc_w_vat").val($(table).find(".tbl_uc_w_vat").text());
        $("#uc_w_o_vat").val($(table).find(".tbl_uc_w_o_vat").text());
        $("#prod_grade").val($(table).find(".tbl_prod_grade").text());
    }else{
        table = "#tbl-products tbody tr:eq("+row+")";
        $("#tbl_item_row").val(row);
        $("#prod_no").val($(table).find(".tbl_prod_no").text());
        $("#prod_name").val($(table).find(".tbl_prod_name").text());
        $("#qty").val($(table).find(".tbl_qty").text());
        $("#prod_unit").val($(table).find(".tbl_unit").text());
        $("#currency").val($(table).find(".tbl_curr").data("id"));
        $("#cost").val($(table).find(".tbl_purchase").text());
        $("#vat").val($(table).find(".tbl_vat").data("id"));
        $("#total_price").val($(table).find(".tbl_total_price").text());
        $("#net_vat").val($(table).find(".tbl_net_vat").text());
        $("#tot_w_vat").val($(table).find(".tbl_total_price").text());
        $("#tot_w_o_vat").val($(table).find(".tbl_w_o_vat").text());
        $("#uc_w_vat").val($(table).find(".tbl_uc_w_vat").text());
        $("#uc_w_o_vat").val($(table).find(".tbl_uc_w_o_vat").text());
        $("#prod_grade").val($(table).find(".tbl_prod_grade").text());
    }

    
    compute_vat();
    $(".prod_entry").collapse('show');
    $(".btn-exit").show();
    $(".btn-enter").show();
}

function edit_item_table(){
    var row = $("#tbl_item_row").val();

    var trans_type = $("#trans_type").val();
    var table = "";

    if (trans_type == "1"){
        table = "#tbl-sales-products tbody tr:eq("+row+")";
        $(table).find(".tbl-prod-no").text($("#prod_no").val());
        $(table).find(".tbl-prod-name").text($("#prod_name").val());
        $(table).find(".tbl-qty-return").text($.number($("#qty").val(), 2));
        $(table).find(".tbl-unit").text($("#prod_unit").val());
        $(table).find(".tbl-curr").text($("#currency :selected").text());
        $(table).find(".tbl-curr").data("id", $("#currency").val());
        $(table).find(".tbl_purchase").text($.number($("#cost").val(), 2));
        $(table).find(".tbl_vat").text($("#vat :selected").text());
        $(table).find(".tbl_vat").data("id", $("#vat").val());
        $(table).find(".tbl_total_price").text($.number($("#tot_w_vat").val(), 2));
        $(table).find(".tbl_net_vat").text($("#net_vat").val());
        $(table).find(".tbl_w_vat").text($("#tot_w_vat").val());
        $(table).find(".tbl_w_o_vat").text($("#tot_w_o_vat").val());
        $(table).find(".tbl_uc_w_vat").text($("#uc_w_vat").val());
        $(table).find(".tbl_uc_w_o_vat").text($("#uc_w_o_vat").val());
        $(table).find(".tbl_prod_grade").text($("#prod_grade").val());     
    }else if (trans_type == "2"){
        table = "#tbl-transfer-products tbody tr:eq("+row+")";
        $(table).find(".tbl_prod_no").text($("#prod_no_transfer").val());
        $(table).find(".tbl_prod_name").text($("#prod_name_transfer").val());
        $(table).find(".tbl_qty_issue").text($.number($("#prod_qty_issued_transfer").val(), 2));
        $(table).find(".tbl_qty").text($.number($("#prod_qty_received_transfer").val(), 2));
        $(table).find(".tbl_unit").text($("#prod_unit_transfer").val());
        $(table).find(".tbl_curr").text($("#prod_curr_transfer :selected").text());
        $(table).find(".tbl_curr").data("id", $("#prod_curr_transfer").val());
        $(table).find(".tbl_purchase").text($.number($("#prod_unit_price_transfer").val(), 2));
        $(table).find(".tbl_vat").text($("#vat :selected").text());
        $(table).find(".tbl_vat").data("id", $("#vat").val());
        $(table).find(".tbl_total_price").text($.number($("#prod_total_amount_transfer").val(), 2));
        $(table).find(".tbl_net_vat").text($("#net_vat").val());
        $(table).find(".tbl_w_vat").text($("#tot_w_vat").val());
        $(table).find(".tbl_w_o_vat").text($("#tot_w_o_vat").val());
        $(table).find(".tbl_uc_w_vat").text($("#uc_w_vat").val());
        $(table).find(".tbl_uc_w_o_vat").text($("#uc_w_o_vat").val());
        $(table).find(".tbl_prod_grade").text($("#prod_grade").val());               
    }else{
        table = "#tbl-products tbody tr:eq("+row+")";
        $(table).find(".tbl_prod_no").text($("#prod_no").val());
        $(table).find(".tbl_prod_name").text($("#prod_name").val());
        $(table).find(".tbl_qty").text($.number($("#qty").val(), 2));
        $(table).find(".tbl_unit").text($("#prod_unit").val());
        $(table).find(".tbl_curr").text($("#currency :selected").text());
        $(table).find(".tbl_curr").data("id", $("#currency").val());
        $(table).find(".tbl_purchase").text($.number($("#cost").val(), 2));
        $(table).find(".tbl_vat").text($("#vat :selected").text());
        $(table).find(".tbl_vat").data("id", $("#vat").val());
        $(table).find(".tbl_total_price").text($.number($("#tot_w_vat").val(), 2));
        $(table).find(".tbl_net_vat").text($("#net_vat").val());
        $(table).find(".tbl_w_vat").text($("#tot_w_vat").val());
        $(table).find(".tbl_w_o_vat").text($("#tot_w_o_vat").val());
        $(table).find(".tbl_uc_w_vat").text($("#uc_w_vat").val());
        $(table).find(".tbl_uc_w_o_vat").text($("#uc_w_o_vat").val());
        $(table).find(".tbl_prod_grade").text($("#prod_grade").val());        
    }

    $("#tbl_item_row").val("");
    reset_input();
}

function reset_input(){
    $(".prod_entry").find(":input").val("");
    $('.prod_entry select').prop('selectedIndex',0);
    $(".btn-exit").hide();
    $(".btn-enter").hide();
    $(".prod_entry").collapse('hide');
}

function transaction_type(){
    var tran_type = $("#trans_type").val();
    var trans_no = $("#trans_no").val();
    var window_width = $(document).width();

    $("#create_recipient").show();
    $("#div-prod-tran-type-1").hide();
    $("#div-prod-tran-type-2").hide();
    $("#div-prod-transfer-dtl-1").hide();
    $("#div-prod-transfer-dtl-2").hide();
    $("#tbl-products").hide();
    $("#tbl-sales-products").hide();
    $("#tbl-transfer-products").hide();

    if (tran_type == "1"){
        $("#span_recipient_code").text("Customer Code");
        $("#span_recipient_name").text("Customer Name");
        $("#create_recipient").text("Create Customer");
        $("#cost").attr("readonly", true);
        $("#tbl-sales-products").show();
        $("#div-prod-tran-type-1").show();
        $("#div-prod-tran-type-2").show();
    }else if (tran_type == "2"){
        $("#span_recipient_code").text("Outlet Code");
        $("#span_recipient_name").text("Outlet Name");
        $("#create_recipient").text("Create Outlet");
        $("#create_recipient").hide();
        $("issuance_no").val("");
        $("#cost").attr("readonly", false);
        $("#tbl-transfer-products").show();
        $("#div-prod-transfer-dtl-1").show();
        $("#div-prod-transfer-dtl-2").show();
        var csrf_name = $("input[name=csrf_name]").val();

        $.ajax({
            data : {csrf_name : csrf_name},
            type : "GET",
            dataType : "JSON",
            url : base_url + "inventory_receive/product_transfer",
            success : function(result){
                $("input[name=csrf_name]").val(result.token);
                $("#div-prod-transfer-tbl").html(result.result);
                $("#prod_transfer_modal").modal("show");
            }, error : function(err){
                console.log(err.response);
            }
        })
    }else if (tran_type == "3") {
        $("#cost").attr("readonly", false);
        $("#span_recipient_code").text("Supplier Code");
        $("#span_recipient_name").text("Supplier Name");
        $("#create_recipient").text("Create Supplier");
        $("#tbl-products").show();
        $("#div-prod-tran-type-1").show();
        $("#div-prod-tran-type-2").show();
    }else if (tran_type == "4"){
        $("#cost").attr("readonly", false);
        $("#tbl-products").show();
        $("#span_recipient_code").text("From (Code)");
        $("#span_recipient_name").text("From (Name)");
        $("#create_recipient").text("Create Give Away Name");
        $("#div-prod-tran-type-1").show();
        $("#div-prod-tran-type-2").show();
    }

}

function product_transfer_tbl($key){
    var issuance_no = $("#tbl-product-transfer tbody tr:eq("+ $key + ")").find("td:eq(0)").text();
    get_product_transfer(issuance_no);
}

function get_product_transfer(issuance_no){
    $("#prod_transfer_modal").modal("hide");
    var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {trans_no : issuance_no, csrf_name : csrf_name},
        url : base_url + "inventory_receive/get_product_transfer",
        type : "POST",
        dataType : "JSON",
        success : function(result){ 
            $("input[name=csrf_name]").val(result.token);
            if (result.hdr != ""){
                $("#outlet_name").val(result.hdr[0].outlet_name);
                $("#outlet_code").val(result.hdr[0].outlet_code);
                $("#outlet_code").attr('data-type_1',result.hdr[0].recipient_type);
                $("#outlet_code").attr('data-id',result.hdr[0].recipient_id);
                $("#trans_no").val(result.hdr[0].inv_no);
                $("#trans_no").attr("data-id", result.hdr[0].id);
                $("#trans_date").val(result.hdr[0].inv_date);

                $("#outlet_code").attr("readonly", true);
                $("#outlet_name").attr("readonly", true);
                $("#trans_no").attr("readonly", true);
                $("#trans_date").attr("readonly", true);

                var dtl = result.dtl;

                for (var i = 0; i < dtl.length; i++) {
                    $("#tbl-transfer-products tbody").append("<tr class='item_row_table'>"+
                        "<td style='width: 2.5%;' class='tbl_prod_no text-left'>"+ dtl[i].product_no +
                        "</td><td style='width: 7%;' class='tbl_prod_name text-left d-none d-lg-table-cell'>"+ dtl[i].product_name +
                        "</td><td style='width: 2%;' class='tbl_qty_issue text-left'>"+ $.number(dtl[i].qty, 2) +
                        "</td><td style='width: 2%;' class='tbl_qty text-left'>"+ $.number(dtl[i].qty, 2) +
                        "</td><td style='width: 1.5%;' class='tbl_unit text-left  d-none d-lg-table-cell'>"+ dtl[i].unit_code +
                        "</td><td style='width: 1%;' class='tbl_curr text-left ' data-id='"+dtl[i].currency+"' hidden>"+ dtl[i].curr_code +
                        "</td><td style='width: 1.5%;' class='tbl_purchase text-left  d-none d-lg-table-cell'>"+ $.number(dtl[i].cost, 2) +
                        "</td><td style='width: 1%;' class='tbl_vat text-center' data-id='"+dtl[i].vat+"' hidden>"+ (dtl[i].vat == "1" ? "Yes" : "No") +
                        "</td><td style='width: 2%;' class='tbl_total_price text-left'>"+ $.number(dtl[i].total_cost, 2) +
                        "</td><td style='width: 1%;' class='tbl_net_vat text-left' hidden>"+ dtl[i].net_vat +
                        "</td><td style='width: 1%;' class='tbl_w_vat text-center' hidden>"+ dtl[i].w_vat +
                        "</td><td style='width: 2%;' class='tbl_w_o_vat text-left' hidden>"+ dtl[i].w_o_vat +
                        "</td><td style='width: 1%;' class='tbl_uc_w_vat text-center' hidden>"+ dtl[i].cost_w_vat +
                        "</td><td style='width: 2%;' class='tbl_uc_w_o_vat text-left' hidden>"+ dtl[i].cost_w_o_vat +
                        "</td><td style='width: 2%;' class='tbl_prod_grade text-left' hidden>" + dtl[i].prod_grade +
                        "</td><td style='width: 1%;' class='text-center text-red remove_item'>"+ "<i class='fa fa-minus-circle remove_item_table' style='color:red;cursor:pointer;' id='remove_item_table'></i>" +
                        "</td><td style='width: 2%;' class='tbl_prod_id text-left' hidden>"+ dtl[i].prod_id +
                        "</td></tr>");
                }                    

                swal.close();
            }else{
                swal({
                    type : "warning",
                    title : "Issuance no. not found or not available in this outlet",
                    timer : 2000
                }, function(){
                    swal.close();
                    transaction_type();
                })
            }


        }, error : function(err){
            console.log(err.responseText);
        }
    });
}

function compute_vat(){
    
    var trans_type = $("#trans_type").val();

    if (trans_type == "2"){
        var unit_price = $("#prod_unit_price_transfer").val();
        var vat = $("#vat").val();
        var total_amount = Number($("#prod_unit_price_transfer").val() * $("#prod_qty_received_transfer").val());
        var qty = $("#prod_qty_received_transfer").val();        
    }else{
        var unit_price = $("#cost").val();
        var vat = $("#vat").val();
        var total_amount = Number($("#cost").val() * $("#qty").val());
        var qty = $("#qty").val();        
    }

    var total_vat = 0;
    var total_net_vat = 0;
    var total_w_vat = 0;
    var total_w_o_vat = 0;
    var unit_vat = 0;
    var unit_price_w_vat = 0;
    var unit_price_w_o_vat = 0;

    if (vat == "1"){
        // total_vat = total_amount * 0.12;
        // total_net_vat = total_amount - total_vat;
        unit_vat = unit_price * 0.12;
        unit_price_w_vat = unit_price;
        unit_price_w_o_vat = unit_price / 1.12;
    }else{
        // total_vat = 0;
        // total_net_vat = total_amount;
        // total_amount = 0;
        // unit_price_w_o_vat = unit_price;
        // unit_price = 0;

        total_vat = 0;
        unit_price_w_o_vat = unit_price;
        unit_price_w_vat = unit_price * 1.12;
    }

    total_w_vat = qty * Number(unit_price_w_vat).toFixed(2);
    total_w_o_vat = qty * Number(unit_price_w_o_vat).toFixed(2);
    total_vat = Number(total_w_vat).toFixed(2) - Number(total_w_o_vat).toFixed(2);

    if ($("#qty").val() != 0){
        $("#net_vat").val(total_vat);
        $("#tot_w_vat").val(total_w_vat);
        $("#tot_w_o_vat").val(total_w_o_vat);
        $("#uc_w_vat").val(unit_price_w_vat);
        $("#uc_w_o_vat").val(unit_price_w_o_vat);        
    }else{
        $("#prod_total_amount_transfer").val(total_amount);
    }


}

function preview(){
    /*$.datepicker.formatDate('mm/dd/yy', new Date($("#receive_date").val()))*/

    var trans_no = $("#receive_no").val();
    var trans_date  = convert_date($("#receive_date").val());
    var tran_type = $("#trans_type").val();
    var trans_type = $("#trans_type :selected").text();
    var recipient_code = $("#outlet_code").val();
    var recipient_name = $("#outlet_name").val();
    var ref_trans_no = $("#trans_no").val();
    var ref_trans_date = convert_date($("#trans_date").val());
    var reason = $("#remarks").val();
    var total_qty = 0;
    var total_amount = 0;

    $("#mod_trans_no").text(": " + trans_no);    
    $("#mod_trans_date").text(": " + trans_date);    
    $("#mod_tran_type").text(": " + trans_type);
    $("#mod_recipient_code").text(": " + recipient_code);    
    $("#mod_recipient_name").text(recipient_name);    
    $("#mod_ref_no").text(": " + ref_trans_no);    
    $("#mod_ref_date").text(": " + ref_trans_date);    
    $("#mod_ref_remarks").text(": " + reason);    

    $("#mod-tbl-products tbody tr").empty();
    $("#mod-tbl-sales-products tbody tr").empty();

    $("#mod-tbl-products").hide();
    $("#mod-tbl-sales-products").hide();
    $("#mod-tbl-transfer-products").hide();

    if (tran_type == "1"){
        $("#mod-tbl-sales-products").show();

        $('#tbl-sales-products tbody tr').each(function (row, tr){
            $("#mod-tbl-sales-products").append("<tr class='sales_row_table cursor-pointer'>"+
                "<td style='width: 2.5%;'>" + $(tr).find(".tbl-prod-no").text() + 
                "</td><td style='width: 7%;' class='d-none d-lg-table-cell'>" + $(tr).find(".tbl-prod-name").text() + 
                "</td><td style='width: 2%;' class='tbl-qty-return'>" + $(tr).find(".tbl-qty-return").text() + 
                "</td><td style='width: 1.5%;' class='tbl-unit d-none d-lg-table-cell'>" + $(tr).find(".tbl-unit").text() + 
                "</td><td style='width: 1.5%;' class='tbl-reference d-none d-lg-table-cell'>" + $(tr).find(".tbl-reference").text() + 
                "</td><td style='width: 1.5%;' class='tbl-date-return' hidden>" + $(tr).find(".tbl-date-return").text() + 
                "</td><td style='width: 1.5%;'class='tbl-prod-grade' hidden>" + $(tr).find(".tbl-prod-grade").text() + 
                "</td><td style='width: 1.5%;' class='tbl-reason' hidden>" + $(tr).find(".tbl-reason").text() + 
    
                "</td><td style='width: 1%;' class='tbl_curr text-left' hidden data-id = '"+ $("#account_currency").val() +"'>"+ $("#account_currency").val() +
                "</td><td style='width: 1%;' class='tbl_purchase text-left' hidden>"+ $(tr).find(".tbl-unit-price").text() +
                "</td><td style='width: 1%;' class='text-center text-red sales_register_remove'>"+ "<i class='fa fa-minus-circle sales_register_remove' style='color:red;cursor:pointer;' id='sales_register_remove'></i>" +
                "</tr>");
        });

    }else if (tran_type == "2"){
        $("#mod-tbl-transfer-products").show();
        $('#tbl-transfer-products tbody tr').each(function (row, tr){
            $("#mod-tbl-transfer-products tbody").append("<tr class='item_row_table'>" + 
            "<td style='width: 2.5%;' class='tbl_prod_no text-left'>"+ $(tr).find(".tbl_prod_no").text() +
            "</td><td style='width: 7%;' class='tbl_prod_name text-left d-none d-lg-table-cell'>"+ $(tr).find(".tbl_prod_name").text() +
            "</td><td style='width: 2%;' class='tbl_qty_issue text-left'>"+ $.number($(tr).find(".tbl_qty_issue").text(), 2) +
            "</td><td style='width: 2%;' class='tbl_qty text-left'>"+ $.number($(tr).find(".tbl_qty").text(), 2) +
            "</td><td style='width: 1.5%;' class='tbl_unit text-left d-none d-lg-table-cell' >"+ $(tr).find(".tbl_unit").text() +
            "</td><td style='width: 1%;' class='tbl_curr text-left' hidden>"+ $(tr).find(".tbl_curr").text() +
            "</td><td style='width: 1.5%;' class='tbl_purchase text-left d-none d-lg-table-cell' >"+ $.number($(tr).find(".tbl_purchase").text(), 2) +
            "</td><td style='width: 1%;' class='tbl_vat text-center' hidden>"+ $(tr).find(".tbl_vat").text() +
            "</td><td style='width: 2%;' class='tbl_total_price text-left'>"+ $.number($(tr).find(".tbl_total_price").text(), 2) +
            "</td><td style='width: 1%;' class='tbl_net_vat text-left' hidden>"+ $.number($(tr).find(".tbl_net_vat").text(), 2) +
            "</td><td style='width: 1%;' class='tbl_w_vat text-center' hidden>"+ $.number($(tr).find(".tbl_w_vat").text(), 2) +
            "</td><td style='width: 2%;' class='tbl_w_o_vat text-left' hidden>"+ $.number($(tr).find(".tbl_w_o_vat").text(), 2) +
            "</td></tr>");

                total_qty += Number(str_to_num($(tr).find(".tbl_qty").text()));   
                total_amount += Number(str_to_num($(tr).find(".tbl_total_price").text()));    
        }); 
    }else{
        $("#mod-tbl-products").show();
        $('#tbl-products tbody tr').each(function (row, tr){
            $("#mod-tbl-products tbody").append("<tr class='item_row_table'>" + 
            "<td style='width: 2.5%;' class='tbl_prod_no text-left'>"+ $(tr).find(".tbl_prod_no").text() +
            "</td><td style='width: 8%;' class='tbl_prod_name text-left d-none d-lg-table-cell'>"+ $(tr).find(".tbl_prod_name").text() +
            "</td><td style='width: 1%;' class='tbl_qty text-left'>"+ $.number($(tr).find(".tbl_qty").text(), 2) +
            "</td><td style='width: 1%;' class='tbl_unit text-left d-none d-lg-table-cell'>"+ $(tr).find(".tbl_unit").text() +
            "</td><td style='width: 1%;' class='tbl_curr text-left d-none d-lg-table-cell'>"+ $(tr).find(".tbl_curr").text() +
            "</td><td style='width: 1%;' class='tbl_purchase text-left d-none d-lg-table-cell'>"+ $.number($(tr).find(".tbl_purchase").text(), 2) +
            "</td><td style='width: 1%;' class='tbl_vat text-center d-none d-lg-table-cell'>"+ $(tr).find(".tbl_vat").text() +
            "</td><td style='width: 2%;' class='tbl_total_price text-left'>"+ $.number($(tr).find(".tbl_total_price").text(), 2) +
            "</td><td style='width: 1%;' class='tbl_net_vat text-left' hidden>"+ $.number($(tr).find(".tbl_net_vat").text(), 2) +
            "</td><td style='width: 1%;' class='tbl_w_vat text-center' hidden>"+ $.number($(tr).find(".tbl_w_vat").text(), 2) +
            "</td><td style='width: 2%;' class='tbl_w_o_vat text-left' hidden>"+ $.number($(tr).find(".tbl_w_o_vat").text(), 2) +
            "</td></tr>");

                total_qty += Number(str_to_num($(tr).find(".tbl_qty").text()));   
                total_amount += Number(str_to_num($(tr).find(".tbl_total_price").text()));    
        }); 

    }


    $("#mod_total_qty").text($.number(total_qty, 2));
    $("#mod_total_amount").text($.number(total_amount, 2));

    $("#preview_modal").modal("show");

}

function check_required_fields(){
      var receive_no =  $('#receive_no').val();
      var receive_date =  $('#receive_date').val();
      var trans_type =  $('#trans_type').val();
      var outlet_code = $('#outlet_code').data('id');
      var outlet_name = $('#outlet_name').val();
      var outlet_type = $('#outlet_code').data('type_1');
      var trans_no = $('#trans_no').val();
      var trans_date = $('#trans_date').val();
      var total_tr = "";

    if (trans_type == "1"){
        total_tr = $('#tbl-sales-products > tbody > tr').length;
    }else if (trans_type == "2"){
        total_tr = $('#tbl-transfer-products > tbody > tr').length;
    }else{
        total_tr = $('#tbl-products > tbody > tr').length;
    }

    if(jQuery.trim(receive_no).length <= 0 || jQuery.trim(receive_date).length <= 0 || 
        jQuery.trim(trans_type).length <= 0 || jQuery.trim(outlet_code).length <= 0
        || jQuery.trim(outlet_name).length <= 0  || total_tr <= 0) {
            swal({
                type : 'warning',
                title : 'Please fill up required fields.',
                timer : 2000
            });

        if (jQuery.trim(receive_no).length <= 0){
            $("#receive_no").addClass("error");
        }

        if (jQuery.trim(receive_date).length <= 0){
            $("#receive_date").addClass("error");
        }

        if (jQuery.trim(outlet_code).length <= 0){
            $("#outlet_code").addClass("error");
        }

        if (jQuery.trim(outlet_code).length <= 0){
            $("#outlet_name").addClass("error");
        }

        $("#save").prop("disabled", false);
            return false            
    }else{
        var csrf_name = $("input[name=csrf_name]").val();
        $.ajax({
            data : {"receive_no" : receive_no, csrf_name : csrf_name},
            type : "POST",
            dataType : "JSON",
            url : base_url + "inventory_receive/inv_no_wo_id",
            success : function(result){
                $("input[name=csrf_name]").val(result.token);
                if (result.result > 0){
                    $("#save").prop("disabled", false);
                    swal({
                        type : "warning",
                        timer : 2000,
                        title : "Receive No is already exists"
                    })
                }else{
                    data_saving();
                }
            }, error : function(err){
                console.log(err.responseText);
            }
        });
    }
}

function data_saving(){
      var receive_no =  $('#receive_no').val();
      var receive_date =  $('#receive_date').val();
      var trans_type =  $('#trans_type').val();
      var outlet_code = $('#outlet_code').data('id');
      var outlet_name = $('#outlet_name').val();
      var outlet_type = $('#outlet_code').data('type_1');
      var trans_no = $('#trans_no').val();
      var trans_date = $('#trans_date').val();
      var remarks = $("#remarks").val();
      var type_action = $("#type_action").val();
      var sum = 0;
      var total_amount = 0;
      var total_vat = 0;
      var total_net_vat =  0;
      var ref_id = $("#trans_no").attr("data-id");
        $(".tbl_qty").each(function () {
            var num = $(this).text().replace(/,/g, "");
            if ($(this).text().length != 0) {
                sum += parseFloat(num);
            }
        });
        

      var dtl_data = [];


      var vat_cost = 0;
      var vat = "";

      if (trans_type == "1"){
          $('#tbl-sales-products tbody tr').each(function (row, tr){
                vat = $(tr).find('.tbl_vat').data("id");         

                    vat_cost = str_to_num($(tr).find(".tbl_uc_w_vat").text()) -  str_to_num($(tr).find(".tbl_uc_w_o_vat").text());
                    total_amount += Number(str_to_num($(tr).find(".tbl_total_price").text()));
                    total_vat += Number(vat_cost);
                    total_net_vat += Number(str_to_num($(tr).find(".tbl_net_vat").text()));

                    var sub = {
                        'prod_id' : $(tr).find('.tbl-prod-id').text(),
                        'prod_grade' : $(tr).find(".tbl-prod-grade").text(),
                        'reason' : $(tr).find(".tbl-reason").text(),
                        'return_date' : $(tr).find(".tbl-date-return").text(),
                        'sales_reference' : $(tr).find(".tbl-id").text(),
                        'qty' : str_to_num($(tr).find('.tbl-qty-return').text()),
                        'cost' : str_to_num($(tr).find('.tbl_purchase').text()),
                        'vat' : $(tr).find('.tbl_vat').data("id"),
                        'vat_cost' : vat_cost ,
                        'cost_w_vat' : str_to_num($(tr).find(".tbl_uc_w_vat").text()),
                        'cost_w_o_vat' : str_to_num($(tr).find(".tbl_uc_w_o_vat").text()),
                        'currency' : $(tr).find('.tbl_curr').data("id"),
                        'total_price' : str_to_num($(tr).find('.tbl_total_price').text()),
                        'net_vat' : str_to_num($(tr).find('.tbl_net_vat').text()),
                        'w_vat' : str_to_num($(tr).find('.tbl_w_vat').text()),
                        'w_o_vat' : str_to_num($(tr).find('.tbl_w_o_vat').text())
                    } 
                    dtl_data.push(sub);            
           });        
      }else if (trans_type == "2"){
          $('#tbl-transfer-products tbody tr').each(function (row, tr){
                vat = $(tr).find('.tbl_vat').data("id");         

                    vat_cost = str_to_num($(tr).find(".tbl_uc_w_vat").text()) -  str_to_num($(tr).find(".tbl_uc_w_o_vat").text());
                    total_amount += Number(str_to_num($(tr).find(".tbl_total_price").text()));
                    total_vat += Number(vat_cost);
                    total_net_vat += Number(str_to_num($(tr).find(".tbl_net_vat").text()));

                    var sub = {
                        'prod_id' : $(tr).find('.tbl_prod_id').text(),
                        'qty' : str_to_num($(tr).find('.tbl_qty').text()),
                        'cost' : str_to_num($(tr).find('.tbl_purchase').text()),
                        'vat' : $(tr).find('.tbl_vat').data("id"),
                        'vat_cost' : vat_cost ,
                        'cost_w_vat' : str_to_num($(tr).find(".tbl_uc_w_vat").text()),
                        'cost_w_o_vat' : str_to_num($(tr).find(".tbl_uc_w_o_vat").text()),
                        'currency' : $(tr).find('.tbl_curr').data("id"),
                        'total_price' : str_to_num($(tr).find('.tbl_total_price').text()),
                        'net_vat' : str_to_num($(tr).find('.tbl_net_vat').text()),
                        'w_vat' : str_to_num($(tr).find('.tbl_w_vat').text()),
                        'w_o_vat' : str_to_num($(tr).find('.tbl_w_o_vat').text()),
                        'prod_grade' : $(tr).find(".tbl_prod_grade").text(),
                        'sales_reference' : '',
                        'return_date' : '0000-00-00',
                        'reason' : ''

                    } 
                    dtl_data.push(sub);            
           });        

      }else{
          $('#tbl-products tbody tr').each(function (row, tr){
                vat = $(tr).find('.tbl_vat').data("id");         

                    vat_cost = str_to_num($(tr).find(".tbl_uc_w_vat").text()) -  str_to_num($(tr).find(".tbl_uc_w_o_vat").text());
                    total_amount += Number(str_to_num($(tr).find(".tbl_total_price").text()));
                    total_vat += Number(vat_cost);
                    total_net_vat += Number(str_to_num($(tr).find(".tbl_net_vat").text()));

                    var sub = {
                        'prod_id' : $(tr).find('.tbl_prod_id').text(),
                        'qty' : str_to_num($(tr).find('.tbl_qty').text()),
                        'cost' : str_to_num($(tr).find('.tbl_purchase').text()),
                        'vat' : $(tr).find('.tbl_vat').data("id"),
                        'vat_cost' : vat_cost ,
                        'cost_w_vat' : str_to_num($(tr).find(".tbl_uc_w_vat").text()),
                        'cost_w_o_vat' : str_to_num($(tr).find(".tbl_uc_w_o_vat").text()),
                        'currency' : $(tr).find('.tbl_curr').data("id"),
                        'total_price' : str_to_num($(tr).find('.tbl_total_price').text()),
                        'net_vat' : str_to_num($(tr).find('.tbl_net_vat').text()),
                        'w_vat' : str_to_num($(tr).find('.tbl_w_vat').text()),
                        'w_o_vat' : str_to_num($(tr).find('.tbl_w_o_vat').text()),
                        'prod_grade' : $(tr).find(".tbl_prod_grade").text(),
                        'sales_reference' : '',
                        'return_date' : '0000-00-00',
                        'reason' : ''

                    } 
                    dtl_data.push(sub);            
           });        
      }

      var receive_hdr = {
            inv_type : "1",
            inv_no : receive_no,
            inv_date : receive_date,
            tran_type : trans_type,
            type_action : type_action,
            recipient_id : outlet_code,
            recipient_type : outlet_type,
            ref_trans_id : ref_id,
            ref_trans_no : trans_no,
            ref_trans_date : trans_date,
            remarks : remarks,
            total_amount : total_amount,
            total_vat : total_vat,
            total_net_vat  : total_net_vat,
            status : "1"
      } 

      var csrf_name = $("input[name=csrf_name]").val();
      var data = {receive_hdr:receive_hdr, receive_dtl: dtl_data, trans_type : trans_type, ref_id : ref_id, csrf_name : csrf_name};

      $.ajax({
            data : data
            , type: "POST"
            , url: base_url + "inventory_receive/save_data"
            , dataType: 'json'
            , crossOrigin: false     
            , beforeSend : function(){
               swal({
                  title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })                               
            }
            , success: function(result) {
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
};
