<?php
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $query="select*from categories where  categoryName='$name'";
    if(mysqli_num_rows($connect->query($query))!=0){
        $alert="Đã tồn tại tên hãng này!";
    }else{
        $status=$_POST['status'];
        $connect->query("insert categories(categoryName,status) values('$name','$status')");
        header("location: ?option=brand");
    }

}
?>
<h1>thêm hãng sản xuất</h1>
<section  style="color: red;font-weight: bold;text-align: center;"><?=isset($alert)?$alert:''?></section>
<section class="container col-md-6">
    <form method="Post">
        <section class="form-group">
           <lable> tên hãng:</lable><input name="name" class ="form-control"> 
        </section>              
        <section class ="form-group">
                <lable>Trạng thái hàng:</lable><br><input type="radio" name="status" value="1" checked> Mở 
                <input type="radio" name="status" value="0"> Tắt 
        </section>
        <section> <input type="submit" value="thêm" class="btn btn-primary">
        </section> 
        <a href ="?option=brand" class="btn btn-outline-secondary">&lt;&lt;Back</a></section> 
</section>