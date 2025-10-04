<?php
include("../dboperation.php");
$obj = new dboperation;

if (isset($_GET["cart_id"])){
    $id = $_GET["cart_id"];
   
    
        $sql1 = "DELETE FROM tbl_cart  WHERE cart_id='$id' ";
        $sql1res = $obj->executequery($sql1);

        if ($sql1res) {
            echo "<script>alert('Removed from cart'); window.location='cart.php'</script>";
        } else {
            echo "<script>alert('Failed'); window.location='cart.php'</script>";
        }
    
}
?>
