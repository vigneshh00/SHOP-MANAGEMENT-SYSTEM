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
                    <div class="fname">
                        <input type="text" name="customerID" id="customerID" required>
                        <label for="customerID">Customer ID</label>
                        <span class="line"></span>
                    </div>
                    <div class="lname">
                        <input type="text" name="customerName" id="customerName" required>
                        <label for="customerName">Customer Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="phno">
                        <input type="text" name="phno" id="phone_number" required>
                        <label for="phone_number">Contact Info</label>
                        <span class="line"></span>
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

        // $customerID = " ";
        // $customerName = "placeholder";
        // $phno = " ";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $customerID = intval($_POST['customerID']);
            $customerName = $_POST['customerName'];
            $phno = $_POST['phno'];
        }

        
        $sql = "insert into customer values('$customerID','$customerName','$phno')";

        mysqli_query($conn, $sql);

        mysqli_close($conn);

}        
    ?>
</body>
</html>