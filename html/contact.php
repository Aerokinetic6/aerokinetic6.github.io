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
$mail->Password = "alkoholospina";

$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = $_POST["cmail"];
$mail->FromName = $_POST["name"];

$mail->addAddress("lucidsphere.official@gmail.com");

$mail->Subject = "no-reply - ".$_POST["subj"];
$mail->Body = "<p style='font-weight: bold;'>Name: </p>".$_POST["name"]."<br/>"."<p style='font-weight: bold;'>Email: </p>".$_POST["cmail"]."<br/>"."<p style='font-weight: bold;'>Subject: </p>".$_POST["subj"]."<br/>"."<p style='font-weight: bold;'>Message: </p>".$_POST["msg"];

if(!$mail->Send())
    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
    echo "Message has been sent"."<br/>";
    

sleep(3);

$done="faba";
if ($done=="faba")
{
    header("Location: /contact.html");
    exit;
}


?>
