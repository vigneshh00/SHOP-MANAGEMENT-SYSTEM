<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Customer</title>
    <link rel="stylesheet" href="signup.css">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>

</head>
<body>

    <main>
        <div class="box">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                    <h1>DELETE</h1>
                    <div class="fname">
                        <input type="text" name="customerID" id="customerID">
                        <label for="customerID">By Customer ID</label>
                        <span class="line"></span>
                    </div>

                    <div class="choice" style="align-self: center">
                        <p style="text-align: center"> Or </p>
                    </div>
                    <div class="lname">
                        <input type="text" name="customerName" id="customerName">
                        <label for="customerName">By Customer Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="submit">
                        <button type="submit" name="submit" value="submit">Delete</button>
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
            $customerID = isset($_POST['customerID']) ? intval($_POST['customerID']) : null;
            $customerName = isset($_POST['customerName']) ? $_POST['customerName'] : null;
        
            if ($customerID != null) {
                $sql = "DELETE FROM customer WHERE customer_iD = $customerID";
            } elseif ($customerName != null) {
                $sql = "DELETE FROM customer WHERE customer_name = '$customerName'";
            }
        
            mysqli_query($conn, $sql);
        }
        
        mysqli_close($conn);
        
    }
?>


</body>
</html>