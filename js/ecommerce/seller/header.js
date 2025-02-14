$(document).ready(function(){

	setInterval(
		function(){ 
			get_order();
    },3000);


    $('.navbar-collapse li:not(.dropdown-toggle)').click(function(){
        if($(window).width() < 768 )
            $('.navbar-collapse').collapse('hide');
    });        
});

function get_order(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({	
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "Seller/get_order",
		success : function(result){
			$("#order_no").text(result.result);
			$("input[name=csrf_name]").val(result.token);
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}