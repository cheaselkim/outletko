
$(document).ready(function(){

	report_type();

	var date_today = new Date();

	$("#div-agent").hide();
	$("#btn_month").hide();
	$('#div-month-date').hide();
	$("#div-year-date").hide();
	$("#month_date").val((date_today.getMonth() + 1));
	// report();
	outlet();
	agent();

	// csrf_name = $("input[name=csrf_name]").val();

	$("#div-sales-transaction").hide();
	$("#div-sales-product").hide();
	$("#div-sales-agent").hide();
	$("#div-inventory").hide();

	$(".total_amount").number(true,2);
	$(".total_trans").number(true,0);
	$(".total_share").number(true,2);
	$(".total_vat").number(true,2);
	$(".total_gross").number(true,2);

    $("#mobile_fdate").datepicker({
        dateFormat: 'mm/dd/yy'
    });

    $("#mobile_tdate").datepicker({
        dateFormat: 'mm/dd/yy'
    });


	$("#report_type").change(function(){
		reports();
	});

	$("#mobile_report_type").change(function(){
		reports();
	});

	$("#reports").change(function(){
		change_reports();
	});

	$("#mobile_reports").change(function(){
		change_reports();
	});

	$("#view").click(function(){
		report();
	});
	
	$("#mobile_view").click(function(){
		mobile_report();
	});


	$("#print").click(function(){
		//alert();
  		var report = $("#reports").val();
		var fdate = $("#fdate").val();
		var tdate = $("#tdate").val();
		var outlet = $("#outlet").val();
    	window.open(base_url + "Report/print_report/" + report+"/"+fdate+"/"+tdate+"/"+outlet, '_blank');
    });

});

function report_type(){
	var	csrf_name = $("input[name=csrf_name]").val();
	
	$.ajax({
		type : "GET",
		dataType : "JSON",
		data : {'csrf_name' : csrf_name},
		url : base_url + "Report/report_type",
		async: true,
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.result;
			for (var i = 0; i < result.length; i++) {
				$("#report_type").append("<option value='"+result[i].report_type+"'>"+result[i].report_type +"</option>");
				$("#mobile_report_type").append("<option value='"+result[i].report_type+"'>"+result[i].report_type +"</option>");
			}
			reports();
		}, error : function(err){
			console.log("error" + err.responseText);
		}
	})
}

