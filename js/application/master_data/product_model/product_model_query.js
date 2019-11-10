$(document).ready(function(){

	outlet();
	query_data();

	$("#search").click(function(){
		query_data();
	});
	
	$('#prod_model_outlet').change(function() {
        query_data();
    });
	
	$("#prod_model_desc").autocomplete({
        minLength: 0,
        source: base_url + "Product_model/search_field/",
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
		url : base_url + "product_type/outlet",
		success: function(data){
			for (var i = 0; i < data.length; i++) {
				$("#prod_model_outlet").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = $("#app_func").val();
	var prod_model_outlet = $("#prod_model_outlet").val();
	var prod_model_desc = $("#prod_model_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_model_outlet, model_desc : prod_model_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "product_model/query_product_model",
		success: function(result){
			$("#div-query").html(result.output);
			$("#count").val(result.count);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function delete_prod_model(id,key){
	var value = $("#tbl-data tbody tr:eq("+(key)+")").find("td:eq(0)").text();
	var	csrf_name = $("input[name=csrf_name]").val();
	swal({
		title: "Are you sure do you want to Delete Product Model : "+ value +" ?",
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
			    	url : base_url + "product_model/delete_prod_model",
			    	type : "POST",
			    	dataType : "JSON",
			    	success : function (result){
			      		query_data();
				      swal("Successfully Delete", "", "success");
				    }, error : function(err){
				    	console.log(err.responseText);
			    	}       
				});
			}else{
			    swal("Cancelled", "", "error");
			}
	});
}

function edit_prod_model(id){
	$("body").empty();
	$("body").load(base_url + "menu/edit_menu/4/13/2/"+id);
}