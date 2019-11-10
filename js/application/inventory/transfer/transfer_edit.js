$(document).ready(function(){

	get_data();

	jQuery(document).on("click", ".delete_item_table", function(){
		var id = $(this).closest("tr").find(".tbl_id").text();
		var result = delete_item_table(id);
		if (result == true){
			$(this).closest("tr").remove();		
		}else{
			console.log("error: " + result);
		}
	});	

	$("#update").click(function(){
		$("#update").prop("disabled", true);
		check_required_fields_update();
	});

});

function get_data(){
	var trans_id = $("#trans_id").val();
	// console.log("trans_id " + trans_id);
	$.ajax({

		data : {trans_id : trans_id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "inventory_transfer/get_inventory_transfer_data",
		success : function(result){
			$("#transfer_no").val(result.transfer_no);
			$("#transfer_date").val(result.transfer_date);
			$("#recipient_code").data("type_1", result.recipient_type);
			$("#recipient_code").data("id", result.recipient_id);
			$("#recipient_code").val(result.recipient_code);
			$("#recipient_name").val(result.recipient_name);
			$("#ref_trans_no").val(result.ref_trans_no);
			$("#ref_trans_date").val(result.ref_trans_date);
			$("#purpose").val(result.purpose);
			$("#tbl-products tbody").append(result.table);
		}, error : function(err){
			console.log(err.responseText);
		}
	});
}


function delete_item_table(id){
	var obj = "";
	$.ajax({
		async : false,
		data : {id : id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "inventory_transfer/delete_transfer_dtl",
		success : function(result){
			obj = JSON.parse(result);
		}, error : function(err){
			console.log(err.responseText);
		}
	});	

	return obj;
}

function check_required_fields_update(){

	var trans_no = $("#transfer_no").val();
	var trans_date  = $("#transfer_date").val();
	var recipient_code = $("#recipient_code").val();
	var recipient_name = $("#recipient_name").val();
	var ref_trans_no = $("#ref_trans_no").val();
	var ref_trans_date = $("#ref_trans_date").val();
	var purpose = $("#purpose").val();
	var rows = $('#tbl-products > tbody > tr').length;
	var id = $("#trans_id").val();

	if (trans_no == "" || trans_date == "" || recipient_code == "" || recipient_name == "" || purpose == "" || rows == 0){
		$("#update").prop("disabled", false);
		swal({
			type : "warning",
			title : "Please input all required fields",
			timer : 2000
		})

        if (trans_no == ""){
            $("#transfer_no").addClass("error");
        }

        if (trans_date == ""){
            $("#transfer_date").addClass("error");
        }

        if (recipient_code == ""){
            $("#recipient_code").addClass("error");
        }

        if (recipient_name == ""){
            $("#recipient_name").addClass("error");
        }

        if (purpose == ""){
            $("#purpose").addClass("error");
        }

	}else{
        $.ajax({
            url: base_url + "inventory_transfer/inv_no_w_id/", 
            dataType: "json",
            type: "POST",
            data: {'transfer_no' : trans_no, "id" : id},
            success: function(result){
            	if (result > 0){
					$("#update").prop("disabled", false);
            		swal({
            			type : "error",
            			timer : 2000,
            			title : "Transfer no is already exists"
            		})
            	}else{
            		update();
            	}
            }, error: function(err){
            	console.log("Error: " + err.responseText);
            }
        });
	}

}

function update(){

	var id = $("#trans_id").val();
	var trans_no = $("#transfer_no").val();
	var trans_date  = $("#transfer_date").val();
	var trans_type = $("#transaction_type").val();
	var recipient_id = $("#recipient_code").data("id");
	var recipient_type = $("#recipient_code").data("type_1");
	var ref_trans_no = $("#ref_trans_no").val();
	var ref_trans_date = $("#ref_trans_date").val();
	var purpose = $("#purpose").val();
	
	var insert_transfer_dtl = new Array();
	var update_transfer_dtl = new Array();
	var transfer_hdr = {
		trans_no : trans_no,
		trans_date : trans_date,
		trans_type : trans_type,
		recipient_type : recipient_type,
		recipient_id : recipient_id, 
		ref_trans_no : ref_trans_no,
		ref_trans_date : ref_trans_date,
		purpose : purpose

	}

	$('#tbl-item tbody tr').each(function (row, tr){
		console.log($(tr).find('td:eq(0)').text());
		if ($(tr).find('td:eq(0)').text() != ""){
	        var update_sub = {
	        	'id' : $(tr).find('.tbl_id').text(),
	            'prod_id' : $(tr).find('.tbl_prod_id').text(),
	            'qty' : $(tr).find('.tbl_qty').text(),
	            'currency' : "121",
	            'cost' : $(tr).find('.tbl_price').text(),
	            'total_cost' : $(tr).find('.tbl_total_price').text()
	        } 
	        update_transfer_dtl.push(update_sub);            			
		}else{
	        var insert_sub = {
	            'prod_id' : $(tr).find('.tbl_prod_id').text(),
	            'qty' : $(tr).find('.tbl_qty').text(),
	            'currency' : "121",
	            'cost' : $(tr).find('.tbl_price').text(),
	            'total_cost' : $(tr).find('.tbl_total_price').text()
	        } 
	        insert_transfer_dtl.push(insert_sub);            						
		}
	});	


	$.ajax({
		data :{"id" : id, "transfer_hdr" : transfer_hdr, "update_transfer_dtl" : update_transfer_dtl, "insert_transfer_dtl" : insert_transfer_dtl},
		type : "POST",
		dataType : "JSON",
		url : base_url + "inventory_transfer/update_inventory_transfer",
		success : function(result){
			if (result == 1){
				swal({
					type : "success",
					timer : 2000,
					title : "Successfully Updated"
				}, function(){
					location.reload();
				});
			}else{
				console.log(result);
			} 
		}, error : function(err){
			console.log("error " + err.responseText);
		}
	});


}