<?php
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>List Customer</title>
    <link rel='stylesheet' href='../css/listCustomer.css'>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
        padding: 10px;
      }

      th {
        font-size: 30px;
        background-color: black;
        color: whitesmoke;
      }
      
      th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 2px solid #ddd;
      }

      td {
        font-size: 20px;
      }
      
      tr:hover {
        background-color: #333;
        color: whitesmoke;
      }
    </style>

</head>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop management system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==0){
    echo "<p class='message' id='message'>No Customers to display!<p>";
    echo "<div class=\"submit\"><button class=\"bt\" onclick=\"window.location.href='../php/addCustomer.php'\">Add your first customer</button> </div>";
    echo "<div class=\"submit\"><button class=\"bt\" id=\"back\" onclick=\"window.location.href='../html/customer.html'\">Back</button> </div>";
} 

elseif (mysqli_num_rows($result) > 0) {
    echo "<table>
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Number of Visits</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row["customer_id"]."</td>
                <td>".$row["customer_name"]."</td>
                <td>".$row["customer_phonenumber"]."</td>
                <td>".$row["customer_address"]."</td>
                <td>".$row["no_of_visits"]."</td>
              </tr>";
    }
    echo "</table>";
    echo "<div class=\"submit\"><button class=\"bt\" id=\"back\" onclick=\"window.location.href='../html/customer.html'\">Back</button> </div>";
}

mysqli_close($conn);

?>
