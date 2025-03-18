<?php 

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;  
use PHPMailer\PHPMailer\PHPMailer;  

// Include PHPMailer's files  
require("vendor/autoload.php"); 

$phpmailer = new PHPMailer(true);  

 
    //Server settings  
    // $phpmailer->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $phpmailer->isSMTP();                                            //Send using SMTP
    $phpmailer->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
    $phpmailer->SMTPAuth   = true;                                   //Enable SMTP authentication
    $phpmailer->Username   = '736d852b3af22f';                     //SMTP username
    $phpmailer->Password   = 'c9349ceddc683c';                               //SMTP password
    // $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $phpmailer->Port       = 587;   // Enable TLS encryption, if required  

    //Recipients  
   

    // Content  
 
    // $phpmailer->SMTPDebug = 2; // Set to 2 for verbose debug output  

    // Send the email  
     
