$(document).ready(function(){

  var id = $("#supplier_id").val();
  $("#contact_no").number(true);
  $("#supp_zip_code").number(true);
  $("#fax").number(true);
  $("#supp_code").attr("readonly", true);
  supplier_type();
  business_nature();
  get_classification();
  get_organization();
  outlet();
  
  get_supplier_dtl(id)

  setTimeout(function(){ 
    var id = $("#supplier_id").val();
    get_supplier_dtl(id)
  }, 1000);
  
  $("#supp_city").keyup(function(){
    if ($(this).val() == ""){
      $("#supp_province").val("");
      $("#supp_province_id").val("");
      $("#supp_city_id").val("");
    }
  });

  $("#supp_code").keyup(function(){
    $("#supp_code").removeClass("error");
  });

  $("#supp_city").keyup(function(){
    $("#supp_city").removeClass("error");
  });

  $("#supp_name").keyup(function(){
    $("#supp_name").removeClass("error");
  });

  $("#supp_address").keyup(function(){
    $("#supp_address").removeClass("error");
  });

  $("#contact_person").keyup(function(){
    $("#contact_person").removeClass("error");
  });

  $("#contact_no").keyup(function(){
    $("#contact_no").removeClass("error");
  });

  $("#date_org").keyup(function(){
    $("#date_org").removeClass("error");
  });

  $("#date_org").change(function(){
    $("#date_org").removeClass("error");
  });

  $("#supp_city").autocomplete({
    focus: function(event, ui){
      $("#supp_province").val(ui.item.supp_province);
    },
    select: function(event, ui){
      $("#supp_province").val(ui.item.supp_province);
      $("#supp_city_id").val(ui.item.city_id);
      $("#supp_province_id").val(ui.item.prov_id);
    },
    source: function(req, add){
      var supp_city = $("#supp_city").val();
      var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "Supplier/search_supp_city/", 
                dataType: "json",
                type: "POST",
                data: {'supp_city' : supp_city, csrf_name : csrf_name},
                success: function(data){
                    $("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                      $("#supp_city").val("");
                      $("#supp_province").val("");
                        add('');
                    }
                }, error: function(err){
                  console.log("Error: " + err.responseText);
                }
            });
    }
  });

  $("#supp_name").keyup(function(){
      var supp_name = $(this).val();
      var csrf_name = $("input[name=csrf_name]").val();
      $("#tbl-supplier tbody").empty();

      if (supp_name != ""){
        $.ajax({
          data : {supp_name : supp_name, csrf_name : csrf_name},
          type : "POST",
          dataType : "JSON",
          url : base_url + "Supplier/supp_name",
          success : function(result){
            var data = result.data;
            $("input[name=csrf_name]").val(result.token);
            $("#tbl-supplier tbody").empty();
            for (var i = 0; i < data.length; i++) {
              $("#tbl-supplier tbody").append("<tr>"+ 
                "<td>" + data[i].supp_code + 
                "</td><td>" + data[i].supp_name + 
                "</td><td>" + (data[i].city_desc == null ? "" : data[i].city_desc) +
                "</td></tr>");
            }
          }, error : function(err){
            console.log(err.responseText);
          }
        })
      }

  });

  $("#cancel").click(function(){
    window.open(base_url + "app/4/7/2", "_self");
  });

  $("#save").click(function(){
    $(this).prop("disabled", true);
    save_supplier();
  });

});

