<?php
include('header.php');
?>

<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="categoryaction.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="category" class="form-label">Category Name</label>
                      <input type="text" class="form-control" id="category" name="category" >
                    </div>
                    <div class="mb-3">
                      <label for="photo" class="form-label">Category Image</label>
                      <input type="file" class="form-control" id="photo" name="photo" >
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea name="description"  class="form-control" id="description"></textarea> 
                    </div>
                    <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
                  </form>
                </div>
              </div>
              <?php
include('footer.php');
?>
