<?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
            $connect->query("delete from orderdetail where orderId=$id");
            $connect->query("delete from finishorder where id =$id");
            header("location: ?option=order&$status=4");
        }?>
<?php
$status=$_GET['status']; 
    $query="select * from finishorder where status=$status";
    $result=$connect->query($query);
?>
<h1>Đơn hàng<br><?=$status==1?'Chưa xử lý':($status==2?'Đang xử lý':($status==3?'Đã xử lý':'Hủy'))?></h1> 
<table class="table brand-table">
    <thead>
        <tr>
            <th>STT<th>
            <th>Mã đơn hàng<th>  
            <th>Ngày tạo<th>
            <th>Sửa<th>
        </tr>
    <thread>
     <tbody>
    <?php $count=1;?>
    <?php foreach($result as $item):?>
       <tr>
            <td><?=$count++?></td>
            <td><?=$item['id']?></td>
            <td><?=$item['orderDate']?></td>
            <td><?=$item['status']==1?'kích hoạt':''?></td>
            <td><a class="btn btn-sm btn-info" href="?option=orderdetail&id=<?=$item['id']?>">Detail</a>
            <a style="display:<?=$status==4?'':'none'?>" href="?option=order&id=<?=$item['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">delete</a></td>
       </tr> 
        <?php endforeach ;?> 
     </tbody>   
</table>       