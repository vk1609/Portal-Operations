<?php
include 'connection.php';
include_once('link.php');
?>
<?php
include 'connection.php';
$fname = $lname = $gender = $email = $password = $pwd = '';

$id = $_GET['updateid'];
// Firstname=$fname, Lastname=$lname, Gender=$gender, Email=$email,  Password=$password,
// $fname = $_POST['firstname'];
// $lname = $_POST['lastname'];
// $gender = $_POST['gender'];
// $email = $_POST['email'];
// $pwd = $_POST['password'];
// $password = MD5($pwd);
$activity = $_POST['activity'];

$sql = "UPDATE tbluser set  activity=$activity where id=$id";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: users.php");
}
else
{
	echo "Error :".$sql;
}
?>


<div id="frmRegistration">
<form class="form-horizontal" method="POST">
	<h1>Status Form</h1>
	<!-- <div class="form-group">
    <label class="control-label col-sm-2" for="firstname">First Name:</label>
    <div class="col-sm-6">
      <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Firstname">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Last Name:</label>
    <div class="col-sm-6">
      <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Lastname">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Gender:</label>
    <div class="col-sm-6">
      <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
	  <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6"> 
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div> -->
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd" >Status:</label>
    <div class="col-sm-6"> 
        <select name="activity" id="activity" >
        <option value="On Duty">On Duty</option>
        <option value="Off Duty">Off Duty</option>
        </select>
      
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="create" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</div>