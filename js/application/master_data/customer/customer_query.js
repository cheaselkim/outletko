$(document).ready(function(){
    
  index();
  customer_type()
  outlet();

  var app_func = $("#outlet_func").val();
 $('#search').click(function() {
    var term = $('#search_box').val();
    var status = $('#status').val();
    var outlet = $('#outlet').val();
    var type = $('#cust_type').val();
    index(term,type,outlet,status);
  });

  $("#search_box").autocomplete({
    minLength: 0,
    source: base_url + "Customer/search_field/",
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
  
  // $('#cust_type').change(function() {
  //   var type = $(this).val();
  //   var term = $('#search_box').val();
  //   var status = $('#status').val();
  //   var outlet = $('#outlet').val();
  //   index(term,type,outlet,status);
  // });
  
  // $('#status').change(function() {
  //   var type = $('#cust_type').val();
  //   var term = $('#search_box').val();
  //   var status = $(this).val();
  //   var outlet = $('#outlet').val();
  //   index(term,type,outlet,status);
  // });
  
  // $('#outlet').change(function() {
  //   var type = $('#cust_type').val();
  //   var term = $('#search_box').val();
  //   var status = $('#status').val();
  //   var outlet = $(this).val();
  //   index(term,type,outlet,status);
  // });


});

function customer_type(){
  var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
      data : {csrf_name : csrf_name},
        url : base_url + "customer/customer_type",
        type : "GET",
        dataType : "JSON",
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            var result = data.data;
            for (var i = 0; i < result.length; i++) {
                $("#cust_type").append("<option value='"+result[i].id+"'>"+result[i].customer_name_type   +"</option>");
            }
        }, error: function(err){
            console.log(err.responseText);
        }
    });   
}

function outlet(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "customer/outlet",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
        for (var i = 0; i < data.data.length; i++) {
            //console.log(data.data[i].outlet_name);
            $("#outlet").append("<option value='"+data.data[i].id+"'>"+data.data[i].outlet_name   +"</option>");
        }
    }, error: function(err){
        console.log(err.responseText);
    }
  });   
}

function index(term="",type="",outlet="",status=""){
  var app_func = $("#customer_func").val();
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data: {term:term,type:type,outlet:outlet,status:status, app_func : app_func, csrf_name : csrf_name}, 
    type: "POST", 
    url : base_url +  "Customer/customer_list",
    dataType : "JSON",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("#query-table").html(result.result);
	    $("#count").val($("table tbody tr").length);
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function view_customer(id){

  $("#modal_query").modal("show");
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {"id" : id, csrf_name : csrf_name},
    url : base_url + "Customer/select_id",
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

function delete_customer(id,key){
  var csrf_name = $("input[name=csrf_name]").val();
  var trans_no = $("#tbl-customer tbody tr:eq("+(key)+")").find("td:eq(0)").text();
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
        url : base_url + "Customer/delete_customer",
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

function edit_customer(id){
  $("body").empty();
  $("body").load(base_url + "menu/edit_menu/4/6/2/"+id);
}