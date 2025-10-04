<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST["submit"]))
{
$category_id=$_POST["category"];
$product= $_POST["product"];
$description = $_POST["description"];
$price = $_POST["price"];
$stock = $_POST["stock"];
$coin=$_POST['coin'];
$image=$_FILES["photo"]["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/".$image);

$sql="select * from tbl_product where product_name='$product' and category_id='$category_id'";
$result = $obj->executequery($sql);
if(mysqli_num_rows($result) >0)
{
   echo"<script>alert('Already exist!!');window.location='product.php'</script>";

} 
else {
$sqlquery = "insert into  tbl_product (category_id,product_name,product_description,product_image,product_price,product_stock,product_coin)values('$category_id','$product','$description','$image','$price','$stock','$coin')";
           $res=$obj->executequery($sqlquery);
            if($res==1)
            {
         echo "<script>alert('Insertion succesfull'); window.location='product.php'</script>";

            }
      }
   
}
?>