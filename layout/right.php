<?php
    function price(){
        global $connect;
        $query="select * from price where status=1";
        return $connect -> query ($query);
    }
    $result=price();
    ?>
<aside data-aos="fade-left"> 
    <h3>Tìm kiếm theo giá</h3>
    <?php foreach($result as $rs):?>
        <section class="search-style"><a href="?request=search&rangePrice=<?=$rs['rangePrice']?>"><?=$rs['rangePrice']?></a></section> 
    <?php endforeach;?>
    </aside>   