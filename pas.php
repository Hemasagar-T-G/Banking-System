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
echo "<html>
			<head>
</head>
<style>
body { User-select:none;
  font-family: Arial, Helvetica, sans-serif;
}
.mobile-container {
  max-width: 880px;
  margin: auto;
  background-image: url(backimg1.jpg);
  height: 700px;
  color: white;
  border-radius: 10px;
}

.topnav {
  overflow: hidden;
  background-color: #333;
  position: relative;
}
.main{margin-top: 0%;}
.topnav a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
  display: block;
}

.topnav a.icon {
  background: black;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
}
.active {
  background-color: #4CAF50;
  color: white;
}
.button {
  border-radius: 2px;
  background-color: blue;
  border: none;
  color: #FFF;
  text-align: center;
  font-size: 20px;
  padding: 0px;
  width: 110px;
  transition: all 0.5s;
  cursor: pointer; margin-top:10px;
}

table {border-collapse:collapse;}
.previous {
  background-color: #f1f1f1;
  color: black;
  width: 15px; height: 15px;
}
.round {
  border-radius: 50%;
}
in_login{
width:300px;
height:20px;
background:transparent;
border: 1px solid black; }
.i{
font-size:24px;
}
.main{ border-radius: 10px;
margin-top: 10%;
		padding: 10px;
		width: 80%;
		background: #5c62a39e;
}
</style>
<body>
<center>
<!-- Simulate a smartphone / tablet -->
<div class=mobile-container>

<!-- Top Navigation Menu -->
<div class=topnav>
  <a href=#home class=active>BANKING SYSTEM</a>
</div>

<div style=padding-left:0px class=main>
  <h1>PASSBOOK:</h1>";
  echo "<table border=1 width=80% bordercolor=black bgcolor=white>
  <tr>
					<th>NAME</th>
					<th>AMOUNT</th>
					<th>DATE</th>
					<th>BALANCE</th>
					</tr>
					";
$query=mysqli_query($conn,"SELECT * FROM balance WHERE user='$user'");
$nrow=mysqli_num_rows($query);
$balance=0.00;			
while($row=mysqli_fetch_assoc($query))
			{
			$balance=$balance+$row['balance'];
echo"
					<tr>
					<td align=center>$row[user]</td>
			      <td align=center >$row[balance]</td>
			<td align=center>$row[date]</td>
			<td align=center>$balance</td></tr>"; 
			}

			     echo "
				 
				 <td align=center colspan=4 > $user's Balance is $balance</td>
				 <html>
				 <body>
				 <form>
				 <style>
body { User-select:none;
  font-family: Arial, Helvetica, sans-serif;
}

.btn {
  border-radius: 2px;
  background-color: blue;
  border: none;
  color: #FFF;
  text-align: center;
  font-size: 20px;
  padding: 0px;
  width: 180px;
  transition: all 0.5s;
  cursor: pointer; margin-top:10px;
}
.btn1 {
  border-radius: 2px;
  background-color:red;
  border: none;
  color: #FFF;
  text-align: center;
  font-size: 20px;
  padding: 0px;
  width: 180px;
  transition: all 0.5s;
  cursor: pointer; margin-top:10px;
}
.ieye
{	font-size: 20px;
	border: none;
    outline: none;
	background:none;
	user-select:none;
	margin-top:0px;
	}


table {border-collapse:collapse;}
.previous {
  background-color: #f1f1f1;
  color: black;
  width: 15px; height: 15px;
}
.round {
  border-radius: 50%;
}
in_login{
width:300px;
height:20px;
background:transparent;
border: 1px solid black; }
.i{
font-size:24px;
}

</style>
<!-- Simulate a smartphone / tablet -->


		</tr></table>
  <table>
  <tr>
    <td>DEPOSIT:</td><td><a href=DEPOSIT.html><input type=button value=DEPOSIT name=bal class=btn></a></td>
   </tr>
   <tr>
	 <td>BALANCE CHECK:</td><td><a href=balance.php><input type=button value=BALANCE CHECK name=bal class=btn></a></td>
	 </tr>
	 <tr>
	 <td>WITHDRAW:</td><td><a href=withdraw.html><input type=button value=WITHDRAW name=bal class=btn></a></td>
	 </tr>
	 <tr>
		<td>CLOSE-ACCOUNT:</td><td><a href=close.php><input type=button value=CLOSE-ACCOUNT name=bal class=btn1></a></td>
		</tr>
		<tr>
		<td>LOG-OUT</td><td><a href=logout.php><input type=button value=LOG-OUT name=bal class=btn></a></td>
		</tr>
		<tr>
		<td rowspan=2><a href=main.html><input type=button value=&#8249;BACK  class=btn ></a></td>
		</tr>
	</table>
</form>
</center></head>
</body>
</html>	"; 

$conn->close();

?>