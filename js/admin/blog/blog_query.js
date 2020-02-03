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

function delete_data(id, row){

}

function edit_data(){

}