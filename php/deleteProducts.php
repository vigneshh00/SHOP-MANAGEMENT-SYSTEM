<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete products</title>
    <link rel="stylesheet" href="../css/deleteProducts.css">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>

</head>
<body>

    <main>
        <div class="box">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                    <h1>DELETE</h1>
                    <div class="fname">
                        <input type="text" name="pid" id="customerID">
                        <label for="pid">By Product ID</label>
                        <span class="line"></span>
                    </div>

                    <div class="choice" style="align-self: center">
                        <p style="text-align: center"> Or </p>
                    </div>
                    <div class="lname">
                        <input type="text" name="pname" id="customerName">
                        <label for="pname">By Product Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="btns">
                        <button type="submit" name="submit" value="submit">Delete</button>
                    </div>
                    </form>
                    <div class="btns">
                        <button onclick="window.location.href='../php/list.php'">Product list</button>
                    </div>
                    <div class="btns">
                        <button onclick="window.location.href='../html/products.html'">Back</button>
                    </div>
                    
                
                
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
            $productID = isset($_POST['pid']) ? intval($_POST['pid']) : null;
            $productName = isset($_POST['pname']) ? $_POST['pname'] : null;
        
            if ($productID != null) {
                $sql = "DELETE FROM product WHERE product_id = $productID";
            } elseif ($productName != null) {
                $sql = "DELETE FROM product WHERE product_name = '$productName'";
            }
        
            $result=mysqli_query($conn, $sql);
            if($result){
                if(mysqli_affected_rows($conn)>0){
                echo "<script> alert('Deleted product details successfully!');</script>";}
                else{
                    echo "<script> alert('Product not found!');</script>";
                }
            }
            else {
                echo "Error deleting record: " . mysqli_error($conn);
            }
            } mysqli_close($conn);}
        
        
       
        
    
?>


</body>
</html>