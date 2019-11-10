$(document).ready(function(){

  $("#monthly_quota").number(true, 2);
  $("#share").number(true, 2);
  $("#salary").number(true, 2);
  get_outlet();
  sales_force_type();
  sales_force_list();

  $("#outlet").change(function(){
    account_id();
  });

  $("#all_access").change(function(){
    if ($("#all_access").val() == "1"){
      $("#outlet").prop("disabled", true);
      $("#outlet").append("<option value= '0'>ALL</option>");
      $("#outlet").val("0");
    }else{
      $("#outlet").prop("disabled", false);
      $("#outlet option[value='0']").remove();
    }
  });

  $("#sales_force_type").change(function(){
    // if ($(this).val() == "1"){
    //   $("#outlet").prop("disabled", true);
    //   $("#outlet").append("<option value= '0'>ALL</option>");
    //   $("#outlet").val("0");      
    // }else{
    //   $("#outlet").prop("disabled", false);
    //   $("#outlet option[value='0']").remove();      
    // }
  });

  $("#last_name").keyup(function(){
    $(this).removeClass("error");
  }); 

  $("#first_name").keyup(function(){
    $(this).removeClass("error");
  }); 

  $("#share").keyup(function(){
    $(this).removeClass("error");
  }); 

  $("#email").keyup(function(){
    $(this).removeClass("error");
  }); 

  $("#email").keyup(function(){
    $(this).removeClass("error");
  }); 

  $("#cancel").click(function(){
    window.open(base_url, "_self");
  });

  $("#save").click(function(){
    $("#save").prop("disabled", true);
    save_data();
  });

});

function get_outlet(){
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "sales_force/get_outlet",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#outlet").append("<option value='"+result[i].id+"'>"+result[i].outlet_name  +"</option>");
      }
      account_id();
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function sales_force_type(){
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "sales_force/sales_force_type",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#sales_force_type").append("<option value='"+result[i].id+"'>"+result[i].desc  +"</option>");
      }
      // $("#outlet").prop("disabled", true);
      // $("#outlet").append("<option value= '0'>ALL</option>");
      // $("#outlet").val("0");      

    }, error: function(err){
      console.log(err.responseText);
    }
  });  
}

function sales_force_list(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "sales_force/list_sales_force",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      $("#list-sales-force").html(data.result);
    }, error: function(err){
      console.log(err.responseText);
    }
  });    
}

function account_id(){
  var csrf_name = $("input[name=csrf_name]").val();
  var outlet = $("#outlet").val();
  $.ajax({
    data : {outlet : outlet, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "sales_force/account_id",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("#account_id").val(result.account_id);
    }, error : function(err){
      console.log(err.responseText);
    }
  });  
}

function save_data(){
      var csrf_name = $("input[name=csrf_name]").val();
      var account_id = $("#account_id").val();
      var status = $('#status').val();
      var type = $("#sales_force_type").val();

      var last_name = $('#last_name').val().toUpperCase();
      var first_name = $('#first_name').val().toUpperCase();
      var mid_name = $('#mid_name').val().toUpperCase();

      var position = $('#position').val();
      var mobile = $("#mobile").val();
      var email = $("#email").val();
      var date_hired = $("#date_hired").val();

      var outlet = $('#outlet').val();
      var date_start = $('#date_start').val();
      var date_end = $("#date_end").val();
      var monthly_quota = $('#monthly_quota').val();
      var share = $('#share').val();

      var all_access = $("#all_access").val();

      if (type == "1"){
        if(jQuery.trim(last_name).length <= 0 || jQuery.trim(first_name).length <= 0 
          || jQuery.trim(share).length <= 0 ) {
              $("#save").prop("disabled", false);
              swal("Please fill up required fields.", "", "warning")

              if (last_name == ""){
                $("#last_name").addClass("error");
              }

              if (first_name == ""){
                $("#first_name").addClass("error");
              }

              if (share == ""){
                $("#share").addClass("error");
              }

              return false            
        }        
      }else{
        if(jQuery.trim(last_name).length <= 0 || jQuery.trim(first_name).length <= 0 
          || jQuery.trim(email).length <= 0  ) {
              swal("Please fill up required fields.", "", "warning")

              if (last_name == ""){
                $("#last_name").addClass("error");
              }

              if (first_name == ""){
                $("#first_name").addClass("error");
              }

              // if (share == ""){
              //   $("#share").addClass("error");
              // }

              if (email == ""){
                $("#email").addClass("error");
              }

              $("#save").prop("disabled", false);
              return false            
        }        
      }

      var data_hdr = {
        account_id : account_id,
        type : type,
        active : status,

        last_name : last_name,
        first_name : first_name,
        middle_name : mid_name,

        position : position,
        date_hired : date_hired,
        mobile : mobile,
        email : email,

        outlet : outlet,
        date_start : date_start,
        date_end : date_end,
        monthly_quota : monthly_quota,
        share : share, 
      } 

      var data_users = {
        last_name : last_name,
        first_name : first_name,
        middle_name : mid_name,
        status : status,
        account_type : "1",
        username : account_id,
        account_id : account_id,
        user_type : "2",
        email : email,
        all_access : all_access,
        otp : "1"
      }

      var data = {data_hdr:data_hdr, data_users : data_users, outlet : outlet, csrf_name : csrf_name};

      $.ajax({

            data : data
            , type: "POST"
            , url: base_url + "sales_force/save_sales_force"
            , dataType: 'json'
            , crossOrigin: false     
            , beforeSend : function(){
              $("#save").prop("disabled", true);
              $("#cancel").prop("disabled", true);
              swal({
                title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })

            }, success: function(result) {
              $("input[name=csrf_name]").val(result.token);
              swal({
                title : "Successfully saved",
                text : "Account ID : " + account_id + " Password : " + result.string,
                type : "success",
                timer: 5000
              }, function(){
                location.reload();
              });
            }, error: function(err) {
                console.log(err.responseText);
            }
      });  
};