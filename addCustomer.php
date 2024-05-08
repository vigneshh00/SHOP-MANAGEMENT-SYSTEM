<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link rel="stylesheet" href="addCustomer.css">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>

</head>
<body>

    <main>
        <div class="box">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                    <h1>ADD CUSTOMER</h1>
                    <div class="lname">
                        <input type="text" name="customerName" id="customerName" required>
                        <label for="customerName">Customer Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="phno">
                        <input type="text" name="phno" id="phone_number" required>
                        <label for="phone_number">Phone Number</label>
                        <span class="line"></span>
                    </div>
                    <div class="customer_add">
                        <label for="customer_address" class="shadd">Address</label>
                        <textarea name="cust_add" id="customer_address" cols="53" rows="10" required></textarea>
                    </div>
                    <div class="btns" id="btns">
                        <button type="submit" name="submit" value="submit">Add</button>
                        <button onclick="window.location.href='customer.html'">Back</button>
                    </div>
                </form>
                
            </div>
        </div>
    </main>
    <?php

if (isset($_POST['submit'])) { 
    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "shop management system";

        $conn = mysqli_connect($servername, $username, $password,$dbname);

        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $customerName = $_POST['customerName'];
            $phno = $_POST['phno'];
            $customerAddress = $_POST['cust_add'];
        }

        
        $sql = "insert into customer (customer_name, customer_phonenumber, customer_address) values('$customerName','$phno', '$customerAddress')";

        mysqli_query($conn, $sql);

        mysqli_close($conn);

}        
    ?>
</body>
</html>