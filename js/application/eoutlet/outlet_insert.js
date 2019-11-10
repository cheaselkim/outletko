$(document).ready(function(){

	$("#outlet_quota").number(true, 2);
  $("#outlet_no").attr("readonly", true);		
  $("#currency").attr("readonly", true);

  outlet_available();
  outlet_no();
  outlet_type();
  currency();
  outlet_list();

  $("#cancel").click(function(){
    window.open(base_url, "_self");
  });

  $("#outlet_name").keyup(function(){
    $("#outlet_name").removeClass("error");
  })

  $("#outlet_location").keyup(function(){
    $("#outlet_location").removeClass("error");
  })

  $("#outlet_city").keyup(function(){
    $("#outlet_city").removeClass("error");
  })

  $("#outlet_quota").keyup(function(){
    $("#outlet_quota").removeClass("error");
  })

  $("#outlet_type").change(function(){
    $("#outlet_type").removeClass("error");
  })


	$("#outlet_city").keyup(function(){
		if ($(this).val() == ""){
			$("#outlet_province").val("");
		}
	});

	$("#outlet_city").autocomplete({
		focus: function(event, ui){
			$("#outlet_province").val(ui.item.outlet_province);
		},
		select: function(event, ui){
			$("#outlet_province").val(ui.item.outlet_province);
			$("#outlet_city_id").val(ui.item.city_id);
			$("#outlet_province_id").val(ui.item.prov_id);
		},
		source: function(req, add){
      var csrf_name = $("input[name=csrf_name]").val();
			var outlet_city = $("#outlet_city").val();
            $.ajax({
                url: base_url + "Outlet/search_outlet_city/", 
                dataType: "json",
                type: "POST",
                data: {'outlet_city' : outlet_city, csrf_name : csrf_name},
                success: function(data){
                    $("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                    	$("#outlet_city").val("");
                    	$("#outlet_province").val("");
                        add('');
                    }
                }, error: function(err){
                	console.log("Error: " + err.responseText);
                }
            });
		}
	});

	$("#save_outlet").click(function(){
		save_outlet();
	});

});

function outlet_no(){

  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {csrf_name : csrf_name},
    type : "GET",
    dataType : "JSON",
    url : base_url  + "Outlet/outlet_no",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      if (result.result == "0"){
        $("#outlet_no").val("001");
      }else{
        $("#outlet_no").val(result.data);
      }
    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function outlet_available(){

  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    url : base_url + "Outlet/outlet_available",
    type: "GET",
    dataType : "JSON",
    data : {csrf_name : csrf_name},
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      if (result.result == "0"){
        swal({
          type : "warning",
          title : "This Account have reach the no. of Outlet.",
          text : "Please contact Customer Support."
        }, function(){
          window.open(base_url, "_self");
        });
      }
    }, error : function(err){
      console.log(err.responseText);
    }
  })
}

function outlet_type(){

  var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
    data : {csrf_name : csrf_name},
		url : base_url + "Outlet/outlet_type",
		type : "GET",
		dataType : "JSON",
		success : function(data){
      $("input[name=csrf_name]").val(data.token);
      var result = data.data;
			for (var i = 0; i < result.length; i++) {
				$("#outlet_type").append("<option value='"+result[i].id+"'>"+result[i].outlet_type_name+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});

}

function currency(){

  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Outlet/currency",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      $("#currency").val(data.data);
      $("#curr").text(data.data);
    }, error : function(err){
      console.log(err.responseText);
    }
  })
}

function outlet_list(){

  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Outlet/all_outlet_list",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      $("#list-outlet").html(data.data);
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}


function save_outlet(){
  var csrf_name = $("input[name=csrf_name]").val();
  var outlet_code = $('#outlet_no').val();
  var outlet_name = $('#outlet_name').val();
  var outlet_location = $('#outlet_location').val();
  var outlet_city = $('#outlet_city_id').val();
  var outlet_province = $('#outlet_province_id').val();
  var outlet_type = $('#outlet_type').val();
  var outlet_monthly_quota = $('#outlet_quota').val();
  var outlet_status = $('#outlet_status').val();
  if(jQuery.trim(outlet_code).length <= 0 || jQuery.trim(outlet_name).length <= 0 || jQuery.trim(outlet_location).length <= 0 
    || jQuery.trim(outlet_city).length <= 0 || jQuery.trim(outlet_province).length <= 0 
    || jQuery.trim(outlet_type).length <= 0
    || jQuery.trim(outlet_status).length <= 0) {
        swal("Please fill up required fields.", "", "warning")

        if (jQuery.trim(outlet_name).length <= 0){
          $("#outlet_name").addClass("error");
        }

        if (jQuery.trim(outlet_location).length <= 0){
          $("#outlet_location").addClass("error");
        }

        if (jQuery.trim(outlet_city).length <= 0){
          $("#outlet_city").addClass("error");
        }


        if (jQuery.trim(outlet_type).length <= 0){
          $("#outlet_type").addClass("error");
        }

        if (jQuery.trim(outlet_monthly_quota).length <= 0){
          $("#outlet_quota").addClass("error");
        }


        return false;
  }



  var outlet_hdr = {
        outlet_code : outlet_code,
        outlet_name : outlet_name,
        outlet_location : outlet_location,
        outlet_city : outlet_city,
        outlet_province : outlet_province,
        outlet_type : outlet_type,
        outlet_monthly_quota : outlet_monthly_quota,
        outlet_status : outlet_status, 
  } 

  var data = {outlet_hdr:outlet_hdr, csrf_name : csrf_name};
  //return false;
  $.ajax({

        data : data
        , type: "POST"
        , url: base_url + "Outlet/save_outlet"
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
            console.log("Error : " + err.responseText);
        }
  });  
};