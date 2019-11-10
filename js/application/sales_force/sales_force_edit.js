  $(document).ready(function(){

  var id = getCookie('sales_force_id');
  $("#monthly_quota").number(true, 2);
  $("#share").number(true, 2);
  $("#salary").number(true, 2);
  get_outlet();
  sales_force_type();

  setTimeout(function(){ 
    get_sales_force_dtl(id)
  }, 500);

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

  // $("#outlet").change(function(){
  //   account_id();
  // });

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

  $("#cancel").click(function(){
    window.open(base_url + "app/5/0/2", "_self");
  });


  $("#update").click(function(){
    var open_transasction = $("#open_transaction").val();
    var outlet = $("#outlet").val();
    var old_outlet = $("#old_outlet").val();
    var user = $("#account_id").val();

    if (old_outlet != outlet && open_transasction > 0){
      swal({
        type : "warning",
        title : "User "+ user +" has open transaction in sales module.",
        text : "Please close the transaction before changing the outlet.",
      })
    }else{
      $("#update").prop("disabled", true);
      save_data();      
    }

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
      var id = getCookie('sales_force_id');
      get_sales_force_dtl(id)
    }, error: function(err){
      console.log(err.responseText);
    }
  });  
}

function get_sales_force_dtl(id){
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
      $('#old_outlet').val(data.sales_force_dtl[0]['outlet']);
      $('#outlet').val(data.sales_force_dtl[0]['outlet']);
      $('#share').val(data.sales_force_dtl[0]['share']);
      $("#date_end").val(data.sales_force_dtl[0]['date_end']);
      $("#password_days").val(data.sales_force_dtl[0]['password_days']);
      $("#date_hired").val(data.sales_force_dtl[0]['date_hired']);
      $("#mobile").val(data.sales_force_dtl[0]['mobile']);
      $("#email").val(data.sales_force_dtl[0]['email']);
      $("#all_access").val(data.all_access);
      $("#sales_force_type").val(data.sales_force_dtl[0]['type']);

      setTimeout(function(){ 
        open_transaction(data.sales_force_dtl[0]['account_id'], data.sales_force_dtl[0]['outlet'])
      }, 1500);
      // if (data.sales_force_dtl[0]['outlet'] == "0"){
      //   $("#outlet").prop("disabled", true);
      // }

    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function account_id(){
  var outlet = $("#outlet").val();
  var csrf_name = $("input[name=csrf_name]").val();
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

function open_transaction($account_id, $outlet_id){

  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {account_id : $account_id, outlet_id : $outlet_id, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "sales_force/open_transaction",
    success : function(result){
      console.log(result.result);
      $("input[name=csrf_name]").val(result.token);
      $("#open_transaction").val(result.result);
    }, error : function(err){
      console.log(err.responseText)
    }
  })

}

function save_data(){
      var csrf_name = $("input[name=csrf_name]").val();

      var id = getCookie('sales_force_id');

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
        share : share
      } 

      var data_users = {
        last_name : last_name,
        first_name : first_name,
        middle_name : mid_name,
        status : status,
        username : account_id,
        account_id : account_id,
        email : email,
        all_access : all_access,
        otp : "1"
      }

      var data = {data_hdr:data_hdr, data_users : data_users, id : id, csrf_name : csrf_name};
      // console.log(data_hdr);
      // return false;
      $.ajax({
            data : data
            , type: "POST"
            , url: base_url + "sales_force/update_sales_force"
            , dataType: 'json'
            , crossOrigin: false     
            , beforeSend : function(){
              $("button").prop("disabled", true);
              swal({
                title : "Saving.....",
                showCancelButton: false, 
                showConfirmButton: false 
              })

            }, success: function(result) {
              $("input[name=csrf_name]").val(result.token);
              swal({
                title : "Successfully saved",
                // text : "Account ID : " + account_id + " Password : " + result.string,
                type : "success",
                timer: 5000
              }, function(){
                  eraseCookie('sales_force_id');
                location.reload();
              });
            }, error: function(err) {
                console.log(err.responseText);
            }
      });  
};

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}

