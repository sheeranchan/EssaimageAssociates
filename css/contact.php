<?php /* contact-form.php

   =========================================================================

   Written by: Steve Beeston
   Date:       9th December 2012
   Changes:    14th November 2013 by Steve Beeston Added functionality to handle banned IP addresses
               4th February 2014 by Steve Beeston (SRB) to limit message length
               19th April 2014 by Steve Beeston Updated functionality to handle banned IP addresses and added URL field to trap spambots
   =========================================================================  

*/

session_start();


$ip_address = $_SERVER['REMOTE_ADDR'];
include("inc_banned_ips.php");

if(isset($_POST["Submitted"])) {

   require("class.phpmailer.php"); 
 
   $mail = new PHPMailer();

/* 
   =========================================================
   Customize the following 5 lines with your own information
   =========================================================
*/

   //$toaddress = "steve.beeston@gmail.com";  //Change this to the email address you will be receiving your notices.
   $toaddress = "rcwo@compuserve.com";  //Change this to the email address you will be receiving your notices.
   $mailhost = "mail.brasstacksweb.co.uk";  //Change this to your actual Domain name.
   $fromaddress = "postmaster@brasstacksweb.co.uk";  //Change this to the email address you will use to send and authenticate with.
   $frompwd = "-snackSunday-";  //Change this to the above email addresses password.
   $subject = "Message from Contact Form on Essaimage website";  //Change this to your own email message subject.


 /*
   ====================================================
   Should not need to change anything beyond this point
   ====================================================
*/
   
   require_once 'inc_functions.php';

   $errors = "";

   $fromname = sanitisestring($_POST["name"]);
   $fromname = trim($fromname);
   if ($fromname=="") $errors .= "<span class=\"failure\">Name missing</span>";

   $rplyto = sanitisestring($_POST["email"]);
   $rplyto = trim($rplyto);
   if ($rplyto=="") { 
      $errors .= "<span class=\"failure\">Email address missing</span>";
   } else {
      // Check that format is correct for an email address
      if (filter_var($rplyto, FILTER_VALIDATE_EMAIL) == false) {
         $errors .= "<span class=\"failure\">Invalid email address</span>";
      }
   }

   $telephone = sanitisestring($_POST["phone"]);
   $telephone = trim($telephone);

   $url = sanitisestring($_POST["url"]); // SRB 19/04/14

   // ---------- SRB 4/2/14 start ----------
   // $body = sanitisestring($_POST["message"]) ;
   // $body = trim($body);
   $message = sanitisestring($_POST["message"]) ;
   if (strlen($message)>1000) {
      $errors .= "<br \/>Message is too long";
   }
   $body = trim($message);
   // ---------- SRB 4/2/14 endof ----------

   if ($body=="") $errors .= "<span class=\"failure\">No message</span>";

   // Added by SRB 19/04/14
   if (!empty($url)) {
      $errors .= "<span class=\"failure\">Invalid URL</span>";
   }

   // Added by SRB 1/6/14
   include_once "securimage/securimage.php";
   $securimage = new Securimage();
   if ($securimage->check($_POST['captcha_code']) == false) {
      $errors .= "<span class=\"failure\">Wrong captcha code</span>";
   }



   // If there are no errors then send the mail
   if ($errors == "") {

      $msgbody = "<div style=\"width: 600px; background: #ddd; border: 2px solid gray; border-radius: 5px; padding: 10px;\">";
      $msgbody .= "This is a message from " . $fromname . "<br />Reply to: " . $rplyto . "<br />Tel: " . $telephone . "<br />URL: " . $url . "<br />IP: " . $ip_address . "</div><br />" . nl2br($body);
 
      $mail->IsSMTP();
      $mail->Host = $mailhost;
      $mail->SMTPAuth = true;
      $mail->Port = 587; 
      $mail->Username = $fromaddress;
      $mail->Password = $frompwd;
 
      $mail->From = $fromaddress;
      $mail->FromName = $fromname;
      $mail->AddReplyTo($rplyto);
      $mail->AddAddress($toaddress);
      $mail->AddBCC($fromaddress);
      $mail->IsHTML(true);
      $mail->Subject = $subject;
      $mail->Body = $msgbody;

      if(!$mail->Send()) {
         $sentOK = false;
      }
      else {
         $sentOK = true;
      }


      if($sentOK == false) {
         $errors .= "<br />Mailer Error - " . $mail->ErrorInfo;
      }
      else {
         header("location: thankyou.php");
      }
   }
   
}
else {

   $errors = "";
   $fromname = "";
   $rplyto = "";
   $telephone = "";
   $body = "";
   $url = ""; // SRB 19/04/14
  
}
$pagename = "contact";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
   <title>Essaimage | How to Contact Essaimage Associates</title>
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="description" content="Details about our location and how to contact Essaimage Associates by telephone or email" />
   <meta name="author" content="Steve Beeston" />				
   <meta name="creation-date" content="1st March 2012" />
   <link rel="stylesheet" type="text/css" href="essaimage.css" />
   <link rel="shortcut icon" href="favicon.ico" />
   <style type="text/css">
      #pdf-download {position: relative; float: left; z-index: 10; border: 0px dotted white; height: 32px; width: 228px; font-size: 10px; font-family: verdana, arial, 'sans serif';}
      #pdf-download a {text-decoration: none;}
      .success, .failure {font: bold 13px arial;}
      .success, .failure {display: inline; padding: 3px; border-radius: 4px; border-width: 2px; border-style: solid; margin: 3px;}
      .success {color: green; border-color: green;}
      .failure {color: white; border-color: white;}
   </style>

   <?php include "ga.inc"; ?>
</head>

<body>



<div id="wrapper">




<?php include "inc_header.php"; ?>


