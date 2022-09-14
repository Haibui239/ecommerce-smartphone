<?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $products=$connect->query("select*from orderdetail where productid=$id");
        if(mysqli_num_rows($products)!=0){
            $connect->query("update products set status=0 where id=$id");
        }else{
            $connect->query("delete from products where id=$id");
            
        }

    }

?>
<?php 
    $query="select * from products";
    $result=$connect->query($query);
?>
<h1>Danh sách sản phẩm</h1>
<div class="overflow-auto">
<table class="table brand-table">
    <thead>
        <tr>
            <th>STT<th>
            <th>Mã <th>  
            <th>Tên<th>
            <th>Giá<th>
            <th>Ảnh<th>
            <th>Trạng thái<th>
            <th>Sửa<th>
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
            <td><?=$item['name']?></td>
            <td></td>
            <td><?=number_format($item['sale_price'],0,'0','.')?></td>
            <td></td>
            <td width="30%"><img src="../images-products/<?=$item['images']?>"width ="20%" class="product-image"></td>
            <td></td>
            <td><?=$item['status']==1?'<p style="color: green;">Kích hoạt</p>':'<p style="color: red;">Ngưng kích hoạt</p>'?></td>
            <td></td>
            <td><a class="btn btn-sm btn-info btn-product" href="?option=productupdate&id=<?=$item['id']?>">Update</a>
            <a href="?option=product&id=<?=$item['id']?>" class="btn btn-sm btn-danger btn-product" onclick="return confirm('Are you sure?')">Delete</a></td>
       </tr> 
        <?php endforeach ;?> 
     </tbody>   
</table>   
</div> 
<section style="text-align: center;" class="add-btn"><a href="?option=productadd" class ="btn btn-success">Thêm sản phẩm</a></section>   