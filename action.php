<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop management system";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phno = $_POST['phone_number'];
$shname = $_POST['shopname'];
$shadd = $_POST['shop_address'];
$userid = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$cpass = $_POST['confirm_password'];

$sql = "insert into signup values('$fname','$lname','$phno','$shname','$shadd','$userid','$email','$pass','$cpass')";

if (mysqli_query($conn, $sql)) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>