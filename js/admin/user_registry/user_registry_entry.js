$(document).ready(function(){

    account_type();
    account_class();
	business_type();
	subscription_type();
	currency();
	account_id();
	renewal_date();

	$("#cancel").click(function(){
		window.open(base_url, "_self");
	})	

	$("#partner_id").keyup(function(){
		$(this).removeClass("error");
	});

	$("#last_name").keyup(function(){
		$(this).removeClass("error");
	});


	$("#first_name").keyup(function(){
		$(this).removeClass("error");
	});

	$("#email").keyup(function(){
		$(this).removeClass("error");
	});

	$("#address").keyup(function(){
		$(this).removeClass("error");
	});

	$("#account_name").keyup(function(){
		$(this).removeClass("error");
	});

	$("#start_date").keyup(function(){
		$(this).removeClass("error");
	});

	$("#no_outlet").keyup(function(){
		$(this).removeClass("error");
	});

	$("#town").keyup(function(){
		$(this).removeClass("error");
	});

	$("#mobile").keyup(function(){
		$(this).removeClass("error");
	});

	$("#business_type").change(function(){
		$(this).removeClass("error");
	});


    $("input").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format( this.getAttribute("data-date-format") )
        )
    }).trigger("change")

    $("#account_class").change(function(){
    	if ($(this).val() != "1"){
    		$("#business_type").attr("disabled", true);
    		$("#business_type").val("97");
    	}else{
    		$("#business_type").attr("disabled", false);
    		$("#business_type").val("");
    	}
    	account_id();
    });

	$("#start_date").keyup(function(){
		renewal_date();
	});

	$("#subscription_date").click(function(){
		renewal_date();
	});

	$("#subscription_type").change(function(){
		renewal_date();
	});

	$("#business_type").change(function(){
		// account_id();
	});

	$("#save").click(function(){
		check_required_fields();
        // partner()
	});
	
// 	$("#partner").keyup(function(){
// 	   partner();
// 	});

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

});	

function account_type(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "User_registry/account_type",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#account_type").append("<option value='"+data[i].id+"'>"+data[i].desc +"</option>");
            }			
		},error: function(err){
			console.log(err.responseText);
		}
	})
}

function account_class(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "User_registry/account_class",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#account_class").append("<option value='"+data[i].id+"'>"+data[i].desc +"</option>");
            }			
		},error: function(err){
			console.log(err.responseText);
		}
	})
}


function business_type(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "User_registry/business_type",
		success: function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#business_type").append("<option value='"+data[i].id+"'>"+data[i].desc +"</option>");
            }			
			$("#business_type option[value='25']").hide();
            account_id();
		},error: function(err){
			console.log(err.responseText);
		}
	})
}

function subscription_type(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "User_registry/subscription_type",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#subscription_type").append("<option value='"+data[i].id+"' data-days = '"+data[i].days+"'>"+data[i].desc +"</option>");
            }			
            $("#subscription_type").val("5");
            renewal_date();
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function currency(){
	var csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		data : {csrf_name : csrf_name},
		url : base_url + "User_registry/currency",
		type : "GET",
		dataType : "JSON",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.data;
			for (var i = 0; i < data.length; i++) {
				$("#currency").append("<option value='"+data[i].id+"'>"+data[i].curr_code	+"</option>");
			}
		}, error: function(err){
			console.log(err.responseText);
		}
	});	
}

function account_id(){
	var account_class = $("#account_class").val();
	var business_type = $("#business_type").val();
	var csrf_name = $("input[name=csrf_name]").val();

	$.ajax({
		data : {csrf_name : csrf_name},
		type : "GET",
		dataType : "JSON",
		url : base_url + "User_registry/account_id",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			var account_id = result.year + (account_class == null ? "1" : account_class) + result.account_id;
			$("#account_no").val(account_id);
		}, error : function(err){
			console.log(err.responseText);
		}
	});

}

function renewal_date(){
	var date = $("#start_date").val();
	var days = $("#subscription_type option:selected").data("days");
	var newdate = new Date(date);
	newdate.setDate(newdate.getDate() + days);
	var renewal_date = $.datepicker.formatDate("yy-mm-dd", newdate);
	$("#renewal_date").val(renewal_date);
}

