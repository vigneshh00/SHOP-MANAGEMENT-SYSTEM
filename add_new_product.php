<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link rel="stylesheet" href="signup.css">
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>

</head>
<body>

    <main>
        <div class="box">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" autocomplete="off">
                    <h1>ADD A PRODUCT</h1>
                    <div class="pid">
                        <input type="text" name="pid" id="productId" required>
                        <label for="productId">Product ID</label>
                        <span class="line"></span>
                    </div>
                    <div class="lname">
                        <input type="text" name="lname" id="lastname" required>
                        <label for="lastname">Product Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="shopadd">
                        <label for="shop_address" class="shadd">Product Description</label>
                        <textarea name="shopadd" id="shop_address" cols="55" rows="10" required></textarea>
                    </div>
                    <div class="phno">
                        <input type="text" name="phno" id="phone_number" required>
                        <label for="phone_number">Price</label>
                        <span class="line"></span>
                    </div>
                    <div class="shopname">
                        <input type="text" name="shopname" id="shopname" required>
                        <label for="shopname">Quantity Available</label>
                        <span class="line"></span>
                    </div>
                    <div class="name">
                        <input type="text" name="uname" id="username" required>
                        <label for="username">Supplier ID</label>
                        <span class="line"></span>
                    </div>
                    <div class="submit">
                        <button type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    
    <script src="signup.js"></script>
</body>
</html>