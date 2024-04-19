<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Suppliers</title>
    <link rel="stylesheet" href="list_supplier.css">
</head>
<body>
    <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "shop management system";
    
     $conn = mysqli_connect($servername, $username, $password,$dbname);
     
     if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
    
    $supplier="SELECT * FROM supplier";
    $res=mysqli_query($conn,$supplier); 
    
    ?>
    <table>
        <tr>
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Contact Information</th>
        </tr>
        <?php
            while( $row = mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <td><?php echo $row['supplier_id']?></td>
            <td><?php echo $row['supplier_name']?></td>
            <td><?php echo $row['contact_info']?></td>
        </tr>
        <?php
            }
            mysqli_close($conn);
        ?>
    </table>
</body>
</html>