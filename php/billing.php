<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/billing.css">
</head>
<body>
    <div class="box">
        <div class="container">
        <form action="" method="post">
            <h1>BILLING</h1>
            <div class="cid">
                <input type="text" name="cid" id="customerid" required>
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

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $cid = $_POST['cid'];
            $pid = $_POST['pid'];
            $qty = $_POST['qty'];

            $sql = "INSERT INTO customer_order(customer_id) VALUES('$cid')";
            mysqli_query($conn,$sql);

            $sql = "UPDATE customer_order SET order_date = CURDATE() WHERE customer_id = '$cid'";
            mysqli_query($conn,$sql);

            $sql = "SELECT order_id FROM customer_order WHERE customer_id = '$cid'";
            $res= mysqli_query($conn,$sql);
            $row= mysqli_fetch_assoc($res);
            $id = $row['order_id'];

            $sql = "INSERT INTO order_items(order_id,product_id,quantity) VALUES('$id','$pid','$qty')";
            mysqli_query($conn,$sql);

            
            $sql = "SELECT order_item_id FROM order_items WHERE product_id='$pid'";
            $res= mysqli_query($conn,$sql);
            $row= mysqli_fetch_assoc($res);
            $id = $row['order_item_id'];
            
            
        }
    ?>
</body>
</html>