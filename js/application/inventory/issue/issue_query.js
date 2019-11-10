$(document).ready(function(){
    
  trans_type();
  outlet();
  index();
  var app_func = $("#issue_func").val();


  $('#search').click(function() {
    index();
  });
  
  // $('#outlet').change(function() {
  //   var outlet = $(this).val();
  //   var term = $('#search_box').val();
  //   var type = $('#trans_type').val();
  //   var iss_date = $('#iss_date').val();
  //   index(term,type,outlet,iss_date);
  // });
  
  // $('#trans_type').change(function() {
  //   var type = $(this).val();
  //   var term = $('#search_box').val();
  //   var outlet = $('#outlet').val();
  //   var iss_date = $('#iss_date').val();
  //   index(term,type,outlet,iss_date);
  // });

  $("#search_box").autocomplete({
    minLength: 0,
    source: base_url + "Inventory_issue/search_field/",
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

function trans_type(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Inventory_issue/get_trans_type",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#trans_type").append("<option value='"+result[i].id+"'>"+result[i].inventory_ref_type  +"</option>");
      }
      index();
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function outlet(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Inventory_issue/get_outlet",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function index(){
  var csrf_name = $("input[name=csrf_name]").val();
  var outlet = $('#outlet').val();
  var term = $('#search_box').val();
  var iss_date = $('#iss_date').val();
  var type = $('#trans_type').val();
  var status = $("#status").val();
  var app_func = $("#issue_func").val();

  var type = "2";
  var status = "2";

  $.ajax({
    data: {term:term, app_func : app_func, type : type, outlet : outlet, iss_date : iss_date, status : status, csrf_name : csrf_name}, 
    type: "POST", 
    url : base_url +  "Inventory_issue/issue_list",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      $("#query-table").html(data.result);
      $("#issue_trans").val($("table tbody tr").length);
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function view_issue(id){
  var csrf_name = $("input[name=csrf_name]").val();

  $("#modal_query").modal("show");

  $.ajax({
    data : {"id" : id, csrf_name : csrf_name},
    url : base_url + "Inventory_issue/select_id",
    type : "POST",
    dataType : "JSON",
    success : function (result){
      $("input[name=csrf_name]").val(result.token);
      $("#modal_query").modal("show");
    }, error : function(err){
      console.log(err.responseText);
    }
  });
}

function delete_issue(id,key){
  var csrf_name = $("input[name=csrf_name]").val();
  var trans_no = $("#tbl-issue tbody tr:eq("+(key)+")").find("td:eq(0)").text();
  swal({
    title: "Are you sure do you want to Delete "+trans_no+" ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Confirm',
    closeOnConfirm: false,
    closeOnCancel: false,
    timer: 3000
  },function(isConfirm){
    if (isConfirm){
      $.ajax({
        data : {"id" : id, csrf_name : csrf_name},
        url : base_url + "Inventory_issue/delete_issue",
        type : "POST",
        dataType : "JSON",
        success : function (result){
          $("input[name=csrf_name]").val(result.token);
          index();
          swal("Successfully Delete", "", "success");
        }, error : function(err){
          console.log(err.responseText);
        }       
      });
    }else{
        swal("Cancelled", "", "error");
    }
  });


}

function edit_issue(id){

  if (id == "0"){
    swal({
      type : "warning",
      title : "This Issuance Data is not allowed to edit",
      timer : 2000
    }, function(){
      index();
    })
  }else{
    $("body").empty();
    setCookie("issue_id",id,5)
    $("body").load(base_url + "menu/edit_menu/3/2/2/"+id);    
  }

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