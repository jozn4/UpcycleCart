<?php
include("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
    $id=$_POST['category_id'];
    $category_name=$_POST['category'];
    $category_description=$_POST['description'];
    $category_image=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "../Uploads/".$category_image);
    if($category_image=='')
    {
    $sql1="UPDATE tbl_category set category_name='$category_name',category_description='$category_description' where category_id=$id";
    $result=$obj->executequery($sql1);
    }
    else{
        $sql="UPDATE tbl_category set category_name='$category_name', category_image='$category_image',category_description='$category_description' where category_id=$id";
    $result=$obj->executequery($sql);
    }
    if ($result == 1){
     echo "<script>alert('Updated Succesfully');window.location='categoryview.php' </script>";
    }
    else{
     echo "<script>alert('Updation failed');window.location='categoryview.php' </script>";
    }
}
?>