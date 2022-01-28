<?php
include 'connection.php';
//check if form is submitted
if (isset($_POST['submit']))
{ 
    $email = $_POST['email'];
    $filename = $_FILES['file1']['name'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['xlsx'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from tbl_files';
            $result = mysqli_query($conn, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;

            //set target directory
            $path = 'uploads/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO tbl_files(email,filename, created) VALUES('$email','$filename', '$created')";
            mysqli_query($conn, $sql);
            header("Location: admin_dashboard.php?st=success");
        }
        else
        {
            header("Location: admin_dashboard.php?st=error");
        }
    }
    else
        header("Location: admin_dashboard.php");
}
?>