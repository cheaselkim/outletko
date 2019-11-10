
$(document).ready(function(){

    account_tax();
    product_type();
    product_brand();
    product_model();
    product_category();
    product_color();
    product_size();
    product_class();
    product_unit();
    outlet_no();
    $("#selling_price").number(true,2);
    $("#product_level").number(true,0);
    $("#vat").number(true,2);
    $("#cost_price").number(true,2);
    $("#discount").number(true,2);
    $("#vat").attr("readonly", true);

    $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find('.text-img'),
            log = label;
        
        if( input.length ) {
            input.text(log);
        } else {
            if( log ) alert(log);
        }
    
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        console.log(this);
        readURL(this);
    });  
        
    $("#product_name").keyup(function(){
        product_code();
    });

    $('#product_brand').unbind('change').bind('change', function() {
        product_code();
    }); 

    $('#product_model').unbind('change').bind('change', function() {
        product_code();
    });  

    $('#product_category').unbind('change').bind('change', function() {
        product_code();
    });

    $('#product_class').unbind('change').bind('change', function() {
        product_code();
    });

    $('#product_color').unbind('change').bind('change', function() {
        product_code();
    });

    $('#product_size').unbind('change').bind('change', function() {
        product_code();
    });

    $('#product_stock_unit').unbind('change').bind('change', function() {
        product_code();
    });

    $("#product_no").keyup(function(){
      $("#product_no").removeClass("error");
    })

    $("#product_type").change(function(){
      $("#product_type").removeClass("error");
    })

    $("#product_name").keyup(function(){
      $("#product_name").removeClass("error");
    });

    $("#product_color").change(function(){
      $("#product_color").removeClass("error");
    });

    $("#product_size").change(function(){
      $("#product_size").removeClass("error");
    });

    $("#product_stock_unit").change(function(){
      $("#product_stock_unit").removeClass("error");
    });

    $("#selling_price").keyup(function(){
      $("#selling_price").removeClass("error");
    });

    $("#product_level").keyup(function(){
      $("#product_level").removeClass("error");
    });

    $("#product_category").change(function(){
      product_class();
      $("#product_category").removeClass("error");
    });

    $("#product_class").change(function(){
      $("#product_class").removeClass("error");
    })

    $("#vat").keyup(function(){
      $("#vat").removeClass("error");
    });

    $("#discount").keyup(function(){
      $("#discount").removeClass("error");
    });

    $("#product_type").change(function(){
      if ($(this).val() == "2"){
        $("#cost_price").attr("readonly", false);
      }else{
        $("#cost_price").attr("readonly", true);
      }
    });

    var id = $("#product_no").data('id');
    // get_product_dtl(id)
    var unserialized_files = "";

    setTimeout(function(){ 
      var id = $("#product_no").data('id');
      get_product_dtl(id);
    }, 1200);    

    $("#update_product").click(function(){
        $("#update_product").prop("disabled", true);
      check_product();
    });



    
})

function account_tax(){
  var csrf_name = $("input[name=csrf_name]").val();
  $.ajax({
    data : {csrf_name : csrf_name},
    type : "GET",
    dataType : "JSON",
    url : base_url + "Product/account_tax",
    success : function(result){
      $("input[name=csrf_name]").val(result.token);
      if (result.result == "1"){
        $("#vat").val("12");
      }else{
        $("#vat").val("0");
      }
    }, error: function(err){
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
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            var data = result.data;
            for (var i = 0; i < data.length; i++) {
                $("#product_type").append("<option value='"+data[i].id+"'>"+data[i].prod_type_desc   +"</option>");
            }
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
                $("#product_category").append("<option value='"+data[i].id+"'>"+data[i].category_name +"</option>");
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
            }
        }, error: function(err){
            console.log(err.responseText);
        }
    });  
}

