$(document).ready(function(){

	trans_type();
    outlet();
    var outlet2 = $('#outlet').val();
    var keyword = $('#keyword').val();
    var type = $('#trans_type').val();
    var ret_date = $('#ret_date').val();
	query_data(keyword,type,outlet2,ret_date);

	$('#search').click(function() {
        var keyword = $('#keyword').val();
        var type = $('#trans_type').val();
        var outlet = $('#outlet').val();
        var ret_date = $('#ret_date').val();
        query_data(keyword,type,outlet,ret_date);
    });
    
    $('#outlet').change(function() {
        var outlet = $(this).val();
        var keyword = $('#keyword').val();
        var type = $('#trans_type').val();
        var ret_date = $('#ret_date').val();
        query_data(keyword,type,outlet,ret_date);
    });
      
      $('#trans_type').change(function() {
        var type = $(this).val();
        var keyword = $('#keyword').val();
        var outlet = $('#outlet').val();
        var ret_date = $('#ret_date').val();
        query_data(keyword,type,outlet,ret_date);
    });

});

function trans_type(){
  $.ajax({
    url : base_url + "Inventory_return/get_trans_type",
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
    url : base_url + "Inventory_return/get_outlet",
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

function query_data(keyword="",type="",outlet="",ret_date=""){
	var app_func = $("#app_func").val();

	$.ajax({
		data : {"keyword" : keyword, app_func : app_func, type : type, outlet : outlet, ret_date : ret_date},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Inventory_return/query_inventory_return",
		success: function(result){
			$("#div-query").html(result);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function cancel_return(id,key){
	var value = $("#tbl-data tbody tr:eq("+(key)+")").find("td:eq(0)").text();
	swal({
		title: "Are you sure do you want to Cancel Return#: "+ value +" ?",
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
			    	url : base_url + "Inventory_return/cancel_return",
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

function view_return(id, rcpt_type){

  $("#modal_query").modal("show");
  $("#modal_query").find(":input").attr("readonly", true);
  $("#mod_tot_amount").number(true,2);
  $("#mod_ave_cost").number(true,2);

  	console.log(id);
  $.ajax({
    data : {"id" : id, "rcpt_type" : rcpt_type},
    url : base_url + "Inventory_return/view_return",
    type : "POST",
    dataType : "JSON",
    success : function (result){
      var data = result.header;
      $("#mod_return_no").val(data[0].inv_no);
      $("#mod_return_date").val(data[0].inv_date);
      $("#mod_ref_no").val(data[0].ref_trans_no);
      $("#mod_ref_date").val(data[0].ref_trans_date);
      $("#mod_cust_code").val(data[0].outlet_code);
      $("#mod_cust_name").val(data[0].outlet_name);
      $("#mod_trans_type").val(data[0].inventory_ref_type);
      $("#mod_ave_cost").val(data[0].ave_cost);
      $("#mod_tot_amount").val(data[0].total_amount);
      $("#div_query_items").html(result.detail);
    }, error : function(err){
      console.log(err.responseText);
    }
  });
}

function edit_return(id){
	$("body").empty();
	$("body").load(base_url + "menu/edit_menu/3/4/2/"+id);
}