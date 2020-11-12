<?php

session_start();
  $conn = mysqli_connect("localhost", "root", "", "profiles");
  $names=$_SESSION ['username'];
  $results = mysqli_query($conn, "SELECT *from user_details where First_name='$names'");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);


  
  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Image Preview and Upload</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="styleregis.css">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet"  href="css/bootstrap.min.css">
     <script src="jquery.min.js"></script>
     <script src="orders.js"></script>
     
</head>
<body>
  <div class="container">
      <div class="row justify-content-center">
      <div class="col-9" style="margin-top: 170px;">
      <br>  
      <br>  
        
       

         
         
        <table class=" meza">
          <thead>
            <th>Profile Image</th>
            <th>First Name</th>
             <th>Second Name</th>
             
           
            <th>Email</th>
            <th>City </th>
             <th>Bio</th>
             <th> Change Password</th>
             <th>Order Food</th>
            
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
              <tr>
                <td> <img src="<?php echo 'profileimages/' . $user['Profile_image'] ?>" width="130" height="130" alt=""> </td>
                <td> <?php echo $user['First_name']; ?> </td>
                <td> <?php echo $user['Second_name']; ?> </td>
                <td> <?php echo $user['Email_address']; ?> </td>
                <td> <?php echo $user['City']; ?> </td>
                <td> <?php echo $user['Bio']; ?> </td>
                <td> <a href="edit.php" class="btn btn-info">Change</a> </td>
                <td> <button id="order-btn" class="btn btn-warning" onclick="function1()">Order</button></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <br><br>
        <div id="order_tab">
          
        </div>

         <a style="margin-top: 50px;" href="process_logout.php" class="btn btn-danger">Log Out</a>
      </div>
    </div>
  </div>
</body>
</html>