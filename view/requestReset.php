<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

if(isset($_POST['email'])) {

    $emailTo = $_POST['email'];
    $code = uniqid(true);
    $query = mysqli_query($con,"INSERT INTO resetpasswords(code,email) VALUE('$code','$emailTo')");
    if(!$query) {
        exit("error");
    }
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail -> charSet = "UTF-8";
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'buiviethai2309@gmail.com';                     //SMTP username
        $mail->Password   = 'wduzbpdirlrxnzia';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('buiviethai2309@gmail.com', 'HSQUARE');
        $mail->addAddress($emailTo);     //Add a recipient
        $mail->addReplyTo('no-reply@gmail.com', 'No reply');

        //Content
        $url = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/view/resetPassword.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'RESET PASSWORD';
        $mail->Body    = "Mật khẩu của bạn đã được khôi phục <a href='$url'>Hãy ấn vào link này để khôi phục mật khẩu</a>".$code;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<script>alert("Link khôi phục password đã được gửi đến Email của bạn")</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
    }
    header("location:?request=home");
}

?>
<style>
    .left,.right {
        display:none;
    }
</style>
<div class="login-form">
    <form method="post" autocomplete="off">
        <div class="content">
            <div class="input-field">
                <label>NHẬP EMAIL ĐĂNG KÝ</label>
                <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email">
            </div>
            </div>
            <div>
                <input type="submit" value="SEND EMAIL" autocomplete="off" class="btn btn-reset">
            </div>
        </div>
  </form>
</div>