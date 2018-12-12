<?php
/**
 * For Randomseeds website, custom stuff here
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/////// CONTACT FORM

// set proper return path for email so it doesn't get sent to SPAM automatically
add_action( 'phpmailer_init', 'fix_my_email_return_path' );
function fix_my_email_return_path( $phpmailer ) {
    $phpmailer->Sender = $phpmailer->From;
}

// enqueue the javascript to handle form submission
function contact_scripts() {
  // google recaptcha
  wp_register_script("recaptcha", "https://www.google.com/recaptcha/api.js");
  wp_enqueue_script("recaptcha");
  // add page condition?
  //wp_enqueue_script( 'random-contact-form');
  wp_enqueue_script( 'random-contact-form', get_template_directory_uri() . '/dist/assets/js/random-contact-form.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'contact_scripts' );

// shortcode to serve up the form template using shortcode [contactme]
add_shortcode( 'contactme', 'contactme_shortcode' );
function contactme_shortcode( $atts ){

  //use output buffering to render into content
  ob_start();
  get_template_part( 'template-parts/random-contact-form' );
  $buffer = ob_get_clean();

  return $buffer;
}

// action as AJAX POST form response handler
// taken from: http://www.agcross.com/2017/04/create-a-contact-form-with-recaptcha-v2-ajax-and-php/
add_action('admin_post_fromage_form_submit','contact_form_mailer');
function contact_form_mailer() {
  //Taken from here: http://stackoverflow.com/questions/40524029/ajax-jquery-contact-form-with-recaptcha-v2-clears-form-if-invalid

  // If the form was submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // If the Google Recaptcha box was clicked
    if(isset($_POST['captcha']) && !empty($_POST['captcha'])){

      $captcha=$_POST['captcha'];
      $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=YOUR-SECRETKEY-HERE&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
      $obj = json_decode($response);

      // If the Google Recaptcha check was successful
      if($obj->success == true) {
        $name = strip_tags(trim($_POST["name"]));
        $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $subject = trim($_POST["subject"]);
        $message = trim($_POST["message"]);
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
          http_response_code(400);
          echo "Oops! There was a problem with your submission. Please complete the form and try again.";
          exit;
        }
        $recipient = "youremail@here.com";
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n";
        $email_content .= "Subject: $subject\n\n";
        $email_content .= "Message:\n$message\n";
        $email_headers = "From: $name <$email>\n\n";
        if (wp_mail($recipient, $subject, $email_content, $email_headers)) {
          http_response_code(200);
          echo "Thank You! Your message has been sent.";
        }

        else {
          http_response_code(500);
          echo "Oops! Something went wrong, and we couldn't send your message. Check your email address.";
        }

      }

      // If the Google Recaptcha check was not successful
      else {
        http_response_code(400);
        echo "Robot verification failed. Please try again.";
      }

    }

    // If the Google Recaptcha box was not clicked
    else {
      http_response_code(400);
      echo "Please click the reCAPTCHA box.";
    }

  }

// If the form was not submitted
// Not a POST request, set a 403 (forbidden) response code.
  else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
  }
}

