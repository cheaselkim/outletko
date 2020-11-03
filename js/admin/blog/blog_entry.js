$(document).ready(function(){

// check_display_images();

get_author();

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

$("#UploadImgBlog").change(function(){
    readURL(this);
}); 

$("#btn_save").click(function(){
    check_required_fields();
});

$("#display").change(function(){
    if ($(this).is(":checked")){
        check_display_images();
    }
});


});

function get_author(){
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Blog/get_author",
        success : function(result){
            console.log(result);
            $("input[name=csrf_name]").val(result.token);
            $("#author").val(result.author);
            // overwrite_display();
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function overwrite_display(){

    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Blog/overwrite_display",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);

            var data = result.data;
            console.log(data.length);

            
            if (data.length > 0){
                for (let i = 0; i < data.length; i++) {
                    $("#display-blog").append('<div class="form-check">'+
                    '<label class="form-check-label">'+
                        '<input type="radio" class="form-check-input overwrite-radio" name="optradio" value="'+data[i].id+'" style="height: 18px !important;">'+data[i].title+
                    '</label>'+
                '</div>');                    
                }
            }
            
            $("#modal-overwrite-blog").modal("show");


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
            console.log(result.result);

            if (result.result == "3"){
                swal({
                    type : "warning",
                    title : "Overwrite?",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                  }, function(isConfirm){
                    if (isConfirm){
                        overwrite_display();
                        // $("#modal-overwrite-blog").modal("show");
                        // $("#display").prop("checked", false);
                    }else{
                        $("#display").prop("checked", false);
                    }
                  })        
        
            }

            // if (result.result == "1"){
            //     $("#lbl-display").css("background", "lightgray");
            //     $("#display").prop("checked", false);
            //     $("#display").attr("disabled", true);
            // }

        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var file = input.files[0];
        var file_type = file["type"]; 
        $('#div-img-blog').empty();
        $('#div-img-blog').css('background', '');
        $('#div-img-blog').css('background-size', "contain");
        $('#div-img-blog').css('background-repeat', "no-repeat");
        $('#div-img-blog').css('background-position', "center center");

        if (file_type.slice(0, 5) === "video"){
            reader.onload = function (e) {
                // $('#div-img-blog').css('background', 'url("' + e.target.result + '")');
                $("#div-img-blog").append("<video controls playsinline id='div-video'><source src='"+e.target.result+"'></video>");
                $("#div-img-blog").addClass("text-center");
                $("#div-video").css("object-fit", "contain");
                $("#div-video").css("display", "inline-block");
                $("#div-video").css("height", "100%");
                $("#div-video").css("width", "100%");
            }
        }else{
            reader.onload = function (e) {
                $('#div-img-blog').css('background', 'url("' + e.target.result + '")');
                $('#div-img-blog').css('background-size', "contain");
                $('#div-img-blog').css('background-repeat', "no-repeat");
                $('#div-img-blog').css('background-position', "center center");
            }    
        }

        reader.readAsDataURL(input.files[0]);


    }
}

function check_required_fields(){
    var img = $("#UploadImgBlog").val();
    var title = $("#title").val();
    var author = $("#author").val();
    var content = $("#summernote").summernote("code");

    if (img == "" || title == "" || content == "" || author == ""){
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
    var category = $("#category").val();
    var title = $("#title").val();
    var author = $("#author").val();
    var content = $("#summernote").summernote("code");
    var csrf_name = $("input[name=csrf_name]").val();
    var display = "";
    var overwrite = "";

    if ($("#display").is(":checked")){
        display = "1";
        overwrite = $(".overwrite-radio:checked").val();
    }else{
        display = "0";
    }

    // save_img(img, 1);
    // return false;

    $.ajax({
        data : {category : category, title : title, author : author, content : content, display : display, overwrite : overwrite, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Blog/insert_blog",
        success : function(result){
            console.log(result);
            $("input[name=csrf_name]").val(result.token);
            save_img(img, result.id);
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
    form_data.append("file_type", files[0].type.slice(0, 5));
    //return false   
    // console.log(files);
    // console.log(files[0].type.slice(0, 5));
    // console.log(csrf_name);
    // console.log(form_data);
    
    // return false;

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
        swal({
            title : "Successfully Save",
            type : "success",
            timer: 2000
            }, function(){
                location.reload();
            });

        if(result.status == "success") {
            $("#save_product").removeAttr('disabled');
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