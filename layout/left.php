<?php
    $query="select * from categories where status=1";
    $result= $connect->query($query); 
?>
<aside data-aos="fade-right">
    <h3>Tìm kiếm theo hãng</h3>
    <?php foreach($result as $rs):?>
        <section>
            <a href="?request=search&categorieID=<?=$rs['id']?> "><?=$rs['categoryName']?></a>
        </section>
    <?php endforeach; ?>
</aside>