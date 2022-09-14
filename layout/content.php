<article class="col-md-8">
    <?php
        if(isset($_GET['request'])){
            switch($_GET['request']){
                case 'search';
                    include "view/search.php";
                    break;
                case 'detail';
                    include "view/productdetail.php";
                    break;
                case 'shop';
                    include "view/shop.php";
                    break;
                case 'home';
                    include "view/home.php";
                    break;
                case 'police';
                    include "view/police.php";
                    break;
                case 'faq';
                    include "view/faq.php";
                    break;
                case 'support';
                    include "view/support.php";
                    break;
                case 'about';
                    include "view/aboutstory.php";
                    break;
                case 'login';
                    include "view/login.php";
                    break;
                case 'cart';
                    include "view/cart.php";
                    break;
                case 'register';
                    include "view/register.php";
                    break;
                case 'order';
                    include "view/order.php";
                    break;
                case 'forgotpassword';
                    include "view/forgotpassword.php";
                    break;
                case 'requestReset';
                    include "view/requestReset.php";
                    break;
                case 'resetPassword';
                    include "view/resetPassword.php";
                    break;
                case 'mail';
                    include "view/mail.php";
                    break;
                case 'thank';
                    include "view/thankcontact.php";
                    break;
                case 'kiemtra';
                    include "view/kiemtra.php";
                    break;
                case 'logout';
                    unset($_SESSION['username']);
                    header('location:.');
                    break;
            }
        } else {
            include "view/home.php";
        }
    ?>

</article>