function partner(){
    var partner = $("#partner_id").val();
	var csrf_name = $("input[name=csrf_name]").val();
    
    $.ajax({
        data : {partner : partner, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url  + "User_registry/partner",
        success : function(result){
			$("input[name=csrf_name]").val(result.token);
            if (result.result > 0){
                cash_card();
            }else{
                $("#partner_id").addClass("error");
                swal({
                    title : "Partner ID not found",
                    type : "warning"
                })
            }
        }, error : function(err){
            console.log(err.responseText);
        }
    })
    
}

function cash_card(){
	var last_name = $("#last_name").val();
	var first_name = $("#first_name").val();
	var middle_name = $("#middle_name").val();
	var cash_card = $("#cash_card").val();
	var csrf_name = $("input[name=csrf_name]").val();
    
    if (cash_card != ""){
        $.ajax({
            data : {last_name : last_name, first_name : first_name, middle_name : middle_name , cash_card : cash_card, csrf_name : csrf_name},
            type : "POST",
            dataType : "JSON",
            url : base_url + "User_registry/cash_card",
            success : function(result){
				$("input[name=csrf_name]").val(result.token);
                if (result.result > 0){
                    swal({
                        type : "warning",
                        title : "Cash card is exists."
                    })
                }else{
                    save();
                }
            }, error : function(err){
                console.log(err.responseText);
            }
        })
    }else{
        save();
    }
    
    
}

function check_required_fields(){
    
	var last_name = $("#last_name").val();
	var first_name = $("#first_name").val();
	var middle_name = $("#middle_name").val();
	var email = $("#email").val();
	var mobile_no = $("#mobile").val();
	var phone_no = $("#phone").val();
	var address = $("#address").val();
	var account_id = $("#account_no").val();
	var account_name = $("#account_name").val();
	var account_status = $("#account_status").val();
	var account_type = $("#account_type").val();
    var account_class = $("#account_class").val();
	var currency = $("#currency").val();
	var business_type = $("#business_type").val();
	var subscription_type = $("#subscription_type").val();
	var subscription_date = $("#start_date").val();
	var renewal_date = $("#renewal_date").val();
	var recruited_by = $("#partner_id").val();
	var outlet = $("#no_outlet").val();
	var vat = $("#vat").val();
	var town = $("#town_id").val();
	var province = $("#province_id").val();
	var cash_card = $("#cash_card").val();
    var partner_id = $("#partner_id").val();

    if (jQuery.trim(last_name).length <= 0 || 
        jQuery.trim(first_name).length <= 0 || 
        jQuery.trim(email).length <= 0 || 
        jQuery.trim(address).length <= 0 || 
        jQuery.trim(account_name).length <= 0 || 
        jQuery.trim(subscription_date).length <= 0 || 
        jQuery.trim(outlet).length <= 0 || 
        jQuery.trim(town).length <= 0 || 
        jQuery.trim(mobile_no).length <= 9 || 
        jQuery.trim(partner_id).length <= 0 ){

        if (jQuery.trim(last_name).length <= 0){
            $("#last_name").addClass("error");
        }

        if (jQuery.trim(first_name).length <= 0){
            $("#first_name").addClass("error");
        }

        if (jQuery.trim(email).length <= 0){
            $("#email").addClass("error");
        }

        if (jQuery.trim(address).length <= 0){
            $("#address").addClass("error");
        }

        if (jQuery.trim(account_name).length <= 0){
            $("#account_name").addClass("error");
        }

        if (jQuery.trim(subscription_date).length <= 0){
            $("#start_date").addClass("error");
        }

        if (jQuery.trim(outlet).length <= 0){
            $("#no_outlet").addClass("error");
        }

        if (jQuery.trim(town).length <= 0){
            $("#town").addClass("error");
        }

        if (jQuery.trim(mobile_no).length <= 9){
            $("#mobile").addClass("error");
        }

        if (jQuery.trim(partner_id).length <= 0){
            $("#partner_id").addClass("error");
        }

        // if (jQuery.trim(cash_card).length <= 0){
        //     $("#cash_card").addClass("error");
        // }

        if ($("#business_type").val() == "0"){
            $("#business_type").addClass("error");
        }

        swal({
            type : "warning",
            title : "Please fill up required fields",
            confirmButtonText: 'Continue',
            confirmButtonColor: "#DD6B55"
        })
    }else{  
        partner();
    }
    
}

function save(){

	var last_name = $("#last_name").val();
	var first_name = $("#first_name").val();
	var middle_name = $("#middle_name").val();
	var email = $("#email").val();
	var mobile_no = $("#mobile").val();
	var phone_no = $("#phone").val();
	var address = $("#address").val();
	var account_id = $("#account_no").val();
	var account_name = $("#account_name").val();
	var account_status = $("#account_status").val();
	var account_type = $("#account_type").val();
    var account_class = $("#account_class").val();
	var currency = $("#currency").val();
	var business_type = $("#business_type").val();
	var subscription_type = $("#subscription_type").val();
	var subscription_date = $("#start_date").val();
	var renewal_date = $("#renewal_date").val();
	var recruited_by = $("#partner_id").val();
	var outlet = $("#no_outlet").val();
	var vat = $("#vat").val();
	var town = $("#town_id").val();
	var province = $("#prov_id").val();
	var cash_card = $("#cash_card").val();
	var csrf_name = $("input[name=csrf_name]").val();

	var data = {last_name : last_name, 
	            first_name : first_name, 
	            middle_name : middle_name, 
	            email : email, 
	            mobile_no : mobile_no, 
		        phone_no : phone_no, 
		        address : address, 
		        town: town,
		        province : province,
		        account_id : account_id, 
		        account_name : account_name, 
		        account_status : account_status,
		        account_class : account_class,
		        account_type : account_type,
		        currency : currency, 
		        business_type : business_type, 
		        subscription_type : subscription_type, 
		        subscription_date : subscription_date,
		        renewal_date : renewal_date, 
		        recruited_by : recruited_by, 
		        outlet : outlet, 
		        cash_card : cash_card,
		        vat : vat,
		    	csrf_name : csrf_name};

	$.ajax({
		data : data,
		type : "POST",
		dataType : "JSON",
		url : base_url + "User_registry/insert_account",
		crossOrigin: false,
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
				title : "Successfully Saved",
				type : "success",
				timer: 2000
			}, function(){
				location.reload();
			})
		}, error : function(err){
			console.log(err.responseText);
		}
	});

}