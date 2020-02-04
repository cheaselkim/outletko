$(document).ready(function(){

    if ($("#trans_id").val() != ""){
        get_page_blog();
    }else{
        get_blog();
    }


})

function get_blog(){

var csrf_name = $("input[name=csrf_name]").val();

$.ajax({
    data : {csrf_name : csrf_name},
    type : "GET",
    dataType : "JSON",
    url : base_url + "Outletko/blog",
    success : function(result){
        $("input[name=csrf_name]").val(result.token);
        var data = result.result;
        var url = "";
        var img = "";
        var pad = "";
        var content = "";
        var title = "";
        var count = 0;

        for (var i = 0; i < data.length; i++) {
            count++;
            
            title = data[i].title;
            url = base_url + "blog/4579328" + data[i].id + "/" + title.replace(/\s+/g, '-').toLowerCase();
            img = base_url + "images/blog/" + data[i].img;
            content = data[i].content;

            if (count == 1){
                pad = "pad-left";
            }else if (count == 2){
                pad = "pad-center";
            }else{
                pad = "pad-right";
            }

            $("#div-blog-content").append(
            "<div class='col-12 col-lg-4 col-md-4 col-sm-12 div-blog "+pad+"'>"+
                "<div class='row'>"+
                    "<div class='col-12 col-lg-12 col-md-12 col-sm-12'>"+
                        "<div class='div-blog-img' id='div-blog-img-"+i+"'>"+
                        "</div>"+
                    "</div>"+
                "</div> "+
                "<div class='row'>"+
                    "<div class='col-12 col-lg-12 col-md-12 col-sm-12'>"+
                        "<p class='mb-0 font-weight-600 font-size-25'>"+data[i].title+"</p>"+
                        "<p class='mb-0' id='div-content-"+i+"'>"+content+"</p>"+
                        "<a href='"+url+"'>Read More >>></a>"+
                    "</div>"+
                "</div>"+
            "</div>");

            $("#div-blog-img-"+i).css("background", "url('"+img+"')");
            $("#div-blog-img-"+i).css("background-repeat", "no-repeat");

            if ($(window).width() <= 1220){
                $("#div-blog-img-"+i).css("background-size", "100% 100%");                
            }else{
                $("#div-blog-img-"+i).css("background-size", "cover");
            }

        if (count == 3){
            count = 0;
        }
    }


    }, error : function(err){
        console.log(err.responseText);
    }
})

}

function get_page_blog(){
    var id = $("#trans_id").val();
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {id : id, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Outletko/get_page_blog",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            var data = result.result;

            $("#blog_title").text(data[0].title);
            $("#blog_date").text(data[0].blog_date);
            $("#div-blog-content").append(data[0].content);

            $("#div-img-blog").css("background", "url('"+(base_url + "images/blog/" + data[0].img )+"')");
            $("#div-img-blog").css("background-repeat", "no-repeat");

            if ($(window).width() <= 1220){
                $("#div-img-blog").css("background-size", "100% 100%");
            }else{
                $("#div-img-blog").css("background-size", "cover");
            }

        }, error : function(err){
            console.log(err.responseText);
        }
    })

}