<!--
Here, we write code for registration.
-->
<?php
require_once('connection.php');
$fname = $lname = $gender = $email = $password = $pwd =$activity= '';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$sql = "INSERT INTO tbluser (Firstname,Lastname,Gender,Email,Password, activity) VALUES ('$fname','$lname','$gender','$email','$password','Off Duty');";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: login.php");
}
else
{
	echo "Error :".$sql;
}
?>