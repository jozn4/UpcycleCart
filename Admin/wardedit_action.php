<?php
include("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
    $id=$_POST['ward_id'];
    $ward_name=$_POST[''];

        $sql="UPDATE tbl_ward set ward_name='$ward_name' where ward_id=$id";
    $result=$obj->executequery($sql);
    if ($result == 1){
     echo "<script>alert('Updated Succesfully');window.location='ward_view.php' </script>";
    }
    else{
     echo "<script>alert('Updation failed');window.location='ward_view.php' </script>";
    }
}
?>
