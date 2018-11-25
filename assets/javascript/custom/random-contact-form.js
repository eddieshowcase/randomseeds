/* random-contact-form: javascript AJAX for POST submit */

(function($) {

  var contactForm = $(".contact");
  
  //We set our own custom submit function
  contactForm.on("submit", function(e) {
    //Prevent the default behavior of a form
    e.preventDefault();

    //Disable the submit button while processing
    $("#contactSubmit").prop( "disabled", true);

    //Get the values from the form
    var name = $("#contactName").val();
    var email = $("#contactEmail").val();
    var subject = $("#contactSubject").val();
    var message = $("#contactMessage").val();
    
    if (!name || !email || !message) {
      $("#contact_form_results").removeClass();
      $("#contact_form_results").addClass("alert");
      $("#contact_form_results").html("<b>All fields are required.</b>");
      return;
    }
    var url = window.location.origin + '/wordpress/wp-admin/admin-post.php';
    //AJAX POST
    $.ajax({
      type: "POST",
      url: url,
      data: {
        name: name,
        email: email,
        subject: subject,
        message: message,
        action: "fromage_form_submit",
        //THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.
        captcha: grecaptcha.getResponse()
      },
      success: function(response) {
        console.log("THE FORM SUBMITTED CORRECTLY: " + response);
        $("#contact_form_results").removeClass();
        $("#contact_form_results").addClass("success");
        $(".contact").addClass("hide");
        $("#contact_form_results").html("<b>" + response + "</b>");
      },
      error: function(response) {
        console.log("AN ERROR OCCURED SUBMITTING THE FORM: " + response.responseText);
        $("#contact_form_results").removeClass();
        $("#contact_form_results").addClass("alert");
        $("#contact_form_results").html("<b>" + response.responseText + "</b>");
        $("#contactSubmit").prop( "disabled", false);
      }
    });
  });

})(jQuery);
