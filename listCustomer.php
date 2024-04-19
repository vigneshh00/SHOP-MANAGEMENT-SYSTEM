<?php

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>List Customer</title>
</head>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop management system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all data from the customer table
$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Contact Info</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row["customer_id"]."</td>
                <td>".$row["customer_name"]."</td>
                <td>".$row["contact_info"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
