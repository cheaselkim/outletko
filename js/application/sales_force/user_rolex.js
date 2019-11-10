$(document).ready(function(){
    
  index();
  control_check(); 
  
  // $('#all_check-1-1').change(function(){

  //       if ($('#all_check-1-1').is(":checked")) {
  //           $(".checks-1-1").prop("checked", $(this).prop("checked"))
  //       }else if($('#all_check-1-1:not(:checked)')){
  //           $(".checks-1-1").prop("checked",false)
  //       }
  //       $('.checks-1-1').change(function(){
  //           $("#all_check-1-1").prop("checked", false)
  //           if ($(".checks-1-1:checked").length == $(".checks-1-1").length) {
  //               $("#all_check-1-1").prop("checked", true)
               
  //           }

  //       });
  //   });

  $("#save").click(function(){
    save_data();
  });

});

function index(term=""){
  var app_func = $("#force_func").val();
  $.ajax({
    data: {term:term, app_func : app_func}, 
    type: "POST", 
    url : base_url +  "sales_force/user_list",
    dataType : "JSON",
    success : function(result){
      $("#user-table").html(result);
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function control_check() {
       
        var total_tr = $('#table_check > tbody > tr').length;
        
        $('#table_check > tbody > tr').each(function (i) {
            i++;
            var module1 =''
            var module2 =''
            if(i <='1'){
              module1 = '1';
              module2 ='1'
            }else if(i <='2') {
              module1 = '2';
              module2 ='1'
            }else if(i <='4') {
              module1 = '3';
              if (i=='3') {
                module2 ='1'
              }else{
                module2 ='2'
              }
            }else if(i <='8') {
              module1 = '4';
              if (i=='5') {
                module2 ='1'
              }else if(i =='6'){
                module2 ='2'
              }else if(i =='7'){
                module2 ='3'
              }else if(i =='8'){
                module2 ='4'
              }
            }else if(i <='9') {
              module1 = '5';
              module2 ='1'
            }else if(i <='10') {
              module1 = '6';
              module2 ='1'
            }else if(i <='11') {
              module1 = '7';
              module2 ='1'
            }else if(i <='13') {
              module1 = '8';
              if (i=='12') {
                module2 ='1'
              }else if(i =='13'){
                module2 ='2'
              }
            }else if(i <='17') {
              module1 = '9';
              if (i=='14') {
                module2 ='1'
              }else if(i =='15'){
                module2 ='2'
              }else if(i =='16'){
                module2 ='3'
              }else if(i =='17'){
                module2 ='4'
              }
            }else{
              module1 = '10';
              if (i=='18') {
                module2 ='1'
              }else if(i =='19'){
                module2 ='2'
              }else if(i =='20'){
                module2 ='3'
              }
            }
            //alert(module1);
            var checkbox = $(this).find('checkbox');
            var text = $(this).find('input');
            text.eq(0).attr('id', 'all_check-'+module1+'-'+ i);
            text.eq(1).attr('class', 'form-control checks-'+module1+'-'+ i).attr('data-function',1).attr('data-module',module1).attr('data-sub_module',module2);
            text.eq(2).attr('class', 'form-control checks-'+module1+'-'+ i).attr('data-function',2).attr('data-module',module1).attr('data-sub_module',module2);
            text.eq(3).attr('class', 'form-control checks-'+module1+'-'+ i).attr('data-function',3).attr('data-module',module1).attr('data-sub_module',module2);
            text.eq(4).attr('class', 'form-control checks-'+module1+'-'+ i).attr('data-function',4).attr('data-module',module1).attr('data-sub_module',module2);
            text.eq(5).attr('class', 'form-control checks-'+module1+'-'+ i).attr('data-function',5).attr('data-module',module1).attr('data-sub_module',module2);
            controls(module1,i);
        });
  }

function controls(module1,srl_num){

  $('#all_check-'+module1+'-'+srl_num).change(function(){
        if ($('#all_check-'+module1+'-'+srl_num).is(":checked")) {
            $(".checks-"+module1+"-"+srl_num).prop("checked", $(this).prop("checked"))
        }else if($('#all_check-'+module1+'-'+srl_num+':not(:checked)')){
            $(".checks-"+module1+"-"+srl_num).prop("checked",false)
        }

        $('.checks-'+module1+'-'+srl_num).change(function(){
            $("#all_check-"+module1+"-"+srl_num).prop("checked", false)
            if ($(".checks-"+module1+"-"+srl_num+":checked").length == $(".checks-"+module1+"-"+srl_num).length) {
                $("#all_check-"+module1+"-"+srl_num).prop("checked", true)
            }
        });
  });
}

function save_data(){
     var table_data = [];
     var outlet_id = $("#outlet_id").val();
     var i = 0;
     var j = 0;

      $('#user-table input[type="checkbox"]:checked').each(function(row,td){
        var user_id =$(this).data('id');
        j++;
        
     
        $('#table_check input[type="checkbox"]:checked').each(function(row,td){
          i++
         
          var str = $(this).data('function');
          if(str!=undefined){
            var sub = {
                    'user_id' : user_id,
                    'outlet_id' : outlet_id,
                    'module_id' :$(this).data('module'),
                    'sub_module_id' : $(this).data('sub_module'),
                    'function_id' : $(this).data('function'),
                  }
            table_data.push(sub); 
          }       
        });
      });

        if(j=="0"){
          swal("Please select users.", "", "error")
          return false
        }

        if(i=="0"){
          swal("Please select user roles.", "", "error")
          return false
        }
        
      console.log(table_data);
      var data = {table_data:table_data};
      //return false;
      $.ajax({

            data : data
            , type: "POST"
            , url: base_url + "sales_force/save_user_roles"
            , dataType: 'json'
            , crossOrigin: false     
            , success: function(result) {
              swal({
                title : "Successfully Insert",
                type : "success",
                timer: 2000
              }, function(){
                location.reload();
              });
            }, error: function(err) {
                console.log(err.responseText);
            }
      });  
};
