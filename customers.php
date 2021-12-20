<!Doctype html>
<html>
<head>  
	<link rel="icon" type="image/x-icon" href="icon.png">
	<title>Customer Catalogue</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css?version=10" >
</head>
<body>
	<div class="topnav">
		<a class="active" href="transactiondetails.php">Transaction History</a>
  		<a class="active" href="customers.php">Customer Catalogue</a>
  		<a class="active" href="transaction.php">Credit Transfer</a>
  	<div class="topnav-right">
  		<a class="active" href="index.php">Home</a>

  </div>
</div>
</div>  
<table class="viewusers">
	<h1>Customer Particulars</h1>
	<tr>
		<th>Name</th>
		<th>Account Number</th>
		<th>Balance</th>
                <th>Email </th> 
		
	</tr>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "Bank");
	if($conn-> connect_error){
		die("connection failed:". $conn-> connect_error);
	}

	$sql = "SELECT name, accountnumber, CurrentBalance,email FROM customers";
	$result = $conn-> query($sql);

	if($result-> num_rows > 0){

		while ( $row = $result -> fetch_assoc()) {
			echo "<tr><td>". $row["name"] ."</td><td>".  $row["accountnumber"] ."</td><td>" .  $row["CurrentBalance"] ."</td><td>"  .  $row["email"] ."</td></tr>";
		}
		echo "</table>";

	}
	else {
		echo "no result";
	}
    $conn-> close();
	?>
</table>
<div class="middle">
	<h3 style="color: #FFF8DC"><strong>The Sparks Foundation &copy;</strong></h3>
	
</div>
</body>
<footer> &copy; Copyright 2021, Author: Nikhil Saud </footer> 
</html>