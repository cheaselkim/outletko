$(document).ready(function(){

	search_query();
    outlet();
	var app_func = $("#app_func").val();

	if (app_func == "3"){
		//$("#status").attr("disabled", false);
		$("#lbl_status").show();
	}else{
		$("#status").empty();
		$("#status").append("<option value='1'>Open</option>");
		//$("#status").attr("disabled", true);
		$("#lbl_status").hide();
	}

	$("#btn_search").click(function(){
		search_query();
	});
	
	$('#search').click(function() {
      search_query();
    });

    $("#keyword").autocomplete({
      minLength: 0,
      source: base_url + "Sales/search_trans/",
      focus: function( event, ui ) {
        return false;
      },
      select: function( event, ui ) {
        $(this).val(ui.item.term);
        return false; 
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
        .append( "<div>" + item.term + "</div>" )
        .appendTo( ul );
    };  
    
    $('#outlet').change(function() {
        search_query();
    });
    
    $('#status').change(function() {
        search_query();
    });
    
    setTimeout(function(){
        eraseCookie('sales_force_id');
        location.reload();
    }, 1000 * 60 *30);


});

function pad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}

function outlet(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Sales/outlet",
		success: function(data){
			for (var i = 0; i < data.length; i++) {
				$("#outlet").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function search_query(){
    var csrf_name = $("input[name=csrf_name]").val();
	var keyword = $("#keyword").val();
	var status = $("#status").val();
	var trans_date = $("#trans_date").val();
	var outlet = $("#outlet").val();
	var app_func = $("#app_func").val();

	$.ajax({
		data : {"keyword" : keyword, "status" : status, "type" : app_func, "trans_date" : trans_date, "outlet" : outlet, csrf_name : csrf_name},
		url : base_url + "sales/sales_query",
		type : "POST",
		dataType : "JSON",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div_query_tbl").html(result.table);
            $("#sales_trans").val($.number(result.trans,0));
            $("#total_amount").val($.number(result.total_amount, 2));
            $("#sales_discount").val($.number(result.sales_discount, 2));
            $("#grand_total").val($.number(result.grand_total,2));
		}, error: function(err){
			console.log(err.responseText);
		}
	});	

}

function view_query(id){

	$("#mod_discount_sales").number(true,2);
	$("#mod_tot_amount").number(true,2);
	$("#mod_tot_vat").number(true,2);
	$("#mod_net_vat").number(true,2);
	$("#modal_query").modal("show");
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {"id" : id, csrf_name : csrf_name},
		url : base_url + "Sales/select_id",
		type : "POST",
		dataType : "JSON",
		success : function (result){
			$("input[name=csrf_name]").val(result.token);
			console.log(result.header);
			var data = result.header;
			$("#div_query_items").html(result.detail);
			$("#mod_cust_code").val(data[0].cust_code);
			$("#mod_cust_name").val(data[0].cust_name);
			$("#mod_trans_no").val(data[0].trans_no);
			$("#mod_discount_sales").val(data[0].sales_discount);
			$("#mod_tot_amount").val(data[0].total_amount);
			$("#mod_tot_vat").val(data[0].vat_amount);
			$("#mod_net_vat").val((Number(data[0].total_amount) - Number(data[0].vat_amount)));
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}

function view_cancel(id,trans_no){
	var csrf_name = $("input[name=csrf_name]").val();

	swal({
		title: "Are you sure do you want to Cancel Transaction #"+pad(trans_no, 5)+" ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Confirm',
		closeOnConfirm: false,
		closeOnCancel: false,
		timer: 2000
	},function(isConfirm){
		if (isConfirm){
			$.ajax({
				data : {"id" : id, csrf_name : csrf_name},
				url : base_url + "Sales/cancel_trans",
				type : "POST",
				dataType : "JSON",
				success : function (result){
					$("input[name=csrf_name]").val(result.token);
					swal("Successfully Cancelled", "", "success");
					search_query();
				}, error : function(err){
					console.log(err.responseText);
				}				
			});
		}else{
		  	swal("Cancelled", "", "error");
		    e.preventDefault();
		}
	});


}

function edit_sales(id){
	$("body").empty();
	setCookie("sales_id",id,5)
	$("body").load(base_url + "menu/edit_menu/1/0/2/"+id);
}

function setCookie(name,value,hours) {
    var expires = "";
    if (hours) {
        var date = new Date();
        date.setTime(date.getTime() + (hours*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}