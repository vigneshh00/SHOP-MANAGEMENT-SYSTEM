<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../css/edit_profile.css">
    <link rel="icon" type="image/x-icon" href="../images/icon_logo.png" />
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>

</head>

<body>


    <header>
        <div class="headSection" id="headSection">
            <h1 class="heading">Edit Profile</h1>

        </div>
    </header>


    <main>
        <div class="box">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off"
                    onsubmit="return validateForm()">
                    <h1>EDIT</h1>
                    <div class="name">
                        <input type="text" name="uname" id="username" required>
                        <label for="username">Username</label>
                        <span class="line"></span>
                    </div>
                    <div class="fname">
                        <input type="text" name="fname" id="firstname">
                        <label for="firstname">First name</label>
                        <span class="line"></span>
                    </div>
                    <div class="lname">
                        <input type="text" name="lname" id="lastname">
                        <label for="lastname">Last name</label>
                        <span class="line"></span>
                    </div>
                    <div class="phno">
                        <input type="text" name="phno" id="phone_number">
                        <label for="phone_number">Phone Number</label>
                        <span class="line"></span>
                    </div>
                    <div class="shopname">
                        <input type="text" name="shopname" id="shopname">
                        <label for="shopname">Shop name</label>
                        <span class="line"></span>
                    </div>
                    <div class="shopadd">
                        <label for="shop_address" class="shadd">Shop Address</label>
                        <textarea name="shopadd" id="shop_address" cols="40" rows="10"></textarea>
                    </div>
                    <div class="gstnumber">
                        <input type="text" name="gstno" id="gstnumber">
                        <label for="gstnumber">GST Number</label>
                        <span class="line"></span>
                    </div>
                    <div class="email">
                        <input type="text" name="email" id="email">
                        <label for="email">Email</label>
                        <span class="line"></span>
                    </div>
                    <div class="password">
                        <input type="password" name="password" id="pass">
                        <label for="pass">Password</label>
                        <span class="line"></span>
                        <span class="eye" onclick="myshow1()">
                            <i class="fa fa-eye" id="eye1"></i>
                            <i class="fa fa-eye-slash" id="eye2"></i>
                        </span>
                    </div>
                    <div class="password">
                        <input type="password" name="cm_pass" id="confirm_password">
                        <label for="confirm_password">Confirm Password</label>
                        <span class="line"></span>

                        <span class="eye" onclick="myshow2()">
                            <i class="fa fa-eye" id="eye3"></i>
                            <i class="fa fa-eye-slash" id="eye4"></i>
                        </span>

                    </div>
                    <div class="submit">
                        <button type="submit">Update</button>
                    </div>
                </form>
                <div class="submit">
                    <button onclick="window.location.href='../php/profile.php'">Profile page</button>
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
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $phone_number = intval($_POST['phno']);
    $shop_name = $_POST['shopname'];
    $shop_address=$_POST['shopadd'];
    $gstno=$_POST['gstno'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $password=$_POST['cm_pass'];
    $sql="UPDATE signup SET";
    $updates=array();
    if(!empty($first_name)){
        $updates[] = " first_name='$first_name'";
       
    }
    if(!empty($last_name)){
        $updates[] = " last_name='$last_name'";
       
    }
    if(!empty($phone_number)){
        $updates[] = " phone_number='$phone_number'";
       
    }
    if(!empty($shop_name)){
        $updates[] = " shop_name='$shop_name'";
       
    }
    if(!empty($shop_address)){
        $updates[] = " shop_address='$shop_address'";
       
    }
    if(!empty($gstno)){
        $updates[] = " gst_number='$gstno'";
       
    }
    if(!empty($email)){
        $updates[] = " email='$email'";
       
    }
    if(!empty($password)){
        $updates[] = " password='$password'";
       
    }
    if(!empty($updates)){
        $sql .=implode(", ",$updates) . " WHERE username='$username'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn)>0){
            echo "<script> alert('Updated profile successfully!');</script>";}
        else{
            echo "<script> alert('Username not found!');</script>";
        }
        }}
    
        mysqli_close($conn);
  

?>

    <script src="../script/edit_profile.js"></script>
</body>

</html>