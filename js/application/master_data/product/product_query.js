$(document).ready(function(){

  outlet_no();    
  product_type();
  product_class();

  product_brand();
  product_model();
  product_category();
  product_color();
  product_size();
  product_unit();

  index();

    $('#search').click(function() {
      index();
    });

    $("#search_box").autocomplete({
      minLength: 0,
      source: base_url + "Product/search_field/",
      focus: function( event, ui ) {
        return false;
      },
      select: function( event, ui ) {
        $(this).val(ui.item.term);
        return false; 
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
        .append( "<div>" + item.term + "</div>" )
        .appendTo( ul );
    };  

    $("#outlet_no").change(function(){
      product_inventory();
    });

});

function outlet_no(){
  var data = "";
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    url : base_url + "Product/outlet",
    type : "GET",
    dataType : "JSON",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      data = result.data;
      all_access = result.all_access;

      // if (all_access != "1"){
      //   $('#outlet').find('option').remove();
      // }

      for (var i = 0; i < data.length; i++) {
        $("#outlet_no").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
        $("#outlet").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
      }
    }, error : function(err){
      console.log(err.responseText);
    }
  })
}


function product_type(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
      data : {csrf_name : csrf_name},
      url : base_url + "Product/product_type",
      type : "GET",
      dataType : "JSON",
      success : function(data){
        $("input[name=csrf_name]").val(data.token);
        var result = data.data;
          for (var i = 0; i < result.length; i++) {
              $("#product_type_query").append("<option value='"+result[i].id+"'>"+result[i].prod_type_desc   +"</option>");
              $("#product_type").append("<option value='"+result[i].id+"'>"+result[i].prod_type_desc+"</option>");
          }
          index();
      }, error: function(err){
          console.log(err.responseText);
      }
  });   
}

function product_class(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
      data : {csrf_name : csrf_name},
      url : base_url + "Product/product_class",
      type : "GET",
      dataType : "JSON",
      success : function(data){
          $("input[name=csrf_name]").val(data.token);
          var result =  data.data;
          for (var i = 0; i < result.length; i++) {
              $("#product_class_query").append("<option value='"+result[i].id+"'>"+result[i].class_name   +"</option>");
              $("#product_class").append("<option value='"+result[i].id+"'>"+result[i].class_name+"</option>");
          }
          index();
      }, error: function(err){
          console.log(err.responseText);
      }
  });   

}

function product_brand(){
  var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
        url : base_url + "Product/product_brand",
        type : "GET",
        dataType : "JSON",
        success : function(result){
          $("input[name=csrf_name]").val(result.token);
          var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#product_brand").append("<option value='"+data[i].id+"'>"+data[i].brand_name   +"</option>");
                $("#product_brand_query").append("<option value='"+data[i].id+"'>"+data[i].brand_name   +"</option>");
            }
        }, error: function(err){
            console.log(err.responseText);
        }
    });

}

function product_model(){
    var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
        url : base_url + "Product/product_model",
        type : "GET",
        dataType : "JSON",
        success : function(result){
          $("input[name=csrf_name]").val(result.token);
          var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#product_model").append("<option value='"+data[i].id+"'>"+data[i].model_name+"</option>");
            }
        }, error: function(err){
            console.log(err.responseText);
        }
    });  
}

function product_category(){
  var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
        url : base_url + "Product/product_category",
        type : "GET",
        dataType : "JSON",
        success : function(result){
          $("input[name=csrf_name]").val(result.token);
          var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#product_category").append("<option value='"+data[i].id+"'>"+data[i].category_name  +"</option>");
                $("#product_category_query").append("<option value='"+data[i].id+"'>"+data[i].category_name  +"</option>");
            }
            product_class();
        }, error: function(err){
            console.log(err.responseText);
        }
    });  
}

function product_color(){
  var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
        url : base_url + "Product/product_color",
        type : "GET",
        dataType : "JSON",
        success : function(result){
          $("input[name=csrf_name]").val(result.token);
          var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#product_color").append("<option value='"+data[i].id+"'>"+data[i].color_name+"</option>");
                $("#product_color_query").append("<option value='"+data[i].id+"'>"+data[i].color_name+"</option>");
            }
        }, error: function(err){
            console.log(err.responseText);
        }
    });  
}

function product_size(){
  var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
        url : base_url + "Product/product_size",
        type : "GET",
        dataType : "JSON",
        success : function(result){
          $("input[name=csrf_name]").val(result.token);
          var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#product_size").append("<option value='"+data[i].id+"'>"+data[i].size_name+"</option>");
                $("#product_size_query").append("<option value='"+data[i].id+"'>"+data[i].size_name+"</option>");
            }
        }, error: function(err){
            console.log(err.responseText);
        }
    });  
}

function product_unit(){
  var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name :  csrf_name},
        url : base_url + "Product/product_unit",
        type : "GET",
        dataType : "JSON",
        success : function(result){
          $("input[name=csrf_name]").val(result.token);
          var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#product_stock_unit").append("<option value='"+data[i].id+"'>"+data[i].unit_name+"</option>");
                //$("#product_issue_unit").append("<option value='"+data[i].id+"'>"+data[i].unit_desc+"</option>");
            }
        }, error: function(err){
            console.log(err.responseText);
        }
    });  
}


