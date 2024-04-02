<?php
session_start();
$user=$_POST['name'];
$password=$_POST['password'];
$servername = "localhost";
$username="root";
$dbname = "banking_system";
$conn = new mysqli($servername,$username,"", $dbname);
if ($conn->connect_error) {
    die( $conn->connect_error);
} 
$sql = mysqli_query($conn,"SELECT * FROM register WHERE user='$user'");
$nrow=mysqli_num_rows($sql);
if ($nrow!=0)
{
	$query="UPDATE register SET pwd='$password' where user='$user' ";
if ($conn->query($query)) 
{
    echo '<script>alert("PASSWORD UPDATED SUCESSFULLY")</script>';
	echo'<script>window.location.assign("login.html	")</script>';
	$_SESSION['name']=$user;
}} 
else 
{
  
	echo '<script>alert("USER DOES NOT EXISTS")</script>';
	echo '<script>window.location.assign("register.html")</script>';
}
$conn->close();
?>

			