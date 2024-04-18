<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your products</title>
</head>
<body>
    <?php
    //  $user = $_POST['username'];
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "shop management system";
    
     $conn = mysqli_connect($servername, $username, $password,$dbname);
     
     if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
    
    $product_list="select * from product order by product_description";
    $res=mysqli_query($conn,$product_list); 
    
    ?>
    <table><tr><th>Product id</th><th>Product name</th><th>product description</th><th>Price</th><th>Quantity</th><th>Supplier id</th></tr>
      <?php
      while( $row = mysqli_fetch_assoc($res)){
        ?>
    <tr>
        <td><?php echo $row['product_id']?></td>
        <td><?php echo $row['product_name']?></td>
        <td><?php echo $row['product_description']?></td>
        <td><?php echo $row['price']?></td>
        <td><?php echo $row['qty_available']?></td>
        <td><?php echo $row['supplier_id']?></td>
      </tr>
      <?php
      }
      
      mysqli_close($conn);
      ?>

</table>
</body>
</html>