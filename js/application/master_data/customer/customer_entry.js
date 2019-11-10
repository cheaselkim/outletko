$(document).ready(function(){

  $("#cust_id").attr("readonly", true);
	// $("#contact_no").number(true);
  $("#cust_zip_code").number(true);
  $("#credit_limit").number(true,2);
  $("#fax").number(true);
  $("#tax").number(true);
  customer_no();
	customer_type();
  outlet();

  $("#cust_id").keyup(function(){
    $(this).removeClass("error");
  });

  $("#cust_name").keyup(function(){
    $("#cust_name").removeClass("error");
  }); 

  $("#cust_address").keyup(function(){
    $("#cust_address").removeClass("error");
  });

  $("#cust_city").keyup(function(){
    $("#cust_city").removeClass("error");
  });

  $("#cust_country").keyup(function(){
    $(this).removeClass("error");
  });

  $("#contact_person").keyup(function(){
    $(this).removeClass("error");
  });

  $("#contact_no").keyup(function(){
    $(this).removeClass("error");
  });

	$("#cust_city").keyup(function(){
		if ($(this).val() == ""){
			$("#cust_province").val("");
      $("#cust_province_id").val("");
      $("#cust_city_id").val("");
		}
	});

	$("#cust_city").autocomplete({
		focus: function(event, ui){
			$("#cust_province").val(ui.item.cust_province);
		},
		select: function(event, ui){
			$("#cust_province").val(ui.item.cust_province);
			$("#cust_city_id").val(ui.item.city_id);
			$("#cust_province_id").val(ui.item.prov_id);
		},
		source: function(req, add){
			var cust_city = $("#cust_city").val();
      var csrf_name = $("input[name=csrf_name]").val();
      $.ajax({
        url: base_url + "Customer/search_cust_city/", 
        dataType: "json",
        type: "POST",
        data: {'cust_city' : cust_city, csrf_name : csrf_name},
        success: function(data){
          $("input[name=csrf_name]").val(data.token);
          if(data.response =="true"){
            add(data.result);
          }else{
          	$("#cust_city").val("");
          	$("#cust_province").val("");
            add('');
          }
        }, error: function(err){
        	console.log("Error: " + err.responseText);
        }
      });
		}
	});

  $("#cust_name").keyup(function(){
      var cust_name = $(this).val();
      $("#tbl-customer tbody").empty();
      var csrf_name = $("input[name=csrf_name]").val();

      if (cust_name != ""){
        $.ajax({
          data : {cust_name : cust_name, csrf_name : csrf_name},
          type : "POST",
          dataType : "JSON",
          url : base_url + "Customer/cust_name",
          success : function(result){
            $("input[name=csrf_name]").val(result.token);
            var data = result.result;
            $("#tbl-customer tbody").empty();
            for (var i = 0; i < data.length; i++) {
              $("#tbl-customer tbody").append("<tr>"+ 
                "<td>" + data[i].cust_code + 
                "</td><td>" + data[i].cust_name + 
                "</td><td>" + (data[i].city_desc == null ? "" : data[i].city_desc) +
                "</td></tr>");
            }
          }, error : function(err){
            console.log(err.responseText);
          }
        })
      }

  });

	$("#save").click(function(){
		check_customer();
    $(this).prop("disabled", true);
	});

});

function customer_no(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    dataType : "JSON",
    type : "GET",
    url : base_url + "Customer/customer_no",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      $("#cust_id").val(result.data);
    }, error : function(err){
      console.log(err.responseText);
    }
  })
}

