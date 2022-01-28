<!--
Into this file, we create a layout for welcome page.
-->

<?php
include_once('link.php');
include_once('header1.php');
require_once('connection.php');


$id = $_SESSION['id'];
$email =  '';
$sql = "SELECT * FROM admin WHERE ID='$id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		
		$email = $row["Email"];
		
	}
}

?>
<?php
include_once 'connection.php';

// fetch files
$sql = "select filename from tbl_files";
$result = mysqli_query($conn, $sql);
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="users">users</a></li>
      <li  class="active"><a href="attendance">attendance</a></li>
     
      
    </ul>
  </div>
</nav>

<div class="jumbotron">
<center>
		<h1>Welcome <?php echo $email; ?></h1>
	</center>
</div>
<div>

    <?php
    require_once('connection.php');
    if(isset($_POST['submit_shift'])){
        $shift = $_POST['shift'];
        $sql2 = "insert into attendance_shift(shift)values('$shift')";
        $result2 = mysqli_query($conn,$sql2);
        if($result2){
            header('location:admin_dashboard.php');
        }else{
            die(mysqli_error($conn));
        }

    }
     ?>
<div id="frmRegistration">
<form class="form-horizontal"  method="POST">
	<h1>Attandace shift </h1>
	
  

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">shift</label>
    <div class="col-sm-6"> 
      <input type="text" name="shift" class="form-control" id="shift" placeholder="">
    </div>
  </div>
 
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit_shift" class="btn btn-primary">Submit</button>
    </div>
  </div>
  
</form>
</div>
<div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">SHIFT</th>
      
      <th scope="col">Options</th>
    </tr>
  </thead>

  <?php
  
  $sql3 = "select * from attendance_shift";
  $result3 = mysqli_query($conn,$sql3);
  if($result){
    //   $row = mysqli_fetch_assoc($result);
    //   echo $row['name'];
    while($row = mysqli_fetch_assoc($result3)){
        $id_s = $row['id'];
        $name_s=$row['shift'];
       
        echo '<tr>
        <th scope="row">'.$id_s.'</th>
        <td>'.$name_s.'</td>
       
        <td><button class="btn btn-warning"><a href="update.php?updateid='.$id.'" class="text-light">UPDATE</a></button></td>
        <td> <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">DELETE</a></button></td>
      </tr>';
    }
}
  
  ?>
  
 
</table>
        
    </div>
	
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <legend>Select File to Upload:</legend>
            <div class="form-group">
            <lable>Email</lable>
            <input type="email" name="email">
                <lable>File</lable>
                <input type="file" name="file1" />
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload" class="btn btn-info"/>
            </div>
            <?php if(isset($_GET['st'])) { ?>
                <div class="alert alert-danger text-center">
                <?php if ($_GET['st'] == 'success') {
                        echo "File Uploaded Successfully!";
                        header('location:admin_dashboard.php');
                    }
                    else
                    {
                        echo 'Invalid File Extension!';
                    } ?>
                </div>
            <?php } ?>
        </form>
        </div>
    </div>

    
	<?php
include_once 'connection.php';

// fetch files
$sql = "select email,filename from tbl_files ";
$result = mysqli_query($conn, $sql);
?>
<div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>File Name</th>
                        <th>View</th>
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
                    <td><a href="uploads/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                    <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
</div>
