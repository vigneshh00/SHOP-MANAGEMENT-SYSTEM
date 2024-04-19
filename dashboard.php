<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
 $user = $_POST['username'];
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "shop management system";

 $conn = mysqli_connect($servername, $username, $password,$dbname);
 
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
$name="Select first_name,last_name,shop_name from signup where username='$user'";
$res=mysqli_query($conn,$name); 
$row = mysqli_fetch_assoc($res);
mysqli_close($conn);
 
?>
    <header>
        <div class="headSection" id="headSection">
            <div id="storeDetails" class="storeDetails">
                <h1 class="storename" id="storename"><?php echo $row['shop_name'];?></h1>
                <p class="username" id="username">Hello <?php echo $row["first_name"];
                echo " " .$row['last_name'];?></p>
            </div>
                <div>
                    <input type="text" class="searchBar" id="searchBar" placeholder="Search a product..">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
        </div>
    </header>

    <section class="content" id="content">
        <div class="buttonSection" id="buttonSection">
            <button class="navbuttons"><div class="buttons" id="productInfo"><p>Product</p></div></button>
            <button class="navbuttons"><div class="buttons" id="supplierInfo"  onclick="window.location.href='supplier.html'"><p>Supplier</p></div></button>
            <button class="navbuttons"><div class="buttons" id="customerInfo"  onclick="window.location.href='customer.html'"><p>Customer</p></div></button>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 @ Pandian Stores | All rights reserved </p>
    </footer>

    <script src="script5.js" defer></script>
</body>
</html>