function reports(){
	var	csrf_name = $("input[name=csrf_name]").val();
	var report_type = $("#report_type").val();
	var window_width = $(window).width();
	var document_width = $(document).width();

	$("#reports").empty();
	$("#mobile_reports").find('option').not(':first').remove();

	// console.log("window_width :  " + window_width);
	// console.log("document_width : " + document_width);

	$.ajax({
		data : {report_type : report_type, window_width : window_width, document_width : document_width, 'csrf_name' : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Report/reports",
		success : function(data){
			$("input[name=csrf_name]").val(data.token);
			var result = data.result;

			for (var i = 0; i < result.length; i++) {
				$("#reports").append("<option value='"+result[i].id+"'>"+result[i].report_name +"</option>");
				$("#mobile_reports").append("<option value='"+result[i].id+"'>"+result[i].report_name +"</option>");
			}
			report();
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function outlet(){
	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		type : "GET",
		dataType : "JSON",
		data : {'csrf_name' : csrf_name},
		url : base_url + "Report/outlet",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.result;

			for (var i = 0; i < data.length; i++) {
				$("#outlet").append("<option value='"+data[i].outlet_id+"'>"+data[i].outlet_code +"</option>");
				$("#mobile_outlet").append("<option value='"+data[i].outlet_id+"'>"+data[i].outlet_code +"</option>");
			}			
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function agent(){

	var	csrf_name = $("input[name=csrf_name]").val();
	$.ajax({
		type : "GET",
		dataType : "JSON",
		data : {'csrf_name' : csrf_name},
		url : base_url + "Report/agent",
		success : function(result){
			$("input[name=csrf_name]").val(result.token);
			var data = result.result;

			for (var i = 0; i < data.length; i++) {
				$("#agent").append("<option value='"+data[i].id+"'>"+data[i].agent_name +"</option>");
				$("#mobile_agent").append("<option value='"+data[i].id+"'>"+data[i].agent_name +"</option>");
			}			
		}, error : function(err){
			console.log(err.responseText);
		}
	})

}

function report(){
	var	csrf_name = $("input[name=csrf_name]").val();
	var report = $("#reports").val();
	var fdate = $("#fdate").val();
	var tdate = $("#tdate").val();
	var outlet = $("#outlet").val();
	var month = $("#month_date").val();
	var year = $("#year_date").val();
	var agent = $("#agent").val();

	$.ajax({
		data : {report : report, fdate : fdate, tdate : tdate, outlet : outlet, month : month, year : year, agent: agent, 'csrf_name' : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Report/report",
		success : function(result){	
			$("input[name=csrf_name]").val(result.token);
			$("#div-report").html(result.data);
			total_report(report);
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function mobile_report(){
	var	csrf_name = $("input[name=csrf_name]").val();
	var report = $("#mobile_reports").val();
	var fdate = $("#mobile_fdate").val();
	var tdate = $("#mobile_tdate").val();
	var outlet = $("#mobile_outlet").val();
	var month = $("#mobile_month").val();
	var year = $("#mobile_year").val();

	$("#span_fdate").text(fdate);
	$("#span_tdate").text(tdate);

	$("#mobile_div-report").collapse("hide");

	$.ajax({
		data : {report : report, fdate : fdate, tdate : tdate, outlet : outlet, month : month, year : year, 'csrf_name' : csrf_name},
		type : "POST",
		dataType : "JSON",
		url : base_url + "Report/report",
		success : function(result){	
			$("input[name=csrf_name]").val(result.token);
			$("#div-report").html(result.data);
			total_report(report);
		}, error : function(err){
			console.log(err.responseText);
		}
	})
}

function total_report(report){
	$(".div-total").hide();
	var trans = $("table tbody tr").length;
	var total_amount = 0;
	var total_qty = 0;
	var total_share = 0;
	var total_vat = 0;
	var total_gross = 0;
	
	if (report == "2"){
		var total_trans = 0;
      	$('.table tbody tr').each(function (row, tr){
      		total_trans += Number(str_to_num($(tr).find("td:eq(1)").text()));
         	total_gross += Number(str_to_num($(tr).find("td:eq(2)").text()));
         	total_vat += Number(str_to_num($(tr).find("td:eq(3)").text()));
         	total_amount += Number(str_to_num($(tr).find("td:eq(4)").text()));
       	});		

		$("#div-monthly-sales-summary").show();
		$("#div-monthly-sales-summary #total_trans").val(total_trans);
		$("#div-monthly-sales-summary #total_gross").val(total_gross);
		$("#div-monthly-sales-summary #total_vat").val(total_vat);
		$("#div-monthly-sales-summary #total_amount").val(total_amount);

	}else if (report == "3" || report == "4" || report == "5"){

      	$('.table tbody tr').each(function (row, tr){
         	total_amount += Number(str_to_num($(tr).find("td:eq(4)").text()));
       	});		

		$("#div-sales-transaction").show();
		$("#div-sales-transaction #total_trans").val(trans);
		$("#div-sales-transaction #total_amount").val(total_amount);
	}else if (report == "10"){
      	$('.table tbody tr').each(function (row, tr){
         	total_amount += Number(str_to_num($(tr).find("td:eq(4)").text()));
         	total_qty += Number(str_to_num($(tr).find("td:eq(2)").text()));         	
       	});		

		$("#div-sales-product").show();
		$("#div-sales-product #total_trans").val(total_qty);
		$("#div-sales-product #total_amount").val(total_amount);		
	}else if (report == "8" || report == "9"){
		if (report == "8"){
	      	$('.table tbody tr').each(function (row, tr){
	         	total_amount += Number(str_to_num($(tr).find("td:eq(3)").text()));
	         	total_share += Number(str_to_num($(tr).find("td:eq(4)").text()));         	
	       	});					
		}else{			
	      	$('.table tbody tr').each(function (row, tr){
	         	total_amount += Number(str_to_num($(tr).find("td:eq(5)").text()));
	         	total_share += Number(str_to_num($(tr).find("td:eq(6)").text()));         	
	       	});					
		}

		$("#div-sales-agent").show();
		$("#div-sales-agent #total_share").val(total_share);
		$("#div-sales-agent #total_amount").val(total_amount);		
	}else if ( report == "10" || report == "11" || report == "12"){
		$("#div-inventory").show();
		$("#div-inventory #total_trans").val(trans);
	}
}

function change_reports(){

	var reports = $("#reports").val();
	var mobile_reports = $("#mobile_reports").val();

	if (reports == "2"){
		$("#div-fdate").hide();
		$("#div-tdate").hide();
		$("#div-month-date").show();
		$("#div-year-date").show();
		$("#div-outlet").show();
		$("#div-agent").hide();
	}else if (reports == "17"){
		$("#div-fdate").hide();
		$("#div-tdate").hide();
		$("#div-month-date").hide();
		$("#div-year-date").show();
		$("#div-outlet").show();
		$("#div-agent").hide();
	}else if (reports == "9"){
		$("#div-fdate").show();
		$("#div-tdate").show();
		$("#div-month-date").hide();		
		$("#div-year-date").hide();		
		$("#div-agent").show();
		$("#div-outlet").hide();
	}else{
		$("#div-fdate").show();
		$("#div-tdate").show();
		$("#div-month-date").hide();		
		$("#div-year-date").hide();		
		$("#div-outlet").show();
		$("#div-agent").hide();
	}


	if (mobile_reports == "2"){
		$("#btn_date").hide();
		$("#btn_month").show();
		$("#div-mobile-date").hide();
		$("#div-mobile-month-date").show();
	}else if (reports == "17"){
		$("#btn_date").hide();
		$("#btn_month").show();
		$("#div-mobile-date").hide();
		$("#div-mobile-month-date").show();
	}else{
		$("#btn_date").show();
		$("#btn_month").hide();
		$("#div-mobile-date").show();
		$("#div-mobile-month-date").hide();
	}

}















