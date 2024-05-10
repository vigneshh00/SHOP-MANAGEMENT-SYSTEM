<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/list.css">
    <title>Insights</title>
</head>
<body>
<header>
    <div class="container"><text>Insights</text></div>
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
    $sql="CREATE OR REPLACE VIEW supplier_product_count AS select supplier.supplier_id as Supplier_id, supplier.supplier_name as Supplier_name, COUNT(product.supplier_id) as Number_of_products_supplied from product,supplier where product.supplier_id=supplier.supplier_id group by supplier.supplier_id";
    $res=mysqli_query($conn,$sql); 
    $product_list="select * from product order by category";
    $res=mysqli_query($conn,$product_list); 
    if(mysqli_num_rows($res)==0){
      echo "You havent added any products yet!<br>";
      echo "<div class=\"submit\"><button class=\"bt\" onclick=\"window.location.href='add_new_product.php'\">Add your first product</button> </div>";
      
    }
    if(mysqli_num_rows($res)){
        ?>
        <table>
        <tr>
            <td>Supplier who supplies the highest number of products</td><td><?php
            $sql="select Supplier_name from supplier_product_count where Number_of_products_supplied=(select max(Number_of_products_supplied) from supplier_product_count)";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($res);
            echo $row['Supplier_name'];

            ?></td>
        </tr>
        <tr>
            <td>
                Product with highest stock
            </td>
            <td>
                <?php
                  $sql="select product_name from product where quantity_available=(select max(quantity_available) from product)";
                  $res=mysqli_query($conn,$sql);

                  while($row=mysqli_fetch_assoc($res)){  
                  echo $row['product_name'];
                  echo " ";}
                

                ?>
            </td>
        </tr>
        <tr>
            <td>
                Highest priced product
            </td>
            <td>
                <?php
                  $sql="select product_name from product where price=(select max(price) from product)";
                  $res=mysqli_query($conn,$sql);

                  while($row=mysqli_fetch_assoc($res)){  
                  echo $row['product_name'];
                  echo " ";}
                

                ?>
            </td>
        </tr>
        
        <table>

   <?php } ?>
    

    
</body>
</html>