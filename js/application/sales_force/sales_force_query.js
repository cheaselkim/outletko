$(document).ready(function(){

  outlet();
  force_type();
  index();
  $("#modal_query :input").attr("disabled", true);
  $("#close").attr("disabled", false);
  $(".close").attr("disabled", false);
  
  // $('#outlet').change(function() {
  //   var outlet = $(this).val();
  //   var term = $('#search_box').val();
  //   var type = $('#type').val();
  //   var status = $('#status').val();
  //   index(term,type,outlet,status);
  // });
  
  // $('#type').change(function() {
  //   var type = $(this).val();
  //   var term = $('#search_box').val();
  //   var outlet = $('#outlet').val();
  //   var status = $('#status').val();
  //   index(term,type,outlet,status);
  // });
  
  // $('#status').change(function() {
  //   var type = $('#type').val();
  //   var term = $('#search_box').val();
  //   var outlet = $('#outlet').val();
  //   var status = $(this).val();
  //   index(term,type,outlet,status);
  // });
  var app_func = $("#force_func").val();

  $('#search').click(function() {
    index();
  });

  $("#search_box").autocomplete({
    minLength: 0,
    source: base_url + "Sales_force/search_field/",
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

function outlet(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Sales_force/get_outlet",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name  +"</option>");
        $("#outlet_no").append("<option value='"+result[i].id+"'>"+result[i].outlet_name  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function force_type(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Sales_force/sales_force_type",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#type").append("<option value='"+result[i].id+"'>"+result[i].desc  +"</option>");
        $("#sales_force_type").append("<option value='"+result[i].id+"'>"+result[i].desc  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });

}

function index(){
  var app_func = $("#force_func").val();
  var term = $('#search_box').val();
  var outlet = $('#outlet').val();
  var status = $('#status').val();
  var type = $('#type').val();
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data: {term:term, app_func : app_func, type : type, outlet : outlet, status : status, csrf_name : csrf_name}, 
    type: "POST", 
    url : base_url +  "Sales_force/sales_force_list",
    dataType : "JSON",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("#query-table").html(result.result);
      $("#no_sales_force").val($("table tbody tr").length);
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function view_sales_force(id){

  $("#modal_query").modal("show");
  var csrf_name = $("input[name=csrf_name]").val();

  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {"id" : id, csrf_name : csrf_name},
    url : base_url + "sales_force/get_sales_force_dtl",
    type : "POST",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      $("#account_id").val(data.sales_force_dtl[0]['account_id']);
      $('#last_name').val(data.sales_force_dtl[0]['last_name']);
      $('#status').val(data.sales_force_dtl[0]['active']);
      $('#first_name').val(data.sales_force_dtl[0]['first_name']);
      $('#nick_name').val(data.sales_force_dtl[0]['nickname']);
      $('#mid_name').val(data.sales_force_dtl[0]['middle_name']);
      $('#position').val(data.sales_force_dtl[0]['position']);
      $('#date_start').val(data.sales_force_dtl[0]['date_start']);
      $('#monthly_quota').val(data.sales_force_dtl[0]['monthly_quota']);
      $('#hierarchy').val(data.sales_force_dtl[0]['hierarchy']);
      $('#share_type').val(data.sales_force_dtl[0]['type_share']);
      $('#salary').val(data.sales_force_dtl[0]['salary_allowance']);
      $('#outlet_no').val(data.sales_force_dtl[0]['outlet']);
      $('#share').val(data.sales_force_dtl[0]['share']);
      $("#date_end").val(data.sales_force_dtl[0]['date_end']);
      $("#password_days").val(data.sales_force_dtl[0]['password_days']);
      $("#date_hired").val(data.sales_force_dtl[0]['date_hired']);
      $("#mobile").val(data.sales_force_dtl[0]['mobile']);
      $("#email").val(data.sales_force_dtl[0]['email']);
      $("#all_access").val(data.all_access);
      $("#sales_force_type").val(data.sales_force_dtl[0]['type']);

      // if (data.sales_force_dtl[0]['outlet'] == "0"){
      //   $("#outlet").prop("disabled", true);
      // }

    }, error: function(err){
      console.log(err.responseText);
    }
  });}

function delete_sales_force(id,key){
  var csrf_name = $("input[name=csrf_name]").val();
  var trans_no = $("table tbody tr:eq("+(key)+")").find("td:eq(1)").text();
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
        url : base_url + "Sales_force/delete_sales_force",
        type : "POST",
        dataType : "JSON",
        beforeSend : function(){
          swal({
            title : "Saving.....",
            showCancelButton: false, 
            showConfirmButton: false 
          })
        },
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

function edit_sales_force(id){
  $("body").empty();
  setCookie("sales_force_id",id,5)
  $("body").load(base_url + "menu/edit_menu/5/0/2/"+id);
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