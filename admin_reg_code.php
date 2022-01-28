<!--
Here, we write code for registration.
-->
<?php
require_once('connection.php');
$email = $password = $pwd = '';


$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$sql = "INSERT INTO admin (Email,Password) VALUES ('$email','$password');";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location:AdminLogin.php");
}
else
{
	echo "Error :".$sql;
}
?>