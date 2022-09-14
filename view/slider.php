<?php
    $query="select * from products where status=1";
    $result=$connect->query($query);
?>
<div class="slider" data-aos="fade-up">
<h3 class="title-slider">Sản phẩm bán chạy</h3>
            <div class="slider-main main">
                <div class="slider-container">
                    <?php if ($result->num_rows > 0):?>
                        <?php while($row=$result->fetch_assoc()):?>
                        <div class="slider-item">
                            <div class="slider-item-box">
                                <div class="slider-img">
                                    <a href="?request=detail&productid=<?=$row['id']?>">
                                        <img src="images-products/<?=$row['images']?>" alt="" height="200px" style="object-fit: contain;">
                                    </a>
                                </div>
                                <a href="#"><?=$row['name']?></a>
                            </div>
                            <hr>
                            <p><?=number_format($row['sale_price'],0,',','.')?></p>
                        </div>
                        <?php endwhile;?>
                        <?php else:?>
                            <?php echo "0 result";?>
                    <?php endif;?>  
                </div>
            </div>
        </div>
        