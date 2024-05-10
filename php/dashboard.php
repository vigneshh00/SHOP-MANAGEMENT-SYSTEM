<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>
</head>
<body>
    
<div class="container">
<div class="icon-container" id="icon-container" onclick="myFunction(this)">
  <div class="bar1" id="bar1"></div>
  <div class="bar2" id="bar2"></div>
  <div class="bar3" id="bar3"></div>
</div>
        <div class="side-bar" id="side-bar">
            <nav>
                <a href="../php/dashboard.php">Dashboard</a>
                <a href="../html/products.html">Products</a>
                <a href="../html/supplier.html">Suppliers</a>
                <a href="../html/customer.html">Customers</a>
                <a href="../php/insights.php">Insights</a>
                <a href="../php/login.php" id="contact-us">Log out</a>
               
               
            </nav>
        </div>
   
    </div>
<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "shop management system";

 $conn = mysqli_connect($servername, $username, $password,$dbname);
 
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
$name="Select first_name,last_name,shop_name from signup";
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

            <button class="navbuttons"><div class="buttons" id="productInfo" onclick="window.location.href='../html/products.html'"><p>Product</p></div></button>
            <button class="navbuttons"><div class="buttons" id="supplierInfo"  onclick="window.location.href='../html/supplier.html'"><p>Supplier</p></div></button>
            <button class="navbuttons"><div class="buttons" id="customerInfo"  onclick="window.location.href='../html/customer.html'"><p>Customer</p></div></button>
            <button class="navbuttons"><div class="buttons"  onclick="window.location.href='../php/insights.php'"><p>Insights</p></div></button>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 @ Pandian Stores | All rights reserved </p>
    </footer>

    <script src="../script/script5.js" defer></script>
    <script src="../script/dashboard.js"></script>
    <script>
        function myFunction(x) {
        x.classList.toggle("change");
        }
    </script>

</body>
</html>