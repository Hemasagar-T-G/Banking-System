<?php
$servername = "localhost";
$username="root";
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$aad=$_POST['aad'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$add=$_POST['add'];
$dbname="banking_system";
$conn = new mysqli($servername,$username,"", $dbname);

if ($conn->connect_error)
{
    die( $conn->connect_error);
} 
$query="INSERT INTO  register VALUES ( '$user','$pwd','$aad','$phone','$gender','$dob','$email','$add')";
if ($conn->query($query) === TRUE) 
{
    echo'<script>window.location.assign("login.html")</script>';
} 
else 
{
	echo mysqli_error($conn);
}
$conn->close();
?>