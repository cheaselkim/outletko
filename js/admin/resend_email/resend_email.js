$(document).ready(function(){


	$("#email").autocomplete({
		focus: function(event, ui){
			$("#account_no").val(ui.item.account_no);
			$("#account_name").val(ui.item.account_name);
		},
		select: function(event, ui){
			$("#account_no").attr("data-id", ui.item.account_id);
			$("#account_no").val(ui.item.account_no);
			$("#account_name").val(ui.item.account_name);
		},
		source: function(req, add){
			var input = $("#email").val();
			var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "Resend_email/search_account/1", 
                dataType: "json",
                type: "POST",
                data: {'input' : input, csrf_name : csrf_name},
                success: function(data){
					$("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                    	$("#account_no").attr("data-id", "");
                    	$("#account_no").val("");
                    	$("#account_name").val("");
                    	$("#email").val("");
                        add('');
                    }
                }, error: function(err){
                	console.log("Error: " + err.responseText);
                }
            });
		}
	});

	$("#account_no").autocomplete({
		focus: function(event, ui){
			$("#email").val(ui.item.email);
			$("#account_name").val(ui.item.account_name);
		},
		select: function(event, ui){
			$("#account_no").attr("data-id", ui.item.account_id);
			$("#email").val(ui.item.email);
			$("#account_name").val(ui.item.account_name);
		},
		source: function(req, add){
			var input = $("#account_no").val();
			var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "Resend_email/search_account/2", 
                dataType: "json",
                type: "POST",
                data: {'input' : input, csrf_name : csrf_name},
                success: function(data){
					$("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                    	$("#account_no").attr("data-id", "");
                    	$("#account_no").val("");
                    	$("#account_name").val("");
                    	$("#email").val("");
                        add('');
                    }
                }, error: function(err){
                	console.log("Error: " + err.responseText);
                }
            });
		}
	});

	$("#account_name").autocomplete({
		focus: function(event, ui){
			$("#email").val(ui.item.email);
			$("#account_no").val(ui.item.account_no);
		},
		select: function(event, ui){
			$("#account_no").attr("data-id", ui.item.account_id);
			$("#email").val(ui.item.email);
			$("#account_no").val(ui.item.account_no);
		},
		source: function(req, add){
			var input = $("#account_name").val();
			var csrf_name = $("input[name=csrf_name]").val();
            $.ajax({
                url: base_url + "Resend_email/search_account/3", 
                dataType: "json",
                type: "POST",
                data: {'input' : input, csrf_name : csrf_name},
                success: function(data){
					$("input[name=csrf_name]").val(data.token);
                    if(data.response =="true"){
                        add(data.result);
                    }else{
                    	$("#account_no").attr("data-id", "");
                    	$("#account_no").val("");
                    	$("#account_name").val("");
                    	$("#email").val("");
                        add('');
                    }
                }, error: function(err){
                	console.log("Error: " + err.responseText);
                }
            });
		}
	});

    $("#send").click(function(){
        check_send_data();
    });

});

function isEmail(email) {
    var regex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return regex.test(email);
}

function check_send_data(){

    var email = $("email").val();
    var account_no = $("#account_no").val();
    var account_name = $("#account_name").val();
    var account_id = $("#account_no").attr("data-id");
    var error = 0;

    if (email.length <= 0 || account_no.length <= 0 || account_name.length <= 0 || account_id.length == ""){
        error++;
    }

    if (isEmail(email) == false){
        error++;
    }

    if (account_id == "0"){
        error++;
    }

    if (error > 0){
        swal({
            type : "warning",
            title : "Please input all fields."
        })
    }else{
        send_email();
    }


}

function send_email(){

    var category = $("#category").val();
    var email_class = $("#class").val();
    var email = $("email").val();
    var account_no = $("#account_no").val();
    var account_name = $("#account_name").val();
    var account_id = $("#account_no").attr("data-id");
    var csrf_name = $("input[name=csrf_name]").val();
    
    $.ajax({
        data : {catgory : category, email_class : email_class, email : email, account_no : account_no, account_name : account_name, account_id : account_id, csrf_name : csrf_name},
        type : "POST",
        dataType : "JSON",
        url : base_url + "Resend_email/resend_email",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            console.log(result);
        }, error : function(err){
            console.log(err.responseText);
        }
    })

}