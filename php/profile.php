<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>

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
$name="Select * from signup";
$res=mysqli_query($conn,$name); 
$row = mysqli_fetch_assoc($res);
 
?>
    <header>
    <div class="headSection" id="headSection">
                <h1 class=>Your Profile</h1>
               
    </div>
     
    </header>

    <main>
        <div class="container">
            <div class="content">
                <div class="member">
                    <h2><?php 
                    echo $row['first_name'];
                    
                    ?>
                    </h2>
                    <p>First name</p>
                </div>
                <div class="member">
                <h2><?php 
                    echo $row['last_name'];
                    
                    ?>
                    </h2>
                    <p>Last name</p>

                </div>
                <div class="member">
                <h2><?php 
                    echo $row['phone_number'];
                    
                    ?>
                    </h2>
                    <p>Contact number</p>
                    
                </div>
                <div class="member">
                    
                <h2><?php 
                    echo $row['shop_name'];
                    
                    ?>
                    </h2>
                    <p>Shop name</p>
                    
                </div>
            
                <div class="member">
                    
                    <h2><?php 
                        echo $row['shop_address'];
                        
                        ?>
                        </h2>
                        <p>Shop Address</p>
                        
                </div>
                <div class="member">
                    
                    <h2><?php 
                        echo $row['gst_number'];
                        
                        ?>
                        </h2>
                        <p>GST Number</p>
                        
                </div>
                <div class="member">
                    
                    <h2><?php 
                        echo $row['username'];
                        
                        ?>
                        </h2>
                        <p>Username</p>
                        
                </div>
                <div class="member">
                    
                    <h2><?php 
                        echo $row['email'];
                        
                        ?>
                        </h2>
                        <p>Email ID</p>
                        
                </div>
                <div class="member">
                    <h2 id="password"><?php echo str_repeat('*', strlen($row['password'])); ?></h2>
                    <span class="eye" onclick="togglePassword()">
                        <i class="fa fa-eye-slash" id="eye-slash"></i>
                        <i class="fa fa-eye" id="eye" style="display:none;"></i>
                    </span>
                    <p>Password</p>
                </div>
            </div>
        </div>
        <div class="submit">
            <button class="edit" onclick="window.location.href='../php/edit_profile.php'">Edit</button>
            <button class="edit" onclick="window.location.href='../php/dashboard.php'">Back</button>
        </div>
    </main>
    <script>
        function togglePassword() {
            var pass = document.getElementById("password");
            var eye = document.getElementById("eye");
            var eyeSlash = document.getElementById("eye-slash");

            if (pass.innerText === "<?php echo str_repeat('*', strlen($row['password'])); ?>") {
                pass.innerText = "<?php echo $row['password']; ?>";
                eye.style.display = "inline";
                eyeSlash.style.display = "none";
            } else {
                pass.innerText = "<?php echo str_repeat('*', strlen($row['password'])); ?>";
                eye.style.display = "none";
                eyeSlash.style.display = "inline";
            }
        }
    </script>
    <?php
        mysqli_close($conn);
    ?>
</body>
</html>