<?php
	if(isset($_POST["wardid"])) 
	{
		$wardid = $_POST["wardid"];

		// You can replace this code with a database query to retrieve the states for the selected country
		include_once("../dboperation.php");
        $sql="select * from tbl_collector where ward_id=$wardid";
        $obj=new dboperation();
        $result=$obj->executequery($sql);
        $s=1;
?>

<?php
while($row=mysqli_fetch_array($result))
{
?>

<tr>
        <td><?php echo $s++; ?></td>
        <td><?php echo $row["collector_name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["phone_no"]; ?></td>
        <td><?php echo $row["address"]; ?></td>
       <!-- <td><img src="../uploads///*<?php echo $row['product_image'];?>*/" alt="image" style="width:150px";></td> -->
        <td>
          <a href="itemcollector_edit.php?collector_id=<?php echo $row["collector_id"];?>" class="btn btn-primary">Edit</a>
          <a href="itemcollector_delete.php?collector_id=<?php echo $row["collector_id"];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Remove</a>
        </td>
      </tr>
      
      
      
      <?php
}
	}
?>

		
	

