<?php
session_start();
$user=$_POST['name']=$_SESSION['name'];
$servername = "localhost";
$username="root";
$amo=$_POST['amount'];
$dbname = "banking_system";

$conn = new mysqli($servername,$username,"", $dbname);

if ($conn->connect_error) 
{
    die( $conn->connect_error);
}	
$query=mysqli_query($conn,"SELECT *  from balance WHERE user='$user'");
$balance=0.00;
			while($row=mysqli_fetch_assoc($query))
			{
				$balance= $balance + $row['balance'];
			} 
		
		
if($amo>$balance)
{
		echo'<script>alert("insufficient balance")</script>';
		echo'<script>window.location.assign("balance.php")</script>';

			
}
	else{	
		$query1="INSERT INTO balance VALUES ('$user','-$amo',CURDATE())";
		if($conn->query($query1) === TRUE) 
{
			echo '<script>alert("withdrawn successfully")</script>';
			echo'<script>window.location.assign("balance.php")</script>';
			$_SESSION['name']=$user;
}
		else{
				echo '<script>alert("No user logged-in")</script>';
	echo'<script>window.location.assign("login.html")</script>';
			}
	}
$conn->close();
?>