<?php
$conn = mysqli_connect("localhost", "root", "", "Bank");
if($conn-> connect_error){
	die("connection failed:". $conn-> connect_error);
}
$sql = "SELECT name, accountNumber,CurrentBalance,email FROM customers";
error_reporting(0);
$result = mysqli_query($conn,"SELECT *  FROM customers");
$resul1 = mysqli_query($conn,"SELECT *  FROM customers");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/x-icon" href="icon.png">
	<title>Transfer Credits</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css?version=10" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
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
<div class ='form'> 
	<h1 align ='center', font-family: 'Times New Roman', serif;> Credit Transfer </h1>
</div> 
<div class='main'>
<form action="" method="GET" class = "form">
		<select  class= fromuser type="text"  name="u1" required value="">
		<option value ="">From Customer</option>
		<?php
                        while($tname = mysqli_fetch_array($result)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

        </select>
		<select  class =touser  type="text" name="u2" value="">
	     <option value ="">To Customer</option>
		<?php
                        while($tname = mysqli_fetch_array($resul1)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

        </select>
		
		<input type="text" id="amount" name="amt" placeholder="Enter the amount">
		
		<input type="submit" id= submit name="submit" value="Confirm">
		
	</form>
</div>

	<?php
	
			if($_GET['submit'])
			{
			$u1=$_GET['u1'];
			$u2=$_GET['u2'];
			$amt=$_GET['amt'];


			if($u1!="" && $u2!="" && $amt!="")
                          
                                                    
			{
				//update transaction changes in database
				$query1= "UPDATE customers  SET CurrentBalance = CurrentBalance + '$amt' WHERE name = '$u2' ";
				$data1= mysqli_query($conn, $query1);
				$query2= "UPDATE  customers SET CurrentBalance = CurrentBalance  - '$amt' WHERE name = '$u1' ";
				$data2= mysqli_query($conn, $query2);
				
				//insert into transaction_history
                                    

				    $query1 = "INSERT INTO transfer_history (from_customer,to_customer,Amount) VALUES('$u1','$u2','$amt')";
                                    $res2 = mysqli_query($conn,$query1);
				
                                         if($res2){
		                           	 $user1 = "SELECT * FROM customers WHERE  name='$u1' ";
                                                 $res=mysqli_query($conn,$user1);
                                                 $row_count=mysqli_num_rows($res);
			                     }
				
            

				     if ($data1 && $data2)
				     {
					$message="Successful transfer";
                                        echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}
				else
				{
					$message="Error While Commiting Transaction ";
					echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}

			}

			else
			{
				$message="All the fields are mandatory";
				echo "<script type='text/javascript'>alert('$message');
                    </script>";
			}
		}
		

	?>
</div>	
<div class="middle">
	<h3 style="color: #fff8dc">The Sparks Foundation &copy;</h3>
	
</div>
</body>
<footer> &copy; Copyright 2021, Author: Nikhil Saud </footer> 
</html>