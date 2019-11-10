$(document).ready(function(){



	currency();

	business_type();

	get_data();

	setTimeout(function(){ 
		get_data();
	}, 1000);


	$("#save").click(function(){

		save();

	});

	$("#cancel").click(function(){
		window.open(base_url, "_self");
	})


	$("#town").keyup(function(){

		if ($(this).val() == ""){

			$("#province").val("");

		}

	});



	$("#town").autocomplete({

		focus: function(event, ui){

			$("#province").val(ui.item.outlet_province);

		},

		select: function(event, ui){

			$("#province").val(ui.item.outlet_province);

			$("#town_id").val(ui.item.city_id);

			$("#province_id").val(ui.item.prov_id);

		},

		source: function(req, add){

			var outlet_city = $("#town").val();
			var csrf_name = $("input[name=csrf_name]").val();

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

                    	$("#town").val("");

                    	$("#province").val("");

                        add('');

                    }

                }, error: function(err){

                	console.log("Error: " + err.responseText);

                }

            });

		}

	});



})



function currency(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",

		dataType : "JSON",

		url : base_url + "user/currency",

		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;

			for (var i = 0; i < result.length; i++) {

				$("#currency").append("<option value='"+result[i].id+"'>"+result[i].curr_code	+"</option>");

			}			

		}, error : function(err){

			console.log(err.responseText);

		}

	})

}



function business_type(){
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data :  {csrf_name : csrf_name},

		type : "GET",

		dataType : "JSON",

		url : base_url + "user/business_type",

		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.data;

			for (var i = 0; i < result.length; i++) {

				$("#business_type").append("<option value='"+result[i].id+"'>"+result[i].desc	+"</option>");

			}			

		}, error : function(err){

			console.log(err.responseText);

		}

	})	

}



function get_data(){

	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({

		data : {csrf_name : csrf_name},

		type : "GET",

		dataType : "JSON",

		url : base_url + "user/get_user_owner",

		success: function(data){

			$("input[name=csrf_name]").val(data.token);

			$("#last_name").val(data.result[0].last_name);

			$("#first_name").val(data.result[0].first_name);

			$("#middle_name").val(data.result[0].middle_name);

			$("#email").val(data.result[0].email);

			$("#mobile").val(data.result[0].mobile_no);

			$("#account_type").val(data.result[0].account_type_desc);

			$("#account_class").val(data.result[0].account_class_desc);

			$("#phone").val(data.result[0].telephone_no);

			$("#address").val(data.result[0].address);

			$("#account_name").val(data.result[0].account_name);

			$("#account_status").val(data.result[0].status);

			$("#currency").val(data.result[0].currency);

			$("#business_type").val(data.result[0].business_type);

			$("#subscription_type").val(data.result[0].subscription_desc);

			$("#start_date").val(data.result[0].subscription_date);

			$("#renewal_date").val(data.result[0].renewal_date);

			$("#recruited_by").val(data.result[0].recruited_by);

			$("#no_outlet").val(data.result[0].outlet_no);

			$("#vat").val(data.result[0].vat);

			$("#province").val(data.result[0].province_desc);

			$("#town").val(data.result[0].city_desc);

			$("#prov_id").val(data.result[0].province);

			$("#town_id").val(data.result[0].city);

		}, error : function(err){

			console.log(err.responseText);

		}

	});

}



function save(){



	var last_name = $("#last_name").val().toUpperCase();

	var first_name = $("#first_name").val().toUpperCase();

	var middle_name = $("#middle_name").val().toUpperCase();

	var cash_card = $("#cash_card").val();



	var account_name = $("#account_name").val().toUpperCase();

	var vat = $("#vat").val();

	var currency = $("#currency").val();

	var address = $("#address").val();

	var town = $("#town_id").val();

	var province = $("#prov_id").val();

	var email = $("#email").val();

	var mobile_no = $("#mobile").val();

	var phone_no = $("#phone").val();

	var business_type = $("#business_type").val();



	if(jQuery.trim(last_name).length <= 0 || jQuery.trim(first_name).length <= 0 || jQuery.trim(middle_name).length <= 0  

		|| jQuery.trim(email).length <= 0 || jQuery.trim(mobile_no).length <= 0 

		|| jQuery.trim(address).length <= 0   || jQuery.trim(account_name).length <= 0) {

		    swal("Please fill up required fields.", "", "warning");



		    return false;      

	}



	var data_owner = {

		last_name : last_name,

		first_name : first_name,

		middle_name : middle_name,



		account_name : account_name,

		vat : vat,

		currency : currency,

		address : address,

		city : town,

		province : province,

		email : email,

		mobile_no : mobile_no,

		telephone_no : phone_no,

		business_type : business_type

	}



	var data_user = {

		first_name : first_name,

		last_name : last_name,

		middle_name : middle_name,

		email : email

	}

	var csrf_name = $("input[name=csrf_name]").val();
	

	$.ajax({

		data : {data_owner : data_owner, data_user : data_user, vat : vat, csrf_name : csrf_name},

		type : "POST",

		url : base_url + "user/update_owner",

		dataType : "JSON",

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

			})

		}, error : function(err){

			console.log(err.responseText);

		}

	})



}