<?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $products=$connect->query("select*from products where categorieID=$id");
        if(mysqli_num_rows($products)!=0){
            $connect->query("update categories set status=0 where id=$id");
        }else{
            $connect->query("delete from categories where id=$id");
        }

    }

?>
<?php 
    $query="select * from categories";
    $result=$connect->query($query);
?>
<h1>Hãng sản xuất</h1>
<table class="table brand-table">
    <thead>
        <tr>
            <th>STT<th>
            <th>Mã hãng<th>  
            <th>Tên hãng<th>
            <th>Trạng thái hãng<th>
            <th>Chỉnh sửa<th>
        </tr>
    <thread>
     <tbody>
    <?php $count=1;?>
    <?php foreach($result as $item):?>
       <tr>
            <td><?=$count++?></td>
            <td></td>
            <td><?=$item['id']?></td>
            <td></td>
            <td><?=$item['categoryName']?></td>
            <td></td>
            <td><?=$item['status']==1?'<p style="color: green;">Kích hoạt</p>':'<p style="color: red;">Ngưng kích hoạt</p>'?></td>
            <td></td>
            <td><a class="btn btn-sm btn-info" href="?option=brandupdate&id=<?=$item['id']?>">Update</a>
            <a href="?option=brand&id=<?=$item['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
       </tr> 
        <?php endforeach ;?> 
     </tbody>   
</table>       
<section style="text-align: center;" class="add-btn"><a href="?option=brandadd" class ="btn btn-success">Thêm hãng</a></section>