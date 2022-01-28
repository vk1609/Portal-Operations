<!--
Into this file, we create a layout for welcome page.
-->

<?php
include_once('link.php');
include_once('header1.php');
require_once('connection.php');

$id = $_SESSION['id'];
$fname = $lname = $email = $gender = '';
$sql = "SELECT * FROM tbluser WHERE ID='$id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$fname = $row["Firstname"];
		$lname = $row["Lastname"];
		$email = $row["Email"];
		$gender = $row["Gender"];
	}
}
// $query = "SELECT * FROM files WHERE ";
// $res = mysqli_query($conn,$query);
// if(mysqli_num_rows($res))
// {
// 	while($row = mysqli_fetch_assoc($res)){


// 	}
// }

?>

<div class="jumbotron">
	<center>
		<h1>Welcome <?php echo $fname." ".$lname; ?></h1>
	</center>
</div>

<?php
include_once 'connection.php';

// fetch files
$sql = "select email,filename from tbl_files where email='$email'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
  if(isset($_POST['submit_shift_candidate'])){
    $email_s = $_POST['email'];
    $date_s = $_POST['date'];
    $shift = $_POST['shift'];
    $sql2 = "insert into attendance(email,date,shift)values('$email_s','$date_s','$shift')";
    $result2 = mysqli_query($conn,$sql2);
    if($result2){
        header('location:welcome.php');
    }else{
        die(mysqli_error($conn));
    }

}
  
  ?>
  
<div id="frmRegistration">
<form class="form-horizontal"  method="POST">
	<h1>Attandace Submission</h1>
	
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="date">Date</label>
    <div class="col-sm-6"> 
      <input type="date" name="date" class="form-control" id="date" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="shift">Shift</label>
    <div class="col-sm-6"> 
		
    <?php

  
$sql3 = "select * from attendance_shift";
$result3 = mysqli_query($conn,$sql3);
if($result){
  //   $row = mysqli_fetch_assoc($result);
  //   echo $row['name'];
  while($row = mysqli_fetch_assoc($result3)){
      $id_s = $row['id'];
      $name_s=$row['shift'];
      echo '<input type="text" value='.$name_s.'>';
  }
}
?>
		
      
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit_shift_candidate" class="btn btn-primary">Submit</button>
    </div>
  </div>
  
</form>
</div>
    
<div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>File Name</th>
                      
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['filename']; ?></td>
                    
                    <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

