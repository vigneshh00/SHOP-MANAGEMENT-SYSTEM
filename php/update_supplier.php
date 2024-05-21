<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Supplier</title>
    <link rel="stylesheet" href="../css/update_supplier.css">
    <link rel="icon" type="image/x-icon" href="../images/icon_logo.png" />
</head>

<body>
    <main>
        <div class="box">
            <div class="container">
                <form action="" method="post" autocomplete="off">
                    <h1>UPDATE SUPPLIER</h1>
                    <div class="sid">
                        <input type="text" name="sid" id="supplierId" required>
                        <label for="supplierId">Supplier ID</label>
                        <span class="line"></span>
                    </div>
                    <div class="sname">
                        <input type="text" name="sname" id="supplierName">
                        <label for="supplierName">Supplier Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="phno">
                        <input type="text" name="phonenumber" id="phno">
                        <label for="phno">Phone number</label>
                        <span class="line"></span>
                    </div>
                    <div class="add">
                        <label for="sup_add" class="shadd">Address</label>
                        <textarea name="add" id="sup_add" cols="42" rows="7"></textarea>
                    </div>
                    <div class="submit">
                        <button type="submit">Update</button>
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
            $sid = $_POST['sid'];
            $sname=$_POST['sname'];
            $phno = $_POST['phonenumber'];
            $add = $_POST['add'];

            $sql="UPDATE supplier SET";
            $updates=array();

            if(!empty($sname)){
                $updates[] = " supplier_name='$sname'";
            }
            if(!empty($phno)){
                $updates[] = " supplier_phonenumber='$phno'";
            }
            if(!empty($add)){
                $updates[] = " supplier_address='$add'";
            }

            if(!empty($updates)){
                $sql .=implode(", ",$updates) . " WHERE supplier_id = '$sid'";
                $result=mysqli_query($conn,$sql);
                
                if($result){
                    if(mysqli_affected_rows($conn)>0){
                        echo "<script> alert('Updated supplier details successfully!');</script>";
                    }else{
                        echo "<script> alert('Supplier not found!');</script>";
                    }
                }else {
                    echo "<script> alert('Error updating record'); </script>";
                }
            }
        }

        mysqli_close($conn);
    
    ?>
</body>

</html>