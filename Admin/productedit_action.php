<?php
include("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
    $id=$_POST['product_id'];
    $product_name=$_POST['product'];
    $price=$_POST['price'];
    $coin=$_POST['coin'];
    $stock=$_POST['stock'];
    $category_id=$_POST['category'];
    $product_description=$_POST['description'];
    $product_image=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "../Uploads/".$product_image);
    if($product_image=='')
    {
    $sql1="UPDATE tbl_product set product_name='$product_name',product_description='$product_description',product_price='$price',product_stock='$stock',product_coin='$coin',category_id='$category_id' where product_id=$id";
    $result=$obj->executequery($sql1);
    }
    else{
        $sql="UPDATE tbl_product set  product_image='$product_image',product_name='$product_name',product_description='$product_description',product_price='$price',product_stock='$stock',product_coin='$coin',category_id='$category_id' where product_id=$id";
    $result=$obj->executequery($sql);
    }
    if ($result == 1){
     echo "<script>alert('Updated Succesfully');window.location='productview.php' </script>";
    }
    else{
     echo "<script>alert('Updation failed');window.location='productview.php' </script>";
    }
}
?>