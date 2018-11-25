<?php
/**
 * The template part for displaying a contact form that uses reCAPTCHA V2
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<form id="contact-form" class="contact mt" action="" method="post">
  <label>Name *
    <input type="text" placeholder="" id="contactName" aria-required="true" aria-invalid="false" >
  </label>
	<label>Email *
    <input type="email" placeholder="" id="contactEmail" aria-required="true" aria-invalid="false" >
  </label>
	<label>Subject *
    <input type="text" placeholder="" id="contactSubject" aria-required="true" aria-invalid="false" >
  </label>
	<label>Message *
    <textarea placeholder="" id="contactMessage" rows="8" aria-required="true" aria-invalid="false"></textarea>
  </label>
  
	<div class="g-recaptcha" data-sitekey="YOUR-SITEKEY-HERE"></div>
	
	<input type="submit" class="button mt" value="Send"><span class="ajax-loader"></span>
</form>
<div id="contact_form_results"></div>	
