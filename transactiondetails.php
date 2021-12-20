<!Doctype html>
<html>
<head>
	<link rel="icon" type="image/x-icon" href="icon.png">
	<title>Transfer History</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css?version=10">
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
	<h1>Transaction History</h1>
	<tr>
		<th>Sender</th>
		<th>Receiver</th>
		<th>Amount</th>
	</tr>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "Bank");
	if($conn-> connect_error){
		die("connection failed:". $conn-> connect_error);
	}

	$sql = "SELECT * FROM transfer_history";
	$result = $conn-> query($sql);

	if($result-> num_rows > 0){

		while ( $row = $result -> fetch_assoc()) {
			echo "<tr><td>". $row["from_customer"] ."</td><td>".  $row["to_customer"] ."</td><td>" .  $row["Amount"] ."</td></tr>";
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
	<h3 style="color: #fff8dc">The Sparks Foundation &copy;</h3>
	
</div>	
</body>
<footer> &copy; Copyright 2021, Author: Nikhil Saud </footer> 
</html>