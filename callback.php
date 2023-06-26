<?php
   
include 'email.php';

$title = 'Новое сообщение';


if (!empty($_GET)) {
    
    $send = ' ';  
 

    if (!empty($_GET['phone'])) {
        $send .= "Телефон - " . urldecode( $_GET['phone']) . "<br>";
    }

    if (!empty($_GET['phone'])) {
        $send .= "Телефон - " . urldecode( $_GET['phone']) . "<br>";
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

  
    $mail->IsHTML(true);
    
    // отправка письма
    $mail->Send();  
         
 
}

 

?>