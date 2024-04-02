<?php
session_start();
$user=$_POST['name']=$_SESSION['name'];
$servername = "localhost";
$username="root";
$dbname = "banking_system";


$conn = new mysqli($servername,$username,"", $dbname);

if ($conn->connect_error) {
    die( $conn->connect_error);
} 
$sql = mysqli_query($conn,"SELECT * FROM balance WHERE user='$user'");
$nrow=mysqli_num_rows($sql);
if ($nrow=0) 
{
	$query="DELETE FROM register WHERE user='$user'";

if ($conn->query($query)) 
{
    echo "deleted successfully";
	echo'<script>window.location.assign("register.html")</script>';
	$_SESSION['name']=$user;
	} 
else 
{
    echo "error". mysqli_error($conn);
}
}
else
{
$query1="DELETE FROM balance WHERE user='$user'";
$query2="DELETE FROM register WHERE user='$user'";

if ($conn->query($query1) && $conn->query($query2)) 
{
    echo '<script>alert("account closed successfully")</script>';
	echo'<script>window.location.assign("register.html")</script>';
	$_SESSION['name']=$user;
	} 
else 
{
    echo "error". mysqli_error($conn);
} 
}
$conn->close();
?>