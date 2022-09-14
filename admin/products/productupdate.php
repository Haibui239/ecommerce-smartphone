<?php $product=mysqli_fetch_array($connect->query("select * from products where id=".$_GET['id'])); ?>





<?php
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $query="select*from products where name='$name' and id!=".$product['id'];
    if(mysqli_num_rows($connect->query($query))!=0){
        $alert="Đã có sản phẩm khác có tên này!";
    }else{
        $brandid=$_POST['categorieID'];
        $price=$_POST['sale_price'];
        $description=$_POST['description'];
        $status=$_POST['status'];
        // xử lý phần ảnh
       $store="../images-products/";
       $imageName=$_FILES['images']['name'];
       $imageTemp=$_FILES['images']['tmp_name'];
        $exp3=substr($imageName, strlen($imageName)-3);#abcd.jpg, ABCD1234.jpg
        $exp4=substr($imageName, strlen($imageName)-4);#jepg,webp,.... 
            if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp3=='JPG'||$exp3==
            'PNG'||$exp3=='BMP'||$exp3=='GIF'||$exp4=='jepg'||$exp4=='JPEG'||$exp4=='webp'
            ||$exp4=='WEBP'){
                $imageName=time().'_'.$imageName;
               move_uploaded_file($imageTemp,$store.$imageName);
               unlink($store.$product['images']);
            }else{
                $alert="file đã chọn không phải file ảnh!";
            }
            if(empty($imageName)){
                $imageName=$product['images'];
            }    
        $connect->query("update products set categorieID='$brandid',name='$name'
        ,sale_price='$price',images='$imageName',description='$description',status='$status' 
        where id=".$product['id']);
        header("location: ?option=product");
        unset($_SESSION['alert']);
    }
}

?>
<?php $brand=$connect->query("select * from categories");?>
<h1>Update Sản Phẩm</h1>
<section  style="color: red;font-weight: bold;text-align: center;"><?=isset($alert)?$alert:''?></section>
<section class="container col-md-6">
    <form method="post" enctype="multipart/form-data">
        <section class="form-group">
            <lable>Hãng</lable>
            <select name="categorieID" class="form-control">
                <option hidden>--Chọn Hãng--</option>
               <?php foreach ($brand as $item):?>
                <option value="<?=$item['id']?>"<?=$item['id']==$product['categorieID']?'
                selected':''?>><?=$item['categoryName']?></option>
                <?php endforeach?>
            </select>
           <lable>Tên :</lable><input name="name" class ="form-control" required value="<?=$product['name']?>"> 
        <section>    
            <lable> Giá:</lable><input name="sale_price" class ="form-control"value="<?=$product['sale_price']?>" > 
        </section>  
        <section>
           <lable> Ảnh:</lable><br>
           <img src="../images-products/<?=$product['images']?>" width="70%">
           <input type="file" name="images" class ="form-control"> 
        </section>      
        <section>
           <lable>Mô tả:</lable>
        <textarea name="description" id="description"><?=$product['description']?></textarea>
        <script>CKEDITOR.replace("description");</script>
        </section>      
        <section class ="form-group">
                <lable>Trạng thái:</lable><br><input type="radio" name="status" value="1"<?=$product['status']==1?'checked':''?>>Mở 
                <input type="radio" name="status" value="0"<?=$product['status']==0?'checked':''?>> Tắt 
        </section>
        <section> <input type="submit" value="Update" class="btn btn-primary"></section> 
        <section><a href ="?option=product" class="btn btn-outline-secondary">Back</a></section> 
    </form>
</section>  