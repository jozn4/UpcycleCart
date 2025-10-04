<?php
include('header.php');
include("../dboperation.php");

$obj=new dboperation;

if(isset($_GET["productid"]))
{

    $product_id=$_GET["product_id"];
    $sql="select * from tbl_product where product_id='$product_id'";
    $res=$obj->executequery($sql);
    $display=mysqli_fetch_array($res);
     $sqlquery="select category_id,category_name from tbl_category ";
    $catres=$obj->executequery($sqlquery);
$sqlquery="select * from tbl_category c inner join tbl_product p on c.category_id=p.category_id where p.product_id='$product_id'";
$catresult=$obj->executequery($sqlquery);
$catdisplay=mysqli_fetch_array($catresult);

}
?>

<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="productedit_action.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="product" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="product" name="product" value="<?php echo $display["product_name"];?> ">
                    </div>
                    <div class="mb-3">
                            <label for="dropdown">Choose Category:</label>
                <select class="form-select" name="category" required>
                    <option value=""><?php echo $catdisplay['category_name'];?></option>
                    <?php while ($category= mysqli_fetch_assoc($catres)) { ?>
                        <option value=" <?php echo $category['category_id']; ?>">
                          <?php echo $category['category_name']; ?>
                        </option>
                    <?php } ?>
                </select>
                    </div>

                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea name="description"  class="form-control" id="description"><?php echo $display["product_description"];?> </textarea> 
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="text" class="form-control" id="price" name="price" value="<?php echo $display["product_price"];?> ">
                    </div>
                    <div class="mb-3">
                      <label for="coin" class="form-label">Coin</label>
                      <input type="text" class="form-control" id="coin" name="coin" value="<?php echo $display["product_coin"];?> ">
                    </div>
                    <div class="mb-3">
                      <label for="stock" class="form-label">Stock</label>
                      <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $display["product_stock"];?> ">
                    </div>
                    <div class="mb-3">
                      <label for="photo" class="form-label">Product Image</label><br>
                      <img src="../uploads/<?php echo $display["product_image"];?>" alt="image" style="width:120px;">
                      <input type="file" class="form-control" id="photo" name="photo" style="margin-top:5px";>
                    </div>
                    
                    <input type="hidden" name="product_id"  value="<?php echo $display["product_id"];?>">
                    <button type="submit" class="btn btn-primary" name='submit'>Update</button>
                  </form>
                </div>
              </div>
              <?php
include('footer.php');
?>
