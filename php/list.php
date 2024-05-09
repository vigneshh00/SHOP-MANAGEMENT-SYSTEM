<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/list.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@1,700&display=swap" rel="stylesheet">
    <title>Your products</title>
</head>
<body>
  <header>
    <div class="container"><text>Products</text></div>
  </header>
    <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "shop management system";
    
     $conn = mysqli_connect($servername, $username, $password,$dbname);
     
     if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
    
    $product_list="select * from product order by category";
    $res=mysqli_query($conn,$product_list); 
    if(mysqli_num_rows($res)==0){
      echo "You havent added any products yet!<br>";
      echo "<div class=\"submit\"><button class=\"bt\" onclick=\"window.location.href='add_new_product.php'\">Add your first product</button> </div>";
      
    }
    
    ?>
    <?php 
     if(mysqli_num_rows($res)){
    echo "<table><tr><th>Product id</th><th>Product name</th><th>Product description</th><th>Price</th><th>Quantity</th><th>Supplier id</th></tr>";}?>
      <?php
      while( $row = mysqli_fetch_assoc($res)){
        ?>
    <tr>
        <td><?php echo $row['product_id']?></td>
        <td><?php echo $row['product_name']?></td>
        <td><?php echo $row['category']?></td>
        <td><?php echo $row['price']?></td>
        <td><?php echo $row['quantity_available']?></td>
        <td><?php echo $row['supplier_id']?></td>
      </tr>
      <?php
      }
      
      mysqli_close($conn);
      ?>

</table><br><br>
<div class="submit add-more"><button class="bt" onclick="window.location.href='../php/add_new_product.php'">Add more products</button> </div>
</body>
</html>