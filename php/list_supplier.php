<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Suppliers</title>
    <link rel="stylesheet" href="../css/list_supplier.css">
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
    if(mysqli_num_rows($res)==0){
        echo "<script>alert('You haven\'t added any suppliers yet!');
              location.replace(\"../html/supplier.html\");</script>";  
    }
    
    ?>
    <div class="box">
        <h1>Suppliers Information</h1>
        <div class="container">
            <table>
                <thead class="table_head">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Quantity Supplied</th>
                </thead>
                <tbody>
                    <?php
                        while( $row = mysqli_fetch_assoc($res)){
                    ?>
                    <tr>
                        <td><?php echo $row['supplier_id']?></td>
                        <td><?php echo $row['supplier_name']?></td>
                        <td><?php echo $row['supplier_phonenumber']?></td>
                        <td><?php echo $row['supplier_address']?></td>
                        <td><?php echo $row['quantity_supplied']?></td>
                    </tr>
                    <?php
                        }
                        mysqli_close($conn); 
                        ?>
                </tbody>
            </table>
        </div>
        <div class = "submit">
            <button onclick = "window.location.href = '../html/supplier.html'">Back</button>
        </div>
    </div>
</body>
</html>