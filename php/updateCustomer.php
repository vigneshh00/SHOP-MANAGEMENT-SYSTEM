<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
    <link rel="stylesheet" href="../css/addCustomer.css">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>

</head>

<body>

    <main>
        <div class="box">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                    <h1>UPDATE DETAILS</h1>
                    <div class="namel">
                        <input type="text" name="cid" id="customerId" required>
                        <label for="customerId">Customer ID</label>
                        <span class="line"></span>
                    </div>
                    <div class="lname">
                        <input type="text" name="customerName" id="customerName">
                        <label for="customerName">Customer Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="phno">
                        <input type="text" name="phno" id="phone_number">
                        <label for="phone_number">Phone Number</label>
                        <span class="line"></span>
                    </div>
                    <div class="customer_add">
                        <label for="customer_address" class="shadd">Address</label>
                        <textarea name="cust_add" id="customer_address" cols="38" rows="10"></textarea>
                    </div>
                    <div class="btns" id="btns">
                        <button type="submit" name="submit" value="submit">Update</button>
                        <button onclick="window.location.href='../html/customer.html'">Back</button>
                    </div>
                </form>

            </div>
        </div>
    </main>
    <?php

// if (isset($_POST['submit'])) { 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop management system";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_id = $_POST['cid'];
        $customerName = $_POST['customerName'];
        $phno = $_POST['phno'];
        $customerAddress = $_POST['cust_add'];
        
        $sql="UPDATE customer SET";
        $updates=array();
        
        if(!empty($customerName)){
            $updates[] = " customer_name='$customerName'";
        }
        if(!empty($phno)){
            $updates[] = " customer_phonenumber='$phno'";
        }
        if(!empty($customerAddress)){
            $updates[] = " customer_address='$customerAddress'";
        }
        
        if(!empty($updates)){
            $sql .=implode(", ",$updates) . " WHERE customer_id = '$customer_id'";
            $result=mysqli_query($conn,$sql);
            
            if($result){
                echo "<script> alert('Updated Customer details successfully!');</script>";
            }else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    }

    

    mysqli_close($conn);

?>

</body>

</html>