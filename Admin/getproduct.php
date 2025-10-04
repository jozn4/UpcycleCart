<?php
	if(isset($_POST["categoryid"])) 
	{
		$categoryid = $_POST["categoryid"];

		// You can replace this code with a database query to retrieve the states for the selected country
		include_once("../dboperation.php");
        $sql="select * from tbl_product where category_id=$categoryid";
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
        <td><?php echo $row["product_name"]; ?></td>
        <td><?php echo $row["product_description"]; ?></td>
        <td><?php echo $row["product_price"]; ?></td>
        <td><?php echo $row["product_coin"]; ?></td>
        <td><?php echo $row["product_stock"]; ?></td>
       <td><img src="../uploads/<?php echo $row['product_image'];?>" alt="image" style="width:150px";></td>
        <td>
          <a href="product_edit.php?productid=<?php echo $row["product_id"];?>" class="btn btn-primary">Edit</a>
          <a href="product_delete.php?productid=<?php echo $row["product_id"];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
      </tr>
      
      
      
      <?php
}
	}
?>

		
	

