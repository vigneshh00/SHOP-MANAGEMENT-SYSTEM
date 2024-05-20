<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/list.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>
    <title>Your products</title>
</head>
<body>
<header>
    <div class="container"><h1>Products</h1></div>
    <div class="search-bar">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <p style="  font-size: 16px;
    font-weight: bold;
    text-align: left;">Display by category</p>
        <input name="category" type="text" placeholder="Search..">
        <button type="submit"><i class="fas fa-search" style="color:#ffffff"></i></button></form>
    </div>
    
    
</header>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop management system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['category'])) {
    $category = $_POST['category'];
    $_SESSION['category'] = $category;
} elseif (isset($_SESSION['category']) && !empty($_SESSION['category'])) {
    $category = $_SESSION['category'];
}else {
    $category = ""; 
}

if (!empty($category)) {
    $sql = "SELECT * FROM product WHERE category='$category'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)==0){
    echo "<script> alert('Category not found');</script>";
    $sql = "SELECT * FROM product ORDER BY category";
    }
} else {
    $sql = "SELECT * FROM product ORDER BY category";
}

$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) == 0) {
    echo "<p class='message' id='message' style='font-size:30px;text-align:center;margin-top:40px;'>You haven't added any products yet!<p>";
    echo "<div class=\"submit\"><button class=\"bt\" onclick=\"window.location.href='../php/add_new_product.php'\" style='text-align:center; display:block; margin:0 auto;margin-top:50px;'>Add your first product</button> </div>";
    echo "<div class=\"submit add-more back\"><button class=\"bt\" onclick=\"window.location.href='../html/products.html'\">Back</button> </div>";
}

else
    {
        echo "<table><tr><th>Product id</th><th>Product name</th><th>Product description</th><th>Price</th><th>Tax</th><th>Quantity</th><th>Supplier id</th></tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        ?>
        <tr>
            <td><?php echo $row['product_id'] ?></td>
            <td><?php echo $row['product_name'] ?></td>
            <td><?php echo $row['category'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['tax'] ?></td>
            <td><?php echo $row['quantity_available'] ?></td>
            <td><?php echo $row['supplier_id'] ?></td>
        </tr>
        <?php
    }
    echo "</table><br><br>";
    echo "<div class=\"submit add-more\"><button class=\"bt\" onclick=\"window.location.href='../php/add_new_product.php'\">Add more products</button> </div>";
    echo "<div class=\"submit add-more\"><button class=\"bt\" onclick=\"window.location.href='../html/products.html'\">Back</button> </div>";
}


mysqli_close($conn);
?>
</body>
</html>
