<?php
include('header.php');

$cus_id = $_SESSION['customer_id']; // make sure customer_id is set
$sql = "SELECT * 
        FROM tbl_cart c 
        INNER JOIN tbl_product p ON c.product_id = p.product_id 
        WHERE customer_id='$cus_id'";
$result = $obj->executequery($sql);

$total_quantity = 0;
$total_price = 0;
$total_coin = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tea House - Tea Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #a9eba3ff; }
    </style>
</head>
<body>

<form action="orderaction.php" method="POST">
    <div class="container my-5">
        <div class="row">

            <!-- LEFT SIDE: Products -->
            <div class="col-md-8">
                <?php while ($display = mysqli_fetch_array($result)) {
                    $quantity = $display['quantity'];
                    $price = $display['product_price'] * $quantity;
                    $coin = $display['product_coin'] * $quantity;

                    $total_quantity += $quantity;
                    $total_price += $price;
                    $total_coin += $coin;
                    ?>
                    <div class="card shadow-sm p-4 mb-3 border rounded">
                        <div class="row g-3 align-items-center">

                            <!-- Product Image -->
                            <div class="col-md-3">
                                <img src="../uploads/<?php echo $display['product_image']; ?>" alt="Product"
                                     class="img-fluid rounded" style="height:200px; width:200px; object-fit:cover;">
                            </div>

                            <!-- Product Details -->
                            <div class="col-md-6">
                                <h5 class="mb-1 fw-bold"><?php echo $display['product_name']; ?></h5>
                                <p class="text-muted small mb-1"><?php echo $display['brand'] ?? 'Brand Name'; ?></p>
                                <h6 class="text-success mb-2">₹ <?php echo $display['product_price']; ?></h6>
                                <div class="coin-balance mb-3">
                                    <i class="fa-solid fa-bolt text-warning"></i>
                                    <span class="fw-bold"><?php echo $display['product_coin']; ?> E-coins</span>
                                </div>

                                <!-- Quantity Box -->
                                <div class="d-flex align-items-center">
                                    <div class="quantity me-3">
                                        <button type="button" class="btn btn-outline-dark btn-sm" onclick="decrease()">−</button>
                                        <input type="text" id="qty" name="qty"
                                               value="<?php echo $quantity ?>" class="text-center border mx-1" style="width:50px;">
                                        <button type="button" class="btn btn-outline-dark btn-sm" onclick="increase()">+</button>
                                    </div>
                                    <span class="text-muted small">
                                        <i class="bi bi-cash-coin text-success"></i> COD available
                                    </span>
                                </div>
                            </div>

                            <!-- Delete / Action -->
                            <div class="col-md-3 text-end">
                                <input type="hidden" name="product_id[]" value="<?php echo $display['product_id']; ?>">
                                <input type="hidden" name="quantity[]" value="<?php echo $quantity; ?>">
                                <input type="hidden" name="price[]" value="<?php echo $price; ?>">
                                <input type="hidden" name="coin[]" value="<?php echo $coin; ?>">
                                <a href="cartdelete.php?cart_id=<?php echo $display['cart_id'] ?>"
                                   class="btn btn-outline-danger btn-sm" style="height:40px;width:60px"><i class="bi bi-trash"></i></a>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- RIGHT SIDE: Price Details -->
            <div class="col-md-4">
                <div id="myydiv" class="card shadow-sm p-4 border rounded position-sticky" style="top: 80px;">
                    <h5 class="fw-bold mb-3">Price Details</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Price (<?php echo $total_quantity ?> items)</span>
                        <span>₹ <?php echo $total_price ?></span>
                    </div>
                    <div class="coin-balance d-flex justify-content-between mb-2">
                        <span>Total E-coins</span>
                        <i class="fa-solid fa-bolt text-warning"></i>
                        <span class="fw-bold"><?php echo $total_coin ?></span>
                    </div>
                    <hr>
                    <div class="fw-bold mb-3">
                        <div class="d-flex justify-content-between">
                            <span>Total Amount</span>
                            <span>₹ <?php echo $total_price ?></span>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span>Total E-coins</span>
                            <span>
                                <i class="fa-solid fa-bolt text-warning"></i>
                                <?php echo $total_coin ?>
                            </span>
                        </div>
                    </div>

                    <input type="hidden" name="total_quantity" value="<?php echo $total_quantity; ?>">
                    <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                    <input type="hidden" name="total_coin" value="<?php echo $total_coin; ?>">

                    <button class="btn btn-success w-100" name="order">Place Order</button>
                </div>
            </div>

        </div>
    </div>
</form>

<script>
    function increase() {
        let qty = document.getElementById("qty");
        qty.value = parseInt(qty.value) + 1;
    }

    function decrease() {
        let qty = document.getElementById("qty");
        if (parseInt(qty.value) > 1) {
            qty.value = parseInt(qty.value) - 1;
        }
    }
</script>

</body>
</html>
