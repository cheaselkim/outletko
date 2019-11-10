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
		$(this).prop("disabled", true);
		check_required_fields_update();
	});

});

function get_data(){
	var trans_id = $("#trans_id").val();
	// console.log(trans_id);
	$.ajax({
		data : {trans_id : trans_id},
		type : "POST",
		dataType : "JSON",
		url : base_url + "inventory_return/get_inventory_return_data",
		success : function(result){
			$("#return_no").val(result.return_no);
			$("#return_date").val(result.return_date);
			$("#recipient_code").data("type_1", result.recipient_type);
			$("#recipient_code").data("id", result.recipient_id);
			$("#recipient_code").val(result.recipient_code);
			$("#recipient_name").val(result.recipient_name);
			$("#ref_trans_no").val(result.ref_trans_no);
			$("#ref_trans_date").val(result.ref_trans_date);
			$("#reason").val(result.reason);
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
		url : base_url + "inventory_return/delete_return_dtl",
		success : function(result){
			obj = JSON.parse(result);
		}, error : function(err){
			console.log(err.responseText);
		}
	});	

	return obj;
}

function check_required_fields_update(){

	var trans_no = $("#return_no").val();
	var trans_date  = $("#return_date").val();
	var recipient_code = $("#recipient_code").val();
	var recipient_name = $("#recipient_name").val();
	var ref_trans_no = $("#ref_trans_no").val();
	var ref_trans_date = $("#ref_trans_date").val();
	var remarks = $("#reason").val();
	var rows = $('#tbl-products > tbody > tr').length;
	var id = $("#trans_id").val();

	if (trans_no == "" || trans_date == "" || recipient_code == "" || recipient_name == "" || remarks == "" || rows == 0){
		swal({
			type : "warning",
			title : "Please input all required fields",
		})

		if (trans_no == ""){
			$("#return_no").addClass("error");
		}

		if (trans_date == ""){
			$("#return_date").addClass("error");
		}

		if (recipient_code == ""){
			$("#recipient_code").addClass("error");
		}

		if (recipient_name == ""){
			$("#recipient_name").addClass("error");
		}

		if (reason == ""){
			$("#reason").addClass("error");
		}

		$("#update").prpo("disabled", false);

	}else{
        $.ajax({
            url: base_url + "inventory_return/inv_no_w_id/", 
            dataType: "json",
            type: "POST",
            data: {'return_no' : trans_no, "id" : id},
            success: function(result){
            	if (result > 0){
					$("#update").prpo("disabled", false);
            		swal({
            			type : "error",
            			timer : 2000,
            			title : "Return no is already exists"
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
	var trans_no = $("#return_no").val();
	var trans_date  = $("#return_date").val();
	var trans_type = $("#tran_type").val();
	var recipient_id = $("#recipient_code").data("id");
	var recipient_type = $("#recipient_code").data("type_1");
	var ref_trans_no = $("#ref_trans_no").val();
	var ref_trans_date = $("#ref_trans_date").val();
	var reason = $("#reason").val();
	
	var insert_return_dtl = new Array();
	var update_return_dtl = new Array();
	var return_hdr = {
		trans_no : trans_no,
		trans_date : trans_date,
		trans_type : trans_type,
		recipient_type : recipient_type,
		recipient_id : recipient_id, 
		ref_trans_no : ref_trans_no,
		ref_trans_date : ref_trans_date,
		reason : reason
	}

	$('#tbl-products tbody tr').each(function (row, tr){
		console.log($(tr).find('td:eq(0)').text());
		if ($(tr).find('td:eq(0)').text() != ""){
	        var update_sub = {
	        	'id' : $(tr).find('.tbl_id').text(),
	            'prod_id' : $(tr).find('.tbl_prod_id').text(),
	            'qty' : str_to_num($(tr).find('.tbl_qty').text()),
	            'currency' : "121",
	            'cost' : str_to_num($(tr).find('.tbl_price').text()),
	            'total_cost' : str_to_num($(tr).find('.tbl_total_price').text())
	        } 
	        update_return_dtl.push(update_sub);            			
		}else{
	        var insert_sub = {
	            'prod_id' : $(tr).find('.tbl_prod_id').text(),
	            'qty' : str_to_num($(tr).find('.tbl_qty').text()),
	            'currency' : "121",
	            'cost' : str_to_num($(tr).find('.tbl_price').text()),
	            'total_cost' : str_to_num($(tr).find('.tbl_total_price').text())
		        } 
	        insert_return_dtl.push(insert_sub);            						
		}
	});	

	// console.log(update_return_dtl);
	// return false;
	$.ajax({
		data :{"id" : id, "return_hdr" : return_hdr, "update_return_dtl" : update_return_dtl, "insert_return_dtl" : insert_return_dtl},
		type : "POST",
		dataType : "JSON",
		url : base_url + "inventory_return/update_inventory_return",
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
			console.log(err.responseText);
		}
	});


}