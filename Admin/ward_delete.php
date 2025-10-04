<?php
include("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["ward_id"])) {
  $ward_id=$_GET["ward_id"];

   $sql="select * from tbl_ward where ward_id=$ward_id";
  $res=$obj->executequery($sql);
  $display=mysqli_fetch_array($res);

  $sql="delete from tbl_ward where ward_id=$ward_id";
  $res=$obj->executequery($sql);
 
  }

  echo "<script>alert('Deleted Successfully!!');window.location='ward_view.php'</script>";

?>