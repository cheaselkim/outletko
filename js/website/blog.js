$(document).ready(function(){

    if ($("#trans_id").val() != ""){
        get_page_blog();
    }else{
        header_blog();
        // get_blog();
    }

    window.addEventListener("orientationchange", function() {
        console.log("orientation");
        if ($("#trans_id").val() != ""){
            // get_page_blog();
        }else{
            setTimeout(function(){ 
                header_blog();
            }, 1000);
        }

    }, false);    


})

function header_blog(){
    var csrf_name = $("input[name=csrf_name]").val();
    var width = $(document).width();

    console.log("width " + width);

    $.ajax({
        data : {csrf_name : csrf_name, width : width},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Outletko/blog",
        success : function(result){

            // console.log(result);
            $("input[name=csrf_name]").val(result.token);
            get_blog(result.result);

            // console.log(result.width);

            var data = result.result;
            var url = "";
            var img = "";
            var pad = "";
            var content = "";
            var title = "";
            var count = 0;
            var blog_date = "";
            var div = "";
            var append = "";
            var div_id = "";
            var counter = 0;


            for (var i = 0; i < data.length; i++) {
                count++;
                
                if (data[i].display == "1"){
                    counter++; 

                    if (counter < 2){

                        title = data[i].title;
                        url_title = title.replace(/[^\w\s]/gi, '');
                        url = base_url + "blog/4579328" + data[i].id + "/" + url_title.replace(/\s+/g, '-').toLowerCase();
                        img = base_url + "images/blog/" + data[i].img;
                        content = data[i].header_content;
                        blog_date = data[i].blog_date;
                        div_id = "div-img-" + i;
            
                        if (count == 1){
                            pad = "pad-left";
                        }else if (count == 2){
                            pad = "pad-center";
                        }else{
                            pad = "pad-right";
                        }
        
                        if (counter <= 3){
                            append = "#div-img-header-row-1";
                            div = "div-img-header-row-1-img div-img-header-" + count;
                        }else{
                            append = "#div-img-header-row-2";
                            div = "div-img-header-row-2-img div-img-header-" + count;
                        }
                        
                        $("#div-blog-header-img").css("background", "url('"+img+"')");
                        $("#div-blog-header-img").css("background-repeat", "no-repeat");
                        $("#div-blog-header-img").css("background-size", "contain");
                        $("#div-blog-header-img").css("background-position", "center center");

                        $("#div-blog-header-text").append(content);
                        $("#blog-url").attr("href", url);
                        $("#blog-date").text(blog_date);
                        $("#blog-title").text(title);

                        // $(append).append("<a class='col-12 col-lg-4 col-md-4 col-sm-12 "+div+"' id='"+div_id+"'  href='"+url+"'>"+
                        //     "</a>");

                        // $("#" + div_id).css("background", "url('"+img+"')");
                        // $("#" + div_id).css("background-repeat", "no-repeat");
            
                        // if ($(window).width() <= 1220){
                        //     $("#" + div_id).css("background-size", "100% 100%");                
                        // }else{
                        //     $("#" + div_id).css("background-size", "cover");
                        // }
            
                        // if (counter == 3){
                        //     count = 0;
                        // }
                    }

                }

            }
                


        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function get_blog(data){

// var csrf_name = $("input[name=csrf_name]").val();

// $.ajax({
//     data : {csrf_name : csrf_name},
//     type : "GET",
//     dataType : "JSON",
//     url : base_url + "Outletko/blog",
//     success : function(result){
//         $("input[name=csrf_name]").val(result.token);
//         var data = result.result;
        var url = "";
        var img = "";
        var pad = "";
        var content = "";
        var title = "";
        var count = 0;

        for (var i = 0; i < data.length; i++) {
            count++;
            
            title = data[i].title;
            url_title = title.replace(/[^\w\s]/gi, '');
            url = base_url + "blog/4579328" + data[i].id + "/" + url_title.replace(/\s+/g, '-').toLowerCase();
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
                        "<p class='mb-0 font-weight-600 blog-list-title'>"+data[i].title+"</p>"+
                        "<p class='mb-0 p-content d-none d-sm-block' id='div-content-"+i+"'>"+content+"</p>"+
                        "<a href='"+url+"'>Read More >>></a>"+
                    "</div>"+
                "</div>"+
            "</div>");

            $("#div-blog-img-"+i).css("background", "url('"+img+"')");
            $("#div-blog-img-"+i).css("background-repeat", "no-repeat");

            if ($(window).width() <= 1220){
                $("#div-blog-img-"+i).css("background-size", "100% 100%");                
            }else{
                $("#div-blog-img-"+i).css("background-size", "contain");
            }

        if (count == 3){
            count = 0;
        }
    }


//     }, error : function(err){
//         console.log(err.responseText);
//     }
// })

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
            var title = data[0].title;
            // console.log(data[0].id);

            $("#blog_title").text(data[0].title);
            $("#blog_author").text(data[0].author);
            $("#blog_date").text(data[0].blog_date);
            $("#div-blog-content").append(data[0].content);

            $("#div-img-blog").css("background", "url('"+(base_url + "images/blog/" + data[0].img )+"')");
            $("#div-img-blog").css("background-repeat", "no-repeat");
            $("#div-img-blog").css("background-position", "center center");

            var blog_desc = $("#div-blog-content > p > span").text();

            // $('meta[property="og:title"]').attr('content', title);
            // $('meta[property="og:image"]').attr('content', (base_url + "images/blog/" + data[0].img ));
            // $('meta[property="og:type"]').attr('content', 'blog');
            // $('meta[property="og:url"]').attr('content', base_url + "blog/4579328" + data[0].id + "/" + title.replace(/\s+/g, '-').toLowerCase());
            // $('meta[property="og:description"]').attr('content', blog_desc.substring(0, 100));

            // $('meta[property="og:description"]').attr('content', (data[0].content).substring(0,100));
            // console.log(blog_desc.substring(0, 100));

            if ($(window).width() <= 1220){
                $("#div-img-blog").css("background-size", "100% 100%");
            }else{
                $("#div-img-blog").css("background-size", "contain");
            }

        }, error : function(err){
            console.log(err.responseText);
        }
    })

}