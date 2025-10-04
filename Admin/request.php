<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();


$s = 1;
$sql1 = "SELECT *
FROM tbl_customer c INNER JOIN tbl_request r ON c.customer_id = r.customer_id INNER JOIN tbl_ward w ON c.ward_id = w.ward_id INNER JOIN tbl_subcategory s ON r.subcategory_id = s.subcategory_id INNER JOIN tbl_category ca ON r.category_id = ca.category_id";
$r1 = $obj->executequery($sql1);
?>
<div class="col-12" style="margin-top:150px" ;>
  <div class="card">
    <div class="card-body">
      <div class="d-md-flex align-items-center">
        <div>
          <h4 class="card-title">Item Collection Request view</h4>

        </div>
      </div>
      <div class="table-responsive mt-4">
        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
          <thead>

            <tr>
              <th scope="col" class="px-0 text-muted">
                Sl.no
              </th>
              <th scope="col" class="px-0 text-muted"> Customer Name</th>
              <th scope="col" class="px-0 text-muted ">Address</th>
              <th scope="col" class="px-0 text-muted ">Ward </th>
              <th scope="col" class="px-0 text-muted ">Category</th>
              <th scope="col" class="px-0 text-muted ">Sub Category</th>
              <th scope="col" class="px-0 text-muted ">Item Quantity</th>
              <th scope="col" class="px-0 text-muted ">Request Date</th>
              <th scope="col" class="px-0 text-muted ">Status</th>

            </tr>
          </thead>
          <tbody>
            <?php
            while ($display = mysqli_fetch_array($r1)) {
              ?>
              <tr>

                <td class="px-1"><?php echo $s++; ?></td>
                <td class="px-0"><?php echo $display["customer_name"]; ?></td>
                <td class="px-0"><?php echo $display["address"]; ?></td>
                <td class="px-0"><?php echo $display["ward_name"]; ?></td>
                <td class="px-0"><?php echo $display["category_name"]; ?></td>
                <td class="px-0"><?php echo $display["subcategory_name"]; ?></td>
                <td class="px-0"><?php echo $display["item_quantity"]; ?></td>
                <td class="px-0"><?php echo $display["request_date"]; ?></td>
                <td class="px-0"><a
                    href="request_action.php?request_id=<?php echo $display["request_id"]; ?>&ward_id=<?php echo $display["ward_id"]; ?>"
                    class="btn btn-primary" onclick="return confirm('Assign Collector')"><?php echo $display["status"];?></a>
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