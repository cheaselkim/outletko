$(document).ready(function(){
    
  index();
  outlet_type();
  currency();

  var app_func = $("#outlet_func").val();

  // if (app_func == "3"){
  //   $("#div-outlet-status").show();
  // }else{
  //   $("#div-outlet-status").hide();
  // }

  $('#outlet_search').click(function() {
    var type = $("#outlet_type").val();
    var status = $('#outlet_status').val();
    index(type,status);
  });

  // $('#outlet_type').change(function() {
  //   var type = $(this).val();
  //   var status = $('#outlet_status').val();
  //   index(type,status);
  // });

  // $('#outlet_status').change(function() {
  //   var status = $(this).val();
  //   var type = $('#outlet_type').val();
  //   index(type,status);
  // });

  $('#search').click(function() {
    var type = $("#outlet_type").val();
    var status = $("#outlet_status").val();
    var term = $('#search_box').val();
    index(type,status,term);
  });

  $("#search_box").autocomplete({
    minLength: 0,
    source: base_url + "outlet/search_field/",
    focus: function( event, ui ) {
      return false;
    },
    select: function( event, ui ) {
      $(this).val(ui.item.term);
      return false; 
    }
  })
  .autocomplete( "instance" )._renderItem = function( ul, item ) {
    return $( "<li>" )
    .append( "<div>" + item.term + "</div>" )
    .appendTo( ul );
  };   


});

function currency(){

  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Outlet/currency",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      $("#mod_currency").val(data.data);
    }, error : function(err){
      console.log(err.responseText);
    }
  })
}


function outlet_type(){
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    url : base_url + "Outlet/outlet_type",
    type : "GET",
    dataType : "JSON",
    data : {csrf_name : csrf_name},
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#outlet_type").append("<option value='"+result[i].id+"'>"+result[i].outlet_type_name  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function index(type="",status="",term=""){
  var app_func = $("#outlet_func").val();
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data: {type : type, status: status,term:term, app_func : app_func, csrf_name : csrf_name}, 
    type: "POST", 
    url : base_url +  "Outlet/outlet_list",
    dataType : "JSON",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("#query-table").html(result.result);
      $("#no_trans").val($("table tbody tr").length);
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function view_outlet(id){

  var csrf_name = $("input[name=csrf_name]").val();
  $("#mod_quota").number(true,2);
  $("#modal_query").find(":input").attr("readonly", true);
  $("#modal_query").modal("show");
  $.ajax({
    data : {"id" : id, csrf_name : csrf_name},
    url : base_url + "Outlet/select_id",
    type : "POST",
    dataType : "JSON",
    success : function (data){
      $("#modal_query").modal("show");
      $("input[name=csrf_name]").val(data.token);
      $("#mod_no").val(data.result[0].outlet_code);
      $("#mod_name").val(data.result[0].outlet_name);
      $("#mod_loc").val(data.result[0].outlet_location);
      $("#mod_city").val(data.result[0].city_desc);
      $("#mod_province").val(data.result[0].province_desc);
      $("#mod_type").val(data.result[0].outlet_type_desc);
      $("#mod_quota").val(data.result[0].outlet_monthly_quota);
      $("#mod_status").val(data.result[0].outlet_status == "1" ? "Operational" : "Close");
    }, error : function(err){
      console.log(err.responseText);
    }
  });
}

function cancel_outlet(id,key){
  var trans_no = $("table tbody tr:eq("+(key)+")").find("td:eq(0)").text();
  var csrf_name = $("input[name=csrf_name]").val();
  swal({
    title: "Are you sure do you want to Outlet #"+trans_no+" ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Confirm',
    closeOnConfirm: false,
    closeOnCancel: true,
    timer : 3000
  },function(isConfirm){
    if (isConfirm){
      $.ajax({
        data : {"id" : id, csrf_name : csrf_name},
        url : base_url + "Outlet/cancel_outlet",
        type : "POST",
        dataType : "JSON",
        success : function (result){
          $("input[name=csrf_name]").val(result.token);
          index();
          swal("Successfully Cancel", "", "success");
        }, error : function(err){
          console.log(err.responseText);
        }       
      });
    }else{
        // swal("Cancelled", "", "warning");
    }
  });


}

function edit_outlet(id){
  $("body").empty();
  setCookie("outlet_id",id,5)
  $("body").load(base_url + "menu/edit_menu/2/0/2/"+id);
}

function setCookie(name,value,hours) {
    var expires = "";
    if (hours) {
        var date = new Date();
        date.setTime(date.getTime() + (hours*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}