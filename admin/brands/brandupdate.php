<?php $brand=mysqli_fetch_array($connect->query("select * from categories where
id=" .$_GET['id']));?>

<?php
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $query="select*from categories where  categoryName='$name' and id!=" .$brand['id'];
    if(mysqli_num_rows($connect->query($query))!=0){
        $alert="Đã tồn tại tên hãng này!";
    }else{
        $status=$_POST['status'];
        $connect->query("update categories set categoryName='$name',status='$status' where id=".$brand['id'] );
        header("location: ?option=brand");
    }

}
?>  
<h1>Update hãng sản xuất</h1>
<section  style="color: red;font-weight: bold;text-align: center;"><?=isset($alert)?$alert:''?></section>
<section class="container col-md-6">
    <form method="Post">
        <section class="form-group">
           <lable>Tên hãng:</lable><input value="<?=$brand['categoryName']?> "name="name" class ="form-control"> 
        </section>              
        <section class ="form-group">
                <lable>Trạng thái hàng:</lable><br><input type="radio" name="status" value="1"<?=$brand['status']==1?'checked':''?>> Mở 
                <input type="radio" name="status" value="0"<?=$brand['status']==0?'checked':''?>> Tắt 
        </section>
        <section> <input type="submit" value="Update" class="btn btn-primary">
        <a href ="?option=brand" class="btn btn-outline-secondary">Back</a></section> 

</section>