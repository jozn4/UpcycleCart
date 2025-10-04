<?php
include("../dboperation.php");
session_start();
$obj = new dboperation;

if (isset($_POST["cash"])) {
    $cus_id = $_SESSION["customer_id"];
    $total = $_POST['total_price'];
    $order_date = date("Y-m-d");
    $status = "Successful";
    $quantity = $_POST['quantity'];
    $method = "CASH";
    $sql1 = "INSERT INTO tbl_orders (customer_id,total_amount,ordered_date,status,quantity,method) values($cus_id,$total,'$order_date','$status','$quantity','$method')";
    $sql1res = $obj->executequery($sql1);



    if ($sql1res) {
        echo "<script>alert('PAYMENT SUCCESFULL'); window.location='success.php'</script>";
        $sql2 = " DELETE FROM tbl_cart ";
        $sql2res = $obj->executequery($sql2);


    } else {
        echo "<script>alert('PAYMENT FAILED'); window.location='payment.php'</script>";
    }

}
if (isset($_POST["coin"])) {
    $cus_id = $_SESSION["customer_id"];
    $total = $_POST['total_coin'];
    $order_date = date("Y-m-d");
    $status = "Successful";
    $quantity = $_POST['quantity'];
    $method = "COIN";


    $sql1 = "INSERT INTO tbl_orders (customer_id,total_amount,ordered_date,status,quantity,method) values($cus_id,$total,'$order_date','$status','$quantity','$method')";
    $sql1res = $obj->executequery($sql1);



    if ($sql1res) {
        echo "<script>alert('PAYMENT SUCCESFULL'); window.location='success.php'</script>";
        $sql2 = " DELETE FROM tbl_cart ";
        $sql2res = $obj->executequery($sql2);


    } else {
        echo "<script>alert('PAYMENT FAILED'); window.location='payment.php'</script>";
    }
}
?>
