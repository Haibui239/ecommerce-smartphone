<?php
    function login(){
        global $connect;
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $query="select * from customer where username = '$username' and password = '$password'";
            $resutl=$connect->query($query);
            if(mysqli_num_rows($resutl)==0){
                echo "<script>alert('Tên đăng nhập hoặc tài khoản không đúng!')</script>";
            } else {
                
                $_SESSION['username']=$username;
                header("location:.");
            }   
        }
        return '';
    }
$alert=login();
?>
<style>
    .left,.right {
        display: none;
    }
    .content-home {
        width: 100%!important;
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
.login-form .input-field input {
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

<div class="login-form">
    <h1>Login</h1>
    <?php if($alert!=''):?>
        <section  class="alert alert-danger"><?=$alert;?></section>
    <?php endif;?>
    <form action="" method="post" autocomplete="off">
        <div class="content">
            <div class="input-field">
                <input type="text" name="username" class="form-control" autocomplete="off" placeholder="username">
            </div>
            <div class="input-field">
                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="password">
            </div>
                <a href="?request=requestReset" class="link">Forgot Your Password?</a>
            </div>
            <div class="action">
                <a href="?request=register" class="btn" style="text-align: center;">Register</a>
                <input type="submit" value="Login" autocomplete="off" class="btn">
            </div>
        </div>
  </form>
</div>
<script>
    let form = document.querySelecter('form');

    form.addEventListener('submit', (e) => {
    e.preventDefault();
    return false;
    });
</script>