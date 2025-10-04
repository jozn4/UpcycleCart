<?php
include("header.php");
$id = $_SESSION["customer_id"];
$s=1;
$sql = "SELECT r.request_id, r.item_quantity, r.coin AS request_coin, r.request_date, 
               r.collection_date, r.status,
               c.category_name, 
               s.subcategory_name, 
               co.collector_name
        FROM tbl_request r
        INNER JOIN tbl_category c ON r.category_id = c.category_id
        INNER JOIN tbl_collector co ON r.collector_id = co.collector_id
        INNER JOIN tbl_subcategory s ON r.subcategory_id = s.subcategory_id
        WHERE r.customer_id='$id'";
$result=$obj->executequery($sql);

?>
            <div class="col-12" style="margin-top:150px";>
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Request Status</h4>
                    </div>
                  </div>
                  <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                      <thead>
                        <tr>
                          <th scope="col" class="px-0 text-muted">
                            Sl.no
                          </th>
                          <th scope="col" class="px-0 text-muted">Category</th>
                          <th scope="col" class="px-0 text-muted ">
                            Subcategory
                          </th>
                          <th scope="col" class="px-0 text-muted ">
                            Requested date
                          </th>
                          <th scope="col" class="px-0 text-muted ">
                            Collection date
                          </th>
                          <th scope="col" class="px-0 text-muted ">
                            Collector Name
                          </th>
                          <th scope="col" class="px-0 text-muted ">
                            Coin
                          </th>
                          <th scope="col" class="px-0 text-muted ">
                            Status
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
                          <td class="px-0"><?php echo $display["subcategory_name"];?> </td>
                          <td class="px-0"><?php echo $display["request_date"];?></td>
                          <td class="px-0"><?php echo $display["collection_date"];?> </td>
                          <td class="px-0"><?php echo $display["collector_name"];?></td>
                          <td class="px-0"><?php echo $display["request_coin"];?> </td>
                          <td class="px-0"><?php echo $display["status"];?> </td>
                          
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
 