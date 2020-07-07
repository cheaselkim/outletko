$(document).ready(function(){

    get_featured();

    $(".card").mouseout(function(){
        var id = this.id;
        console.log(id);
    })
    
    $(".card").mouseover(function(){
        var id = this.id;
        console.log(id);
    });

    // $('#div-slideshow').on('slid.bs.carousel', function() {
    //     currentIndex = $('div.active').index();
    //     bg_color = $("#div-carousel-item-"+currentIndex).css("background-color");
        
    //     if ($(document).width() <= 600){
    //         $(".div-featured-stores").css("background-color", bg_color);
    //     }
    // });

});

function get_featured_outlet(){
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {csrf_name : csrf_name},
        type : "GET",
        dataType : "JSON",
        url : "Outletko/featured_outlet",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            var data = result.data;
            var div = "";
            var img = "";
            var name = "";
            var href_url = "";
            var span_about = "";

            for (var i = 0; i < data.length; i++) {        

                if (data[i].loc_image == null){
                    img = null;
                }else{
                    img = base_url + "images/profile/" + data[i].loc_image;
                }
                
                name = data[i].account_name;
                // href_url = base_url + (name.toLowerCase()).replace(/\s/g, '').replace(/'/g, '');
                // link_name = $.trim(name.toLowerCase());
                // link_name = link_name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
                link_name = data[i].link_name;
                href_url = base_url + link_name;
                
                if (data[i].about_us == null){
                    span_about = "";
                }else if (data[i].about_us == ""){
                    span_about = "";
                }else if (data[i].about_us.length <= 20){
                    span_about = data[i].about_us;
                }else{
                    span_about = data[i].about_us.substring(0, 80) + "....";
                }
                //class="col-6 col-lg-3 col-md-3 col-sm-6 px-2 pt-1 mt-5 px-4"
                div = '<div class="tile px-3 pt-1 ">' +
                '<a href="'+href_url+'">' +
                  '<div class="card" id="div-card-'+i+'">' +
                    '<div class="px-2 py-2 div-store-about">' +
                        '<span class="text-black font-weight-525 text-decoration-none">'+ span_about +'</span>' +
                    '</div>' +
                    '<div class="card-body text-center pb-2 px-3" hidden>' +
                      '<h4 class="card-title text-green-white font-weight-600 text-capitalize align-middle">' + name + '</h4>' +
                    '</div>' +
                  '</div>' +
                  '<div class="col-12 text-center px-2 div-card-name">' +
                      '<p class="card-title text-green-white font-weight-600 text-capitalize align-middle h6 mb-0">' + name + '</p>' +
                  '</div>'
                '</a>' +
              '</div>';
                
                $("#div-featured-outlet").append(div);

                if (img == null){
                    $("#div-card-"+i).css("background", "rgb(79, 98, 40)");
                }else{
                    // img = "http://localhost/outletko/images/profile/file_31_666383.png";
                    $("#div-card-"+i).css("background-image", "url('" + img + "')");
                    $("#div-card-"+i).css("background-size", "100% 100%");
                }

                $("#div-card-"+i).css("border", "1px solid green");
                $("#div-card-"+i+" .div-store-about").hide();

                // $(".card").mouseout(function(){
                //     var id = this.id;
                //     $("#"+id+" .div-store-about").hide();
                //     $("#"+id+" .card-body").show();
                // })
                
                // $(".card").mouseover(function(){
                //     var id = this.id;
                //     $("#"+id+" .card-body").hide();
                //     $("#"+id+" .div-store-about").show();
                // });
            
            }



        }, error : function(err){
            console.log(err.responseText);
        }
    })

}

function get_featured(){

    var csrf_name = $("input[name=csrf_name]").val();
    var resolution = $(document).width();

    $.ajax({
        data : {csrf_name : csrf_name, resolution : resolution},
        type : "POST",
        dataType : "JSON",
        url : "Outletko/featured",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);

            $("#div-carousel-inner").html(result.featured_store);
            $("#div-list-product").html(result.featured_product);

            for (let i = 1; i <= result.carousel_store.length; i++) {
                $(".carousel-indicators").append('<li data-target="#div-slideshow" data-slide-to="'+i+'" ></li>');
            }

            setTimeout(function(){ 
                $("#div-slideshow").carousel(1);
            }, 3000);

        }, error : function(err){
            console.log(err.responseText)
        }
    })

}