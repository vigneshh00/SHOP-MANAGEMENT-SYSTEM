<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link rel="stylesheet" href="signup.css">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>

</head>
<body>

    <main>
        <div class="box">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                    <h1>UPDATE DETAILS</h1>
                    <div class="fname">
                        <input type="text" name="customerID" id="customerID">
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
                    <div class="submit">
                        <button type="submit" name="submit" value="submit">UPDATE</button>
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
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customerID = intval($_POST['customerID']);
        $customerName = $_POST['customerName'];
        $phno = $_POST['phno'];
    
        if (!empty($customerID) && !empty($customerName)) {
            $sql = "UPDATE customer SET customer_name='$customerName', contact_info='$phno' WHERE customer_id='$customerID' or customer_name='$customerName'";
        } elseif (!empty($customerName)) {
            $sql = "UPDATE customer SET contact_info='$phno' WHERE customer_name='$customerName'";
        }
    
        mysqli_query($conn, $sql);
    
    }

    mysqli_close($conn);
}

?>

</body>
</html>