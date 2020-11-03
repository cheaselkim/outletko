$(document).ready(function(){

    get_all_author();
    // query_data();

$("#btn_search").click(function(){
    query_data();
});

});

function get_all_author(){

    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Blog/get_all_author",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            for (let i = 0; i < result.result.length; i++) {                
                $("#blog_author").append("<option value='"+result.result[i].author+"'>"+result.result[i].author+"</option>");
            }
            query_data();
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function query_data(){

    var type = $("#type").val();
    var date = $("#blog_date").val();
    var title = $("#blog_title").val();
    var author = $("#blog_author").val();
    var status = $("#blog_status").val();
    var csrf_name = $("input[name=csrf_name]").val();
    
    $.ajax({
        data : {type : type, date : date, title : title, author : author, status : status, csrf_name : csrf_name},
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
        console.log(result.media_type);

        $('#modal-div-img-blog').empty();
        $('#modal-div-img-blog').css('background', '');
        $('#modal-div-img-blog').css('background-size', "contain");
        $('#modal-div-img-blog').css('background-repeat', "no-repeat");
        $('#modal-div-img-blog').css('background-position', "center center");


        if (result.media_type == "video"){
            $("#modal-div-img-blog").append("<video controls playsinline id='div-video'><source src='"+base_url + "images/blog/" + result.media+"'></video>");
            $("#modal-div-img-blog").addClass("text-center");
            $("#div-video").css("object-fit", "contain");
            $("#div-video").css("display", "inline-block");
            $("#div-video").css("height", "100%");
            $("#div-video").css("width", "100%");
        }else{
            $('#modal-div-img-blog').css('background', 'url("' + base_url + "images/blog/" + result.media + '")');
            $('#modal-div-img-blog').css('background-size', "100% 100%");
            $('#modal-div-img-blog').css('background-repeat', "no-repeat");
            $('#modal-div-img-blog').css('background-position', "center center");    
        }


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