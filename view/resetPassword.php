<?php
include("config.php");

if(!isset($_GET["code"])) {
    exit("Không tìm thấy trang");
}
$code = $_GET["code"];

$getEmailQuery = mysqli_query($con,"SELECT email FROM resetpasswords WHERE code='$code'");
if(mysqli_num_rows($getEmailQuery)==0) {
    exit("Không tìm thấy trang");
}
if(isset($_POST["password"])) {
    $pw = $_POST["password"];
    $pw = md5($pw);
    $row = mysqli_fetch_array($getEmailQuery);
    $email=$row["email"];
    $query=mysqli_query($con,"UPDATE customer set password='$pw' where email='$email'");
    if($query) {
        $query = mysqli_query($con,"DELETE FROM resetpasswords WHERE code='$code'");
        echo '<script>alert("Mật khẩu của bạn đã được khôi phục")</script>';
    } else {
        exit("Có lỗi xảy ra");
    }
}
?>
<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
<!-- <form method="POST">
    <input type="password" name="password" placeholder="New password">
    <br>
    <input type="submit" value="Update Password" name="submit">
</form> -->
<link rel="stylesheet" href="../css/style.css">
<div class="login-form">
    <form method="post" autocomplete="off">
        <div class="content">
            <div class="input-field">
                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="New password">
            </div>
            </div>
            <div class="action">
                <input type="submit" value="SUBMIT" autocomplete="off" class="btn">
            </div>
        </div>
  </form>
</div>