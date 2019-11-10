$(document).ready(function(){

	outlet();
	query_data();

	$("#search").click(function(){
		query_data();
	});
	
	$('#outlet_type_outlet').change(function() {
        query_data();
    });
	
	$("#outlet_type_desc").autocomplete({
        minLength: 0,
        source: base_url + "outlet_type/search_field/",
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
		url : base_url + "outlet_type/outlet",
		success: function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#outlet_type_outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var app_func = $("#app_func").val();
	var prod_color_outlet = $("#prod_color_outlet").val();
	var prod_color_desc = $("#prod_color_desc").val();
	var	csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {app_func : app_func, outlet : prod_color_outlet, color_desc : prod_color_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "outlet_type/query_outlet_type",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-query").html(result.output);
			$("#count").val(result.count);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function delete_outlet_type(id,key){
	var value = $("#tbl-data tbody tr:eq("+(key)+")").find("td:eq(1)").text();
	var	csrf_name = $("input[name=csrf_name]").val();
	swal({
		title: "Are you sure do you want to Delete Outlet Type : "+ value +" ?",
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
			    	url : base_url + "outlet_type/delete_outlet_type",
			    	type : "POST",
			    	dataType : "JSON",
			    	success : function (result){
						$("input[name=csrf_name]").val(result.token);
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

function edit_outlet_type(id){
	$("body").empty();
	$("body").load(base_url + "menu/edit_menu/4/26/2/"+id);
}
