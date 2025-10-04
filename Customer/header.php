<!DOCTYPE html>
<html lang="en">
<!-- <?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
$cus_id = $_SESSION["customer_id"];
$sql = "select customer_name from tbl_customer where customer_id='$cus_id'";
$result = $obj->executequery($sql);
$sql1 = "select * from tbl_wallet where customer_id='$cus_id'";
$result1 = $obj->executequery($sql1);

    $name=$_SESSION['User_name'];


?> -->

<head>
    <meta charset="utf-8">
    <title>Tea House - Tea Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="index/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="index/lib/animate/animate.min.css" rel="stylesheet">
    <link href="index/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="index/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Template Stylesheet -->
    <link href="index/css/style.css" rel="stylesheet">


    
    <style>


        .coin-balance i {
            color: gold;
            /* Change the color */
            font-size: 1em;
            /* Change the size */
        }

        .text-overlay {
  position: absolute;
  top: 50%;       /* vertical center */
  left: 50%;      /* horizontal center */
  transform: translate(-50%, -50%);
  color: white;   /* text color */
  font-size: 20px;
  font-weight: bold;
  background: rgba(0,0,0,0.5); /* optional background for readability */
  padding: 5px 10px;
  border-radius: 8px;
}
.faded-img {
  opacity: 0.5; /* 0 = fully transparent, 1 = fully visible */
}

.quantity {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 6px;
      overflow: hidden;
      width: 120px;
    }

    .quantity button {
      width: 35px;
      height: 35px;
      border: none;
      background: #f0f0f0;
      font-size: 20px;
      cursor: pointer;
    }

    .quantity input {
      width: 50px;
      text-align: center;
      border: none;
      font-size: 16px;
    }
    .quantity button:hover {
      background: #ddd;
    }

  


* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    font-family: 'Montserrat', sans-serif
}






    </style>
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div> -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-2">
            <a href="index.php" class="navbar-brand">
                <img class="img-fluid" src="index/img/logo.jpg" alt="Logo" style="border-radius:50px;">
            </a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse" style="margin-left:30%">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="index.php" class="nav-link fa">HOME</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link fa">ABOUT</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fa" href="#" id="donationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            DONATION
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="donationDropdown">
                            <li><a class="dropdown-item" href="index.php#category">REQUEST</a></li>
                            <li><a class="dropdown-item" href="request_status.php">STATUS</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="store.php" class="nav-link fa">STORE</a></li>
                    <li class="nav-item"><a href="cart.php" class="nav-link fa"><i class="fa fa-cart-plus me-1"></i>CART</a></li>
                <li class="nav-item"><a href="myorders.php" class="nav-link fa">My Orders</a></li>

                </ul>

                <!-- Right side: Coin & Profile -->
                <div class="d-flex align-items-center">
                    <?php while($display=mysqli_fetch_array($result1)) { ?>
                        <div class="coin-balance me-3">
                            <i class="fa-solid fa-bolt me-1"></i><?php echo $display['coin']; ?>
                        </div>
                    <?php } ?>

                    <!-- Profile Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i><?php echo $name ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="profile.php"><i class="fas fa-id-card me-2"></i>View Profile</a></li>
                            <li><a class="dropdown-item" href="settings.php"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

    <!-- Navbar End -->