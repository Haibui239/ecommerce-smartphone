<?php
    function register(){
        global $connect;
        if(isset($_POST['username'])){
            $username=$_POST['username'];
            $query="select * from customer where username='$username'";
            $result=$connect->query($query);
            $password=md5($_POST['password']);
            $fullName=$_POST['fullName'];
            $mobile=$_POST['mobile'];
            $email=$_POST['email'];
            $address=$_POST['address'];
            if(mysqli_num_rows($result)!=0){
                echo "<script>alert('Tên đăng nhập này có sẵn!')</script>";
            } else {
                $query="insert customer(username,password,fullName,mobile,email,address)
                value('$username','$password','$fullName','$mobile','$email','$address')";
                $connect->query($query);
                header('location: ?request=login');
            }
        }
        return '';
    }
$alert=register();
?>
<style>
    .left,.right {
        display: none;
    }
    .content-home {
        margin: auto;
    }
    .login-form {
  background: #fff;
  width: 500px;
  margin: 65px auto;
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
          flex-direction: column;
  border-radius: 4px;
  box-shadow: 0 2px 25px rgba(0, 0, 0, 0.2);
}
.login-form h1 {
  padding: 35px 35px 0 35px;
  font-weight: 300;
}
.login-form .content {
  padding: 35px;
  text-align: center;
}
.login-form .input-field {
  padding: 12px 5px;
}
.login-form .input-field input,textarea {
  font-size: 16px;
  display: block;
  font-family: 'Rubik', sans-serif;
  width: 100%;
  padding: 10px 1px;
  border: 0;
  border-bottom: 1px solid #747474;
  outline: none;
  -webkit-transition: all .2s;
  transition: all .2s;
}
.login-form .input-field input::-webkit-input-placeholder {
  text-transform: uppercase;
}
.login-form .input-field input::-moz-placeholder {
  text-transform: uppercase;
}
.login-form .input-field input:-ms-input-placeholder {
  text-transform: uppercase;
}
.login-form .input-field input::-ms-input-placeholder {
  text-transform: uppercase;
}
.login-form .input-field input::placeholder {
  text-transform: uppercase;
}
.login-form .input-field input:focus {
  border-color: #222;
}
.login-form a.link {
  text-decoration: none;
  color: #747474;
  letter-spacing: 0.2px;
  text-transform: uppercase;
  display: inline-block;
  margin-top: 20px;
}
.login-form .action {
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
          flex-direction: row;
}
.login-form .action .btn {
  width: 100%;
  border: none;
  padding: 18px;
  font-family: 'Rubik', sans-serif;
  cursor: pointer;
  text-transform: uppercase;
  background: #e8e9ec;
  color: #777;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 0;
  letter-spacing: 0.2px;
  outline: 0;
  -webkit-transition: all .3s;
  transition: all .3s;
}
.login-form .action .btn:hover {
  background: #d8d8d8;
}
.login-form .action .btn:nth-child(2) {
  background: #2d3b55;
  color: #fff;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 4px;
}
.login-form .action .btn:nth-child(2):hover {
  background: #3c4d6d;
}
</style>
<!-- <section class="container col-md-8">
    <h1>dang ki tai khoan</h1>
    </?php if($alert!=''):?>
        <section class="alert alert-danger"></?=$alert?></section>
    </?php endif; ?>
    <form method="post">
        <section class="form-group">
            <label for="">username:</label>
            <input type="text" name="username" class="form-control" autocomplete="off" required>
        </section>
        <section class="form-group">
            <label for="">password:</label>
            <input type="password" name="password" class="form-control" autocomplete="off" required pattern=".{6,}" title="mat khau phai tu 6 ky tu tro len">
        </section>
        <section class="form-group">
            <label for="">re-password:</label>
            <input type="password" name="repassword" class="form-control" autocomplete="off"  
            oninput="if(value!=password.value){document.getElementById('checkPass').innerHTML='re-enter password wrong!'}
            else{document.getElementById('checkPass').innerHTML=''}"><span  id="checkPass" style="color:red;"></span>
        </section>
        <section class="form-group">
            <label for="">fullName:</label>
            <input type="text" name="fullName" class="form-control" required value="<?=isset($fullName)?$fullName:''?>">
        </section>
        <section class="form-group">
            <label for="">mobile:</label>
            <input type="tel" name="mobile" class="form-control" value="<?=isset($mobile)?$mobile:''?>" title="so dien thoai khong dung" required pattern="\d{10,13}">
        </section>
        <section class="form-group">
            <label for="">email:</label>
            <input type="email" name="email" class="form-control" value="<?=isset($email)?$email:''?>" required pattern=".+@.+(\.[a-z]{2,3}){1,2}">
        </section>
        <section class="form-group">
            <label for="">address:</label>
            <textarea name="address" id="" rows="3" class="form-control" <?=isset($address)?$address:''?>></textarea>
        </section>
        <section class="form-group">
            <input type="submit" value="Register" class="btn btn-primary">
        </section>
    </form>
</section> -->

<div class="login-form">
    <?php if($alert!=''):?>
        <section class="alert alert-danger"><?=$alert?></section>
    <?php endif; ?>
  <form method="post">
    <h1>Register</h1>
    <div class="content">
      <div class="input-field">
        <input type="text" name="username" class="form-control" autocomplete="off" required placeholder="Username">
      </div>
      <div class="input-field">
            <input type="password" name="password" class="form-control" autocomplete="off" required pattern=".{6,}" title="Mật khẩu phải từ 6 ký tự trở lên" placeholder="Password">
        </div>
        <div class="input-field">
            <input type="password" name="repassword" class="form-control" autocomplete="off" placeholder="Repassword" 
            oninput="if(value!=password.value){document.getElementById('checkPass').innerHTML='re-enter password wrong!'}
            else{document.getElementById('checkPass').innerHTML=''}"><span  id="checkPass" style="color:red;"></span>
        </div>
        <div class="input-field">
            <input type="text" name="fullName" class="form-control" required value="<?=isset($fullName)?$fullName:''?>" placeholder="Full Name">
        </div>
        <div class="input-field">
            <input type="tel" name="mobile" class="form-control" value="<?=isset($mobile)?$mobile:''?>" title="so dien thoai khong dung" required pattern="\d{10,13}" placeholder="Phone number">
        </div>
        <div class="input-field">
            <input type="email" name="email" class="form-control" value="<?=isset($email)?$email:''?>" required pattern=".+@.+(\.[a-z]{2,3}){1,2}" placeholder="Email">
        </div>
        <div class="input-field">
            <textarea name="address" id="" rows="3" class="form-control" placeholder="Address" <?=isset($address)?$address:''?>></textarea>
        </div>
    </div>
    <div class="action">
        <a href="?request=login" class="btn" style="text-align: center;">Login</a>
        <input type="submit" value="Register" autocomplete="off" class="btn">
    </div>
  </form>
</div>