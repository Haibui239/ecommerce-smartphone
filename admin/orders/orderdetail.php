<?php
if(isset($_POST['status'])){
    $connect->query("update finishorder set status=".$_POST['status']." where id=".$_GET
    ['id']);
    header("Refresh:0");
}
?>


<?php 
    $query="select a.fullName,a.mobile as'mobilemember',a.address as'addressmember',a.email as'emailmember',b.*,c.quantity,c.price,d.name as 'productname',d.images from customer a join finishorder b on a.id=b.userID join
    orderdetail c on b.id=c.orderId   join products d on c.productId =d.id where b.id=".$_GET['id'];
    $order=mysqli_fetch_array($connect->query($query));
    $ordermethod=mysqli_fetch_array($connect->query("select * from ordermethod where 
    id=".$order['orderMethodId']));
?>

<h1>Chi tiết đơn hàng<br><p style="font-size: 0.9rem; color:red;">(Mã đơn hàng:<?=$order['id']?>)</p></h1>
<h2>Thông tin người đặt hàng</h2>
<p>Ngày tạo đơn</p>
<span><?=$order['orderDate']?></span>
<table class="table">
    <tbody>
        <Tr>
            <td>Họ  tên</td>
            <td><?=$order['fullName']?></td>
        </Tr>
        <Tr>
            <td>Điện thoại</td>
            <td><?=$order['mobilemember']?></td>
        </Tr>
        <Tr>
            <td>Địa chỉ</td>
            <td><?=$order['addressmember']?></td>
        </Tr>
        <Tr>
            <td>Email</td>
            <td><?=$order['emailmember']?></td>
        </Tr>
    </tbody>
</table> 

<?php 
$query="select a.status,b.quantity,b.price,c.name,c.images from finishorder a join
orderdetail b on a.id=b.orderId  join products c on b.productId =c.id where a.id=".$order['id'];
$orderdetail=$connect->query($query);
?>
<form method="post">
    <h2>Các sản phẩm đặt mua</h2>
    <?php $count=1;?>
    <table class= "table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>    
        </thead>
    <tbody>
        <?php foreach($orderdetail as $item):?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$item['name']?></td>
                <td> <img src="../images-products/<?=$item['images']?>" width="20%"></td>
                <td><?=number_format($item['price'],0,',','.')?></td>
                <td><?=$item['quantity']?></td>
            </tr>
        <?php endforeach?>   
    </tbody>
    </table>
    <h2>Trạng thái đơn hàng</h2>
    <p style="display:<?=$order['status']==2||$order['status']==3?'none':''?>
    "><input type="radio" name="status" value="1" <?=$order['status']==1?'checked':''
    ?>>Chưa xử lý</p>
    <p style="display:<?=$order['status']==3?'none':''?>
    "><input type="radio"name="status" value="2"<?=$order['status']==2?'checked':''
    ?>>Đang xử lý</p>
    <p><input type="radio"name="status" value="3"<?=$order['status']==3?'checked':''
    ?>>Đã xử lý</p>
    <p style="display:<?=$order['status']==3?'none':''?>
    "><input type="radio"name="status" value="4"<?=$order['status']==4?'checked':''
    ?>>Hủy</p>
    <section><input <?=$order['status']==3?'disabled':''?>  type="submit" value="update đơn hàng" class="btn btn-primary"><a href ="?option=order&status=1" class="btn btn-outline-secondary">Back</a></section>
</form>