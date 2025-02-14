$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".js-scroll-trigger").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });


  $("#div-password").hide();
  $("#div-btn-login").hide();

  $("#uname").keydown(function(){
    $("#uname").removeClass("error");
  });

  $("#pword").keydown(function(){
    $("#pword").removeClass("error");
  });


  $("#next").click(function(){
    if ($("#uname").val() == ""){
      $("#uname").addClass("error");
    }else{
      $("#div-username").hide();
      $("#div-btn-next").hide();
      $("#div-btn-login").animate({width: "toggle"});
      $("#div-password").animate({width: "toggle"});
    }
  });

  $("#login").click(function(){
    if ($("#pword").val() == ""){
      $("#pword").addClass("error");      
    }
  });

});