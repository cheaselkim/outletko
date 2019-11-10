$(document).ready(function(){

	outlet();
	query_data();

	$("#search").click(function(){
		query_data();
	});
		
	$("#sales_discount_name").autocomplete({
        minLength: 0,
        source: base_url + "Sales_discount/search_field/",
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

});

function outlet(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Sales_discount/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#prod_color_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = $("#app_func").val();
	var sales_discount_outlet = $("#sales_discount_outlet").val();
	var sales_discount_name = $("#sales_discount_name").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : sales_discount_outlet, sales_discount : sales_discount_name, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Sales_discount/query_sales_discount",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-query").html(result.output);
			$("#sales_discount_no").val(result.count);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function delete_sales_discount(id,key){
	var value = $("#tbl-data tbody tr:eq("+(key)+")").find("td:eq(2)").text();
	var	csrf_name = $("input[name=csrf_name]").val();
	swal({
		title: "Are you sure do you want to Delete Sales Discount : "+ value +" ?",
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
			    	data : {"id" : id, csrf_name : csrf_name},
			    	url : base_url + "Sales_discount/delete_sales_discount",
			    	type : "POST",
			    	dataType : "JSON",
			    	success : function (result){
						$("input[name=csrf_name]").val(result.token);
			      		query_data();

				      swal({
				      	type : "success",
				      	title : "Successfully Deleted"
				      }, function(){
				      	location.relaod();
				      });
				    }, error : function(err){
				    	console.log(err.responseText);
			    	}       
				});
			}else{
			    swal("Cancelled", "", "error");
			}
	});
}

function edit_sales_discount(id){
	$("body").empty();
	$("body").load(base_url + "menu/edit_menu/4/23/2/"+id);
}

