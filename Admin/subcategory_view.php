


<?php
  include("header.php");
  ?>
	<script src="../jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
            //alert("a")
			$("#categoryid").change(function() {
               // alert("a")
				var category_id = $(this).val();

                // alert(category_id)

                
				$.ajax({
					url: "getsub.php",
					method: "POST",
					data: { categoryid: category_id },
					success: function(response) 
                    {
						$("#subid").html(response);
					},
					error: function() 
                    {
						$("#subid").html("Error occurred while getting location!");
					}
				});
			});
		});
	</script>

   
        <?php
        include_once("../dboperation.php");
        $sql="select * from tbl_category";
        $obj=new dboperation();
        $result=$obj->executequery($sql);
        ?>


<div class="col-md-6 grid-margin stretch-card" style="margin-top:120px";>
  <div class="card">
    <div class="card-body" style ="width:100%";>
      <h4 class="card-title">View Subcategory</h4>
     
        
      <div class="form-group">
          <label>Select Category</label>
          <select class="form-control" name="categoryid" id="categoryid">
            <option value="">--------Select Category-----------</option>
            <?php
            while ($r = mysqli_fetch_array($result)) 
            { ?>
              <option value="<?php echo $r["category_id"]; ?>">
                <?php echo $r["category_name"]; ?>
              </option>
            <?php } ?>


          </select>
        </div>
      
   

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sl.No</th>
        <th>Subcategory Name</th>
        <th>Coin</th>
        <th>Quantity</th>
        <th>Image</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="subid">
     
      
     
    </tbody>
  </table>




  </div>
  </div>
<?php
  include("footer.php");
  ?>

