<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
</head>
<body>
    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email-Id</th>
      <th scope="col">Gender</th>
      <th scope="col">Password</th>
      <th scope="col">Activity Status </th>
      <th scope="col">Options</th>
    </tr>
  </thead>

  <?php
  
  $sql = "select * from tbluser";
  $result = mysqli_query($conn,$sql);
  if($result){
    //   $row = mysqli_fetch_assoc($result);
    //   echo $row['name'];
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['ID'];
        $fname=$row['Firstname'];
        $lname=$row['Lastname'];
        $email=$row['Email'];
        $gender=$row['Gender'];
        $activity = $row['activity'];
        $password=$row['Password'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$fname.'</td>
        <td>'.$lname.'</td>
        <td>'.$email.'</td>
        <td>'.$gender.'</td>
        <td>'.$activity.'</td>
        <td>'.$password.'</td>
        <td><button class="btn btn-warning"><a href="update_users.php?updateid='.$id.'" class="text-light">UPDATE</a></button></td>
        <td> <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">DELETE</a></button></td>
      </tr>';
    }
}
  
  ?>
  
 
</table>
        <button class="btn btn-primary"> <a href="user.php" class="text-light">Add User</a></button>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>

</body>
</html>