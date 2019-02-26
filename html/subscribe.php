<?php
echo "hi";
error_reporting(E_ALL); ini_set('display_errors', '1');

set_include_path("PHPMailer");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



  if (require "PHPMailer/src/Exception.php") {
       echo "Exception.php OK"."<br/>";
    } else {
       echo "req. Failed";
    }
    
    if (require "PHPMailer/src/PHPMailer.php") {
       echo "PHPMailer.php OK"."<br/>";
    } else {
       echo "req. Failed";
    }
    
    if (require "PHPMailer/src/SMTP.php") {
       echo "SMTP.php OK"."<br/>";
    } else {
       echo "req. Failed";
    }

/*    if (require "PHPMailer/src/POP3.php") {
       echo "Igen";
    } else {
       echo "Nem";
    }*/
//require 'path/to/PHPMailer/src/Exception.php';
//require 'PHPMailer/src/PHPMailer.php';
//require 'PHPMailer/src/SMTP.php';

//echo htmlspecialchars($_SERVER["PHP_SELF"]);

$emailErr="";
$email="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["mail"])) {
    header("Location: /subscribe.html");
  } else {
    $email = ($_POST["mail"]);
     session_start();
   $_SESSION['email'] = $email;
  }
  }


echo "Your email is: ".$_POST["mail"]."<br/>";

echo "Creating and Sending email"."<br/>";


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'tls://smtp.gmail.com'; 
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
//$mail->SMTPDebug = 4;


$mail->Username = "lucidsphere.official@gmail.com";
$mail->Password = "*******"; //replace with actual pwd!

$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = "lucidsphere.official@gmail.com";
$mail->FromName = "LucidSphere";

$mail->addAddress($_POST["mail"]);

$mail->Subject = "PHP sc test";
$mail->Body = "<div style='background:gray;'>Hey,<br /><br />Subscribed succesfully, here is the link:<br/>
                <a href='https://www.dropbox.com/sh/0bkeno4f6bs3kbd/AABYmkbx7zFbaLByxzHXC9Sna?dl=0'>Click</a></div>";

if(!$mail->Send())
    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
    echo "Message has been sent"."<br/>";
    
//NOTOFY MAIL TO lucidsphere.band@gmail.com    
$mail->ClearAllRecipients( );    
$mail->addAddress("lucidsphere.band@gmail.com");

$mail->Subject = "New subscriber test";
$mail->Body = $_POST["mail"]." just subscribed.";

if(!$mail->Send())
    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
    echo "Message has been sent"."<br/>";    

/*
$msg = "Hello\nWorld";
$msg = wordwrap($msg,70);
mail("k19n29@gmail.com","phptest",$msg);

*/
$done="faba";
if ($done=="faba")
{
    header("Location: /check.php");
    exit;
}


?>
