<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
</head>
<body>
    <h1>Hello world!</h1>
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
            $sql = "UPDATE customer_order SET order_date = CURDATE() WHERE order_date IS NULL";
            mysqli_query($conn, $sql);
        }

        mysqli_close($conn);
    ?>
</body>
</html>