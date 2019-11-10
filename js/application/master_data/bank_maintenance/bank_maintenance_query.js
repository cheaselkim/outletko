$(document).ready(function(){

	outlet();
	query_data();

	$("#search").click(function(){
		query_data();
	});
	
	$('#bank_maintenance_outlet').change(function() {
        query_data();
    });
	
	$("#bank_maintenance_desc").autocomplete({
        minLength: 0,
        source: base_url + "bank_maintenance/search_field/",
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
		url : base_url + "bank_maintenance/outlet",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.data;

			for (var i = 0; i < data.length; i++) {
				$("#bank_maintenance_outlet").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}

function query_data(){
	var	csrf_name = $("input[name=csrf_name]").val();
	var app_func = $("#app_func").val();
	var bank_maintenance_outlet = $("#bank_maintenance_outlet").val();
	var bank_maintenance_desc = $("#bank_maintenance_desc").val();

	$.ajax({
		data : {app_func : app_func, outlet : bank_maintenance_outlet, bank_desc : bank_maintenance_desc, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "bank_maintenance/query_bank_maintenance",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			$("#div-query").html(result.output);
			$("#count").val(result.count);
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function delete_bank_maintenance(id,key){
	var	csrf_name = $("input[name=csrf_name]").val();
	var value = $("#tbl-data tbody tr:eq("+(key)+")").find("td:eq(0)").text();
	var account = $("#tbl-data tbody tr:eq("+(key)+")").find("td:eq(2)").text();
	swal({
		title: "Are you sure do you want to Delete Bank Code : "+ value +" ("+account+") ?",
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
			    	url : base_url + "bank_maintenance/delete_bank_maintenance",
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

function edit_bank_maintenance(id){
	$("body").empty();
	$("body").load(base_url + "menu/edit_menu/4/24/2/"+id);
}
