$(document).ready(function(){
    
    var from_input = $('#trans_id').val();
    var from_cookie = getCookie('issue_id');
    var BASE_URL = "http://www.eoutletsuite.com/";
    if(from_input != from_cookie){
        window.location.href = BASE_URL +"/logout";
    }

    currency();
    trans_type();
    $("#tbl-products").hide();
    $("#trans_type").attr("disabled", true);
    $("#issue_no").attr("readonly", true);

    $(".btn-enter").hide();
    $(".btn-exit").hide();    
    $("#qty").number(true, 0);
    $("#cost").number(true, 2);
    $("#prod_price").number(true, 2);
    $("#prod_total_price").number(true, 2);
    $("#currency").prop("disabled", true);

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
    
    setTimeout(function(){
        eraseCookie('issue_id');
        location.reload();
    }, 1000 * 60 *30);

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
                type : "warning",
                title : "Please input transfer qty",
                timer : 1000
            })
        }
    }); 

    jQuery(document).on("click", ".remove_item_table", function(){
        $(this).closest("tr").remove(); 
    }); 

    jQuery(document).on("click", ".item_row_table", function(){
        var row = $(this).closest("tr").index();
        var id = $(this).closest("tr").find(".tbl_prod_id").text();
        $("#tbl_item_row").val(row);
        $(".btn-enter").show();
        $(".btn-exit").show();    
        select_row_table(row);
        find_onhand_qty(id);
    }); 


    //AUTOCOMPLETE FOR RECIPIENT
    $("#recipient_code").keyup(function(){
        if ($(this).val() == ""){
            $("#recipient_name").val("");
            $("#recipient_code").attr("data-id", "");
            $("#recipient_code").attr("data-type_1", "");
            $("#recipient_code").removeClass("error");
            $("#recipient_name").removeClass("error");
        }
    });

    $("#recipient_name").keyup(function(){
        if ($(this).val() == ""){
            $("#recipient_code").val("");
            $("#recipient_code").attr("data-id", "");
            $("#recipient_code").attr("data-type_1", "");
            $("#recipient_code").removeClass("error");
            $("#recipient_name").removeClass("error");
        }
    });

    $("#recipient_code").autocomplete({
        focus: function(event, ui){
            $("#recipient_name").val(ui.item.name);
        },
        select: function(event, ui){
            $("#recipient_name").val(ui.item.name);
            $("#recipient_code").attr('data-id',ui.item.id);
            $("#recipient_code").attr('data-type_1',ui.item.type1);
            $("#recipient_code").removeClass("error");
        },
        source: function(req, add){
            var recipient_code = $("#recipient_code").val();
            var trans_type = $("#trans_type").val();
            var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "inventory_issue/search_recipient/"+1, 
                dataType: "json",
                type: "POST",
                data: {recipient : recipient_code, trans_type : trans_type, csrf_name : csrf_name},
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

    $("#recipient_name").autocomplete({
        focus: function(event, ui){
            $("#recipient_code").val(ui.item.code);
        },
        select: function(event, ui){
            $("#recipient_code").val(ui.item.code);
            $("#recipient_code").attr('data-id',ui.item.id);
            $("#recipient_code").attr('data-type_1',ui.item.type1);
            $("#recipient_code").removeClass("error");
        },
        source: function(req, add){
            var recipient = $("#recipient_name").val();
            var trans_type = $("#trans_type").val();
            var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "inventory_issue/search_recipient/"+2, 
                dataType: "json",
                type: "POST",
                data: {recipient : recipient, trans_type : trans_type, csrf_name : csrf_name},
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
            var csrf_name = $("input[name=csrf_name]").val();
            var prod_no = $("#prod_no").val();
            $.ajax({
                url: base_url + "inventory_issue/search_item/"+1, 
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
            var prod_name = $("#prod_name").val();
            var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "inventory_issue/search_item/"+2, 
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

    $("#sales_replacement_prod_no_replace").autocomplete({
        focus: function(event, ui){
            $("#sales_replacement_prod_no_replace").data("id", ui.item.prod_id);
            $("#sales_replacement_prod_name_replace").val(ui.item.prod_name);
            $("#sales_replacement_prod_unit_replace").val(ui.item.prod_unit);
            $("#sales_replacement_unit_price_replace").val(ui.item.prod_price);
            $("#sales_replacement_currency_replace").val(ui.item.prod_curr);
        },
        select: function(event, ui){
            $("#sales_replacement_prod_no_replace").attr("data-id", ui.item.prod_id);
            $("#sales_replacement_prod_name_replace").val(ui.item.prod_name);
            $("#sales_replacement_prod_unit_replace").val(ui.item.prod_unit);
            $("#sales_replacement_unit_price_replace").val(ui.item.prod_price);
            $("#sales_replacement_currency_replace").val(ui.item.prod_curr);
            product_onhand(ui.item.prod_id);
        },
        source: function(req, add){
            var csrf_name = $("input[name=csrf_name]").val();
            var prod_no = $("#sales_replacement_prod_no_replace").val();
            $.ajax({
                url: base_url + "inventory_issue/search_item/"+1, 
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

    $("#sales_replacement_prod_name_replace").autocomplete({
        focus: function(event, ui){
            $("#sales_replacement_prod_no_replace").data("id", ui.item.prod_id);
            $("#sales_replacement_prod_no_replace").val(ui.item.prod_no);
            $("#sales_replacement_prod_unit_replace").val(ui.item.prod_unit);
            $("#sales_replacement_unit_price_replace").val(ui.item.prod_price);
            $("#sales_replacement_currency_replace").val(ui.item.prod_curr);
        },
        select: function(event, ui){
            $("#sales_replacement_prod_no_replace").attr("data-id", ui.item.prod_id);
            $("#sales_replacement_prod_no_replace").val(ui.item.prod_no);
            $("#sales_replacement_prod_unit_replace").val(ui.item.prod_unit);
            $("#sales_replacement_unit_price_replace").val(ui.item.prod_price);
            $("#sales_replacement_currency_replace").val(ui.item.prod_curr);
            product_onhand(ui.item.prod_id);
        },
        source: function(req, add){
            var prod_name = $("#sales_replacement_prod_name_replace").val();
            var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "inventory_issue/search_item/"+2, 
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

    $("#sales_replacement_prod_no_replace").keyup(function(){
        $("#sales_replacement_prod_no_replace").removeClass("error");
    });

    $("#sales_replacement_prod_name_replace").keyup(function(){
        $("#sales_replacement_prod_name_replace").removeClass("error");
    });

    $("#sales_replacement_prod_qty_replace").keyup(function(){
        $("#sales_replacement_prod_qty_replace").removeClass("error");
    });

    $("#sales_replacement_date_replace").keyup(function(){
        $("#sales_replacement_date_replace").removeClass("error");
    })

    $("#sales_register").click(function(){
        sales_register();
    });

    $("#sales_register_search").click(function(){
        sales_register();
    });

    $("#sales_replacement_cancel").click(function(){
        $("#sales_replacement_modal").modal("hide");
    });

    $("#sales_replacement_continue").click(function(){
        $("#sales_replacement_modal").modal("hide");
        sales_replacement_details();    
    });

    $("#sales_register_cancel").click(function(){
        $("#modal_sales_register").modal("hide");
    });

    $("#sales_register_continue").click(function(){
        $("#modal_sales_register").modal("hide");
        sales_register_add_table();
    });

    jQuery(document).on("click", ".sales_row_table", function(){
        $("#sales_replacement_row").val($(this).closest("tr").index());
        $("#sales_replacement_type").val("2");

        if ($(this).closest("tr").find(".tbl-date-replace").text() == "" || $(this).closest("tr").find(".tbl-date-replace").text() == "0000-00-00"){
            var row = $(this).closest("tr").index();
            var id = $(this).closest("tr").find(".tbl-prod-id").text();
            $("#tbl_item_row").val(row);
            select_row_table(row);            
        }else{
            edit_sales_replacement($(this).closest("tr").index());
        }
    }); 


    $("#qty").keyup(function(){
        compute_total();
    }); 

    $("#preview").click(function(){
        preview();
    });

    $("#cancel").click(function(){
        window.open(base_url + "app/3/2/2", "_self");
    });


    $("#save").click(function(){
        $("#save").prop("disabled", true);
        check_required_fields();
    });

})

function get_issue(id){
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {"id" : id, csrf_name : csrf_name},
        url : base_url + "inventory_issue/get_issue",
        type : "POST",
        dataType : "JSON",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);

            //For Header
            $("#issue_no").val(data.trans_hdr[0]['inv_no']);
            $("#issue_date").val(data.trans_hdr[0]['inv_date']);
            $("#trans_type").val(data.trans_hdr[0]['tran_type']);
            $("#recipient_code").val(data.trans_hdr[0]['recipient_code']);
            $("#recipient_name").val(data.trans_hdr[0]['recipient_name']);  
            $("#recipient_code").attr('data-id',data.trans_hdr[0]['recipient_id']);
            $("#recipient_code").attr('data-type_1',data.trans_hdr[0]['recipient_type']);
            $("#trans_no").val(data.trans_hdr[0]['ref_trans_no']);
            $("#trans_date").val(data.trans_hdr[0]['ref_trans_date']);
            $("#purpose").val(data.trans_hdr[0]['remarks']);
            get_outlet_name($('#issue_outlet').data('id'));
            
            //For Details
            var i = 0;

            if (data.trans_hdr[0]['tran_type'] == "5"){
                for(var x=0; x<data.trans_dtl.length; x++) {    
                    i++;
                    $("#tbl-sales-products").append("<tr class='sales_row_table cursor-pointer'>"+

                        "<td class='tbl-prod-no-replace text-left' style='width: 2.5%;'>" + data.trans_dtl[x]['product_no'] +
                        "</td><td class='tbl-prod-name-replace text-left' style='width: 7%;'>" + data.trans_dtl[x]['product_name'] +
                        "</td><td class='tbl-qty-replace text-left' style='width: 2%;'>" + data.trans_dtl[x]['qty'] +
                        "</td><td class='tbl-unit-replace text-left' style='width: 1%;'>" + data.trans_dtl[x]['unit_code'] + 
                        "</td><td class='tbl-unit-price-replace text-left' style='width: 1.5%;'>"+ $.number(data.trans_dtl[x]['cost'],2) + 
                        "</td><td class='tbl-total-price-replace text-left' style='width: 2%;'>"+ $.number(data.trans_dtl[x]['total_cost'],2) + 

                        "</td><td class='tbl-date-replace text-left' hidden>"+ data.trans_dtl[x]['replace_date'] +
                        "</td><td class='tbl-prod-grade text-left' hidden> "+ data.trans_dtl[x]['prod_grade'] +  

                        "</td><td class='tbl-prod-no text-left' hidden>"+ data.trans_dtl[x]['prod_id'] +
                        "</td><td class='tbl-prod-name text-left' hidden>"+ data.trans_dtl[x]['prod_id'] +
                        "</td><td class='tbl-qty text-left' hidden>"+ data.trans_dtl[x]['prod_id'] +

                        "</td><td class='tbl-prod-id-replace text-left' hidden>"+ data.trans_dtl[x]['prod_id'] + 
                        "</td><td class='tbl-id text-left' hidden>"+ data.trans_dtl[x]['sales_reference'] + 

                        "</td><td class='text-center text-red remove_item' style='width: 1%;'>"+ "<i class='fa fa-minus-circle remove_item_table' style='color:red;cursor:pointer;' id='remove_item_table'></i>" +
                        "</tr>");

                }

                $("#tbl-sales-products").show();
                $("#tbl-products").hide();                
            }else{
                for(var x=0; x<data.trans_dtl.length; x++) {    
                    i++;
                    $("#tbl-products tbody").append("<tr class='item_row_table'>"+
                    "<td class='tbl_prod_id' hidden>"+ data.trans_dtl[x]['prod_id'] +
                    "<td class='tbl_prod_no' style='width: 2.5%;'>"+ data.trans_dtl[x]['product_no'] +
                    "</td><td class='tbl_prod_name' style='width: 7%;'>"+ data.trans_dtl[x]['product_name'] +
                    "</td><td class='tbl_qty' style='width: 1.5%;'>"+ $.number(data.trans_dtl[x]['qty'], 2) +
                    "</td><td class='tbl_unit' style='width: 1%;'>"+ data.trans_dtl[x]['unit_code'] +
                    "</td><td class='tbl_currency' style='width: 1.5%;'>"+ $("#currency :selected").text() +
                    "</td><td class='tbl_price' style='width: 2%;'>"+ $.number(data.trans_dtl[x]['cost'], 2) +
                    "</td><td class='tbl_total_price' style='width: 2%;'>"+ $.number(data.trans_dtl[x]['total_cost'], 2) +
                    "</td><td class='text-center text-red' style='width:1%;'>"+ 
                    "<i class='fa fa-minus-circle remove_item_table' style='color:red' id='remove_item_table'></i>" +
                    "</td></tr>");
                }
                $("#tbl-sales-products").hide();
                $("#tbl-products").show();                
            }


            
        }, error: function(err){
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
        url : base_url + "inventory_issue/currency",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            $("#currency").append("<option value='"+data.data.id+"'>"+data.data.curr_code+"</option>");
        }, error : function(err){
            console.log(err.responseText);
        }
    }); 
}

function product_onhand(prod_id){
    var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {prod_id : prod_id, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "inventory_issue/product_onhand",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            $("#qty_on_hand").val($.number(data.result, 2));
            $("#sales_replacement_stock_on_hand").val($.number(data.result, 2));
        }, error : function(err){
            console.log(err.responseText);
        }
    })
}

function account_vat(){
    var csrf_name = $("input[name=csrf_name]").val();
    var obj = "";
    $.ajax({
        async : false,
        data : {csrf_name : csrf_name},
        type : "GET",
        dataType : "JSON",
        url : base_url + "inventory_issue/account_vat",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            obj = JSON.parse(data.result);            
        }, error : function(err){
            console.log(err.responseText);
        }
    })

    return obj;
}

function trans_type(){
    var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
        type : "GET",
        dataType : "JSON",
        url : base_url + "inventory_issue/trans_type",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            var result = data.data;
            for (var i = 0; i < result.length; i++) {
                $("#trans_type").append("<option value='"+result[i].id+"'>"+result[i].inventory_ref_type+"</option>");
            }
            get_issue(getCookie('issue_id'));
        }, error : function(err){
            console.log(err.responseText);
        }
    });    

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
        url : base_url + "inventory_issue/sales_register",
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

    $('#tbl-sales-products tbody tr').each(function (row, tr){
        arr_id[row] = $(tr).find(".tbl-id").text();
    });    


    $.ajax({
        data : {id : id, arr_id : arr_id, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "inventory_issue/sales_register_products",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            $("#sales_register_dtl").html(result.result);
        }, error : function(err){
            console.log(err.responseText);
        }
    })
}

function replace_product($id, $key){
    $("#sales_replacement_modal").modal("show");
    $("#sales_replacement_row").val($key);
    $("#sales_replacement_type").val("1");

    $("#sales_replacement_prod_no").val($("#tbl-sales-register-dtl tbody tr:eq("+$key+")").find(".tbl-prod-no").text());
    $("#sales_replacement_prod_name").val($("#tbl-sales-register-dtl tbody tr:eq("+$key+")").find(".tbl-prod-name").text());
    $("#sales_replacement_qty").val($("#tbl-sales-register-dtl tbody tr:eq("+$key+")").find(".tbl-qty").text());

    $("#sales_replacement_prod_no_replace").val("");
    $("#sales_replacement_prod_no_replace").attr("data-id", "0");
    $("#sales_replacement_prod_name_replace").val("");
    $("#sales_replacement_stock_on_hand").val("0");
    $("#sales_replacement_prod_qty_replace").val("");
    $("#sales_replacement_prod_unit_replace").val("");
    $("#sales_replacement_date_replace").val("");
    $("#sales_replacement_unit_price_replace").val("");
    $("#sales_replacement_currency_replace").val("");
}

function sales_replacement_details(){
    var row = $("#sales_replacement_row").val();
    var type = $("#sales_replacement_type").val();
    var table = "";

    if (type == "1"){
        table = "#tbl-sales-register-dtl tbody tr:eq("+row+")";
    }else{
        table = "#tbl-sales-products tbody tr:eq("+row+")";
    }

    if ($("#sales_replacement_prod_no_replace").attr("data-id") == "0" 
        || $("#sales_replacement_prod_qty_replace").val() == 0
        || $("#sales_replacement_date_replace").val() == ""){

        if ($("#sales_replacement_prod_no_replace").val() == ""){
            $("#sales_replacement_prod_no_replace").addClass("error");
        }

        if ($("#sales_replacement_prod_name_replace").val() == ""){
            $("#sales_replacement_prod_name_replace").addClass("error");
        }

        if ($("#sales_replacement_prod_qty_replace").val() == "" || $("#sales_replacement_prod_qty_replace").val() == 0){
            $("#sales_replacement_prod_qty_replace").addClass("error");
        }

        if ($("#sales_replacement_date_replace").val() == ""){
            $("#sales_replacement_date_replace").addClass("error");
        }

        swal({
            type : "warning",
            title : "Please input all requried fields"
        })

    }else{
        $(table).find(".tbl-prod-id-replace").text($("#sales_replacement_prod_no_replace").attr("data-id"));
        $(table).find(".tbl-prod-no-replace").text($("#sales_replacement_prod_no_replace").val());
        $(table).find(".tbl-prod-name-replace").text($("#sales_replacement_prod_name_replace").val());
        $(table).find(".tbl-qty-replace").text($("#sales_replacement_prod_qty_replace").val());
        $(table).find(".tbl-unit-replace").text($("#sales_replacement_prod_unit_replace").val());
        $(table).find(".tbl-unit-price-replace").text($("#sales_replacement_unit_price_replace").val());
        $(table).find(".tbl-total-price-replace").text($.number(($("#sales_replacement_prod_qty_replace").val() * $("#sales_replacement_unit_price_replace").val()),2));
        $(table).find(".tbl-date-replace").text($("#sales_replacement_date_replace").val());        
    }
}

function sales_register_add_table(){

    var total = 0;

    $('#tbl-sales-register-dtl tbody tr').each(function (row, tr){
        var tbl_qty_replace = $(tr).find(".tbl-qty-replace").text() == '' ? 0 : Number($(tr).find(".tbl-qty-replace").text());

        if (tbl_qty_replace != 0){

            var qty = $(tr).find(".tbl-qty-replace").text();
            var unit_price = $(tr).find(".tbl-unit-price-replace").text();
            total = qty * unit_price;

            $("#tbl-sales-products").append("<tr class='sales_row_table cursor-pointer'>"+

                "<td class='tbl-prod-no-replace text-left' style='width: 2.5%;'>" + $(tr).find(".tbl-prod-no-replace").text() +
                "</td><td class='tbl-prod-name-replace text-left' style='width: 7%;'>" + $(tr).find(".tbl-prod-name-replace").text() +
                "</td><td class='tbl-qty-replace text-left' style='width: 2%;'>" + $.number($(tr).find(".tbl-qty-replace").text(), 2) +
                "</td><td class='tbl-unit-replace text-left' style='width: 1%;'>" + $(tr).find(".tbl-unit-replace").text() + 
                "</td><td class='tbl-unit-price-replace text-left' style='width: 1.5%;'>"+ $.number($(tr).find(".tbl-unit-price-replace").text(),2) + 
                "</td><td class='tbl-total-price-replace text-left' style='width: 2%;'>"+ $.number(total,2) + 

                "</td><td class='tbl-date-replace text-left' hidden>"+ $(tr).find(".tbl-date-replace").text() +
                "</td><td class='tbl-prod-grade text-left' hidden> 1"+ 

                "</td><td class='tbl-prod-no text-left' hidden>"+ $(tr).find(".tbl-prod-no").text() +
                "</td><td class='tbl-prod-name text-left' hidden>"+ $(tr).find(".tbl-prod-name").text() +
                "</td><td class='tbl-qty text-left' hidden>"+ $(tr).find(".tbl-qty").text() +

                "</td><td class='tbl-prod-id-replace text-left' hidden>"+ $(tr).find(".tbl-prod-id-replace").text() + 
                "</td><td class='tbl-id text-left' hidden>"+ $(tr).find(".tbl-id").text() + 

                "</td><td class='text-center text-red remove_item' style='width: 1%;'>"+ "<i class='fa fa-minus-circle remove_item_table' style='color:red;cursor:pointer;' id='remove_item_table'></i>" +
                "</tr>");
        }        

    });

}

function compute_total(){
    var qty = $("#qty").val();
    var price = $("#prod_price").val();

    var total = Number(qty) * Number(price);

    $("#prod_total_price").val(total);
}

function edit_sales_replacement(row){
    var table = "#tbl-sales-products tbody tr:eq("+row+")";

    // $("#sales_replacement_prod_no").val($(table).find(".tbl-prod-no").text());
    // $("#sales_replacement_prod_name").val($(table).find(".tbl-prod-name").text());
    // $("#sales_replacement_qty").val($(table).find(".tbl-qty").text());

    $("#sales_replacement_prod_no_replace").val($(table).find(".tbl-prod-no-replace").text());
    $("#sales_replacement_prod_no_replace").attr("data-id", $(table).find(".tbl-prod-id-replace").text());
    $("#sales_replacement_prod_name_replace").val($(table).find(".tbl-prod-name-replace").text());
    $("#sales_replacement_prod_qty_replace").val($(table).find(".tbl-qty-replace").text());
    $("#sales_replacement_prod_unit_replace").val($(table).find(".tbl-unit-replace").text());
    $("#sales_replacement_date_replace").val($(table).find(".tbl-date-replace").text());
    $("#sales_replacement_unit_price_replace").val($(table).find(".tbl-unit-price-replace").text());

    product_onhand($(table).find(".tbl-prod-id-replace").text());
    sales_product_dtl($(table).find(".tbl-id").text());
    $("#sales_replacement_modal").modal("show");

}

function sales_product_dtl(id){
    var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {id : id, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "inventory_issue/sales_product_dtl",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            $("#sales_replacement_prod_no").val(data.prod_no);
            $("#sales_replacement_prod_name").val(data.prod_name);
            $("#sales_replacement_qty").val(data.qty);
        }, error : function(err){
            console.log(err.responseText);
        }
    })
}

function add_item_table(){
    var qty = $("#qty").val();
    var tran_type = $("#trans_type").val();

    if (tran_type == "5"){
        $("#tbl-sales-products tbody").append("<tr class='sales_row_table cursor-pointer'>"+
            "<td class='tbl-prod-no-replace text-left' style='width: 2.5%;'>" + $("#prod_no").val() +
            "</td><td class='tbl-prod-name-replace text-left' style='width: 7%;'>" + $("#prod_name").val() +
            "</td><td class='tbl-qty-replace text-left' style='width: 2%;'>" + $.number($("#qty").val(), 2) +
            "</td><td class='tbl-unit-replace text-left' style='width: 1%;'>" + $("#prod_unit").val() + 
            "</td><td class='tbl-unit-price-replace text-left' style='width: 1.5%;'>"+ $.number($("#prod_price").val(),2) + 
            "</td><td class='tbl-total-price-replace text-left' style='width: 2%;'>"+ $.number($("#prod_total_price").val(),2) + 

            "</td><td class='tbl-date-replace text-left' hidden>"+  
            "</td><td class='tbl-prod-grade text-left' hidden>"+  $("#prod_grade").val() + 

            "</td><td class='tbl-prod-id-replace text-left' hidden>"+ $("#prod_no").data("id") + 
            "</td><td class='tbl-id text-left' hidden>"+  

            "</td><td class='text-center text-red remove_item' style='width: 1%;'>"+ "<i class='fa fa-minus-circle remove_item_table' style='color:red;cursor:pointer;' id='remove_item_table'></i>" +
            "</td></tr>");

    }else{

    $("#tbl-products tbody").append("<tr class='item_row_table cursor-pointer'>"+
        "<td class='tbl_prod_no text-left' style='width: 2.5%;'>" + $("#prod_no").val() +
        "</td><td class='tbl_prod_name text-left' style='width: 7%;'>" + $("#prod_name").val() +
        "</td><td class='tbl_qty text-left' style='width: 1.5%;'>" + $.number($("#qty").val(), 2) +
        "</td><td class='tbl_unit text-left' style='width: 1%;'>" + $("#prod_unit").val() + 
        "</td><td class='tbl_currency text-left' style='width: 1.5%;'>" + $("#currency :selected").text() +
        "</td><td class='tbl_price text-left' style='width: 2%;'>"+ $.number($("#prod_price").val(),2) + 
        "</td><td class='tbl_total_price text-left' style='width: 2%;'>"+ $.number($("#prod_total_price").val(),2) + 
        "</td><td class='tbl_prod_grade text-left' style='width: 7%;' hidden>" + $("#prod_grade").val() +
        "</td><td class='tbl_prod_id text-left' hidden>"+ $("#prod_no").data("id") + 
        "</td><td class='text-center text-red remove_item' style='width: 1%;'>"+ "<i class='fa fa-minus-circle remove_item_table' style='color:red;cursor:pointer;' id='remove_item_table'></i>" +
        "</td></tr>");

    }

    reset_item_input();
}

function select_row_table(row){
    var trans_type = $("#trans_type").val();
    var table = "";

    if (trans_type == "5"){
        table = "#tbl-sales-products tbody tr:eq(" + row + ")";
        $("#prod_no").attr("data-id", $(table).find(".tbl-prod-id-replace").text());
        $("#prod_no").val($(table).find(".tbl-prod-no-replace").text());
        $("#prod_name").val($(table).find(".tbl-prod-name-replace").text());
        $("#qty").val($(table).find(".tbl-qty-replace").text());
        $("#prod_unit").val($(table).find(".tbl-unit-replace").text());
        $("#prod_price").val($(table).find(".tbl-unit-price-replace").text());
        $("#prod_total_price").val($(table).find(".tbl-total-price-replace").text());        
        $("#prod_grade").val($(table).find(".tbl-prod-grade").text());
    }else{
        table = "#tbl-products tbody tr:eq("+row+")";
        $("#prod_no").attr("data-id", $(table).find(".tbl_prod_id").text());
        $("#prod_no").val($(table).find(".tbl_prod_no").text());
        $("#prod_name").val($(table).find(".tbl_prod_name").text());
        $("#qty").val($(table).find(".tbl_qty").text());
        $("#prod_unit").val($(table).find(".tbl_unit").text());
        $("#prod_curr").val($(table).find(".tbl_currency").text());
        $("#prod_price").val($(table).find(".tbl_price").text());
        $("#prod_total_price").val($(table).find(".tbl_total_price").text());        
        $("#prod_grade").val($(table).find(".tbl_prod_grade").text());        
    }

    $(".btn-exit").show();
    $(".btn-enter").show();
    $(".prod_entry").collapse('show');
}

function find_onhand_qty(id){

}

function edit_item_table(){

    var trans_type = $("#trans_type").val();
    var row = $("#tbl_item_row").val();
    var table = "";

    if (trans_type == "5"){
        table = "#tbl-sales-products tbody tr:eq("+row+")";
        $(table).find(".tbl-prod-no-replace").text($("#prod_no").val());
        $(table).find(".tbl-prod-name-replace").text($("#prod_name").val());
        $(table).find(".tbl-unit-replace").text($("#prod_unit").val());
        $(table).find(".tbl-qty-replace").text($.number($("#qty").val(),2));
        $(table).find(".tbl-unit-price-replace").text($.number($("#prod_price").val(), 2));
        $(table).find(".tbl-total-price-replace").text($.number(($("#prod_price").val() * $("#qty").val()), 2));
        $(table).find(".tbl-prod-id-replace").text($("#prod_no").attr("data-id"));
    }else{
        table = "#tbl-products tbody tr:eq("+row+")";
        $(table).find(".tbl_prod_no").text($("#prod_no").val());
        $(table).find(".tbl_prod_name").text($("#prod_name").val());
        $(table).find(".tbl_unit").text($("#prod_unit").val());
        $(table).find(".tbl_qty").text($.number($("#qty").val(),2));
        $(table).find(".tbl_currency").text($("#prod_curr").val());
        $(table).find(".tbl_price").text($.number($("#prod_price").val(), 2));
        $(table).find(".tbl_total_price").text($.number(($("#prod_price").val() * $("#qty").val()), 2));
        $(table).find(".tbl_prod_id").text($("#prod_no").attr("data-id"));
    }

    reset_item_input();
}

function reset_item_input(){
    $(".prod_entry").find(":input").val("");
    $('.prod_entry select').prop('selectedIndex',0);
    $("#tbl_item_row").val("");
    $(".btn-exit").hide();
    $(".btn-enter").hide();
    $(".prod_entry").collapse('hide');
}

function check_required_fields(){
    var issue_no =  $('#issue_no').val();
    var issue_date =  $('#issue_date').val();
    var trans_type =  $('#trans_type').val();
    var recipient_code = $('#recipient_code').data('id');
    var recipient_type = $('#recipient_code').data('type');
    var recipient_name = $('#recipient_name').val();
    var trans_no = $('#trans_no').val();
    var purpose = $('#purpose').val();
    var issue_outlet = $('#issue_outlet').data('id');
    var trans_date = $('#trans_date').val();
    var id = getCookie('issue_id');


    if (trans_type == "5"){
        var total_tr = $('#tbl-sales-products > tbody > tr').length;
    }else{
        var total_tr = $('#tbl-products > tbody > tr').length;
    }

    if(jQuery.trim(issue_no).length <= 0 || jQuery.trim(issue_date).length <= 0 || 
        jQuery.trim(trans_type).length <= 0 || jQuery.trim(recipient_code).length <= 0
        || jQuery.trim(recipient_name).length <= 0 || total_tr <= 0) {
            $("#save").prop("disabled", false);

            swal({
                type : 'warning',
                title : 'Please fill up required fields.',
                timer : 2000
            });

            if (jQuery.trim(issue_no).length <= 0){
                $("#issue_no").addClass("error");
            }

            if (jQuery.trim(trans_type).length <= 0){
                $("#trans_type").addClass("error");
            }

            if (jQuery.trim(issue_no).length <= 0){
                $("#issue_no").addClass("error");
            }

            if (jQuery.trim(recipient_code).length <= 0){
                $("#recipient_code").addClass("error");
            }

            if (jQuery.trim(recipient_name).length <= 0){
                $("#recipient_name").addClass("error");
            }

            return false; 
    }else{
        var csrf_name = $("input[name=csrf_name]").val();
        $.ajax({
            data : {"issue_no" : issue_no, "id" : id, csrf_name : csrf_name},
            type : "POST",
            dataType : "JSON",
            url : base_url + "inventory_issue/inv_no_w_id",
            success : function(result){
                $("input[name=csrf_name]").val(result.token);
                if (result.result > 0){
                    $("#save").prop("disabled", false);
                    swal({
                        type : "error",
                        timer : 2000,
                        title : "Issue no is already exists"
                    })
                }else{
                    data_saving();
                }
            }, error : function (err){
                console.log(err.responseText);
            }
        })
    }
}

function data_saving(id){
      var csrf_name = $("input[name=csrf_name]").val();
      var issue_no =  $('#issue_no').val();
      var issue_date =  $('#issue_date').val();
      var trans_type =  $('#trans_type').val();
      var recipient_code = $('#recipient_code').attr('data-id');
      var recipient_type = $("#recipient_code").attr('data-type_1');
      var recipient_name = $('#recipient_name').val();
      var trans_no = $('#ref_trans_no').val();
      var purpose = $('#purpose').val();
      var issue_outlet = $('#issue_outlet').data('id');
      var trans_date = $('#ref_trans_date').val();
      var id = getCookie('issue_id');
      var sum = 0;
        $(".tbl_qty").each(function () {
            var num = $(this).text().replace(/,/g, "");
            if ($(this).text().length != 0) {
                sum += parseFloat(num);
            }
        });
      

      var dtl_data = [];
      var issue_hdr = {
            inv_no : issue_no,
            inv_date : issue_date,
            tran_type : trans_type,
            recipient_type : recipient_type,
            recipient_id : recipient_code,
            ref_trans_no : trans_no,
            ref_trans_date : trans_date,
            remarks : purpose,
      } 

      if(jQuery.trim(issue_no).length <= 0 || jQuery.trim(issue_date).length <= 0 || 
        jQuery.trim(trans_type).length <= 0 || jQuery.trim(recipient_code).length <= 0
        || jQuery.trim(recipient_name).length <= 0 ) {
            swal({
                type : 'warning',
                title : 'Please fill up required fields.',
                timer : 2000
            });

            if (jQuery.trim(issue_no).length <= 0){
                $("#issue_no").addClass("error");
            }

            if (jQuery.trim(trans_type).length <= 0){
                $("#trans_type").addClass("error");
            }

            if (jQuery.trim(issue_no).length <= 0){
                $("#issue_no").addClass("error");
            }

            if (jQuery.trim(recipient_code).length <= 0){
                $("#recipient_code").addClass("error");
            }

            if (jQuery.trim(recipient_name).length <= 0){
                $("#recipient_name").addClass("error");
            }

            return false;        
      }

      if (trans_type == "5"){
        var total_tr = $('#tbl-sales-products > tbody > tr').length;
      }else{
        var total_tr = $('#tbl-products > tbody > tr').length;
      }


      if (total_tr<=0) {
            swal({
                type : 'warning',
                title : 'Add items',
                timer : 2000
            });
             return false ;  
      }
      var vat_account = account_vat();
      var vat_cost = "";
      var cost_w_vat = "";
      var cost_w_o_vat = "";
      var net_vat = "";
      var w_vat = "";
      var w_o_vat = "";
      var total_amount = "";
      var unit_price_w_vat = "";
      var unit_price_w_o_vat = "";
      var unit_price = "";
      var qty = "";

      if (trans_type == "5"){
          $('#tbl-sales-products tbody tr').each(function (row, tr){

            unit_price = str_to_num($(tr).find('.tbl-unit-price-replace').text());
            qty = str_to_num($(tr).find('.tbl-qty-replace').text());
            total_amount = qty * unit_price;

            if (vat_account == "1"){
                unit_vat = unit_price * 0.12;
                unit_price_w_vat = unit_price;
                unit_price_w_o_vat = unit_price / 1.12;
            }else{
                total_vat = 0;
                unit_price_w_o_vat = unit_price;
                unit_price_w_vat = unit_price * 1.12;

                vat_cost = 0;
                total_net_vat = 0;
            }

                total_w_vat = qty * Number(unit_price_w_vat).toFixed(2);
                total_w_o_vat = qty * Number(unit_price_w_o_vat).toFixed(2);
                vat_cost = unit_price_w_vat - unit_price_w_o_vat;
                total_net_vat = Number(total_w_vat).toFixed(2) - Number(total_w_o_vat).toFixed(2);

                var sub = {
                    'prod_id' : $(tr).find('.tbl-prod-id-replace').text(),
                    'qty' : str_to_num($(tr).find('.tbl-qty-replace').text()),
                    'cost' : str_to_num($(tr).find('.tbl-unit-price-replace').text()),
                    'total_cost' : total_amount,
                    'currency' : $("#currency").val(),

                    'vat' : JSON.stringify(vat_account),
                    'vat_cost' : Number(vat_cost).toFixed(2),
                    'cost_w_vat' : Number(unit_price_w_vat).toFixed(2),
                    'cost_w_o_vat' : Number(unit_price_w_o_vat).toFixed(2),
                    'net_vat' : Number(total_net_vat).toFixed(2),
                    'w_vat' : Number(total_w_vat).toFixed(2),
                    'w_o_vat' : Number(total_w_o_vat).toFixed(2),
                    'prod_grade' : $(tr).find('.tbl-prod-grade').text(),
                    'replace_date' : $(tr).find('.tbl-date-replace').text(),
                    'sales_reference' : $(tr).find('.tbl-id').text()

                } 
                    dtl_data.push(sub);            
           });

      }else{
          $('#tbl-products tbody tr').each(function (row, tr){

            unit_price = str_to_num($(tr).find('.tbl_price').text());
            qty = str_to_num($(tr).find('.tbl_qty').text());
            total_amount = qty * unit_price;

            if (vat_account == "1"){
                unit_vat = unit_price * 0.12;
                unit_price_w_vat = unit_price;
                unit_price_w_o_vat = unit_price / 1.12;
            }else{
                total_vat = 0;
                unit_price_w_o_vat = unit_price;
                unit_price_w_vat = unit_price * 1.12;

                vat_cost = 0;
                total_net_vat = 0;
            }

                total_w_vat = qty * Number(unit_price_w_vat).toFixed(2);
                total_w_o_vat = qty * Number(unit_price_w_o_vat).toFixed(2);
                vat_cost = unit_price_w_vat - unit_price_w_o_vat;
                total_net_vat = Number(total_w_vat).toFixed(2) - Number(total_w_o_vat).toFixed(2);

                var sub = {
                    'prod_id' : $(tr).find('.tbl_prod_id').text(),
                    'qty' : str_to_num($(tr).find('.tbl_qty').text()),
                    'cost' : str_to_num($(tr).find('.tbl_price').text()),
                    'total_cost' : total_amount,
                    'currency' : $("#currency").val(),

                    'vat' : JSON.stringify(vat_account),
                    'vat_cost' : Number(vat_cost).toFixed(2),
                    'cost_w_vat' : Number(unit_price_w_vat).toFixed(2),
                    'cost_w_o_vat' : Number(unit_price_w_o_vat).toFixed(2),
                    'net_vat' : Number(total_net_vat).toFixed(2),
                    'w_vat' : Number(total_w_vat).toFixed(2),
                    'w_o_vat' : Number(total_w_o_vat).toFixed(2),
                    'prod_grade' : $(tr).find('.tbl_prod_grade').text(),
                    'replace_date' : '',
                    'sales_reference' : ''

                } 
                    dtl_data.push(sub);            
           });

      }
      
      var data = {issue_hdr:issue_hdr, issue_dtl: dtl_data,hdr_id:id, csrf_name : csrf_name};

      $.ajax({

            data : data
            , type: "POST"
            , url: base_url + "inventory_issue/update_data"
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
                    title : "Successfully Updated",
                    timer : 2000
                }, function(){
                    eraseCookie('issue_id');
                    location.reload();
                })
            }, error: function(err) {
                console.log(err.responseText);
            }
      });  
};

