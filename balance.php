<?php
session_start();
$user=$_SESSION['name'];
$servername = "localhost";
$username="root";
$dbname = "banking_system";

$conn = new mysqli($servername,$username,"", $dbname);

if ($conn->connect_error) {
    die( $conn->connect_error);
} 
$query=mysqli_query($conn,"SELECT *  from balance WHERE user='$user'");
$balance=0.00;

   
			while($row=mysqli_fetch_assoc($query))
			{
				$balance= $balance + $row['balance'];
			}
			$print =$user . "\'s \Balance is :" . $balance;
			echo"<script> alert('$print'); </script>";
			echo'<script>window.location.assign("main.html")</script>';  
			


$conn->close();
?>

			