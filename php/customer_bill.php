<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/customer_bill.css">
    <link rel="icon" type="image/x-icon" href="../images/icon_logo.png" />
    <title>Invoice</title>
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

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){   
            session_start();

            $count = 0;

            $cid = $_SESSION['customer_id'];
            $order_id = $_SESSION['order_id'];

            $sql = "UPDATE customer SET no_of_visits = no_of_visits + 1 WHERE customer_id = '$cid' AND no_of_visits <> 1";
            mysqli_query($conn, $sql);

            $sql = "SELECT * FROM signup";
            $res = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_assoc($res);

            $sql = "SELECT * FROM customer WHERE customer_id = '$cid'";
            $res = mysqli_query($conn, $sql);
            $row2 = mysqli_fetch_assoc($res);

            $sql = "SELECT * FROM customer_order WHERE order_id = '$order_id'";
            $res = mysqli_query($conn, $sql);
            $row3 = mysqli_fetch_assoc($res);

        }
    ?>

    <div class="box">
        <div class="container">
            <div class="shopname">
                <h1><?php echo $row1['shop_name']?></h1>
                <h3><?php echo $row1['shop_address']?></h3>
                <div class="number">
                    <p><b>Phone number : </b>+91 <?php echo $row1['phone_number'] ?></p>
                    <p><b>GSTIN : </b><?php echo $row1['gst_number'] ?></p>
                    <p><b>Location : </b>Chennai</p>
                </div>
            </div>
            <div class="address">
                <p style="margin-bottom: 5px;">BILL TO</p>
                <p style="margin-bottom: 5px;"><?php echo $row2['customer_name']?></p>
                <p style="margin-bottom: 5px;"><?php echo $row2['customer_address']?></p>
                <p style="margin-bottom: 5px;"><b>Phone number : </b>+91 <?php echo $row2['customer_phonenumber']?></p>
            </div>
            <div class="orderId">
                <p style="color:rgb(80, 80, 202);"><b>Order No.</b></p>
                <p style="color:rgb(80, 80, 202);"><b>Order Date</b></p>
                <p><?php echo $order_id?></p>
                <p><?php echo $row3['order_date']?></p>
            </div>
            <div class="details">
                <table>
                    <thead>
                        <th>SI No.</th>
                        <th>Items</th>
                        <th>Quantity</th>
                        <th>Price/Unit(Rs.)</th>
                        <th>Tax/Unit(Rs.)</th>
                        <th>Amount(Rs.)</th>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                            $sql = "SELECT * FROM temperory";
                            $res= mysqli_query($conn,$sql);
                            while($row4= mysqli_fetch_assoc($res)){
                        ?>
                        <tr>
                            <td><?php $count+=1; echo $count; ?></td>
                            <td><?php echo $row4['product']?></td>
                            <td><?php echo $row4['qty']?></td>
                            <td><?php echo $row4['price']?></td>
                            <td><?php echo $row4['tax']?></td>
                            <td><?php echo $row4['subtot']?></td>
                        </tr>
                        <?php
                            }

                            $sql = "SELECT SUM(price_amt) as price FROM temperory";
                            $res = mysqli_query($conn,$sql);
                            $row5 = mysqli_fetch_assoc($res);

                            $sql = "SELECT SUM(tax_amt) as tax FROM temperory";
                            $res = mysqli_query($conn,$sql);
                            $row6 = mysqli_fetch_assoc($res);

                            $sql = "SELECT total_price FROM customer_order WHERE order_id = '$order_id'";
                            $res = mysqli_query($conn,$sql);
                            $row7 = mysqli_fetch_assoc($res);
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="total">
                <table>
                    <tbody>
                        <tr>
                            <td><b>Total</b></td>
                            <td><b><?php echo $row5['price'] ?></b></td>
                            <td><b><?php echo $row6['tax'] ?></b></td>
                            <td><b><?php echo $row7['total_price'] ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="submit">
                <button onclick="window.print()">PRINT</button>
                <button onclick="window.location.href = '../php/dashboard.php'">BACK</button>
            </div>
        </div>
    </div>
</body>

</html>