<?php
include('header.php');
include("../dboperation.php");

$obj=new dboperation;

if(isset($_GET["ward_id"]))
{
    $ward_id=$_GET["ward_id"];
    $sql="select * from tbl_ward where ward_id='$ward_id'";
    $res=$obj->executequery($sql);
    $display=mysqli_fetch_array($res);
    }
?>

<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="wardedit_action.php" method="POST" >
                    <div class="mb-3">
                      <label for="ward" class="form-label">Ward Name</label>
                      <input type="text" class="form-control" id="ward" name="ward" value="<?php echo $display["ward_name"];?> ">
                    </div>
                     
                    <input type="hidden" name="ward_id"  value="<?php echo $display["ward_id"];?>">
                    <button type="submit" class="btn btn-primary" name='submit'>Update</button>
                  </form>
                </div>
              </div>
              <?php
include('footer.php');
?>
