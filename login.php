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
                <a href="team.html">Team</a>
                <a href="login.php">Login</a>
                <a href="signup.html">Sign up</a>
                <a href="contact.html" id="contact-us">Contact Us</a>   
            </nav>
        </div>
    </header>

    <main>
        <div class="box">
            <div class="container">
                <form action="dashboard.php" method="post" autocomplete="off">
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
                    <div class="forgot">
                        <p>Forgot Password?</p>
                    </div>
                    <div class="submit">
                        <button type="submit">Login</button>
                    </div>
                </form>
                
            </div>
            <div class="container-1">
                <h1>Hello there!</h1>
                <p>
                    We're glad to see you again. Please login to unlock our site's features.<br><br>
                    Don't have an account?
                </p>
                <button><a href="signup.html">Sign up</a></button>
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

           $sql = "insert into signup values('$fname','$lname','$phno','$shopname','$shopadd','$uname','$email','$pass')";

            mysqli_query($conn, $sql);

        //   $sql = "DROP TABLE product CASCADE CONSTRAINTS";
        //     mysqli_query($conn,$sql);

        //     $sql = "DROP TABLE customer CASCADE CONSTRAINTS";
        //     mysqli_query($conn,$sql);

        //     $sql = "DROP TABLE supplier CASCADE CONSTRAINTS";
        //     mysqli_query($conn,$sql);

        //     $sql = "DROP TABLE customer_order CASCADE CONSTRAINTS";
        //     mysqli_query($conn,$sql);

        //     $sql = "DROP TABLE order_items CASCADE CONSTRAINTS";
        //     mysqli_query($conn,$sql);

            $sql="CREATE OR REPLACE TABLE supplier (
                supplier_id int,
                contact_info number,
                supplier_name varchar(15),
                constraint sup_id_pk primary key (supplier_id)) ";
             mysqli_query($conn,$sql);
            
            $sql="CREATE OR REPLACE TABLE customer(
                customer_id int,
                customer_name varchar(15),
                contact_info number,
                constraint cus_id_pk primary key (customer_id))";
             mysqli_query($conn,$sql);
            
            $sql = "CREATE OR REPLACE TABLE product (
                product_id int,
                product_name varchar(40),
                product_description varchar(100),
                price real,
                qty_available number default 0,
                supplier_id int,
                constraint pid_pk primary key (product_id),
                constraint sup_id_fk foreign key(supplier_id) references supplier(supplier_id))";
            mysqli_query($conn,$sql);
            
            $sql = "CREATE TABLE customer_order(
                order_id int,
                customer_id int,
                order_date date,
                total_price real,
                constraint ord_id_pk primary key (order_id),
                constraint cus_id_fk foreign key(customer_id) references customer (customer_id))";
            mysqli_query($conn,$sql);

            $sql = "CREATE OR REPLACE TABLE order_items(
                order_item_id int,
                order_id int,
                product_id int,
                quantity number,
                subtotal real,
                constraint ord_item_id_pk primary key (order_item_id),
                constraint ord_id_fk foreign key (order_id) references customer_order (order_id),
                constraint pid_fk foreign key (product_id) references poduct (product_id))";
            mysqli_query($conn,$sql);

        }
        
        mysqli_close($conn);
    ?>

<script src="login.js"></script>
</body>
</html>