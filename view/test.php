<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require "vendor/autoload.php";

    $maxacnhan = random_int(100000, 999999);

    //Code gửi email
    $mail = new PHPMailer(true);

    $mail->isSMTP(); 
    $mail->SMTPAuth   = true;    

    $mail->Host       = 'smtp.gmail.com';                                         
    $mail->Username   = 'doannhom4.pttkhttt@gmail.com';               
    $mail->Password   = 'ewvd stdf afap kckz';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //$mail->SMTPSecure = 'ssl';          
    $mail->Port       = 587; 

    $mail->setFrom('doannhom4.pttkhttt@gmail.com', 'Nhà Sách Vinabook');
    $mail->addAddress('nthieu.c4pbchau2122@gmail.com');
    
    $mail->isHTML(true);
    $mail->Subject = "Mã xác nhận cho tài khoản Vinabook của bạn";

    $email_template = "
        <h2>Xin chào bạn</h2>
        <h3>Đây là mã xác nhận cho tài khoản Vinabook của bạn, tuyệt đối không chia sẻ cho bất kì ai: {$maxacnhan}</h3>
    ";
    $mail->Body = $email_template;
    $mail->send();
    
    echo "<div>Đã gửi email xác thực</div>";
?>