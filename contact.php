<?php /* contact-form.php

=========================================================================

Written by: Steve Beeston
Date:       9th December 2012
Changes:    14th November 2013 by Steve Beeston Added functionality to handle banned IP addresses
           4th February 2014 by Steve Beeston (SRB) to limit message length
           19th April 2014 by Steve Beeston Updated functionality to handle banned IP addresses and added URL field to trap spambots
=========================================================================

*/

//session_start();


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

$toaddress = "sheeranchan@gmail.com";  //Change this to the email address you will be receiving your notices.
//$toaddress = "rcwo@compuserve.com";  //Change this to the email address you will be receiving your notices.
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

<div class="content col-lg-12 col-md-12 col-sm-12">

    <h2 class="content col-lg-12 col-md-12 col-sm-12 margin-left-40">
        <span class="ti-headphone-alt gradient-fill"></span>
        Contact Us
    </h2>
    <!-- Contact Form -->
    <a name="cf" id="cf"></a>

    <?php
    if ($errors != "") {
        echo "<br /><p class='text-danger text-center'>" . $errors . "</p> <br /><br />";
    }
    ?>
        <form id="contactform" class="rounded col-lg-12 col-md-12 col-sm-12 offset-lg-3" method="post" action="contact.php#cf">
            <div class="form-group field single offset-lg-3 text-left margin-top-10">
                <label for="name">Name:</label>
                <input type="text" class="input form-control" name="name" id="name" value="<?php echo $fromname; ?>" />
            </div>

            <div class="form-group field single offset-lg-3 text-left">
                <label for="email">Email:</label>
                <input type="text" class="input form-control" name="email" id="email" value="<?php echo $rplyto; ?>" />
            </div>

            <div class="form-group field single offset-lg-3 text-left">
                <label for="phone">Tel:</label>
                <input type="text" class="input form-control" name="phone" id="phone" value="<?php echo $telephone; ?>" />
            </div>

            <div class="form-group field single url offset-lg-3 text-left">
                <label for="URL">URL:</label>
                <input type="text" class="input form-control" name="url" id="url" value="<?php echo $url; ?>" />
            </div>

            <div class="form-group field offset-lg-3 text-left">
                <label for="message">Message:</label>
                <textarea class="input textarea form-control" name="message" id="message" rows="8"><?php echo $body; ?></textarea>
            </div>

            <div class="form-group field captcha_code">
                <label for="captcha_code">Enter security code:<br />
                    <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" style="width: 130px;" /></label>
                <br />
                <input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="6" />
                <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false" style="font: 11px verdana; text-decoration: none;">
                    <img src="securimage/images/refresh.png" onclick="this.blur()" alt="refresh button">
                </a>
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
                echo "<input type=\"submit\" name=\"Submitted\"  class=\"btn btn-primary margin-btm-5 float-right\" value=\"Send\" style=\"margin-left: 525px; margin-top: 5px;\" />";
            }
            ?>
        </form>
</div>





