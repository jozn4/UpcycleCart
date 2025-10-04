<?php
include("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
    $id=$_POST['collector_id'];
    $name=$_POST['collector'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $ward_id=$_POST['ward'];
    $user=$_POST['username'];
    $pass=$_POST['password'];
    // $product_image=$_FILES["photo"]["name"];
    // move_uploaded_file($_FILES["photo"]["tmp_name"], "../Uploads/".$product_image);
    
    $sql1="UPDATE tbl_collector set collector_name='$name',email='$email',phone_no='$contact',address ='$address',ward_id='$ward_id',username='$user',password='$pass' where collector_id='$id'";
    $result=$obj->executequery($sql1);
   
    if ($result == 1){
     echo "<script>alert('Updated Succesfully');window.location='itemcollector_view.php' </script>";
    }
    else{
     echo "<script>alert('Updation failed');window.location='itemcollector_view.php' </script>";
    }
}
?>