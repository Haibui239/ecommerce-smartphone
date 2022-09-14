<?php
    $query="select * from products where status=1";
    $result=$connect->query($query);
?>
<?php include "product.php" ?>
