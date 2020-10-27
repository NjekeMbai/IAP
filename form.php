<?php
session_start();
  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "", "profiles");
  if (isset($_POST['save_profile'])) {
    // for the database
    $Fname = stripslashes($_POST['fname']);
    $Sname = stripslashes($_POST['sname']);
    $Email = stripslashes($_POST['email']);
    $City = stripslashes($_POST['resid']);
    $Password = stripslashes($_POST['pword']);
    
    $Bio = stripslashes($_POST['bio']);
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "profileimages/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO user_details(First_name,Second_name,Email_address,City,Password,Profile_image,Bio)VALUES('$Fname','$Sname','$Email','$City','$Password','$profileImageName','$Bio')";
      
        if(mysqli_query($conn, $sql)){
         
     echo "<script>alert('Image uploaded and saved in the Database')</script>";
    echo "<script>window.location='login.php'</script>";
        } else {
         
    echo "<script>alert('There was an error in the database')</script>";
    echo "<script>window.location='signup.php'</script>";

        }
      } else {
        
    echo "<script>alert('There was an error uploading the file')</script>";
    echo "<script>window.location='signup.php'</script>";

      }
    }
  }

  if (isset($_POST["login"])) 
{
  $User_name=$_POST["user"];
  $Password=$_POST["password"];
  

  $sql="SELECT *from user_details where First_name=? AND Password=? ";

  $stmt=$conn->prepare($sql);
  $stmt->bind_param("ss",$User_name,$Password);
  $stmt->execute();
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();
  

  session_regenerate_id();
  $_SESSION['username']=$row['First_name'];
  $_SESSION['password']=$row['Password'];

 
 
  session_write_close();
  if ($result->num_rows==1){

  header("location: display.php");

  
   

}
else
  {
    echo "<script>alert('Username or Password is Incorrect!')</script>";
    echo "<script>window.location='login.php'</script>";
}
}
 
?>