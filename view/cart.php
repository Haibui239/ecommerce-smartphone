<?php
    if(isset($_GET['action'])) {
        switch($_GET['action']) {
            case"add":
                $productid=$_GET['productid'];
                if(array_key_exists($productid, $_SESSION['cart'])) {
                    if(isset($_POST['number'])){
                        $_SESSION['cart'][$productid]+=$_POST['number'];
                    } else {
                        $_SESSION['cart'][$productid]++;
                    }
                } else {
                    if(isset($_POST['number'])){
                    $_SESSION['cart'][$productid]=$_POST['number'];
                    } else {
                        $_SESSION['cart'][$productid]=1;
                    }
                }
                header("location:?request=cart");
                break;
            case "delete":
                $productid=$_GET['productid'];
                unset($_SESSION['cart'][$productid]);
                break;
            case "deleteAll":
                unset($_SESSION['cart']);
                break;
            case "update":
                foreach(array_keys($_SESSION['cart']) as $key):
                    $_SESSION['cart'][$key]=$_POST[$key];
                endforeach;
                break;
            case "order":
                 if(isset($_SESSION['username'])):
                    if(isset($_GET['order'])) {
                        header("location:?request=order");
                    } else {
                        header("location: .");
                    }
                    header("location:?request=order");
                 else:
                    header("location:?request=login&order=1");
                 endif;
                break;
        }
    }
?>
<style>
    .left,.right {
        display: none;
    }
</style>
<?php
    if(isset($_SESSION['cart']) && $_SESSION['cart']!=null):
        ?>
            <form method="post" action="?request=cart&action=update"> 
        <?php
        $listid='0';
        foreach(array_keys($_SESSION['cart']) as $key):
            $listid.=','.$key;
        endforeach;
        $query="SELECT * FROM products WHERE id IN($listid)";
        $result=$connect->query($query);
        if(mysqli_num_rows($result)>0):
            ?>
            <section class="cart-menu">
                <section>Ảnh</section>
                <section>Tên</section>
                <section>Giá</section>
                <section>Số lượng</section>
                <section>Tổng</section>
                <section>Xóa sản phẩm</section>
            </section>
            <?php
            $tongtien=0;
            foreach($result as $rs):
            $thanhtien=$rs['sale_price']*$_SESSION['cart'][$rs['id']];
            $tongtien+=$thanhtien;
            ?>
                
                <section class="cart-container">
                    <section class="cart-img cart-item">
                        <img src="images-products/<?=$rs['images']?>" width="30%"> 
                    </section>
                    <section class="cart-name cart-item">
                        <p><?=$rs['name']?></p>
                    </section>
                    <section class="cart-price cart-item">
                        <p><?=number_format($rs['sale_price'],0,',','.')?></p>
                    </section>
                    <section class="cart-number cart-item">
                        <input type="number" name="<?=$rs['id']?>" value="<?=$_SESSION['cart'][$rs['id']]?>" min="1" max="99">
                    </section>
                    <section class="cart-product-price cart-item">
                        <?=number_format($thanhtien,0,',','.')?>
                    </section>
                    <section class="cart-delete cart-item">
                        <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" href="?request=cart&action=delete&productid=<?=$rs['id']?>"><i class="fas fa-trash-alt"></i></a>
                    </section>
                </section>
            <?php endforeach;
        endif;
        ?>
            <section class="cart-result">
                <section></section>
                <section></section>
                <section></section>
                <section></section>
                <section>
                    <p><?=number_format($tongtien,0,',','.')?></p>
                </section>
                <section></section>
            </section>
            <section class="cart-order-container">
                <section class="cart-order-item">
                    <a href="?request=cart&action=deleteAll" onclick="return confirm('Bạn có muốn xóa giỏ hàng không?')" class="btn-cart">Xóa tất cả sản phẩm trong giỏ hàng</a>
                </section>
                <section class="cart-order-item">
                    <input type="submit" value="Cập nhật giỏ hàng" id="" class="btn-cart">
                </section>
                <section class="cart-order-item">
                    <a href="?request=cart&action=order" class="btn-cart">Thanh toán</a>
                </section>
                <section class="cart-order-item"></section>
            </section>
            </form> 
        <?php
    else:
        ?>
            <section>
                Giỏ hàng trống
            </section>
        <?php
    endif;
?>