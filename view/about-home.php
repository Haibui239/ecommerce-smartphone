<?php
    $query="select * from banner where status=1";
    $result=$connect->query($query);
?>
<div class="about" data-aos="fade-up" >
            <div class="about-main main">
                <div class="about-bg">
                    <div class="about-image-slider">
                    <?php if ($result->num_rows > 0):?>
                        <?php while($row=$result->fetch_assoc()):?>
                            <div class="about-image-item">
                                <a href="?request=detail&productid=<?=$row['url']?>">
                                    <img src="images-products/<?=$row['bannerimage']?>" alt="">
                                </a>
                            </div>
                        <?php endwhile;?>
                        <?php else:?>
                            <?php echo "0 result";?>
                    <?php endif;?>  
                    </div> 
                </div>
                <div class="our-story">
                    <p>Câu chuyện của chúng tôi</p>
                    <p>Hsquare chính thức thành lập năm 2022, bởi 2 chàng sinh viên khi bước sang năm thứ 3 của Cao đẳng nghề Bách Khoa. Sau 3 năm, cửa hàng đầu tiên mới được khai trương với tên CellphoneUK, tọa lạc phố Thái Hà - nơi được người Hà Nội định vị là "phố điện tử" khi quy tụ rất nhiều cửa hàng mua bán, sửa chữa thiết bị điện tử.</p>
                    
                </div>
            </div>
        </div>