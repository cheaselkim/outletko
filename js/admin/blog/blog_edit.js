$(document).ready(function(){

get_blog();

$('#summernote').summernote({
    height: 300,
    tabsize: 2,
    toolbar: [
        // [groupName, [list of button]]
        ['style', ['style']],
        ['fontname', ['fontname']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
    ]
});

$('#summernote').summernote('fontName', 'Arial');
$('.note-editable').css('font-family','Arial');

$("#status").change(function(){
    if ($(this).val() == "0"){
        $("#lbl-display").css("background", "lightgray");
        $("#display").prop("checked", false);
        $("#display").attr("disabled", true);
    }else{
        $("#lbl-display").css("background", "white");
        $("#display").attr("disabled", false);
        // check_display_images();
    }
});

$("#display").change(function(){
    if ($(this).is(":checked") == "1"){
        check_display_images();
    }
});

$("#UploadImgBlog").change(function(){
    readURL(this);
}); 

$("#btn_save").click(function(){
    check_required_fields();
});

})

function get_blog(){
    var id = $("#trans_id").val();
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {id : id, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Blog/edit_blog",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);

            $('#div-img-blog').css('background', 'url("' + base_url + "images/blog/" + result.img + '")');
            $('#div-img-blog').css('background-size', "contain");
            $('#div-img-blog').css('background-repeat', "no-repeat");
            $('#div-img-blog').css('background-position', "center center");            

            $("#title").val(result.title);
            $("#author").val(result.author);
            $("#status").val(result.status);
            $("#display").attr("data-id", result.display);
            $("#summernote").summernote("code", result.content);

            if (result.display == "1"){
                $("#display").attr("checked", true);
            }

            if (result.status == "0"){
                $("#lbl-display").css("background", "lightgray");
                $("#display").prop("checked", false);
                $("#display").attr("disabled", true);
            }

            // check_display_images();

        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function check_display_images(){
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {csrf_name : csrf_name},
        type : "GET",
        dataType : "JSON",
        url : base_url + "Blog/check_display_images",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);

            // console.log($("#display").attr("data-id"));
                
            if ($("#display").attr("data-id") == "0"){
                swal({
                    type : "warning",
                    title : "Overwrite?",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                  }, function(isConfirm){
                    if (!isConfirm){
                        $("#display").prop("checked", false);
                    }
                  })        


                // if (result.result == "1"){
                //     $("#lbl-display").css("background", "lightgray");
                //     $("#display").prop("checked", false);
                //     $("#display").attr("disabled", true);
                // }    
            }else{
                $("#lbl-display").css("background", "white");
                $("#display").attr("disabled", false);
            }

        }, error : function(err){
            console.log(err.responseText);
        }
    })

}


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#div-img-blog').css('background', 'url("' + e.target.result + '")');
            $('#div-img-blog').css('background-size', "contain");
            $('#div-img-blog').css('background-repeat', "no-repeat");
            $('#div-img-blog').css('background-position', "center center");
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function check_required_fields(){
    var img = $("#UploadImgBlog").val();
    var img_bg = $("#div-img-blog").css('background');
    var title = $("#title").val();
    var author = $("#author").val();
    var content = $("#summernote").summernote("code");

    if (title == "" || content == "" || author == ""){
        swal({
            type : "warning",
            title : "Please complete all fields"
        })
    }else{
        swal({
            type : "warning",
            title : "Save?",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
          }, function(isConfirm){
            if (isConfirm){
                // save_img("", 1);
              save_blog();
            }
          })        
    }

}

function save_blog(){
    var img = $("#UploadImgBlog").val();
    var title = $("#title").val();
    var author = $("#author").val();
    var content = $("#summernote").summernote("code");
    var csrf_name = $("input[name=csrf_name]").val();
    var id = $("#trans_id").val();
    var status = $("#status").val();
    var display = "";

    if ($("#display").is(":checked")){
        display = "1";
    }else{
        display = "0";
    }

    $.ajax({
        data : {title : title, author : author, content : content, csrf_name : csrf_name, id : id, display : display, status : status},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Blog/update_blog",
        success : function(result){
            console.log(result);
            $("input[name=csrf_name]").val(result.token);
            if (img != ""){
                save_img(img, id);        
            }else{
                swal({
                    title : "Successfully Save",
                    type : "success",
                    timer: 2000
                    }, function(){
                        location.reload();
                    });

            }
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function save_img(img, id){

    var form_data = new FormData(); 
    var files = $('#UploadImgBlog')[0].files;
    var csrf_name = $("input[name=csrf_name]").val();

    for(var count = 0; count<files.length; count++) {
        var name = files[count].name;
        form_data.append("files[]", files[count]);
    }        

    form_data.append('id', id); 
    form_data.append('csrf_name', csrf_name);
    //return false   
    console.log(files);
    console.log(csrf_name);
    console.log(form_data);

    $.ajax({
    data : form_data, 
    type : "POST",
    url: base_url + "Blog/update_img_file",
    dataType : "json" ,
    crossOrigin : false,
    contentType: false,
    processData: false,
    success : function(result) {
        $("input[name=csrf_name]").val(result.token);
        if(result.status == "success") {
            $("#save_product").removeAttr('disabled');
            swal({
            title : "Successfully Save",
            type : "success",
            timer: 2000
            }, function(){
                location.reload();
            });
        }else {
            console.log(result.status);
        }
    }, failure : function(msg) {
        console.log("Error connecting to server...");
    }, error: function(err) {
        console.log(err.responseText);
    }, xhr: function(){
        var xhr = $.ajaxSettings.xhr() ;
        xhr.onprogress = function(evt){ 
            $("body").css("cursor", "wait"); 
            };  
        xhr.onloadend = function(evt){ 
            $("body").css("cursor", "default"); 
            };      
            return xhr ;
        }

    }); 

}