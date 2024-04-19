<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
    <link rel="stylesheet" href="add_new_supplier.css">
</head>
<body>
    <main>
        <div class="box">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" autocomplete="off">
                    <h1>ADD A SUPPLIER</h1>
                    <div class="sid">
                        <input type="text" name="sid" id="supplierId" required>
                        <label for="supplierId">Supplier ID</label>
                        <span class="line"></span>
                    </div>
                    <div class="sname">
                        <input type="text" name="sname" id="supplierName" required>
                        <label for="supplierName">Supplier Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="conInfo">
                        <input type="text" name="conInfo" id="contactInfo" required>
                        <label for="contactInfo">Contact Information</label>
                        <span class="line"></span>
                    </div>
                    <div class="submit">
                        <button type="submit">Add</button>
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
            $sname = $_POST['sname'];
            $conInfo= $_POST['conInfo'];

            $sql = "INSERT INTO supplier VALUES('$sid','$sname','$conInfo')";
            mysqli_query($conn,$sql);
        }

        mysqli_close($conn);
    
    ?>
</body>
</html>