<div style="position: absolute; top: 120px; float: left; width: 200px; clear: right; border: 0px solid #570082; border-radius: 10px; padding: 10px;">
<p>
<b>Email:</b><br />
Use the contact form below to send an email.
<br />
<br />

<b>Telephone:</b><br />
+44-(0)1992-584739<br />
(USA: 011-44-1992-584739)
<br />
<br />
<b>Location:</b><br />
<div id="pdf-download">
   <a href="http://maps.google.co.uk/maps?hl=en&bav=on.2,or.r_gc.r_pw.,cf.osb&biw=1366&bih=661&wrapid=tlif133349004711210&q=SG14+3JW&um=1&ie=UTF-8&hq=&hnear=0x4876268b7a6089af:0x66d0d09b4bb1e026,Hertford+SG14+3JW&gl=uk&ei=inF7T9XxK8S38gPeoLCpCA&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CB8Q8gEwAA" target="_blank">
      <img src="images/maps.png" style="float: left; margin-right: 5px;" /> Find us on<br />Google Maps
   </a>
</div>
</p>
</div>



<img src="images/figure.png" width="143" height="245" style="position: relative; top: 275px; left: 20px; float: left;" />


<div class="slideshow">
    <img src="images/location_720x480.png" alt="Location map" class="active" /> 
</div>








<?php include "pre-content.inc"; ?>



<div class="content">

<h1><img src="images/h1-essaimage.png" width="700" height="35" border="0" alt="Heading" title="Clients" /></h1>

<p><i>Wikipedia : &laquo; L'<b>essaimage</b> est dans son sens premier un ph&eacute;nom&egrave;ne observ&eacute dans les ruches d'abeilles, quand une partie des abeilles quittent la ruche avec une reine (l'essaim) pour former une nouvelle colonie.. &raquo;<br />
. &raquo;M&eacute;taphoriquement, on parle d'essaimage des id&eacute;es nouvelles, des religions, des techniques, des savoir et savoir-faire &raquo;</i>
<br />
<br />
The original meaning of an "essaimage" is a phenomenon that we can observe within a beehive,  when some of the bees leave the apiary with a queen (l'essaim) in order to create a new colony. 
<br />
<br />
In France, they talk in a metaphoric sense about an essaimage of new ideas, techniques, knowledge and savoir-faire (know-how, savvy, from years of experience). 
</p>






<!-- Contact Form -->
<a name="cf"></a>

<h2>Contact Form</h2>

<?php
if ($errors != "") {
   echo "<br />" . $errors . "<br /><br />";
}
?>
 
<form id="contactform" class="rounded" method="post" action="contact.php#cf">

<div class="field single">
    <label for="name">Name:</label>
    <input type="text" class="input" name="name" id="name" value="<?php echo $fromname; ?>" />
</div>
 
<div class="field single">
    <label for="email">Email:</label>
    <input type="text" class="input" name="email" id="email" value="<?php echo $rplyto; ?>" />
</div>

<div class="field single">
    <label for="phone">Tel:</label>
    <input type="text" class="input" name="phone" id="phone" value="<?php echo $telephone; ?>" />
</div>

<div class="field single url">
    <label for="URL">URL:</label>
    <input type="text" class="input" name="url" id="url" value="<?php echo $url; ?>" />
</div>
 
<div class="field">
    <label for="message">Message:</label>
    <textarea class="input textarea" name="message" id="message" rows="8"><?php echo $body; ?></textarea>
</div>


<!--
<div>
   <?php //echo Securimage::getCaptchaHtml('input_text':'Enter security code') ?>
</div>
-->

<div class="field">
   <label for="captcha_code">Enter security code:<br />
   <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" style="width: 130px;" /></label>
   <br />
   <input type="text" name="captcha_code" size="10" maxlength="6" />
   <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false" style="font: 11px verdana; text-decoration: none;">[Different Image]</a>
</div>




























 
<?php
// Only show the send button if the IP address is not in the banned IPs array (Steve Beeston 14/11/13)
$banned_ip = 0;
if (!empty($banned_ips)) {
   if (in_array($ip_address, $banned_ips)) {
      $banned_ip = 1;
   }
}
if ($banned_ip == 0) {
   echo "<input type=\"submit\" name=\"Submitted\"  class=\"button\" value=\"Send\" style=\"margin-left: 525px; margin-top: 5px;\" />";
}
?>

</form>

<!--

OLD CONTACT FORM

<form id="contactform" class="rounded" method="post">
<table width="575">
   <tr>
      <td width="150">
         <label for="name">Name:</label>
      </td>
      <td>
         <input type="text" class="input" name="name" id="name" value="" size="40" />
      </td>
   </tr>
   <tr>
      <td>
         <label for="email">Email:</label>
      </td>
      <td>
         <input type="text" class="input" name="email" id="email" value="" size="40" />
      </td>
   </tr>
   <tr>
      <td>
         <label for="phone">Tel:</label>
      </td>
      <td>
         <input type="text" class="input" name="phone" id="phone" value="" size="40" />
      </td>
   </tr>
   <tr>
      <td>
         <label for="message">Message:</label>
      </td>
      <td>
         <textarea class="input textarea" name="message" id="message" rows="7" cols="50" rows="10"></textarea>
      </td>
   </tr>

<?php
//   Added TR below for Captcha
//   SRB 01/01/2013 SR/009
?>
<?php /*
// <tr>
//  <td>
//	<!--#include file="CAPTCHA/CAPTCHA_form_inc.asp" -->
//	</td>
// </tr>
*/ ?>

   <tr>
      <td></td>
      <td align="right">
         <input type="submit" name="Submit"  class="button" value="Send" />
      </td>
   </tr>
</table>
</form>

-->



</div>

<div class="post-content"></div>






	
</div>
<!-- wrapper -->






</body>
</html>
