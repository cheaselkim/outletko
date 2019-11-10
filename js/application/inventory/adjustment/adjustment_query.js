$(document).ready(function(){

	adjustment_type();

	$("#search").click(function(){
		query();
	});

})

function adjustment_type(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Inventory_adjustment/adjustment_type",
		success : function(data){
		    $("input[name=csrf_name]").val(data.token);
			var result = data.data;
		    for (var i = 0; i < result.length; i++) {
	    	    $("#adjustment_type").append("<option value='"+result[i].id+"'>"+result[i].inventory_ref_type+"</option>");
		    }
			query();
		}, error : function(err){
			console.log(err.responseText);
		}
	})	
}

function query(){

	var adjustment_date = $("#adjustment_date").val();
	var adjustment_type = $("#adjustment_type").val();
	var keyword = $("#search_box").val();
	var status = $("#product_status").val();
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {adjustment_date : adjustment_date, adjustment_type : adjustment_type, keyword : keyword, status : status, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Inventory_adjustment/query",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			$("#query-table").html(data.data);
			$("#no_products").val(data.count);
		}, error : function(err){
			console.log(err.responseText);
		}
	})


}
