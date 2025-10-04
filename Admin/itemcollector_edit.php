<?php
include('header.php');
include("../dboperation.php");

$obj=new dboperation;

if(isset($_GET["collector_id"]))
{

    $id=$_GET["collector_id"];
    $sql="select * from tbl_collector where collector_id='$id'";
    $res=$obj->executequery($sql);
    $display=mysqli_fetch_array($res);
     $sqlward="select ward_id,ward_name from tbl_ward";
    $wardres=$obj->executequery($sqlward);
$sql1="select * from tbl_ward w inner join tbl_collector c on w.ward_id=c.ward_id where c.collector_id='$id'";
$wresult=$obj->executequery($sql1);
$wdisplay=mysqli_fetch_array($wresult);


}
?>

<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="itemcollectoredit_action.php" method="POST">
                    <div class="mb-3">
                      <label for="collector" class="form-label">Collector Name</label>
                      <input type="text" class="form-control" id="collector" name="collector" value="<?php echo $display["collector_name"];?> ">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $display["email"];?> ">
                    </div>
                    <div class="mb-3">
                      <label for="contact" class="form-label">Contact</label>
                      <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $display["phone_no"];?> ">
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <textarea name="address"  class="form-control" id="address"><?php echo $display["address"];?> </textarea> 
                    </div>
                    
                    <div class="mb-3">
                            <label for="ward">Choose Muncipal Ward:</label>
                <select class="form-select" name="ward" >
                    <option value=""><?php echo $wdisplay['ward_name'];?></option>
                    <?php while ($ward= mysqli_fetch_assoc($wardres)) { ?>
                        <option value=" <?php echo $ward['ward_id']; ?>">
                          <?php echo $ward['ward_name']; ?>
                        </option>
                    <?php } ?>
                </select>
                    </div>
                    

                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username" value="<?php echo $display["username"];?> ">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="text" class="form-control" id="password" name="password" value="<?php echo $display["password"];?> ">
                    </div>
                
                    <input type="hidden" name="collector_id"  value="<?php echo $display["collector_id"];?>">
                    <button type="submit" class="btn btn-primary" name='submit'>Update</button>
                  </form>
                </div>
              </div>
              <?php
include('footer.php');
?>
