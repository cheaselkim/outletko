$(document).ready(function(){

    var d = new Date();
    var month = d.getMonth() + 1;
    $("#month_date").val(month);
    
    tbl_query();

    $("#btn-search").click(function(){
        tbl_query();
    });

})

function tbl_query(){

    var report = $("#report").val();
    var month = $("#month_date").val();
    var year = $("#year_date").val();
    var csrf_name = $("input[name=csrf_name]").val();

    $.ajax({
        data : {report : report, month : month, year : year, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Commission/report",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            $("#div-query").html(result.data);
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}