<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Supplier</title>
    <link rel="stylesheet" href="../css/remove_supplier.css">
</head>
<body>
    <main>
        <div class="box">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" autocomplete="off">
                    <h1>REMOVE A SUPPLIER</h1>
                    <div class="sid">
                        <input type="text" name="sid" id="supplierId">
                        <label for="supplierId">By Supplier ID</label>
                        <span class="line"></span>
                    </div>
                    <div class="divide">
                        <p>OR</p>
                    </div>
                    <div class="sname">
                        <input type="text" name="sname" id="supplierName">
                        <label for="supplierName">By Supplier Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="submit">
                        <button type="submit">remove</button>
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
            $sid = isset($_POST['sid']) ? intval($_POST['sid']) : null;
            $sname = isset($_POST['sname']) ? $_POST['sname'] : null;
        
            if ($sid != null) {
                $sql = "DELETE FROM supplier WHERE supplier_id = $sid";
            } elseif ($sname != null) {
                $sql = "DELETE FROM supplier WHERE supplier_name = '$sname'";
            }
        
            $result=mysqli_query($conn, $sql);

            if($result){
                if(mysqli_affected_rows($conn)>0){
                    echo "<script> alert('Deleted supplier details successfully!');</script>";
                }else{
                    echo "<script> alert('Supplier not found!');</script>";
                }
            }
            else {
                echo "Error deleting record: " . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
    
    ?>
</body>
</html>