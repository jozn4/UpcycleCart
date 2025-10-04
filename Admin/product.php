<?php
include('header.php');
include("../dboperation.php");

$obj=new dboperation;
    $sql="select category_id,category_name from tbl_category ";
    $res=$obj->executequery($sql);
    
    
?>


<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="productaction.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                            <label for="dropdown">Choose Category:</label>
                <select class="form-select" name="category" required>
                    <option value="">Select Category</option>
                    <?php while ($category= mysqli_fetch_assoc($res)) { ?>
                        <option value=" <?php echo $category['category_id']; ?>">
                          <?php echo $category['category_name']; ?>
                        </option>
                    <?php } ?>
                </select>
                    </div>

                     <div class="mb-3">
                       <label for="product" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="product" name="product" > 
                    </div>


                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea name="description"  class="form-control" id="description"></textarea> 
                    </div>

                    <div class="mb-3">
                      <label for="photo" class="form-label">Product Image</label>
                      <input type="file" class="form-control" id="photo" name="photo" >
                    </div>

                    <div class="mb-3">
                       <label for="price" class="form-label">Product Price</label>
                      <input type="text" class="form-control" id="price" name="price" > 
                    </div>
                    <div class="mb-3">
                       <label for="stock" class="form-label">Product Coin</label>
                      <input type="text" class="form-control" id="coin" name="coin" > 
                    </div>

                    <div class="mb-3">
                       <label for="stock" class="form-label">Product Stock</label>
                      <input type="text" class="form-control" id="stock" name="stock" > 
                    </div>
                    <button type="submit" class="btn btn-primary" name='submit'>Enter</button>
                  </form>
                </div>
              </div>
              <?php
include('footer.php');
?>
