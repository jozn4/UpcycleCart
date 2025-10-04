<?php
include('header.php');
?>

<script src="../jquery-3.6.0.min.js"></script>
	<script>
		
        $(document).ready(function() {
            //alert("a")
			$("#wardid").change(function() {
               // alert("a")
				var ward_id = $(this).val();

                //  alert(location_id)

                
				$.ajax({
					url: "getcollector_details.php",
					method: "POST",
					data: { wardid: ward_id},
					success: function(response) 
                    {
						$("#collector").html(response);
					},
					error: function() 
                    {
						$("#collector").html("Error occurred while getting location!");
					}
				});
               
			});
		});
	</script>

<?php
include("../dboperation.php");

$obj=new dboperation;
    $sql="select ward_id,ward_name from tbl_ward";
    $res=$obj->executequery($sql);
    
?>


<div class="card" style="padding-top:150px">
                <div class="card-body">
                     
                    <div class="mb-3">
                            <label for="wardid">Select Muncipal Ward:</label>
                <select class="form-select" name="wardid" id="wardid" onchange="this.form.submit()">
                    <option value="">Select</option>
                   <?php while ($ward= mysqli_fetch_assoc($res)) { ?>
                        <option value=" <?php echo $ward['ward_id']; ?>">
                          <?php echo $ward['ward_name']; ?>
                        </option>
                    <?php } ?>
                </select>
                    </div>

                    

<table class="table table-striped">
    <thead>
      <tr>
        <th>Sl.No</th>
        <th>Item Collector Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <!-- <th>Image</th> -->
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="collector">
     
      
     
    </tbody>
  </table>
                    
                </div>
              </div>
              <?php
include('footer.php');
?>
