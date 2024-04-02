<?php
session_start();
$servername = "localhost";
$username="root";
$user=$_POST['name'];
$pas=$_POST['password'];
$dbname = "banking_system";
if($user&&$pas)
{
$conn = new mysqli($servername,$username,"",$dbname)or die( $conn->connect_error);


$sql = mysqli_query($conn,"SELECT * FROM register WHERE user='$user'");
$nrow=mysqli_num_rows($sql);

if ($nrow!=0) 
{
    while($row=mysqli_fetch_assoc($sql))
	{
		$dbuser=$row['user'];
		$dbpas=$row['password'];
	}
	if($user==$dbuser&&$pas==$dbpas)
	{
		echo'<script>window.location.assign("main.html")</script>';
		$_SESSION['name']=$user;
	}
	 
else 
    echo '<script>alert("incorrect password")</script>'; 
	echo'<script>window.location.assign("login.html")</script>';        
}
else
	echo'<script>alert("user does not exist")</script>';
	echo'<script>alert("please register")</script>';
echo'<script>window.location.assign("register.html")</script>';
}
else
	echo'<script>alert("please enter username , password")</script>';
echo'<script>window.location.assign("login.html")</script>';

$conn->close();
?>