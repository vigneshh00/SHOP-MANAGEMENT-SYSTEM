<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
    <link rel="stylesheet" href="../css/add_new_supplier.css">
</head>
<body>
    <main>
        <div class="box">
            <div class="container">
                <form action=""  method="post" autocomplete="off">
                    <h1>ADD A SUPPLIER</h1>
                    <div class="sname">
                        <input type="text" name="sname" id="supplierName" required>
                        <label for="supplierName">Supplier Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="phno">
                        <input type="text" name="phonenumber" id="phno" required>
                        <label for="phno">Phone number</label>
                        <span class="line"></span>
                    </div>
                    <div class="add">
                        <label for="sup_add" class="shadd">Address</label>
                        <textarea name="add" id="sup_add" cols="42" rows="7" required></textarea>
                    </div>
                    <div class="submit">
                        <button type="submit">Add</button>
                    </div>
                </form>
                <div class="back">
                    <button onclick="window.location.href='../html/supplier.html'">Back</button>
                </div>
            </div>
        </div>
    </main>
    <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "shop management system";

        $conn = mysqli_connect($servername, $username, $password,$dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $sname = $_POST['sname'];
            $phonenumber = $_POST['phonenumber'];
            $add= $_POST['add'];

            $sql = "INSERT INTO supplier(supplier_name,supplier_phonenumber,supplier_address) VALUES('$sname','$phonenumber','$add')";
            
            if(mysqli_query($conn,$sql)){
                echo"<script>alert('Supplier added successfully');</script>";
            }
        }
        mysqli_close($conn);
    
    ?>
</body>
</html>