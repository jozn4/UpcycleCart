


<?php
  include("header.php");
  ?>
	
</head>
<body>
   
        <?php
        include_once("../dboperation.php");
        $obj=new dboperation;
        $sql="select * from tbl_ward";
        $result=$obj->executequery($sql);
        ?>


<div class="col-md-6 grid-margin stretch-card" style="margin-top:120px";>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">View Ward</h4>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sl.No</th>
        <th>Ward Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
     
      <?php
      $s=1;
while($row=mysqli_fetch_array($result))
{
?>

<tr>
        <td><?php echo $s++; ?></td>
        <td><?php echo $row["ward_name"]; ?></td>
       
        <td>
          <a href="ward_edit.php?ward_id=<?php echo $row["ward_id"];?>" class="btn btn-primary">Edit</a>
          <a href="ward_delete.php?awrd_id=<?php echo $row["ward_id"];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
      </tr>
      
      
      
      <?php
}
  ?>
    </tbody>
  </table>




  </div>
  </div>
</body>
</html>


