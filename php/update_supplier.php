<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
    <link rel="stylesheet" href="update_supplier.css">
</head>
<body>
    <main>
        <div class="box">
            <div class="container">
                <form action=""  method="post" autocomplete="off">
                    <h1>UPDATE SUPPLIER</h1>
                    <div class="sid">
                        <input type="text" name="sid" id="supplierId" required>
                        <label for="supplierId">Supplier ID</label>
                        <span class="line"></span>
                    </div>
                    <div class="sname">
                        <input type="text" name="sname" id="supplierName" value="">
                        <label for="supplierName">Supplier Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="conInfo">
                        <input type="text" name="conInfo" id="contactInfo"  value="">
                        <label for="contactInfo">Contact Information</label>
                        <span class="line"></span>
                    </div>
                    <div class="submit">
                        <button type="submit">Update</button>
                    </div>
                </form>
                <div class="back">
                    <button onclick="window.location.href='supplier.html'">Back</button>
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
            $sid = $_POST['sid'];
            $sname=$_POST['sname'];
            $contactInfo=$_POST['conInfo'];

            $sql = "UPDATE supplier SET contact_info='$contactInfo',supplier_name='$sname' WHERE supplier_id='$sid'";
            mysqli_query($conn,$sql);
        }

        mysqli_close($conn);
    
    ?>
</body>
</html>