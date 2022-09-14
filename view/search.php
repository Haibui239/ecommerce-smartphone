<?php
    function search() {
        global $totalPages;
        global $connect;
        $query="select * from products where status=1 ";
        if(isset($_GET['categorieID'])){
            $query.="and categorieID=".$_GET['categorieID'];
        }
        if(isset($_POST['keyword'])) {
            $query.="and name like '%".$_POST['keyword']."%'";
        }
        if(isset($_GET['rangePrice'])){
            $rangePrice=$_GET['rangePrice'];
            $range=preg_split('[\s]',$rangePrice);
            $from=0;
            $to=0;
            if($range[0]=='từ'){
                $from=$range[1];
            }else{
                $range1=preg_split('[\-]', $range[0]);
                $from=$range1[0];
                $to=$range1[1];
            }
           $from*=1000000;
           $to*=1000000;
           $query.="and sale_price>=$from";
           if($to!=0){
            $query.=" and sale_price<=$to";
           }
         }  
        //xem cac san pham o trang so bao nhieu
        $page=1;
        if(isset($_GET['page'])) {
        $page=$_GET['page'];
        }
        //so luong sp moi trang
        $productsperpage=27;
        //lay cac san pham bat dau tu so bao nhieu trong bang (0 tuc la bat dau tu bang ghi dau tien)
        $from=($page-1)*$productsperpage;
        //lay tong so san pham
        $totalProducts=$connect->query($query);
        //tinh tong so trang co duoc
        $totalPages = ceil(mysqli_num_rows($totalProducts)/$productsperpage);
        //lay cac san pham o trang hien thoi
        $query.=" limit $from,$productsperpage";
        $result=$connect->query($query);
        return $result;
    }
    $result=search();
?>
<style>
    .product-container {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .product-item {
        width: 32%;
        padding: 10px;
        box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
        margin-bottom: 10px;
    }
    .product-name {
        font-size: 0.7rem;
        padding-top: 5px;
    }
    .product-price {
        font-size: 0.8rem;
        padding-bottom: 5px;
    }
    .product-order {
        padding: 5px;
        border: 1px solid;
        text-align: center;
    }
    a {
        cursor: pointer;
    }
    .search-page {
        display: none;
    }
</style>
<?//php include "product.php"; ?>
<?php include"searchbar.php"?>
<section class="product-container">
    <?php if(mysqli_num_rows($result)==0):?>
        <section class="alert alert-info">No product</section>
    <?php else: ?>
        <?php foreach($result as $rs): ?>
            <section class="product-item" data-aos="fade-up">
                <section class="product-img">
                    <a href="?request=detail&productid=<?=$rs['id']?>">
                        <img src="images-products/<?=$rs['images']?>" width="100%" height="300px" style="object-fit: contain;"> 
                    </a>
                </section>
                <section class="product-name">
                    <a href="?request=detail&productid=<?=$rs['id']?>"><?=$rs['name']?></a>
                </section>
                <section class="product-price">
                    <?=number_format($rs['sale_price'],0,',','.')?><span>₫</span>
                </section>
                <section class="product-order">
                    <a href="?request=cart&action=add&productid=<?=$rs['id']?>" class="btn btn-outline-primary">Order</a>
                </section>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
<section class="search-page">
    <?php for($i=1;$i <=$totalPages;$i++):?>
        <a href="?request=search&page=<?=$i?>"><?=$i?></a>
    <?php endfor;?>
</section>