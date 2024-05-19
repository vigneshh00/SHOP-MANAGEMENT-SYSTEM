<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/billing.css">
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "shop management system";
        $count = 0;

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>
    <header>
        <div class="menu">
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
                    <a href="../php/billing.php">Billing</a>
                    <a href="../php/login.php" id="contact-us">Log out</a> 
                </nav>
            </div>
        </div>
        <div class="headSection">
             <h1 id="heading">Billing</h1>
        </div>
    </header>
    
    <main>
    <div class="box" id="box">
        <div class="container" id="container">
        <form action="" method="post">
            <h1>BILLING</h1>
            <div class="cid">
                <input type="text" name="cid" id="customerid"required>
                <label for="customerid">Customer ID</label>
                <span class="line"></span>
            </div>
            <div class="pid">
                <input type="text" name="pid" id="productId" required>
                <label for="productId">Product ID</label>
                <span class="line"></span>
            </div>
            <div class="qty">
                <input type="text" name="qty" id="quantity" required>
                <label for="quantity">Quantity</label>
                <span class="line"></span>
            </div>
            <div class="submit">
                <button type="submit">ADD</button>
            </div>
        </form>
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                session_start();
                $cid = $_POST['cid'];
                $pid = $_POST['pid'];
                $qty = $_POST['qty'];

                $_SESSION['customer_id'] = $cid;
            
                $flag = false;
            
                $sql = "SELECT * FROM customer_order WHERE customer_id = '$cid'";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) == 0) {
                    $sql = "INSERT INTO customer_order(customer_id) VALUES ('$cid')";
                    mysqli_query($conn, $sql);
                    $flag = true;
                }
            
                $sql = "SELECT o.order_id as order_id, c.customer_name as customer_name FROM customer_order o, customer c 
                        WHERE o.customer_id = '$cid' AND o.customer_id = c.customer_id";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $id = $row['order_id'];
                $cname = $row['customer_name'];

                $_SESSION['order_id'] = $id;
            
                $sql = "INSERT INTO order_items(order_id, product_id, quantity) VALUES ('$id', '$pid', '$qty')";
                mysqli_query($conn, $sql);

                $sql = "SELECT MAX(order_item_id) as order_item_id FROM order_items";
                $res= mysqli_query($conn,$sql);
                $row= mysqli_fetch_assoc($res);
                $orderid = $row['order_item_id'];
                
                $sql = "SELECT billing('$orderid') AS subtotal";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $subtotal = $row['subtotal'];

                $sql = "UPDATE order_items SET subtotal = '$subtotal' WHERE order_item_id = '$orderid'";
                mysqli_query($conn, $sql);

                $sql = "UPDATE customer_order SET total_price = (SELECT SUM(subtotal) FROM order_items WHERE order_id = '$id') 
                        WHERE order_id ='$id'";
                mysqli_query($conn, $sql);

                $sql = "SELECT total_price FROM customer_order WHERE order_id = '$id'";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $total = $row['total_price'];

                $sql = "UPDATE customer_order SET order_date = CURDATE() WHERE order_date IS NULL";
                mysqli_query($conn, $sql);
            }
        ?>
        <div class="billing">
            <h1 id="cname">
                <?php 
                    if(isset($cname)){
                        echo $cname;
                    }else{
                        echo "Customer Name";
                    } 
                ?>
            </h1>
            <div class="wrapper" id="wrapper">
                <table>
                    <thead>
                        <th>SI No.</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal(Rs.)</th>
                    </thead>
                    <tbody>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                $sql = "CREATE OR REPLACE VIEW temperory AS SELECT p.product_name as product,o.quantity as qty,o.subtotal as subtot,p.price as price,p.price*o.quantity as price_amt, p.tax as tax,p.tax * o.quantity as tax_amt 
                                        FROM product p,order_items o
                                        WHERE o.product_id = p.product_id AND o.order_id = '$id'";
                                mysqli_query($conn,$sql);

                                $sql = "SELECT * FROM temperory";
                                $res= mysqli_query($conn,$sql);
                                while($row= mysqli_fetch_assoc($res)){
                        ?>
                        <tr>
                            <td><?php $count+=1; echo $count; ?></td>
                            <td><?php echo $row['product']?></td>
                            <td><?php echo $row['qty']?></td>
                            <td><?php echo $row['subtot']?></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="total" id="total">
                <table>
                    <tbody>
                        <tr>
                            <td><b>Total</b></td>
                            <td><b>
                                <?php 
                                    if(isset($total)){
                                        echo $total;
                                    }else{
                                        echo "0.0";
                                    } 
                                    mysqli_close($conn);
                                ?>
                            </b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="submit" id="btn" >
                <form action="" method = "get">
                    <button name = "rem">Remove</button>
                </form>
                <form action="../php/customer_bill.php" method="post">
                    <button>Proceed</button>
                </form>    
            </div>
        </div>
    </div>
    </main>
    <script src="../script/billing.js" defer></script>
</body>
</html>