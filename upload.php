<?php
   
include 'email.php';

$title = 'Новое сообщение';


if (!empty($_POST)) {
    
    $send = ' ';  
 

    if (!empty($_POST['email'])) {
        $send .= "Email - " . $_POST['email'] . "<br>";
    }

    if (!empty($_POST['whichLanguage'])) {
        $send .= "На какой язык переводить - " . $_POST['whichLanguage'] . "<br>";
    }
 
 
 

     
    require ('phpmailer/class.phpmailer.php');
      
    
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->IsMail();
    $mail->Mailer = "mail";
    $mail->SetFrom('noreply@'.$_SERVER['HTTP_HOST'], 'Zakaz Info'); 
    $mail->AddAddress($to);
    $mail->Subject = $title;
    $mail->WordWrap = 80;
    $mail->MsgHTML($send);


    if (!empty($_FILES['file']['name'])) {
         
        $mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
 
    }
  
  
    $mail->IsHTML(true);
    
    // отправка письма
    $mail->Send();  
         
 
}

 

?>