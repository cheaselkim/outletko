var prev_date = "";

$(document).ready(function(){


	$("#modal_date").modal("show");
  var modal_date = $("#modal_prev_date").val();

  $("#modal_prev_date").datepicker({
    changeMonth : true,
    changeYear : true,
    endDate : new Date(modal_date),
    maxDate : new Date(modal_date)
  });

	$("#save_prev_date").click(function(){
		var modal_prev_date = $("#modal_prev_date").val();
    prev_date = $("#modal_prev_date").val();
    var date_today = $.datepicker.formatDate('mm/dd/yy', new Date());

      if (new Date(prev_date) >= new Date()){
        swal({
          type : "warning",
          title : "Invalid Date",
          text : "Not allowed to select today or future date"
        })
      }else{
        $("#span_prev_date").text("Previous Date : " + modal_prev_date);
        $("#payment_date").val($.datepicker.formatDate('yy-mm-dd', new Date(prev_date) ));
        $("#mod_prev_trans_date").text(prev_date);
        $("#transaction_date").text("Date : " + prev_date);

      }

    // $.datepicker.formatDate('mm/dd/yy', new Date())
	});

	$("#save_prev_trans").click(function(){

		swal({
			type : "warning",
			title : "Save?",
			text : "",
            showCancelButton: true
		}, function(isConfirm){
            if (isConfirm){
				$(this).prop("disabled", true);
				save_prev_trans();
            }
          })

	});


function save_prev_trans(){
      //var agent_id =  $('#pr_no_modal').val();
      var agent_id = $('#partner').attr("data-id");
      var cust_id =  $('#cust_code').attr("data-id");
      var sales_discount =  $('#sales_discount').val();
      var grand_total =  $('#grand_total').val();
      var comp_id = $("#comp_id").val();
      var outlet_id = $("#outlet_id").val();
      var trans_no = $("#sales_trans_no").text();
      var vat_amount =  $('#total_selling').attr("data-vat");
      var net_vat =  $('#total_selling').attr("data-net_vat");
      
      //for payment
      var bank_id = $('#bank_name').val();
      var payment_date = $('#payment_date').val();
      var payment_type_id = $('#payment_type').val();
      var payment_term = $('#payment_term').val();
      var check_card_no = $('#check_no').val();
      var check_date = $('#check_date').val();
      var curr_id = $('#currency').val();
      var amount = $('#payment_amount').val();
      var dep_bank = $('#dep_bank').val();
      var no_days = $('#no_days').val();
      var due_date = $('#due_date').val();

      // var date_prev = $.datepicker.parseDate("yy-mm-dd", prev_date);
      var date_prev = prev_date;
    var bool = true;
    
      var dtl_data = [];
      var sales_hdr = {
            comp_id : comp_id,
            outlet_id : outlet_id,
            customer_id : cust_id,
            agent_id : agent_id,
            trans_no : trans_no,
            sales_discount : sales_discount,
            total_amount : grand_total,
            vat_amount : vat_amount,
            net_vat : net_vat,
            prev_trans : 1,
            date_prev : date_prev
      } 
      var row_count = $('#tbl-products tr').length -1;
      if(row_count == 0){
          swal({
              type : "warning",
              title : "Please input Products",
              timer : 2000
          });
          $("#save_trans").prop("disabled", false);
          return false;
          // bool = false;
      }
     
       
      $('#tbl-products tr').each(function (row, tr){
                var sub = {
                    'product_id' : $(tr).find('td:eq(13)').text(),
                    'qty' : $(tr).find('td:eq(2) ').text(),
                    'selling_price' : $(tr).find('td:eq(5) ').text().replace(/,/g, ""),
                    'share' : $(tr).find('td:eq(9) ').text(),
                    'share_amount' : $(tr).find('td:eq(10) ').text(),
                    'total_amount' : $(tr).find('td:eq(11) ').text().replace(/,/g, ""),
                    'total_price' : $(tr).find('td:eq(6) ').text().replace(/,/g, ""),
                    'volume_discount' : $(tr).find('td:eq(7) ').text(),
                    'volume_discount_percent' : $(tr).find('td:eq(14) ').text(),
                    'total_selling_price' :$(tr).find('td:eq(8) ').text().replace(/,/g, ""),
                    'vat' :$(tr).find('td:eq(15) ').text().replace(/,/g, ""),
                    'net_vat' :$(tr).find('td:eq(16) ').text().replace(/,/g, ""),
                    'discount_id' : $(tr).find('.tbl_dis_id').text(),
                    'agent_id' : $(tr).find('.tbl_agent_id').text()
                } 
                dtl_data.push(sub);            
       }); 

      var payment_data = {
      		payment_date : payment_date,
            payment_type_id : payment_type_id,
            payment_term : payment_term,
            bank_id : bank_id,
            check_card_no : check_card_no,
            check_date : check_date,
            curr_id : curr_id,
            amount : amount,
            dep_bank : dep_bank,
            no_days : no_days,
            due_date : due_date
      }
      
      dtl_data.shift();
	  var csrf_name = $("input[name=csrf_name]").val();
      var data = {sales_hdr:sales_hdr, sales_dtl: dtl_data,payment_dtl:payment_data, csrf_name : csrf_name};
      // console.log(data);
      //modal_trans_data();
      console.log(sales_hdr);
            $.ajax({
                data : data 
                , type: "POST"
                , url: base_url + "Sales_prev/save_transaction"
                , dataType: 'JSON'
                , crossOrigin: false  
                , beforeSend : function() {
                    swal({
                        title : "Saving.....",
                        showCancelButton: false, 
                        showConfirmButton: false           
                    })
                }
                , success: function(result) {
					$("input[name=csrf_name]").val(result.token);
                	swal.close();
                	modal_trans_data();
	                // setTimeout(function(){ 
	                //   location.reload();
	                // }, 5000);              

            		// swal({
            		// 	title: "Successfully Insert",
            		// 	type: "success",
            		// 	timer: 2000
            		// }, function(){
            		// 	location.reload();
            		// });
                }, error: function(err) {
                    console.log(err.responseText);
                }
            });  
      
}

});