function index(){
  var csrf_name = $("input[name=csrf_name]").val();
  var type = $("#product_type_query").val();
  var term = $('#search_box').val();
  var status = $("#status").val();
  var outlet = $("#outlet").val();
  var prod_class = $("#product_class_query").val();
  var prod_cat = $("#product_category_query").val();
  var prod_brand = $("#product_brand_query").val();
  var prod_color = $("#product_color_query").val();
  var prod_size = $("#product_size_query").val();

  var app_func = $("#product_func").val();

  $.ajax({
    data: {type : type, prod_class : prod_class, prod_cat : prod_cat, prod_brand : prod_brand, prod_color : prod_color, prod_size : prod_size, term:term, status : status, outlet : outlet, app_func : app_func, csrf_name : csrf_name}, 
    type: "POST", 
    url : base_url + "Product/product_list",
    dataType : "JSON",
      success : function(result){
        $("input[name=csrf_name]").val(result.token);
        $("#query-table").html(result.result);
        $("#no_of_prod").val($("table tbody tr").length);
    }, error: function(err){
      console.log(err.responseText);
    }
  });
}

function view_product(id){

  $("#modal_query").modal("show");
  $("#modal_query").find(":input").attr("readonly", true);
  $("#modal_query").find(":input").attr("disabled", true);
  $("#modal_query").find("button").attr("disabled", false);
  $("#modal_query").find("#outlet_no").attr("disabled", false);
  $("#modal_query").find("#outlet_no").attr("readonly", false);
  $("#modal_query").find(":input").val("");

  $('#product_no').attr("data-id", id);
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {"id" : id, csrf_name : csrf_name},
    url : base_url + "Product/get_product_dtl",
    type : "POST",
    dataType : "JSON",
    success : function(data){

      $("input[name=csrf_name]").val(data.token);

      $("#outlet_no").val(data.product_dtl[0]['outlet_id']);
      $("#product_status").val(data.product_dtl[0]['product_status']);
      $('#product_no').val(data.product_dtl[0]['product_no']);
      $('#product_type').val(data.product_dtl[0]['type_id']);
      $('#product_name').val(data.product_dtl[0]['product_name']);
      $('#product_name').attr('data-code', data.product_dtl[0]['product_code']);
      $('#product_specs').val(data.product_dtl[0]['product_specs']);
      $('#product_brand').val(data.product_dtl[0]['brand_id']);
      $('#product_model').val(data.product_dtl[0]['model_id']);
      $('#product_category').val(data.product_dtl[0]['category_id']);
      $('#product_color').val(data.product_dtl[0]['color_id']);
      $('#product_size').val(data.product_dtl[0]['size_id']);
      $('#product_class').val(data.product_dtl[0]['class_id']);
      $('#product_level').val(data.product_dtl[0]['reorder_level_id']);
      $('#product_stock_unit').val(data.product_dtl[0]['stock_unit_id']);
      $('#discount').val(data.product_dtl[0]['discount']);
      $('#vat').val(data.product_dtl[0]['vat']);
      $('#product_stock').val(data.product_dtl[0]['for_stock']);
      $('#product_level').val(data.product_dtl[0]['reorder_level']);
      $("#product_status").val(data.product_dtl[0]['product_status']);
      $("#cost_price").val(data.product_dtl[0]['ave_cost']);
      //$('#product_issue_unit').val(data.product_dtl[0]['outlet_status']);
      $('#selling_price').val(data.product_dtl[0]['reg_selling_price']);
      //$('#imgInp').val(data.unserialized_files);

      $("#onhand").val(data.inventory.good_stock);
      $("#damage").val(data.inventory.damage);
      $("#total_stock").val(data.inventory.total);

      unserialized_files = data.unserialized_files;
      var href_url = base_url +'images/products/'+unserialized_files[0];
      $("#img-upload").attr("src", href_url);

      product_inventory();

    }, error: function(err){
      console.log("error : " + err.responseText);
    }
  });
}

function product_inventory(){
  var id = $("#product_no").attr("data-id");
  var outlet = $("#outlet_no").val();
  var csrf_name = $("input[name=csrf_name]").val();

  $.ajax({
    data : {id : id, outlet : outlet, csrf_name : csrf_name},
    type : "POST",
    dataType : "JSON",
    url : base_url + "Product/product_inventory",
    success : function(data){
      $("input[name=csrf_name]").val(data.token);
      $("#onhand").val(data.inventory.good_stock);
      $("#damage").val(data.inventory.damage);
      $("#total_stock").val(data.inventory.total);
    }, error : function(err){
      console.log(err.responseText);
    }
  })

}

function delete_product(id,key){
  var csrf_name = $("input[name=csrf_name]").val();
  var trans_no = $("#tbl-product tbody tr:eq("+(key)+")").find("td:eq(1)").text();
  swal({
    title: "Are you sure do you want to Delete "+trans_no+" ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Confirm',
    closeOnConfirm: false,
    closeOnCancel: false,
    timer: 3000
  },function(isConfirm){
    if (isConfirm){
      $.ajax({
        data : {"id" : id, csrf_name : csrf_name},
        url : base_url + "Product/delete_product",
        type : "POST",
        dataType : "JSON",
        success : function (result){
        $("input[name=csrf_name]").val(result.token);
          index();
          swal("Successfully Delete", "", "success");
        }, error : function(err){
          console.log(err.responseText);
        }       
      });
    }else{
        swal("Cancelled", "", "error");
    }
  });


}

function edit_product(id){
  $("body").empty();
  $("body").load(base_url + "menu/edit_menu/4/5/2/"+id);
}