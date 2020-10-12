$(document).ready(function(){

    $("#div-store").hide();

    if ($("#store-show").val() == "1"){
        $("#div-prod").hide();
        $("#div-store").show("slow");    

        $("#btn-store").removeClass("btn btn-outline-success");
        $("#btn-prod").removeClass("btn btn-success");

        $("#btn-store").addClass("btn btn-success");
        $("#btn-prod").addClass("btn btn-outline-success");
    }else{

        $("#btn-store").removeClass("btn btn-success");
        $("#btn-prod").removeClass("btn btn-outline-success");

        $("#btn-store").addClass("btn btn-outline-success");
        $("#btn-prod").addClass("btn btn-success");
    }


$("#btn-store").click(function(){
    if ($("#btn-store").attr("class") == "btn btn-success"){

        $("#btn-store").removeClass("btn btn-success");
        $("#btn-prod").removeClass("btn btn-outline-success");

        $("#btn-store").addClass("btn btn-outline-success");
        $("#btn-prod").addClass("btn btn-success");

    }else{
        $("#btn-store").removeClass("btn btn-outline-success");
        $("#btn-prod").removeClass("btn btn-success");

        $("#btn-store").addClass("btn btn-success");
        $("#btn-prod").addClass("btn btn-outline-success");

    }

    $("#div-prod").hide();
    $("#div-store").show("slow");
});

$("#btn-prod").click(function(){

    if ($(this).attr("class") == "btn btn-success"){
        $("#btn-prod").removeClass("btn btn-success");
        $("#btn-store").removeClass("btn btn-outline-success");

        $("#btn-prod").addClass("btn btn-outline-success");
        $("#btn-store").addClass("btn btn-success");

    }else{
        $("#btn-prod").removeClass("btn btn-outline-success");
        $("#btn-store").removeClass("btn btn-success");

        $("#btn-prod").addClass("btn btn-success");
        $("#btn-store").addClass("btn btn-outline-success");

    }

    $("#div-store").hide();
    $("#div-prod").show("slow");
});


});