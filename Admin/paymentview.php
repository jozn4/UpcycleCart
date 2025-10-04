<?php
session_start();
include("../dboperation.php");

$obj = new dboperation();

// Fetch all payments with customer + order info
$sql = "SELECT p.payment_id, p.order_id, p.total_amount, p.total_coin, 
               p.payment_date, p.status AS 
               payment_method,
               o.customer_id, c.customer_name, o.total_quantity
        FROM tbl_payment p
        INNER JOIN tbl_orders o ON p.order_id = o.order_id
        INNER JOIN tbl_customer c ON o.customer_id = c.customer_id
        ORDER BY p.payment_id DESC";

$result = $obj->executequery($sql);

// Include header
include("header.php");
?>
<br><br><br><br><br><br>
<div class="container mt-4">
    <h2 class="mb-4">All Payments</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Payment ID</th>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Paid Amount</th>
                <th>Payment Method</th>
                <th>Payment Date</th>
                <th>Total Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    // Decide paid amount
                    if ($row['payment_method'] == 'Card') {
                        $paidAmount = "₹" . ($row['total_amount'] ?? 0);
                    } elseif ($row['payment_method'] == 'E-coin') {
                        $paidAmount = ($row['total_coin'] ?? 0) . " Coins";
                    } else {
                        $paidAmount = "N/A";
                    }

                    echo "<tr>
                            <td>{$row['payment_id']}</td>
                            <td>{$row['order_id']}</td>
                            <td>{$row['customer_name']}</td>
                            <td>$paidAmount</td>
                            <td>{$row['payment_method']}</td>
                            <td>{$row['payment_date']}</td>
                            <td>{$row['total_quantity']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>No payments found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>
