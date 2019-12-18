$(document).ready(function(){

    get_featured_outlet();

    $(".card").mouseout(function(){
        var id = this.id;
        console.log(id);
    })
    
    $(".card").mouseover(function(){
        var id = this.id;
        console.log(id);
    });

});

function get_featured_outlet(){
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        type : "GET",
        data : {csrf_name : csrf_name},
        dataType : "JSON",
        url : base_url + "login/featured_outlet",
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
                href_url = base_url + (name.toLowerCase()).replace(/\s/g, '');
                
                if (data[i].about_us == null){
                    span_about = "";
                }else if (data[i].about_us == ""){
                    span_about = "";
                }else if (data[i].about_us.length <= 20){
                    span_about = data[i].about_us;
                }else{
                    span_about = data[i].about_us.substring(0, 180) + "....";
                }

                div = '<div class="col-6 col-lg-3 col-md-3 col-sm-6 px-2 pt-1 mt-5 px-4">' +
                '<a href="'+href_url+'">' +
                  '<div class="card" id="div-card-'+i+'">' +
                    '<div class="px-2 py-2 div-store-about">' +
                        '<span class="text-black font-weight-525 text-decoration-none">'+ span_about +'</span>' +
                    '</div>' +
                    '<div class="card-body text-center pb-2 px-3" hidden>' +
                      '<h4 class="card-title text-green-white font-weight-600 text-capitalize align-middle">' + name + '</h4>' +
                    '</div>' +
                  '</div>' +
                  '<div class="col-12 text-center px-2 div-card-name py-1">' +
                      '<h5 class="card-title text-green-white font-weight-600 text-capitalize align-middle">' + name + '</h4>' +
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

                $(".card").mouseout(function(){
                    var id = this.id;
                    $("#"+id+" .div-store-about").hide();
                    $("#"+id+" .card-body").show();
                })
                
                $(".card").mouseover(function(){
                    var id = this.id;
                    $("#"+id+" .card-body").hide();
                    $("#"+id+" .div-store-about").show();
                });
            
            }



        }, error : function(err){
            console.log(err.responseText);
        }
    })

}