function product_class(){
  var prod_cat = $("#product_category").val();
  var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {prod_cat : prod_cat, csrf_name : csrf_name},
        url : base_url + "Product/product_class",
        type : "POST",
        dataType : "JSON",
        success : function(result){
            $("input[name=csrf_name]").val(result.token);
            var data = result.data;
          $("#product_class").empty();
          $("#product_class").append("<option></option>");
            for (var i = 0; i < data.length; i++) {
                $("#product_class").append("<option value='"+data[i].id+"'>"+data[i].class_name+"</option>");
            }
        }, error: function(err){
            console.log(err.responseText);
        }
    });  
}

function product_unit(){
  var csrf_name = $("input[name=csrf_name]").val();
    $.ajax({
        data : {csrf_name : csrf_name},
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

      if (all_access != "1"){
        $('#outlet_no').find('option').remove();
      }

      for (var i = 0; i < data.length; i++) {
        $("#outlet_no").append("<option value='"+data[i].id+"'>"+data[i].outlet_name+"</option>");
      }
    }, error : function(err){
      console.log(err.responseText);
    }
  })
}

function product_code(){
    var name = $('#product_name').val().toUpperCase().substring(0, 3);
    var brand = $("#product_brand").val();
    var model = $('#product_model').val();
    var category = $('#product_category').val();
    var prod_class = $('#product_class').val();
    var color = $('#product_color').val();
    var size = $('#product_size').val();
    var stock_unit = $('#product_stock_unit').val();

    if (name.length < 3){
        if (name.length == 2){
            name = name + "0";
        }else if (name.length == 1){
            name = name + "00";
        }else{
            name = "000";
        }
    }else{  
        name = name;
    }

    var product_code = name + brand + model + category + prod_class + color + size + stock_unit;

    $('#product_name').attr('data-code', product_code);
}

function get_product_dtl(id){
    product_ave_cost(id);
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
            $('#selling_price').val(Number(data.product_dtl[0]['reg_selling_price']) == "0" ? "" : data.product_dtl[0]['reg_selling_price']);
            //$('#imgInp').val(data.unserialized_files);
            unserialized_files = data.unserialized_files;
            var href_url = base_url +'images/products/'+unserialized_files[0];
            $("#img-upload").attr("src", href_url);
        }, error: function(err){
            console.log("error : " + err.responseText);
        }
    });
}

function product_ave_cost(id){
  // $.ajax({
  //   data : {id : id},
  //   type : "POST",
  //   dataType : "JSON",
  //   url : base_url + "Product/product_ave_cost",
  //   success : function(data){
  //     $("#cost_price").val(data);
  //   }, error : function(err){
  //     console.log(err.responseText);
  //   }
  // })

}

