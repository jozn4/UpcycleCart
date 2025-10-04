<?php
include('header.php');
 include_once("../dboperation.php");

$obj=new dboperation();
$sql="select * from tbl_category";
$res=$obj->executequery($sql);
?>

                <div class="card-body">
                  <form action="subcategory_action.php" method="POST" enctype="multipart/form-data">
                    
                  <div class="card" style="padding-top:150px">
    
        <div class="form-group">
          <label>Select Category</label>
          <select class="form-control" name="categoryid" id="categoryid">
            <option value="">--------Select Category-----------</option>
            <?php
            while ($r = mysqli_fetch_array($res)) 
            { ?>
              <option value="<?php echo $r["category_id"]; ?>">
                <?php echo $r["category_name"]; ?>
              </option>
            <?php } ?>


          </select>
        </div>

                    <div class="mb-3">
                      <label for="sub" class="form-label">Subcategory Name</label>
                      <input type="text" class="form-control" id="sub" name="sub" >
                    </div>
                    <div class="mb-3">
                      <label for="photo" class="form-label">Category Image</label>
                      <input type="file" class="form-control" id="photo" name="photo" >
                    </div>
                    <div class="mb-3">
                      <label for="coin" class="form-label">Coin</label>
                      <input type="text" class="form-control" id="coin" name="coin" >
                    </div>
                    <div class="mb-3">
                      <label for="quantity" class="form-label">Quantity</label>
                      <input type="text" class="form-control" id="quantity" name="quantity" >
                    </div>
                    <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
                  </form>
                </div>
              </div>
              <?php
include('footer.php');
?>
