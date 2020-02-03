$(document).ready(function(){

    query_data();

$("#btn_search").click(function(){
    query_data();
});

});

function query_data(){

    var type = $("#type").val();
    var date = $("#blog_date").val();
    var title = $("#blog_title").val();
    var status = $("#blog_status").val();
    var csrf_name = $("input[name=csrf_name]").val();
    
    $.ajax({
        data : {type : type, date : date, title : title, status : status, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Blog/query_data",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            $("#div-tbl").html(result.result);
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function edit_blog(id){
    $("body").empty();
    $("body").load(base_url + "menu/edit_menu/3/0/2/"+id);
}

function view_blog(id){

var csrf_name = $("input[name=csrf_name]").val();

$.ajax({
    data : {id : id, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Blog/blog_query",
    success : function(result){
        $("input[name=csrf_name]").val(result.token);


        $('#modal-div-img-blog').css('background', 'url("' + base_url + "images/blog/" + result.img + '")');
        $('#modal-div-img-blog').css('background-size', "100% 100%");
        $('#modal-div-img-blog').css('background-repeat', "no-repeat");
        $('#modal-div-img-blog').css('background-position', "center center");

        $("#blog-title").text(result.title);
        $("#div-blog-content").append(result.content);

    }, error : function(err){
        console.log(err.responseText);
    }
})

    $("#modal_blog").modal("show");

}

function delete_blog(id, row){

	var	csrf_name = $("input[name=csrf_name]").val();

    swal({
		title: "Delete?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Confirm',
		closeOnConfirm: false,
		closeOnCancel: false,
		timer: 5000
		},function(isConfirm){
			if (isConfirm){
			  	$.ajax({
			    	data : {id : id, csrf_name : csrf_name},
			    	url : base_url + "Blog/delete_blog",
			    	type : "POST",
			    	dataType : "JSON",
			    	success : function (result){
						$("input[name=csrf_name]").val(result.token);
                        swal("Successfully Delete", "", "success");
                        location.reload();
				    }, error : function(err){
				    	console.log(err.responseText);
			    	}       
				});
			}else{
			    swal("Cancelled", "", "error");
			}
	});


}