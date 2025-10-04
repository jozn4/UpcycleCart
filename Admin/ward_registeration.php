<?php
include('header.php');
include("../dboperation.php");

$obj=new dboperation;
    
    
?>

<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="wardaction.php" method="POST" >
                    <div class="mb-3">
                      <label  class="form-label">Muncipality Name</label>
                      <h2><b>THODUPUZHA</b></h2>
                    </div>
                    <div class="mb-3">
                      <label for="ward" class="form-label">Ward</label>
                      <input type="text" id="ward" name="ward" placeholder="Enter ward name"> 
                    </div>
                    <button type="submit" class="btn btn-primary" name='submit'>Register</button>
                  </form>
                </div>
              </div>
              <?php
include('footer.php');
?>
