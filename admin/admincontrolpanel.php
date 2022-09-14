<?php 
$chuaXuly=mysqli_num_rows($connect->query("select * from finishorder where status=1"));
$dangXuly=mysqli_num_rows($connect->query("select * from finishorder where status=2"));
$daXuly=mysqli_num_rows($connect->query("select * from finishorder where status=3"));
$huy=mysqli_num_rows($connect->query("select * from finishorder where status=4"));
?>
<table class="table table-bordered .tbl-admin">
    <tbody>
        <tr class="admin-menu">
            <td class="admin-menu-box align-middle">
                <section>
                    <img src="../images/favicon.ico" alt="" width="10%">
                    HSQUARE
                </section>
            </td>
            <td class="title-panel"></td>
            <td class="admin-menu-box">
                <section class="user-admin">
                    <i class="fas fa-user"></i>
                    <div class="user-admin-detail">
                    <?=$_SESSION['admin']?><br><a href="?option=logout">Logout</a>
                    </div>
                </section>
            </td>
        </tr>
        <tr class="admin-panel">
            <td class="admin-menu-panel">
                <section>
                    <i class="fas fa-archway"></i>
                    <a href="?option=brand">Hãng sản xuất</a></section>
                <section>
                    <i class="fas fa-mobile"></i>
                    <a href="?option=product">Sản phẩm</a></section>
                <section>
                    <div>
                        <i class="fas fa-luggage-cart"></i>
                        <a href="">Đơn hàng</a></div>
                    <section><a href="?option=order&status=1" class="order-control">
                        <i class="fas fa-truck-loading"></i>
                        Đơn hàng chưa xử lý<div class="order-number"><span style="color:white"><?=$chuaXuly?></span></div></a></section>
                    <section><a href="?option=order&status=2" class="order-control">
                        <i class="fas fa-spinner"></i>
                        Đơn hàng đang xử lý<div class="order-number"><span style="color:white"><?=$dangXuly?></span></div> </a></section>
                    <section><a href="?option=order&status=3" class="order-control">
                        <i class="fas fa-check-circle"></i>
                        Đơn hàng đã xử lý <div class="order-number"><span style="color:white"><?=$daXuly?></span></div></a></section>
                    <section><a href="?option=order&status=4" class="order-control">
                        <i class="fas fa-times"></i>
                        Đơn hàng hủy <div class="order-number"><span style="color:white"><?=$huy?></span></div></a></section>
                </section>
            </td>
            <td colspan="2">
                <?php
                if(isset($_GET['option'])){
                    switch($_GET['option']){
                        case'logout':
                            unset($_SESSION['admin']);
                            header("location: .");
                            break;
                        case'brand':
                            include"brands/showbrands.php";
                            break;
                        case'brandadd':
                            include"brands/brandadd.php";
                            break;
                        case'brandupdate':
                            include"brands/brandupdate.php";
                            break;
                        case'product':
                            include"products/showproducts.php";
                            break;  
                        case'productadd':
                            include"products/productadd.php";
                            break; 
                        case'productupdate':
                            include"products/productupdate.php";
                            break;
                        case'order':
                            include"orders/showorder.php";
                            break;    
                        case'orderdetail':
                            include"orders/orderdetail.php";
                            break;        
                    }
                } 
                 ?>
            </td>
        </tr>
    </tbody>
</table>