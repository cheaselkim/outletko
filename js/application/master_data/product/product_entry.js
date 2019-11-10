$(document).ready( function() {

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
    // $("#vat").attr("readonly", true);

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

    $("#save_product").click(function(){
      $(this).prop("disabled", true);
        check_product();
    });    

});

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
        $("#vat").attr("readonly", false);
        $("#vat").val("12");
      }else{
        $("#vat").attr("readonly", true);
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
        success : function(data){
            $("input[name=csrf_name]").val(data.token);
            var result = data.data;
            for (var i = 0; i < result.length; i++) {
                $("#product_type").append("<option value='"+result[i].id+"'>"+result[i].prod_type_desc+"</option>");
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
                $("#product_category").append("<option value='"+data[i].id+"'>"+data[i].category_name  +"</option>");
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
  var csrf_name = $("input[name=csrf_name]").val();
  var prod_cat = $("#product_category").val();
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
      $("input[name=csrf_name]").val(data.token);
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

function check_product(){
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
        || jQuery.trim(product_category).length <= 0 || jQuery.trim(product_class).length <= 0 
        || $("#selling_price").val() <= 0) {
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

        $("#save_product").prop("disabled", false);
        return false            
      }else{
      var csrf_name = $("input[name=csrf_name]").val();
      $.ajax({
          data : {product_no : product_no, csrf_name : csrf_name},
          type : "POST",
          dataType : "JSON",
          url : base_url  + "Product/product_wo_id",
          success : function(result){
            $("input[name=csrf_name]").val(result.token);
            if (result.result > 0){
              $("#save_product").prop("disabled", false);
              swal({
                type : "warning",
                title : "Product no already exists!",
                timer : 3000
              })
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
        || jQuery.trim(product_category).length <= 0 || jQuery.trim(product_class).length <= 0 || product_stock_unit == "0" 
        || $("#selling_price").val() <= 0) {
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

        $("#save_product").prop("disabled", false);

            return false            
      }

      if(check_img.get(0).files.length <= 0) {
      //alert("walang laman");
      }else {
        var file_size = $('#imgInp').prop('files')[0].size/1024/1024; // in MB
        if (file_size > 1) {
            swal({
                type : "error",
                title : "File size exceeds 1 MB"
            })
        $("#save_product").prop("disabled", false);
          //alert('This file size is: ' + $('#imgInp').prop('files')[0].size/1024/1024 + "MB");
          return false
          } else {
          }
      }
      
      
      
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
            discount : discount
      } 
      
      var csrf_name = $("input[name=csrf_name]").val();
      var data = {product_hdr:product_hdr, csrf_name : csrf_name};
      //console.log(product_no);
      //return false;
      $.ajax({

            data : data
            , type: "POST"
            , url:  base_url + "Product/save_product"
            , dataType: 'json'
            , crossOrigin: false,
            beforeSend : function(){
              swal({
                  title : "Saving.....",
                  showCancelButton: false, 
                  showConfirmButton: false           
              })                
            }, success: function(result) {
                $("input[name=csrf_name]").val(result.token);
                swal({
                    type : "success",
                    title : "Successfully saved"
                }, function(){
                  location.reload();
                })                
                // $("#save_modal").modal('show');
                //location.reload();
                // console.log("length " + check_img.get(0).files.length);
                if(check_img.get(0).files.length <= 0) {
                }else {
                  image_file($('#imgInp').prop('files')[0],product_no);
                }
            }, error: function(err) {
                console.log(err.responseText);
            }
      });  
};


function image_file(img,product_no){
  var form_data = new FormData(); 
      var files = $('#imgInp')[0].files;
      for(var count = 0; count<files.length; count++) {
      var name = files[count].name;
      form_data.append("files[]", files[count]);
      }        
      form_data.append('product_no', product_no); 
       //return false   
      var csrf_name = $("input[name=csrf_name]").val();
      form_data.append('csrf_name', csrf_name);

      $.ajax({
          data : form_data 
          ,type : "POST"
          , url:  base_url + "Product/upload_image_file"
          , dataType : "JSON" 
          , crossOrigin : false
          , contentType: false
          , processData: false
          , beforeSend : function() {
              $("#save").prop("disabled", true);
              $("#submit").prop("disabled", true);                 
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
          }, error: function(err) {
                console.log(err.responseText);
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

