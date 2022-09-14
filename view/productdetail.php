<?php
    $productid=$_GET['productid'];
    // $query="SELECT * FROM products WHERE id='$productid'";
    // $rs=$connect->query($query);
    // $rs=mysqli_fetch_array($rs);
    $result=mysqli_query($connect,"SELECT * FROM products WHERE id=$productid");
    $rs=mysqli_fetch_assoc($result);
    $imgLibrary=mysqli_query($connect,"SELECT * FROM galery WHERE id=$productid");
    $product['images']=mysqli_fetch_all($imgLibrary,MYSQLI_ASSOC);
?>
<style>
    .left,.right {
        display: none;
    }
</style>
<section class="product-detail-container">
    <section class="product-detail-img">
        <img src="images-products/<?=$rs['images']?>" alt="" class="product-frame">
    </section>
    <section class="product-detail-order">
        <section class="product-detail-item product-detail-name">
            <h2><?=$rs['name']?></h2>
        </section>
        <section class="product-detail-item product-detail-price">
            <span><?=number_format($rs['sale_price'],0,',','.')?></span><span>₫</span>
        </section>
        <form method="post" action="?request=cart&action=add&productid=<?=$rs['id']?>">
            <label for="">Số lượng :</label><br><br>
            <input type="number" name="number" id="" class="product-detail-number">
            <input type="submit" value="Thêm vào giỏ hàng" class="product-detail-submit">
        </form>
    </section>
    <section class="gallery">
        <?php if(!empty($product['images'])):?>
            <section class="gallery-container">
                <ul>
                    <?php foreach($product['images'] as $img):?>
                    <li>
                        <img src="images-products/<?=$img['thumbnail']?>" alt="" width="100%">
                    </li>
                    <?php endforeach;?>
                </ul>
            </section>
        <?php endif;?>
    </section>
    <section class="product-detail-des">
        <h4>Mô tả sản phẩm</h4>
        <p><?=$rs['description']?></p>
    </section>
</section>