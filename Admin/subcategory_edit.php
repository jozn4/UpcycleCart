<?php
include('header.php');
include("../dboperation.php");

$obj=new dboperation;

if(isset($_GET["subid"]))
{
    $id=$_GET["subid"];
    $sql="select * from tbl_subcategory where subcategory_id='$id'";
    $res=$obj->executequery($sql);
    $display=mysqli_fetch_array($res);
    $sqlquery="select * from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id where s.subcategory_id='$id'";
    $r=$obj->executequery($sqlquery);
    $catdisplay=mysqli_fetch_array($r);
}
?>

<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="subcategoryedit_action.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="category" class="form-label">Category Name</label>
                      <h2 name="category"><?php echo $catdisplay["category_name"];?> <h2>
                    </div>
                    <div class="mb-3">
                      <label for="subcategory" class="form-label">Subcategory Name</label>
                      <input type="text" class="form-control" id="subcategory" name="subcategory" value="<?php echo $display["subcategory_name"];?> ">
                    </div>
                    <div class="mb-3">
                      <label for="coin" class="form-label">Coin</label>
                      <input type="text" class="form-control" id="coin" name="coin" value="<?php echo $display["coin"];?> ">
                    </div>
                    <div class="mb-3">
                      <label for="coin" class="form-label">Quantity</label>
                      <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $display["quantity"];?> ">
                    </div>
                    <div class="mb-3">
                      <label for="photo" class="form-label">Subcategory Image</label><br>
                      <img src="../uploads/<?php echo $display["subcategory_image"];?>" alt="image" style="width:120px;">
                      <input type="file" class="form-control" id="photo" name="photo" style="margin-top:5px";>
                    </div>
                    
                    <input type="hidden" name="subid"  value="<?php echo $display["subcategory_id"];?>">
                    <button type="submit" class="btn btn-primary" name='submit'>Update</button>
                  </form>
                </div>
              </div>
              <?php
include('footer.php');
?>
