<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//  require './PHPMailer/src/Exception.php';
//  require './PHPMailer/src/PHPMailer.php';
//  require './PHPMailer/src/SMTP.php';
require 'vendor/autoload.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->CharSet = "utf-8";
    $mail->Username = 'linsheng24';                 // SMTP username
    $mail->Password = 'bvnifgnigiqguzve';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    
    
    //Recipients
    $mail->setFrom('linsheng24@gmail.com', 'sheng lin');
    $mail->addAddress($_POST['mail'], '');
    //$mail->addReplyTo('linsheng24@gmail.com', 'sheng lin');

    $usermail = 'linsheng24@gmail.com';

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '忘記密碼驗證信';
    $mail->Body    = "
    
    <!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    </head>
    <body>
        <form name='form1' action='localhost/login/change' method='post'>  
            <input type='hidden' name='mail' value='".$_POST['mail']."'/>
            <input type='submit' value='點此驗證'>
        </form> 
    </body>
    </html>
    ";

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mail->send();
    echo '驗證信已寄出，請至信箱查看';
    header("refresh:3,url=./");

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
}


?>