// function add_item_table(){
//     var qty = $("#qty").val();
//     $("#tbl-products tbody").append("<tr class='item_row_table'><td class='tbl_prod_no'>"+ $("#prod_no").val() +
//         "</td><td class='tbl_prod_name'>"+ $("#prod_name").val() +
//         "</td><td class='tbl_unit'>PCS"+ 
//         "</td><td class='tbl_onhand'>"+ 
//         "</td><td class='tbl_qty'>"+ $.number($("#qty").val(), 2) +
//         "</td><td class='tbl_currency'>Php"+
//         "</td><td class='text-center text-red remove_item'>"+ "<i class='fa fa-minus-circle remove_item_table' style='color:red;cursor:pointer;' id='remove_item_table'></i>" +
//         "</td></tr>");
//     reset_input();
// }


function reset_input(){
    $("#prod_no").val("");
    $("#prod_name").val("");
    $("#product_specs").val("");
    $("#product_type").val("");
    $("#product_brand").val("");
    $("#product_model").val("");
    $("#product_category").val("");
    $("#product_color").val("");
    $("#product_class").val("");
    $("#product_size").val("");
    $("#qty").val("00");
    $("#cost").val("00");
    $("#img-upload").attr("src", "");

    $(".prod_entry").collapse('hide');
}

function get_outlet_name(id){
    var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
        url: base_url + "inventory_issue/get_outlet_name/", 
        dataType: "json",
        type: "GET",
        success: function(data){
            $("input[name=csrf_name]").val(data.token);
            $("#issue_outlet").val(data.data[0].outlet_name);
        }, error: function(err){
            console.log("Error: " + err.responseText);
        }
    });
}

function preview(){
    var trans_no = $("#issue_no").val();
    var trans_date  = convert_date($("#issue_date").val());
    var trans_type = $("#trans_type :selected").text();
    var recipient_code = $("#recipient_code").val();
    var recipient_name = $("#recipient_name").val();
    var ref_trans_no = $("#ref_trans_no").val();
    var ref_trans_date = convert_date($("#ref_trans_date").val());
    var reason = $("#purpose").val();
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


function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}
