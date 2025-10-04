<?php
include("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["subid"])) {
  $id=$_GET["subid"];

   $sql="select * from tbl_subcategory where subcategory_id=$id";
  $res=$obj->executequery($sql);
  $display=mysqli_fetch_array($res);


  // Store the image filenames in an array
  $imageFiles = ["../uploads/" . $display["subcategory_image"]];


   // Delete each image file from the array
  foreach ($imageFiles as $file) 
  {
    if (file_exists($file)) {
        unlink($file);
    }
  }
  
  $sql="delete from tbl_subcategory where subcategory_id=$id";
  $res=$obj->executequery($sql);
 
  
  }

//   echo "<script>alert('Deleted Successfully!!');window.location='subcategory_view.php'</script>";

?>