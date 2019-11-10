$(document).ready(function(){
	
	get_outlet();
	sales_force_type();
	setTimeout(function(){ 
	get_data()
	}, 500);


	$("#update").click(function(){
		save();
	});

	$("#cancel").click(function(){
		window.open(base_url, "_self");
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
    }, error: function(err){
      console.log(err.responseText);
    }
  });  
}

function get_data(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "User/get_user_account",
		success : function(data){
	      $("input[name=csrf_name]").val(data.token);
	      $("#account_id").val(data.result[0]['account_id']);
	      $('#last_name').val(data.result[0]['last_name']);
	      $('#status').val(data.result[0]['active']);
	      $('#first_name').val(data.result[0]['first_name']);
	      $('#nick_name').val(data.result[0]['nickname']);
	      $('#mid_name').val(data.result[0]['middle_name']);
	      $('#position').val(data.result[0]['position']);
	      $('#date_start').val(data.result[0]['date_start']);
	      $('#monthly_quota').val(data.result[0]['monthly_quota']);
	      $('#hierarchy').val(data.result[0]['hierarchy']);
	      $('#share_type').val(data.result[0]['type_share']);
	      $('#salary').val(data.result[0]['salary_allowance']);
	      $('#outlet').val(data.result[0]['outlet']);
	      $('#share').val(data.result[0]['share']);
	      $("#date_end").val(data.result[0]['date_end']);
	      $("#password_days").val(data.result[0]['password_days']);
	      $("#date_hired").val(data.result[0]['date_hired']);
	      $("#mobile").val(data.result[0]['mobile']);
	      $("#email").val(data.result[0]['email']);
	      $("#all_access").val(data.all_access);
	      $("#sales_force_type").val(data.result[0]['type']);
		}, error: function(err){
			console.log(err.responseText);
		}
	});
}


function save(){

	var csrf_name = $("input[name=csrf_name]").val();
	var last_name = $("#last_name").val();
	var first_name = $("#first_name").val();
	var middle_name = $("#middle_name").val();
	var email = $("#email").val();
	var mobile = $("#mobile").val();
	var position = $("#position").val();

	if(jQuery.trim(last_name).length <= 0 || jQuery.trim(first_name).length <= 0 || jQuery.trim(email).length <= 0) {
		    swal("Please fill up required fields.", "", "error");
		    return false;      
	}

	var data_sales = {
		last_name : last_name,
		first_name : first_name,
		middle_name : middle_name,
		email : email,
		mobile : mobile,
		position : position
	}

	var data_user = {
		last_name : last_name, 
		first_name : first_name,
		middle_name : middle_name,
		email : email
	}

	$.ajax({
		data : {data_sales : data_sales, data_user : data_user, csrf_name : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "User/update_user_account",
		beforeSend : function(){
              swal({
                  title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })                
		},
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			swal({
				type : "success",
				title : "Successfully saved",
				timer : 2000
			}, function(){
				location.reload();
			});
		}, error : function(err){
			console.log(err.responseText);
		}
	});

}