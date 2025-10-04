<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST["submit"]))
{
$subcategory= $_POST["sub"];
$image=$_FILES["photo"]["name"];
$coin= $_POST["coin"];
$quantity= $_POST["quantity"];
$c=$_POST["categoryid"];

move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/".$image);
$sql="select*from tbl_subcategory where subcategory_name='$subcategory' and category_id='$c'";
$result= $obj->executequery($sql);
$sqlquery = "insert into  tbl_subcategory (subcategory_name,subcategory_image,coin,quantity,category_id)values('$subcategory','$image','$coin','$quantity','$c')";
if (mysqli_num_rows($result) >0)
{
   echo"<script>alert('Already exist!!');window.location='category.php'</script>";

} else {
           $res=$obj->executequery($sqlquery);
            if($res==1)
            {
         echo "<script>alert('Insertion succesfull'); window.location='subcategory.php'</script>";

            }
      }
   
}
?>