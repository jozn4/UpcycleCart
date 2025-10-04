<?php
include("header.php");
$id = $_SESSION["customer_id"];

$sql = "SELECT d.order_id, d.quantity, d.price, d.coin, p.product_name, p.product_image, o.ordered_date, o.status 
        FROM tbl_order_details d 
        INNER JOIN tbl_orders o ON d.order_id = o.order_id 
        INNER JOIN tbl_product p ON d.product_id = p.product_id 
        WHERE o.customer_id=$id";
       
$result = $obj->executequery($sql);
?>

<div class="container" style="margin-top:150px;">
    <h4 class="mb-4">Ordered Items</h4>
    
    <?php while($display = mysqli_fetch_array($result)) { ?>
    <div class="card mb-4 shadow-sm">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="../Uploads/<?php echo $display['product_image']; ?>" 
                     class="img-fluid rounded-start" 
                     alt="<?php echo $display['product_name']; ?>" 
                     style="height:150px; object-fit:cover; width:100%;">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $display['product_name']; ?></h5>
                    <p class="card-text mb-1"><strong>Quantity:</strong> <?php echo $display['quantity']; ?></p>
                    <p class="card-text mb-1"><strong>Price:</strong> ₹<?php echo $display['price']; ?></p>
                    <p class="card-text mb-1"><strong>Order Date:</strong> <?php echo $display['ordered_date']; ?></p>
                    <p class="card-text"><strong>Status:</strong> <?php echo $display['status']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php
include("footer.php");
?>
