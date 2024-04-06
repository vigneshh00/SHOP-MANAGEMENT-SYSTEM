<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <!-- INCLUDE LOGO AND COMPANY NAME HERE -->
        <div class="menu-bar">
            <nav>
                <a href="index.html">Home</a>
                <a href="#about">About</a>
                <a href="login.php">Login</a>
                <a href="signup.html">Sign up</a>
                <a href="contact.html" id="contact-us">Contact Us</a>   
            </nav>
        </div>
    </header>

    <main>
        <div class="box">
            <div class="container">
                <form action="main.php" method="post" autocomplete="off">
                    <h1>LOGIN</h1>
                    <div class="uname">
                        <input type="text" name="username"required>
                        <label for="username">Username</label>
                        <span class="line"></span>
                        <span class="icon"><i class="fa-solid fa-user" ></i></span>
                    </div>
                    <div class="email">
                        <input type="text" name="email"required>
                        <label for="email">Email</label>
                        <span class="line"></span>
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    </div>
                    <div class="password">
                        <input type="password" name="password" id="pass"required>
                        <label for="password">Password</label>
                        <span class="line"></span>
                        <span class="eye" onclick="myshow()">
                            <i class="fa-solid fa-eye" id="eye1"></i>
                            <i class="fa-solid fa-eye-slash" id="eye2"></i>
                        </span>
                    </div>
                    <div class="submit">
                        <button type="submit">Login</button>
                    </div>
                </form>
                <div class="page">
                    <p>Don't have an account? <a href="signup.html">Sign Up</a></p>
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
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phno = $_POST['phno'];
            $shopname = $_POST['shopname'];
            $shopadd = $_POST['shopadd'];
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $cmpass = $_POST['cm_pass'];

            $sql = "insert into signup values('$fname','$lname','$phno','$shopname','$shopadd','$uname','$email','$pass','$cmpass')";

            mysqli_query($conn, $sql);
        }
        
        mysqli_close($conn);
    ?>

<script src="login.js"></script>
</body>
</html>