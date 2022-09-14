<?php session_start();?>
<?php  $connect=new MySQLi("localhost",'root','','hcs');?>

<!DOCTYPE html>
<html>
    <head>
        <title>ADMIN</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
        <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>      
</head>
<body>
<?php
    function login(){
        global $connect;
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $query="select * from admin where username = '$username' and password = '$password'";
            $resutl=$connect->query($query);
            if(mysqli_num_rows($resutl)==0){
                echo 
                "<script>alert('Tên đăng nhập hoặc mật khẩu sai!');</script>";
            } else {
                $_SESSION['admin']=$username;
                header("Refresh:0");
            }   
        }
        return '';
    }
$alert=login();
?>
<section class="body-panel">

    <?php
    if (isset($_SESSION['admin'])){
        include"admincontrolpanel.php";
    }else{include"loginadmin.php";}
    ?>
</section>
</body>
</html>