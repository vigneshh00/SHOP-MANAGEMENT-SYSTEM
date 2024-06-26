<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insights.css">
    <link rel="icon" type="image/x-icon" href="../images/icon_logo.png" />
    <title>Insights</title>
</head>

<body>
    <header>
        <p>Insights</p>
    </header>
    <div class="container">
        <div class="icon-container" id="icon-container" onclick="myFunction(this)">
            <div class="bar1" id="bar1"></div>
            <div class="bar2" id="bar2"></div>
            <div class="bar3" id="bar3"></div>
        </div>
        <div class="side-bar" id="side-bar">
            <nav>
                <a href="../php/profile.php">Profile</a>
                <a href="../php/dashboard.php">Dashboard</a>
                <a href="../html/products.html">Products</a>
                <a href="../html/supplier.html">Suppliers</a>
                <a href="../html/customer.html">Customers</a>
                <a href="../php/insights.php">Insights</a>
                <a href="../php/billing.php">Billing</a>
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
    $sql="CREATE OR REPLACE VIEW supplier_product_count AS select supplier.supplier_id as Supplier_id, supplier.supplier_name as Supplier_name, COUNT(product.supplier_id) as Number_of_products_supplied from product,supplier where product.supplier_id=supplier.supplier_id group by supplier.supplier_id";
    $res=mysqli_query($conn,$sql); 
    $sql="CREATE OR REPLACE VIEW product_count_ordered AS select product.product_id as product_id, product.product_name as product_name, SUM(order_items.quantity) as quantity from product join order_items on order_items.product_id=product.product_id group by order_items.product_id";
    $res=mysqli_query($conn,$sql);
    $sql="CREATE OR REPLACE VIEW spent_on_purchase AS select customer.customer_id as customer_id, customer.customer_name as customer_name, SUM(customer_order.total_price) as spent_amount from customer join customer_order on customer_order.customer_id=customer.customer_id group by customer_order.customer_id";
    $res=mysqli_query($conn,$sql);
    $product_list="select * from product order by category";
    $res=mysqli_query($conn,$product_list); 
    if(mysqli_num_rows($res)==0){
        echo "<p class='message' id='message' style='font-size:30px;text-align:center;margin-top:40px;'>You havent added any products yet!<p>";
        echo "<div class=\"submit\"><button class=\"bt\" onclick=\"window.location.href='../php/add_new_product.php'\" style='text-align:center; display:block; margin:0 auto;margin-top:50px;'>Add your first product</button> </div>";
    }
    if(mysqli_num_rows($res)){
        ?>
    
    <table>
        <tr>
            <td>Supplier who supplies the highest number of products</td>
            <td><?php
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
                  echo "<br>";}
                

                ?>
            </td>
        </tr>
        <tr>
            <td>
                Product with lowest stock
            </td>
            <td>
                <?php
                  $sql="select product_name from product where quantity_available=(select min(quantity_available) from product)";
                  $res=mysqli_query($conn,$sql);

                  while($row=mysqli_fetch_assoc($res)){  
                  echo $row['product_name'];
                  echo "<br>";}
                

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
                  echo "<br>";}
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Lowest priced product
            </td>
            <td>
                <?php
                  $sql="select product_name from product where price=(select min(price) from product)";
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($res)){  
                  echo $row['product_name'];
                  echo "<br>";}
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Most frequent customer
            </td>
            <td>
                <?php
                  $sql="select customer_name from customer where no_of_visits=(select max(no_of_visits) from customer)";
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($res)){  
                  echo $row['customer_name'];
                  echo "<br>";}
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Highest selling product
            </td>
            <td>
                <?php
                  $sql="SELECT MAX(product_name) as highest_selling from product_count_ordered";
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($res)){  
                  echo $row['highest_selling'];
                  echo "<br>";}
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Lowest selling product
            </td>
            <td>
                <?php
                  $sql="SELECT MIN(product_name) as lowest_selling from product_count_ordered";
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($res)){  
                  echo $row['lowest_selling'];
                  echo "<br>";}
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Customer who has spent the highest amount on purchases
            </td>
            <td>
                <?php
                  $sql="SELECT customer_name from spent_on_purchase where spent_amount = (select MAX(spent_amount) from spent_on_purchase)";
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($res)){  
                  echo $row['customer_name'];
                  echo "<br>";}
                ?>
            </td>
        </tr>

    </table>

            <?php } ?>
            <script>
            function myFunction(x) {
                x.classList.toggle("change");
            }
            </script>
            <script src="../script/insights.js"></script>
</body>

</html>