<?php
session_start();
include("../dboperation.php");

$obj = new dboperation();

// Fetch all orders with customer name
$sql = "SELECT o.order_id, o.customer_id, c.customer_name AS customer_name, 
                o.total_quantity, 
               o.ordered_date, o.status
        FROM tbl_orders o
        INNER JOIN tbl_customer c ON o.customer_id = c.customer_id 
        ORDER BY o.order_id DESC";

$result = $obj->executequery($sql);

// Include header
include("header.php");
?>
<br><br><br><br><br><br>
<div class="container mt-4">
    <h2 class="mb-4">All Orders</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
              
                <th>Total Quantity</th>
                <th>Ordered Date</th>
                <th>Status</th>
                <th>Products</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['order_id']}</td>
                            <td>{$row['customer_name']}</td>
                          
                            <td>{$row['total_quantity']}</td>
                            <td>{$row['ordered_date']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <button class='btn btn-sm btn-primary' data-bs-toggle='collapse' data-bs-target='#products{$row['order_id']}'>
                                    View Products
                                </button>
                            </td>
                          </tr>";

                    // Fetch products for this order
                    $orderId = $row['order_id'];
                    $prod_sql = "SELECT p.product_name, d.quantity, d.price, d.coin 
                                 FROM tbl_order_details d
                                 INNER JOIN tbl_product p ON d.product_id = p.product_id
                                 WHERE d.order_id = '$orderId'";
                    $prod_res = $obj->executequery($prod_sql);

                    echo "<tr class='collapse bg-light' id='products{$row['order_id']}'>
                            <td colspan='8'>
                                <table class='table table-sm table-bordered'>
                                    <thead class='table-secondary'>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Coins</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                    if ($prod_res && mysqli_num_rows($prod_res) > 0) {
                        while ($prod = mysqli_fetch_assoc($prod_res)) {
                            echo "<tr>
                                    <td>{$prod['product_name']}</td>
                                    <td>{$prod['quantity']}</td>
                                    <td>{$prod['price']}</td>
                                    <td>{$prod['coin']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No products found</td></tr>";
                    }
                    echo "        </tbody>
                                </table>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No orders found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>
