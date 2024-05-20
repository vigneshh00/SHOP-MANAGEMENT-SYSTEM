<?php
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>List Customer</title>
    <link rel='stylesheet' href='../css/listCustomer.css'>
    <style>
		h3 {
    		font-size: 60px;
    		font-weight: 900;
    		font-style: italic;
    		margin-bottom: 15px;
    		margin-left: 30px;
    		margin-top: 20px;
		}
		
		div{
        	display: flex;
        	justify-content: center;
        	align-items: center;  
        	border-radius: 100px;
    	}
      	
		table {
        	width: 100%;
        	padding: 10px;
        	font-family: 'Trebuchet MS';  
        	margin-left: 20px;
        	margin-right: 20px; 
        	border-collapse: separate;
        	border-radius: 10px;     
		}	
    
		th {
        	font-size: 25px;
        	background-color: black;
        	color: whitesmoke;
    	}
      
		th, td {
        	padding: 8px;
        	text-align: center;
        	border-bottom: 2px solid #ddd;
    	}
    
    	td {
        	font-size: 20px;
      	}
      
		tr{
      		background-color: #bcbcbc;
      	}
      
      	tr:hover {
        	background-color: #444;
        	color: whitesmoke;
      	}

      	table tr:last-child td:first-child {
    		border: 2px solid #ddd;
    		border-bottom-left-radius: 20px;
		}
    
		table tr:last-child td:last-child {
    		border-: 2px solid #ddd;
    		border-bottom-right-radius: 20px;
		}
      	
		table tr:first-child th:first-child {
    		border: 2px;
    		border-top-left-radius: 20px;
		}
    
		table tr:first-child th:last-child {
    		border: 2px;
    		border-top-right-radius: 20px;
		}
    </style>

</head>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop management system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==0){
    echo "<p class='message' id='message'>No Customers to display!<p>";
    echo "<div class=\"submit\"><button class=\"bt\" onclick=\"window.location.href='../php/addCustomer.php'\">Add your first customer</button> </div>";
    echo "<div class=\"submit\"><button class=\"bt\" id=\"back\" onclick=\"window.location.href='../html/customer.html'\">Back</button> </div>";
} 

elseif (mysqli_num_rows($result) > 0) {
    echo "<h3>Customer Details</h3><div>
            <table>
              <tr>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Phone Number</th>
                  <th>Address</th>
                  <th>Number of Visits</th>
              </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row["customer_id"]."</td>
                <td>".$row["customer_name"]."</td>
                <td>".$row["customer_phonenumber"]."</td>
                <td>".$row["customer_address"]."</td>
                <td>".$row["no_of_visits"]."</td>
              </tr>";
    }
    echo "</table></div>";
    echo "<div class=\"submit\"><button class=\"bt\" id=\"back\" onclick=\"window.location.href='../html/customer.html'\">Back</button> </div>";
}

mysqli_close($conn);

?>