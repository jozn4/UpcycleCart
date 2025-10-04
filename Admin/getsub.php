<?php
	if(isset($_POST["categoryid"])) 
	{
		$categoryid = $_POST["categoryid"];

		// You can replace this code with a database query to retrieve the states for the selected country
		include_once("../dboperation.php");
        $sql="select * from tbl_subcategory where category_id=$categoryid";
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
        <td><?php echo $row["subcategory_name"]; ?></td>
        <td><?php echo $row["coin"]; ?></td>
        <td><?php echo $row["quantity"]; ?></td>
       <td><img src="../uploads/<?php echo $row['subcategory_image'];?>" alt="image" style="width:150px";></td>
        <td>
          <a href="subcategory_edit.php?subid=<?php echo $row["subcategory_id"];?>" class="btn btn-primary">Edit</a>
          <a href="subcategory_delete.php?subid=<?php echo $row["subcategory_id"];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
      </tr>
      
      
      
      <?php
}
	}
?>

		
	

