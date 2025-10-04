<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
$username = $_POST["username"];
$password = $_POST["password"];


$sqlquery = "select * from tbl_adminlogin where username='$username' and password='$password'";
$result= $obj->executequery($sqlquery);
if (mysqli_num_rows($result) == 1) {
   $row = mysqli_fetch_array($result);
   $_SESSION["User_name"] = $username;
   $_SESSION["Login_id"] = $row["loginid"];


   header("location:..\Admin\index.php");
} else {
   $sqlquery = "select * from tbl_customer where username='$username' and password='$password'";
$result= $obj->executequery($sqlquery);
if (mysqli_num_rows($result) == 1) {
   $row = mysqli_fetch_array($result);
   $_SESSION["User_name"] = $username;
   $_SESSION["customer_id"] = $row["customer_id"];


   header("location:..\Customer\index.php");
}
else{
    $sqlquery = "select * from tbl_collector where username='$username' and password='$password'";
$result= $obj->executequery($sqlquery);
if (mysqli_num_rows($result) == 1) {
   $row = mysqli_fetch_array($result);
   $_SESSION["User_name"] = $username;
   $_SESSION["collector_id"] = $row["collector_id"];


   header("location:..\Collector\index.php");
}else{
         // Invalid login, display an error message
         echo "<script>alert('Invalid Username/Password!!'); window.location='login.php'</script>";
      }
   }
}

?>