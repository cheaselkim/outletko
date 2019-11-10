$(document).ready(function(){
    trans_type();
    outlet();
    var outlet2 = $('#outlet').val();
    var keyword = $('#keyword').val();
    var type = $('#trans_type').val();
    var trans_date = $('#trans_date').val();
	query_transfer(keyword,type,outlet2,trans_date);

	$('#search').click(function() {
        var keyword = $('#keyword').val();
        var type = $('#trans_type').val();
        var outlet = $('#outlet').val();
        var trans_date = $('#trans_date').val();
        query_transfer(keyword,type,outlet,trans_date);
    });
  
  $('#outlet').change(function() {
    var outlet = $(this).val();
    var keyword = $('#keyword').val();
    var type = $('#trans_type').val();
    var trans_date = $('#trans_date').val();
    query_transfer(keyword,type,outlet,trans_date);
  });
  
  $('#trans_type').change(function() {
    var type = $(this).val();
    var keyword = $('#keyword').val();
    var outlet = $('#outlet').val();
    var trans_date = $('#trans_date').val();
    query_transfer(keyword,type,outlet,trans_date);
  });

});

function trans_type(){
  $.ajax({
    url : base_url + "Inventory_transfer/get_trans_type",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      for (var i = 0; i < data.length; i++) {
        $("#trans_type").append("<option value='"+data[i].id+"'>"+data[i].inventory_ref_type  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function outlet(){
  $.ajax({
    url : base_url + "Inventory_transfer/get_outlet",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      for (var i = 0; i < data.length; i++) {
        $("#outlet").append("<option value='"+data[i].id+"'>"+data[i].outlet_name  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function query_transfer(keyword="",type="",outlet="",trans_date=""){

	var app_func = $("#app_func").val();
	var fdate = "";
	var tdate = "";

    
	$.ajax({
		data : {"keyword" : keyword, app_func : app_func, type : type, outlet : outlet, trans_date : trans_date},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Inventory_transfer/query_inventory_transfer",
		success : function(result){
		    //console.log(result);
			$("#query-table").html(result);
		}, error : function(err){
			console.log("error " + err.responseText);
		}
	});

}

function cancel_transfer(id,key){
	var value = $("#tbl-data tbody tr:eq("+(key)+")").find("td:eq(0)").text();
	swal({
		title: "Are you sure do you want to Cancel Transfer#: "+ value +" ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Confirm',
		closeOnConfirm: false,
		closeOnCancel: false,
		timer: 3000
		},function(isConfirm){
			if (isConfirm){
			  	$.ajax({
			    	data : {"id" : id},
			    	url : base_url + "Inventory_transfer/cancel_transfer",
			    	type : "POST",
			    	dataType : "JSON",
			    	success : function (result){
			      		query_data();
				      swal("Successfully Cancel", "", "success");
				    }, error : function(err){
				    	console.log(err.responseText);
			    	}       
				});
			}else{
			    swal("Cancelled", "", "error");
			}
	});
}

function view_transfer(id, rcpt_type){

  $("#modal_query").modal("show");
  $("#modal_query").find(":input").attr("readonly", true);
  $("#mod_tot_amount").number(true,2);
  $("#mod_ave_cost").number(true,2);

  $.ajax({
    data : {"id" : id, "rcpt_type" : rcpt_type},
    url : base_url + "Inventory_transfer/view_transfer",
    type : "POST",
    dataType : "JSON",
    success : function (result){
      var data = result.header;
      $("#mod_transfer_no").val(data[0].inv_no);
      $("#mod_transfer_date").val(data[0].inv_date);
      $("#mod_ref_no").val(data[0].ref_trans_no);
      $("#mod_ref_date").val(data[0].ref_trans_date);
      $("#mod_cust_code").val(data[0].outlet_code);
      $("#mod_cust_name").val(data[0].outlet_name);
      $("#mod_trans_type").val(data[0].inventory_ref_type);
      $("#mod_ave_cost").val(data[0].ave_cost);
      $("#mod_tot_amount").val(data[0].total_amount);
      $("#div_query_items").html(result.detail);
    }, error : function(err){
      console.log("error" + err.responseText);
    }
  });
}

function edit_transfer(id){
	$("body").empty();
	$("body").load(base_url + "menu/edit_menu/3/3/2/"+id);
}