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
    <div class="box">
        <div class="container">
        <form action="" method="post">
            <h1>BILLING</h1>
            <div class="cid">
                <input type="text" name="cid" id="customerid" value=" ">
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
                $cid = $_POST['cid'];
                $pid = $_POST['pid'];
                $qty = $_POST['qty'];
            
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
            }
        ?>
        <div class="billing">
            <h1><?php echo $cname; ?></h1>
            <div class="wrapper">
                <table>
                    <thead>
                        <th>Serial No.</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                $sql = "SELECT p.product_name as product,o.quantity as qty,o.subtotal as subtot FROM product p,order_items o
                                        WHERE o.product_id = p.product_id AND o.order_id = '$id'";
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
            <div class="total">
                <table>
                    <tbody>
                        <tr>
                            <td>Total</td>
                            <td>
                                <?php 
                                    echo $total; 
                                    mysqli_close($conn);
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="submit">
                <form action="../php/customer_bill.php" method="post">
                    <button>Proceed</button>
                </form>    
            </div>
        </div>
    </div>

</body>
</html>