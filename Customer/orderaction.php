<?php
include("../dboperation.php");
session_start();

$obj = new dboperation;

if(isset($_POST['order'])) {
    $cus_id         = $_SESSION['customer_id'];
    $total_quantity = $_POST['total_quantity'];
    $total_price    = $_POST['total_price'];
    $total_coin     = $_POST['total_coin'];
    $order_date     = date('Y-m-d');
    $status         = "Ordered";

    // Insert into tbl_orders
    $sql = "INSERT INTO tbl_orders 
            (customer_id, total_amount, total_coin, total_quantity, ordered_date, status) 
            VALUES ('$cus_id','$total_price','$total_coin','$total_quantity','$order_date','$status')";
    $res = $obj->executequery($sql);

    if($res){
        // Get last inserted order_id
        $order_id = mysqli_insert_id($obj->con);

        // Fetch cart items of this customer
        $cart_sql = "SELECT product_id, quantity FROM tbl_cart WHERE customer_id='$cus_id'";
        $cart_result = $obj->executequery($cart_sql);

        while($row = mysqli_fetch_assoc($cart_result)){
            $pid  = $row['product_id'];
            $qty  = $row['quantity'];

            // Get product details
            $prod_sql = "SELECT product_price, product_coin FROM tbl_product WHERE product_id='$pid'";
            $prod_res = $obj->executequery($prod_sql);
            $prod = mysqli_fetch_assoc($prod_res);

            $price = $prod['product_price'];
            $coin  = $prod['product_coin'];

            // Insert into tbl_order_details
            $detail_sql = "INSERT INTO tbl_order_details (order_id, product_id, quantity,price,coin)
                           VALUES ('$order_id','$pid','$qty','$price','$coin')";
            $obj->executequery($detail_sql);
        }

        // Clear cart after order
        $obj->executequery("DELETE FROM tbl_cart WHERE customer_id='$cus_id'");

        // Store totals in session for payment page
        $_SESSION['total_amount']   = $total_price;
        $_SESSION['total_coin']     = $total_coin;
        $_SESSION['total_quantity'] = $total_quantity;

        echo "<script>
                alert('Order placed successfully');
                window.location='payment.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to place order');
                window.location='cart.php';
              </script>";
    }
}
?>