function check_product(){

  var id = $("#product_no").data('id');
  var product_no = $('#product_no').val();
  var product_type = $('#product_type').val();
  var product_name = $('#product_name').val();
  var product_code = $('#product_name').data('code')
  var product_specs = $('#product_specs').val();
  var product_status = $("#product_status").val();
  var outlet_no = $("#outlet_no").val();

  var imgInp = $('#imgInp').val();

  var product_type = $("#product_type").val();
  var product_category = $('#product_category').val();
  var product_class = $('#product_class').val();

  var product_stock_unit = $('#product_stock_unit').val();
  var product_level = $('#product_level').val();
  var product_stock = $("#product_stock").val();

  var product_brand = $('#product_brand').val();
  var product_color = $('#product_color').val();

  var product_model = $('#product_model').val();
  var product_size = $('#product_size').val();

  var reg_selling_price = $('#selling_price').val();
  var vat = $("#vat").val();
  var discount = $("#discount").val();
  //var product_issue_unit = $('#product_issue_unit').val();
  var check_img = $('#imgInp');

      if(jQuery.trim(product_no).length <= 0 || jQuery.trim(product_type).length <= 0 || jQuery.trim(product_name).length <= 0 
        || jQuery.trim(product_stock_unit).length <= 0
        || jQuery.trim(product_category).length <= 0  
        || $("#selling_price").val() <= 0) {

        // || jQuery.trim(product_class).length <= 0
        $("#update_product").prop("disabled", false);
            swal({
                type : "warning",
                title : "Please fill up required fields."
            })

        if (jQuery.trim(product_no).length <= 0){
          $("#product_no").addClass("error");
        }

        if (jQuery.trim(product_type).length <= 0){
          $("#product_type").addClass("error");
        }

        if (jQuery.trim(product_name).length <= 0 ){
          $("#product_name").addClass("error");
        }

        if (jQuery.trim(product_stock_unit).length <= 0){
          $("#product_stock_unit").addClass("error");
        }

        if ($("#selling_price").val() <= 0){
          $("#selling_price").addClass("error");
        }

        if (jQuery.trim(product_category).length <= 0){
          $("#product_category").addClass("error");
        }

        if (jQuery.trim(product_class).length <= 0){
          $("#product_class").addClass("error");
        }
      }else{
        var csrf_name = $("input[name=csrf_name]").val();
        $.ajax({
          data : {product_no : product_no, id : id, csrf_name : csrf_name},
          type : "POST",
          dataType : "JSON",
          url : base_url + "Product/product_w_id",
          success : function(result){
            $("input[name=csrf_name]").val(result.token);
            if (result.result > 0){
              swal({
                type : "warning",
                title : "Product no is already exists!",
                timer : 2000
              })
        $("#update_product").prop("disabled", false);
            }else{
              save_product();
            }
          }, error : function(err){
            console.log(err.responseText);
          }
        })
      }


}

