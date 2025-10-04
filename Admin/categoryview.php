<?php
include("header.php");
include("../dboperation.php");
$obj=new dboperation();

$s=1;
$sql="select * from tbl_category";
$result=$obj->executequery($sql);
?>
            <div class="col-12" style="margin-top:150px";>
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Category view</h4>
                      
                    </div>
                  </div>
                  <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                      <thead>
                       
                        <tr>
                          <th scope="col" class="px-0 text-muted">
                            Sl.no
                          </th>
                          <th scope="col" class="px-0 text-muted"> Category Name</th>
                          <th scope="col" class="px-0 text-muted ">
                            Description
                          </th>
                          <th scope="col" class="px-0 text-muted ">
                            Image
                          </th>
                          <th scope="col" class="px-0 text-muted ">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          while($display=mysqli_fetch_array($result))

                        {
                          ?>
                        <tr>
                          <td class="px-0"><?php echo $s++;?></td>
                          <td class="px-0"><?php echo $display["category_name"];?></td>
                          <td class="px-0"><?php echo $display["category_description"];?> </td>
                          <td class="px-0" ><img src="../uploads/<?php echo $display["category_image"];?>"alt="image" style="width:150px";> </td>
                          <td class="px-0">
                            <a href="category_edit.php?category_id=<?php echo $display["category_id"];?>"  class="btn btn-primary" onclick="return confirm('Are you sure to make changes')">Edit </a>

                            <a href="category_delete.php?category_id=<?php echo $display["category_id"];?>"  class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete </a>
                          </td>
                          
                        </tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <?php
include("footer.php");
?>
 