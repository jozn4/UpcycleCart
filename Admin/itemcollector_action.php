<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST["submit"]))
{
$name=$_POST["name"];
$pass= $_POST["password"];
$user= $_POST["username"];
$ward = $_POST["ward"];
$contact=$_POST['contact'];
$email=$_POST['email'];
$address=$_POST['address'];

// $image=$_FILES["photo"]["name"];
// move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/".$image);
$sql="select * from tbl_collector where collector_name='$name' and  ward_id='$ward' ";
$result = $obj->executequery($sql);
if(mysqli_num_rows($result) >0)
{
   echo"<script>alert('Already exist!!');window.location='itemcollector.php'</script>";

} 
else {
$sqlquery = "insert into  tbl_collector (collector_name,email,phone_no,address,ward_id,username,password)values('$name','$email','$contact','$address','$ward','$user','$pass')";
           $res=$obj->executequery($sqlquery);
$sqlquery1 = "insert into  tbl_collectorlogin (username,password)values('$user','$pass')";
$exe=$obj->executequery($sqlquery1);

            if($res==1)
            {
         echo "<script>alert('Registeration succesfull'); window.location='itemcollector.php'</script>";

            }
      }
   
}
?>