function save_product(){

  var id = $("#product_no").data('id');
  var product_no = $('#product_no').val();
  var product_type = $('#product_type').val();
  var product_name = $('#product_name').val();
  var product_code = $('#product_name').data('code')
  var product_specs = $('#product_specs').val();
  var product_status = $("#product_status").val();
  var outlet_no = $("#outlet_no").val();

  var imgInp = $('#imgInp').val();

  var product_type = $("#product_type").val();
  var product_category = $('#product_category').val();
  var product_class = $('#product_class').val();

  var product_stock_unit = $('#product_stock_unit').val();
  var product_level = $('#product_level').val();
  var product_stock = $("#product_stock").val();

  var product_brand = $('#product_brand').val();
  var product_color = $('#product_color').val();

  var product_model = $('#product_model').val();
  var product_size = $('#product_size').val();

  var reg_selling_price = $('#selling_price').val();
  var vat = $("#vat").val();
  var discount = $("#discount").val();
  //var product_issue_unit = $('#product_issue_unit').val();
  var check_img = $('#imgInp');

      if(jQuery.trim(product_no).length <= 0 || jQuery.trim(product_type).length <= 0 || jQuery.trim(product_name).length <= 0 
        || jQuery.trim(product_stock_unit).length <= 0 || jQuery.trim(product_class).length <= 0
        || jQuery.trim(product_category).length <= 0 || product_stock_unit == "0" 
        || $("#selling_price").val() <= 0) {

        // || jQuery.trim(product_class).length <= 0
            swal({
                type : "error",
                title : "Please fill up required fields."
            })

        if (jQuery.trim(product_no).length <= 0){
          $("#product_no").addClass("error");
        }

        if (jQuery.trim(product_type).length <= 0){
          $("#product_type").addClass("error");
        }

        if (jQuery.trim(product_name).length <= 0 ){
          $("#product_name").addClass("error");
        }

        // if (jQuery.trim(product_color).length <= 0){
        //   $("#product_color").addClass("error");
        // }

        // if (jQuery.trim(product_size).length <= 0){
        //   $("#product_size").addClass("error");
        // }

        if ($("#product_stock_unit").val() == "0"){
          $("#product_stock_unit").addClass("error");
        }

        if ($("#selling_price").val() <= 0){
          $("#selling_price").addClass("error");
        }

        // if (jQuery.trim(product_level).length <= 0){
        //   $("#product_level").addClass("error");
        // }

        if (jQuery.trim(product_category).length <= 0){
          $("#product_category").addClass("error");
        }

        if (jQuery.trim(product_class).length <= 0){
          $("#product_class").addClass("error");
        }

        // if (jQuery.trim(vat).length <= 0){
        //   $("#vat").addClass("error");
        // }

        // if (jQuery.trim(discount).length <= 0){
        //   $("#discount").addClass("error");
        // }

        $("#update_product").prop("disabled", false);

            return false            
      }


      if(check_img.get(0).files.length <= 0) {
      //alert("walang laman");
      }else {
        var file_size = $('#imgInp').prop('files')[0].size/1024/1024; // in MB
        if (file_size > 1) {
          swal({
              type : "warning",
              title : "File size exceeds 1 MB"
          })
        $("#update_product").prop("disabled", false);
          //alert('This file size is: ' + $('#imgInp').prop('files')[0].size/1024/1024 + "MB");
          return false;
        } else {
        }
      }

  var csrf_name = $("input[name=csrf_name]").val();
  var product_hdr = {
        product_no : product_no,
        product_name : product_name,
        product_code : product_code, 
        product_specs : product_specs,
        product_status : product_status,
        outlet_id : outlet_no,

        type_id : product_type,
        category_id : product_category, 
        class_id : product_class,

        stock_unit_id : product_stock_unit, 
        reorder_level : product_level, 
        for_stock : product_stock,

        brand_id : product_brand,
        color_id : product_color,

        model_id : product_model,
        size_id : product_size, 

        reg_selling_price : reg_selling_price, 
        vat : vat,
        discount : discount,
  }
      var data = {product_hdr:product_hdr, product_no :product_no, id : id, csrf_name : csrf_name};
      if(check_img.get(0).files.length <= 0) {
      }else {
         image_update($('#imgInp').prop('files')[0],product_no,unserialized_files);
      }

      //return false;
      $.ajax({

            data : data
            , type: "POST"
            , url: base_url +"Product/update_product"
            , dataType: 'json'
            , crossOrigin: false     
            , success: function(result) {
              $("input[name=csrf_name]").val(result.token);
              swal({
                type : "success",
                title : "Successfully Updated"
              }, function(){
                location.reload();
              })                   
            }, error: function(err) {
                console.log(err.responseText);
            }
      });  
};

function image_update(img,product_no,unserialized_files){
  var form_data = new FormData(); 
      var files = $('#imgInp')[0].files;
      for(var count = 0; count<files.length; count++) {
      var name = files[count].name;
      form_data.append("files[]", files[count]);
      }        
      form_data.append('product_no', product_no); 
      for(var x = 0; x<unserialized_files.length; x++) {
        form_data.append('curr_img[]', unserialized_files[x]);
      } 

  var csrf_name = $("input[name=csrf_name]").val();
      form_data.append('csrf_name', csrf_name);
       //return false   
      $.ajax({
          data : form_data 
          ,type : "POST"
          , url: base_url + "Product/update_img_file"
          , dataType : "json" 
          , crossOrigin : false
          , contentType: false
          , processData: false
          , beforeSend : function() {
              swal({
                  title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })
                 
          }
          , success : function(result) {
              $("input[name=csrf_name]").val(result.token);
              if(result.status == "success") {

                  $("#save").removeAttr('disabled');
                  $("#submit").removeAttr('disabled');

              }else {
                  console.log(result.status);
              }

          }, failure : function(msg) {
              console.log("Error connecting to server...");
          }, error: function(status) {
                    
          }, xhr: function(){
              var xhr = $.ajaxSettings.xhr() ;
              xhr.onprogress = function(evt){ 
                  $("body").css("cursor", "wait"); 
              };  
              xhr.onloadend = function(evt){ 
                  $("body").css("cursor", "default"); 
              };      
              return xhr ;
          }

      }); 
}


