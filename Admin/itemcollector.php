<?php
include('header.php');
?>


<?php
include("../dboperation.php");

$obj = new dboperation;
$sql = "select ward_id,ward_name from tbl_ward";
$res = $obj->executequery($sql);

?>


<div class="card" style="padding-top:150px">
  <div class="card-body">
    <form action="itemcollector_action.php" method="POST">

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="mb-3">
        <label for="contact" class="form-label">Contacct No:</label>
        <input type="text" class="form-control" id="contact" name="contact">
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea name="address" class="form-control" id="address"></textarea>
      </div>

      <div class="mb-3">
        <label for="ward">Select Muncipal Ward:</label>
        <select class="form-select" name="ward">
          <option value="">Select</option>
          <?php while ($ward = mysqli_fetch_assoc($res)) { ?>
            <option value=" <?php echo $ward['ward_id']; ?>">
              <?php echo $ward['ward_name']; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" id="password" name="password">
      </div>
      <button type="submit" class="btn btn-primary" name='submit'>Register</button>
    </form>
  </div>
</div>
<?php
include('footer.php');
?>