function customer_type(){
  var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
    data : {csrf_name : csrf_name},
		url : base_url + "Customer/customer_type",
		type : "GET",
		dataType : "JSON",
		success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#cust_type").append("<option value='"+result[i].id+"'>"+result[i].customer_name_type	+"</option>");
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
    url : base_url + "Customer/outlet",
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

function check_customer(){
  var outlet_id = $("#outlet_no").val();
  var cust_no = $('#cust_id').val();
  var cust_name = $('#cust_name').val();
  var cust_type = $('#cust_type').val();
  var cust_status = $('#cust_status').val();
  var cust_address = $('#cust_address').val();
  var cust_city_id = $('#cust_city_id').val();
  var cust_province_id = $('#cust_province_id').val();
  var cust_country = $('#cust_country').val();
  var cust_zip_code = $('#cust_zip_code').val();
  var industry = $('#industry').val();
  var contact_person = $('#contact_person').val();
  var contact_no = $('#contact_no').val();
  var email_add = $('#email_add').val();
  var website = $('#website').val();
  var fax = $('#fax').val();
  var tax = $('#tax').val();
  var credit_limit = $('#credit_limit').val();


  if(jQuery.trim(cust_no).length <= 0 || jQuery.trim(cust_name).length <= 0 ) {
    swal("Please fill up required fields.", "", "warning")

    if (jQuery.trim(cust_no).length <= 0){
      $("#cust_id").addClass("error");
    }

    if (jQuery.trim(cust_name).length <= 0){
      $("#cust_name").addClass("error");
    }   
    $("#save").prop("disabled", false);
  }else{
    var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
      data : {"cust_name" : cust_name, csrf_name : csrf_name},
      type : "POST",
      dataType : "JSON",
      url : base_url + "Customer/customer_wo_id",
      success : function(result){
        $("input[name=csrf_name]").val(result.token);
        if (result.result > 0){
          swal({
            type : "warning",
            title : "Customer already exists!",
            text : "Do you want to Continue? ",
            showCancelButton: true
          }, function(isConfirm){
            if (isConfirm){
              save_customer();
            }
          })
        }else{
          save_customer();
        }
      }, error : function(err){
        console.log(err.responseText);
      }
    })
  }



}


function save_customer(){
      var outlet_id = $("#outlet_no").val();
      var cust_no = $('#cust_id').val();
      var cust_name = $('#cust_name').val();
      var cust_type = $('#cust_type').val();
      var cust_status = $('#cust_status').val();
      var cust_address = $('#cust_address').val();
      var cust_city_id = $('#cust_city_id').val();
      var cust_province_id = $('#cust_province_id').val();
      var cust_country = $('#cust_country').val();
      var cust_zip_code = $('#cust_zip_code').val();
      var industry = $('#industry').val();
      var contact_person = $('#contact_person').val();
      var contact_no = $('#contact_no').val();
      var email_add = $('#email_add').val();
      var website = $('#website').val();
      var fax = $('#fax').val();
      var tax = $('#tax').val();
      var credit_limit = $('#credit_limit').val();


      if(jQuery.trim(cust_no).length <= 0 || jQuery.trim(cust_name).length <= 0 ) {
            swal("Please fill up required fields.", "", "warning")

          if (jQuery.trim(cust_no).length <= 0){
            $("#cust_id").addClass("error");
          }

          if (jQuery.trim(cust_name).length <= 0){
            $("#cust_name").addClass("error");
          }

          // if (jQuery.trim(cust_address).length <= 0){
          //   $("#cust_address").addClass("error");
          // }

          // if (jQuery.trim(cust_city_id).length <= 0){
          //   $("#cust_city").addClass("error");
          // }

          // if (jQuery.trim(cust_country).length <= 0){
          //   $("#cust_country").addClass("error");
          // }

          // if (jQuery.trim(contact_person).length <= 0){
          //   $("#contact_person").addClass("error");
          // }

          // if (jQuery.trim(contact_no).length <= 0){
          //   $("#contact_no").addClass("error");
          // }

          $("#save").prop("disabled", false);
            return false            
      }
      var customer_hdr = {
            outlet_id : outlet_id,
            cust_code : cust_no,
            cust_name : cust_name,
            cust_type : cust_type,
            cust_status : cust_status,
            address_1 : cust_address,
            cust_city_id : cust_city_id,
            cust_province_id : cust_province_id,
            cust_country : cust_country, 
            cust_zip_code : cust_zip_code, 
            industry : industry, 
            contact_person : contact_person, 
            contact_no : contact_no, 
            email : email_add, 
            website : website, 
            fax : fax, 
            tax : tax, 
            credit_limit : credit_limit
      } 
      var csrf_name = $("input[name=csrf_name]").val();
      var data = {customer_hdr:customer_hdr, csrf_name : csrf_name};
      //return false;
      $.ajax({

            data : data
            , type: "POST"
            , url: base_url + "Customer/save_customer"
            , dataType: 'json'
            , crossOrigin: false     
            , beforeSend : function(){
              swal({
                  title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })                              
            }, success: function(result) {
              $("input[name=csrf_name]").val(result.token);
              swal({
                title : "Successfully Saved",
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