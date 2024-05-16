<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <!-- INCLUDE LOGO AND COMPANY NAME HERE -->
        <div class="menu-bar">
            <a href="../html/index.html">Home</a>
            <a href="../html/team.html">Team</a>
            <a href="../php/login.php">Login</a>
            <a href="../html/signup.html">Sign up</a>
            <a href="../html/contact.html" id="contact-us">Contact Us</a> 
        </div>
    </header>

    <main>
        <div class="box">
            <div class="container">
                <form action="../php/dashboard.php" method="post" autocomplete="off">
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
                <button><a href="../html/signup.html">Sign up</a></button>
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
            
            $sql= "TRUNCATE TABLE signup";
            mysqli_query($conn,$sql);

            $sql = "insert into signup values('$fname','$lname','$phno','$shopname','$shopadd','$uname','$email','$pass')";
            mysqli_query($conn, $sql);

            $sql = "ALTER TABLE product DROP CONSTRAINT sup_id_fk";
            mysqli_query($conn,$sql);

            $sql = "ALTER TABLE customer_order DROP CONSTRAINT cus_id_fk";
            mysqli_query($conn,$sql);

            $sql = "ALTER TABLE order_items DROP CONSTRAINT ord_id_fk";
            mysqli_query($conn,$sql);

            $sql = "ALTER TABLE order_items DROP CONSTRAINT pid_id_fk";
            mysqli_query($conn,$sql);

            $sql = "DROP TABLE product";
            mysqli_query($conn,$sql);

            $sql = "DROP TABLE customer";
            mysqli_query($conn,$sql);

            $sql = "DROP TABLE supplier";
            mysqli_query($conn,$sql);

            $sql = "DROP TABLE customer_order";
            mysqli_query($conn,$sql);

            $sql = "DROP TABLE order_items";
            mysqli_query($conn,$sql);

            $sql_supplier="CREATE TABLE supplier (
                supplier_id INT PRIMARY KEY AUTO_INCREMENT,
                supplier_name varchar(40),
                supplier_phonenumber varchar(60),
                supplier_address varchar(100),
                quantity_supplied INT DEFAULT 0 ) ";
             mysqli_query($conn,$sql_supplier);

             $sql_supplier="Alter table supplier AUTO_INCREMENT=1";
             mysqli_query($conn,$sql_supplier);

            
            $sql_customer="CREATE TABLE customer(
                customer_id INT PRIMARY KEY AUTO_INCREMENT,
                customer_name varchar(15),
                customer_phonenumber varchar(40),
                customer_address varchar(100),
                no_of_visits INT DEFAULT 0)";
             mysqli_query($conn,$sql_customer);

             $sql_supplier="Alter table customer AUTO_INCREMENT=100";
             mysqli_query($conn,$sql_supplier);
            
            $sql_product = "CREATE TABLE product (
                product_id INT AUTO_INCREMENT PRIMARY KEY,
                product_name varchar(40),
                category varchar(40),
                price DECIMAL(10,2),
                quantity_available INT,
                supplier_id INT)";
            mysqli_query($conn,$sql_product);

            $sql_supplier="Alter table product AUTO_INCREMENT=1000";
            mysqli_query($conn,$sql_supplier);
        
            $sql_customer_order = "CREATE TABLE customer_order(
                order_id INT AUTO_INCREMENT PRIMARY KEY,
                customer_id INT,
                order_date DATE DEFAULT NULL,
                total_price DECIMAL(10,2) DEFAULT 0.00) ";
            mysqli_query($conn,$sql_customer_order);

            $sql_supplier="Alter table customer_order AUTO_INCREMENT=1";
            mysqli_query($conn,$sql_supplier);

            $sql_order_items = "CREATE TABLE order_items(
                order_item_id INT AUTO_INCREMENT PRIMARY KEY,
                order_id INT,
                product_id INT,
                quantity INT,
                subtotal DECIMAL(10,2) DEFAULT 0)";
            mysqli_query($conn,$sql_order_items);

            $sql_supplier="Alter table order_items AUTO_INCREMENT=1";
            mysqli_query($conn,$sql_supplier);

            $sql = "ALTER TABLE product ADD CONSTRAINT sup_id_fk FOREIGN KEY(supplier_id) REFERENCES supplier(supplier_id)";
            mysqli_query($conn,$sql);

            $sql = "ALTER TABLE customer_order ADD CONSTRAINT cus_id_fk FOREIGN KEY(customer_id) REFERENCES customer(customer_id)";
            mysqli_query($conn,$sql);

            $sql = "ALTER TABLE order_items ADD CONSTRAINT ord_id_fk FOREIGN KEY(order_id) REFERENCES customer_order (order_id)";
            mysqli_query($conn,$sql);

            $sql = "ALTER TABLE order_items ADD CONSTRAINT pid_id_fk FOREIGN KEY(product_id) REFERENCES product(product_id)";
            mysqli_query($conn,$sql);

            $sql = "CREATE OR REPLACE TRIGGER modify_supplier
                    AFTER INSERT ON product
                    FOR EACH ROW
                    BEGIN
                        UPDATE supplier SET quantity_supplied = quantity_supplied + NEW.quantity_available WHERE NEW.supplier_id = supplier.supplier_id;
                    END";
            mysqli_query($conn,$sql);

            
            $sql = "CREATE OR REPLACE TRIGGER modify_quantity_available
                    AFTER UPDATE ON customer_order
                    FOR EACH ROW
                    BEGIN
                        IF NEW.order_date != OLD.order_date THEN
                            UPDATE product SET quantity_available = quantity_available - NEW.quantity WHERE NEW.product_id = product.product_id;
                        END IF;
                    END
                    ";
            mysqli_query($conn,$sql);
            
            $sql = "CREATE OR REPLACE FUNCTION billing(o_id INT)
                    RETURNS DECIMAL(10,2)
                    BEGIN
                        DECLARE price DECIMAL(10,2);
                        DECLARE quantity INT;
                        DECLARE result DECIMAL(10,2);

                        SET result := 0.0;
                            SELECT p.price, o.quantity INTO price, quantity
                            FROM product p, order_items o
                            WHERE o.product_id = p.product_id
                            AND o.order_item_id = o_id;
                        SET result := price * quantity;
                        RETURN result;
                    END            
                    ";
            mysqli_query($conn,$sql); 
        }
        
        mysqli_close($conn);
    ?>

<script src="../script/login.js"></script>
</body>
</html>