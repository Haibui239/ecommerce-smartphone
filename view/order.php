<?php
    if(isset($_POST['fullName'])):
        $fullName=$_POST['fullName'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $connect->query("update customer set fullName='$fullName', mobile='$mobile', email='$email', address='$address' where username='".$_SESSION['username']."'");
    endif;
?>
<?php
    $query="SELECT * FROM customer WHERE username='".$_SESSION['username']."'";
    $user=mysqli_fetch_array($connect->query($query));
?>
<?php
    if(isset($_POST['orderMethodId'])):
        $orderMethodId=$_POST['orderMethodId'];
        $userId=$user['id'];
        $connect->query("insert finishOrder(userID,orderMethodId,orderDate) values('$userId','$orderMethodId',now())");
        $order=mysqli_fetch_array($connect->query("SELECT id FROM finishOrder ORDER BY id DESC LIMIT 1"));
        $orderId=$order['id'];
        foreach(array_keys($_SESSION['cart'])as $productId) {
        $quantity=$_SESSION['cart'][$productId];
        $product=mysqli_fetch_array($connect->query("select sale_price from products where id=$productId"));
        $price=$product['sale_price'];
        $connect->query("insert orderdetail values('$orderId','$productId','$quantity','$price')");
    }
    unset($_SESSION['cart']);
    echo 
    "<script>alert('Thanh toán thành công!'); location='?request=shop'</script>";
    endif;
    
?>
<style>
    .left,.right {
        display: none;
    }
</style>
<section class="order-container">
    <section class="order-user">
        <h1>THANH TOÁN</h1>
        <form action="" method="post">
            <section class="order-item">
                <label for="">Họ và tên:</label>
                <input required type="text" name="fullName" value="<?=$user['fullName']?>">
            </section>
            <section class="order-item">
                <label for="">Điện thoại:</label>
                <input required type="tel" name="mobile" value="<?=$user['mobile']?>">
            </section>
            <section class="order-item">
                <label for="">Email:</label>
                <input required type="email" name="email" value="<?=$user['email']?>" pattern=".+@.+(\.[a-z]{2,3}){1,2}">
            </section>
            <section class="order-item">
                <label for="">Địa chỉ:</label>
                <textarea required name="address" id="" rows="2">
                    <?=$user['address']?>
                </textarea>
            </section>
            <section class="order-item order-item-submit">
                <input type="submit" value="CẬP NHẬT THÔNG TIN ĐƠN HÀNG" class="order-submit">
            </section>
        </form>
    </section>
    <section class="order-method">
        <?php
            $orderMethods=$connect->query("select * from ordermethod where status=1");
            include("mailer.php");
        ?>
        <h1>PHƯƠNG THỨC THANH TOÁN</h1>
        <form action="" method="post">
            <?php foreach($orderMethods as $orderMethods):?>
            <label class="light-label">
                <input type="radio" class="rad-input" name="orderMethodId" value="<?=$orderMethods['id']?>" <?=$orderMethods['id']!=1?:'checked'?>>
                
                <!-- <a href="{{url{/vnpay_payment}}}">Thanh toan VNPAY</a> -->
                
                <span class="design"></span>
                <span  class="text">
                    <?=$orderMethods['orderName']?>
                </span>
            </label>
            <?php endforeach;?>
            <section>
                <input type="submit" value="ĐẶT HÀNG" class="order-submit btn-submit">
            </section>
        </form>
    </section>
</section>