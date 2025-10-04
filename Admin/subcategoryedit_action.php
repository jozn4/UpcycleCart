<?php
include("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
    $id=$_POST['subid'];
    $name=$_POST['subcategory'];
    $coin=$_POST['coin'];
    $quantity=$_POST['quantity'];
    $subcategory_image=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "../Uploads/".$subcategory_image);
    if($subcategory_image=='')
    {
    $sql1="UPDATE tbl_subcategory set subcategory_name='$name',coin='$coin',quantity='$quantity' where subcategory_id='$id'";
    $result=$obj->executequery($sql1);
    }
    else{
        $sql="UPDATE tbl_subcategory set subcategory_name='$name',coin='$coin',quantity='$quantity' subcategory_image='$subcategory_image' where subcategory_id='$id'";
    $result=$obj->executequery($sql);
    }
    if ($result == 1){
     echo "<script>alert('Updated Succesfully');window.location='subcategory_view.php' </script>";
    }
    else{
     echo "<script>alert('Updation failed');window.location='subcategory_view.php' </script>";
    }
}
?>