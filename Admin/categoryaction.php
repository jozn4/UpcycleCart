<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST["submit"]))
{
$category= $_POST["category"];
$description = $_POST["description"];
$image=$_FILES["photo"]["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/".$image);
$sql="select*from tbl_category where category_name='$category'";
$result= $obj->executequery($sql);
$sqlquery = "insert into  tbl_category (category_name,category_description,category_image)values('$category','$description','$image')";
if (mysqli_num_rows($result) >0)
{
   echo"<script>alert('Already exist!!');window.location='category.php'</script>";

} else {
           $res=$obj->executequery($sqlquery);
            if($res==1)
            {
         echo "<script>alert('Insertion succesfull'); window.location='category.php'</script>";

            }
      }
   
}
?>