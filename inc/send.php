<?php
require_once 'config.php';
$error = false;
$fError = $sError = $eError = $mError = '';

if(isset($_POST['send'])){
    if(empty($_POST['name'])){
        $fError = "Your name is required!";
        $error = true;
    }else{
        $name = cleanInput('name');
    }

    if(empty($_POST['email'])){
        $eError = "Email is required!";
        $error = true;
    }else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $eError = "Please enter correct email!";
            $error = true;
        }else{
            $email = cleanInput('email');
        }
    }

    if(empty($_POST['subject'])){
        $sError = "Please provide a subject";
        $error = true;
    }else{
        $subject = cleanInput('subject');
    }
    if(empty($_POST['message'])){
        $mError = "Please enter your message";
        $error = true;
    }else{
        $message = cleanInput('message');
    }

    $mailto = 'info@qisoptimalsolutionsltd.com';
   
    
  $headers = "From: $mailto \r\n";

  $headers .= "Reply-To: $email \r\n";


    // send the mail...
    $mailsent = mail($mailto, $subject, $message, $headers);
    if($mailsent){
        $_SESSION['message'] = 'Your message has been delivered successfully. Thank you.';
        header('Location:../contact.php');
    } else{
        $_SESSION['message'] = 'Trouble getting your message, please resend';
        header('Location:../contact.php');

    }
}