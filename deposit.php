<?php
session_start();
$user=$_POST['name']=$_SESSION['name'];
$servername = "localhost";
$username="root";
$amo=$_POST['amount'];
$dbname = "banking_system";


$conn = new mysqli($servername,$username,"", $dbname);

if ($conn->connect_error) {
    die( $conn->connect_error);
} 
$sql = mysqli_query($conn,"SELECT * FROM register WHERE user='$user'");
$nrow=mysqli_num_rows($sql);

if ($nrow!=0) 
{
	
$query="INSERT INTO balance VALUES ('$user','$amo',CURDATE() )";
if ($conn->query($query)) 
{
    echo '<script>alert("Deposited successfully")</script>';
	echo'<script>window.location.assign("balance.php")</script>';
	$_SESSION['name']=$user;
	} 
}

else 
{
   echo '<script>alert("No user logged-in")</script>';
	echo'<script>window.location.assign("login.html")</script>';
}
$conn->close();
?>

			