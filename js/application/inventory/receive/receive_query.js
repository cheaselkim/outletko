  $(document).ready(function(){
    trans_type();
    outlet();
    index();

    var app_func = $("#receive_func").val();


  $('#search').click(function() {
    index();
  });
  
  // $('#outlet').change(function() {
  //   var outlet = $(this).val();
  //   var term = $('#search_box').val();
  //   var type = $('#trans_type').val();
  //   var rec_date = $('#rec_date').val();
  //   index(term,type,outlet,rec_date);
  // });
  
  // $('#trans_type').change(function() {
  //   var type = $(this).val();
  //   var term = $('#search_box').val();
  //   var outlet = $('#outlet').val();
  //   var rec_date = $('#rec_date').val();
  //   index(term,type,outlet,rec_date);
  // });

  $("#search_box").autocomplete({
    minLength: 0,
    source: base_url + "Inventory_receive/search_field/",
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
    url : base_url + "Inventory_receive/get_trans_type",
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
    url : base_url + "Inventory_receive/get_outlet",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.result;
      for (var i = 0; i < result.length; i++) {
        $("#outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function index(){
  var outlet = $('#outlet').val();
  var term = $('#search_box').val();
  var type = $('#trans_type').val();
  var rec_date = $('#rec_date').val();
  var status = $("#status").val();
  var app_func = $("#receive_func").val();
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data: {term:term, app_func : app_func, type : type, outlet : outlet, rec_date : rec_date, status : status, csrf_name : csrf_name}, 
    type: "POST", 
    url : base_url +  "Inventory_receive/receive_list",
    dataType : "JSON",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("#query-table").html(result.result);
      $("#receive_trans").val($("table tbody tr").length);
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function view_receive(id){

  $("#modal_query").modal("show");
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {"id" : id, csrf_name : csrf_name},
    url : base_url + "Inventory_receive/select_id",
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

function cancel_receive(id,key, ref_id){
  var trans_no = $("#tbl-receive tbody tr:eq("+(key)+")").find("td:eq(0)").text();
  var csrf_name = $("input[name=csrf_name]").val();
  swal({
    title: "Are you sure do you want to Cancel Receive # "+trans_no+" ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Confirm',
    closeOnConfirm: false,
    closeOnCancel: false,
    timer: 5000
  },function(isConfirm){
    if (isConfirm){
      $.ajax({
        data : {id : id, ref_id : ref_id, csrf_name : csrf_name},
        url : base_url + "Inventory_receive/cancel_receive",
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
        swal("Cancelled", "", "error");
    }
  });


}

function edit_receive(id){
  $("body").empty();
  setCookie("receive_id",id,5)
  $("body").load(base_url + "menu/edit_menu/3/1/2/"+id);
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