function supplier_type(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Supplier/supplier_type",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#supp_type").append("<option value='"+result[i].id+"'>"+result[i].supplier_name_type  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function business_nature(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Supplier/business_nature",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#nat_bus").append("<option value='"+result[i].id+"'>"+result[i].nature_desc  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function get_classification(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Supplier/get_classification",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#classif").append("<option value='"+result[i].id+"'>"+result[i].classification_desc  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function get_organization(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Supplier/get_organization",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
      for (var i = 0; i < result.length; i++) {
        $("#form_org").append("<option value='"+result[i].id+"'>"+result[i].organization_desc  +"</option>");
      }
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function outlet(){
  var data = "";
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Supplier/outlet",
    type : "GET",
    dataType : "JSON",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      data = result.data;
      all_access = result.all_access;

      if (all_access != "1"){
        $('#outlet_no').find('option').remove();
      }

      for (var i = 0; i < data.length; i++) {
        $("#outlet_no").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
      }
    }, error : function(err){
      console.log(err.responseText);
    }
  })
}



function get_supplier_dtl(id){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {"id" : id, csrf_name : csrf_name},
    url : base_url + "supplier/get_supplier_dtl",
    type : "POST",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      $("#outlet_no").val(data.supplier_dtl[0]['outlet_id']);
      $('#supp_code').val(data.supplier_dtl[0]['supp_code']);
      $('#supp_name').val(data.supplier_dtl[0]['supp_name']);
      $('#supp_type').val(data.supplier_dtl[0]['supp_type']);
      $('#supp_status').val(data.supplier_dtl[0]['supp_status']);
      $('#supp_address').val(data.supplier_dtl[0]['supp_address']);
      $('#supp_city').val(data.supplier_dtl[0]['city_desc']);
      $('#supp_province').val(data.supplier_dtl[0]['province_desc']);
      $('#supp_city_id').val(data.supplier_dtl[0]['cust_city_id']);
      $('#supp_province_id').val(data.supplier_dtl[0]['supp_province_id']);
      $('#supp_country').val(data.supplier_dtl[0]['supp_country']);
      $('#supp_zip_code').val(data.supplier_dtl[0]['supp_zip_code']);
      $('#supp_region').val(data.supplier_dtl[0]['supp_region']);
      $('#factory_add').val(data.supplier_dtl[0]['factory_add']);
      $('#contact_person').val(data.supplier_dtl[0]['contact_person']);
      $('#contact_no').val(data.supplier_dtl[0]['contact_no']);
      $('#email_add').val(data.supplier_dtl[0]['email_add']);
      $('#website').val(data.supplier_dtl[0]['website']);
      $('#fax').val(data.supplier_dtl[0]['fax']);
      $('#facebook').val(data.supplier_dtl[0]['facebook']);
      $('#classif').val(data.supplier_dtl[0]['classification']);
      $('#form_org').val(data.supplier_dtl[0]['organization_form']);
      $('#nat_bus').val(data.supplier_dtl[0]['business_nature']);
      $('#date_org').val(data.supplier_dtl[0]['date_organized']);
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function save_supplier(){
      var outlet = $("#outlet_no").val();
      var supp_code = $('#supp_code').val();
      var supp_name = $('#supp_name').val();
      var supp_type = $('#supp_type').val();
      var supp_status = $('#supp_status').val();
      var supp_address = $('#supp_address').val();
      var supp_city_id = $('#supp_city_id').val();
      var supp_province_id = $('#supp_province_id').val();
      var supp_country = $('#supp_country').val();
      var supp_zip_code = $('#supp_zip_code').val();
      var factory_add = $('#factory_add').val();
      var supp_region = $('#supp_region').val();
      var business_nature = $('#nat_bus').val();
      var organization_form = $('#form_org').val();
      var classification = $('#classif').val();
      var contact_person = $('#contact_person').val();
      var contact_no = $('#contact_no').val();
      var email_add = $('#email_add').val();
      var website = $('#website').val();
      var facebook = $('#facebook').val();
      var fax = $('#fax').val();
      var date_org = $('#date_org').val();
      var id = $("#supplier_id").val();
      var csrf_name = $("input[name=csrf_name]").val();


      if(jQuery.trim(supp_code).length <= 0 || jQuery.trim(supp_name).length <= 0 ) {
            $("#save").prop("disabled", false);
        
            swal("Please fill up required fields.", "", "warning")

          if (jQuery.trim(supp_code).length <= 0){
            $("#supp_code").addClass("error");
          }

          if (jQuery.trim(supp_name).length <= 0){
            $("#supp_name").addClass("error");
          }

          // if (jQuery.trim(supp_address).length <= 0){
          //   $("#supp_address").addClass("error");
          // }

          // if (jQuery.trim(contact_person).length <= 0){
          //   $("#contact_person").addClass("error");
          // }

          // if (jQuery.trim(contact_no).length <= 0){
          //   $("#contact_no").addClass("error");
          // }

          // if (jQuery.trim(date_org).length <= 0){
          //   $("#date_org").addClass("error");
          // }

          // if (jQuery.trim(supp_city_id).length <= 0){
          //   $("#supp_city").addClass("error");
          // }

            return false            
      }
      var supplier_hdr = {
            outlet_id : outlet,
            supp_code : supp_code,
            supp_name : supp_name,
            supp_type : supp_type,
            supp_status : supp_status,
            supp_address : supp_address,
            supp_city_id : supp_city_id,
            supp_province_id : supp_province_id,
            supp_country : supp_country, 
            supp_zip_code : supp_zip_code, 
            factory_add : factory_add, 
            contact_person : contact_person, 
            contact_no : contact_no, 
            email_add : email_add, 
            website : website, 
            fax : fax, 
            facebook: facebook,
            classification:classification,
            business_nature : business_nature, 
            organization_form : organization_form,
            supp_region : supp_region, 
            date_organized : date_org, 
      }

      var data = {supplier_hdr:supplier_hdr,id:id, csrf_name : csrf_name};
      //return false;
      $.ajax({

            data : data
            , type: "POST"
            , url: base_url + "Supplier/update_supplier"
            , dataType: 'json'
            , crossOrigin: false     
            , beforeSend : function(){
              swal({
                  title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })              
            }
            , success: function(result) {
              $("input[name=csrf_name]").val(result.token);
              swal({
                title : "Successfully Updated",
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

