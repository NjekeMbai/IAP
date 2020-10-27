<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="styleregis.css">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet"  href="css/bootstrap.min.css">

    <title>Register</title>
  </head>
  <body>

    <div class="container">
      <div class="login-box">

<div class="row">
        <div class="col-md-6 login-left">
          <form action="process_register.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Update profile</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="portrait-blank-male.png" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Profile Image</label>
          </div>
          <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" class="form-control"></textarea>
          </div>
        </div> 
     

    <div class="col-md-6 login-right">
          <h2>Register Here</h2>
         

          

            <input type="hidden" name="id" >

          
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" name="fname" class="form-control" required>

        </div>
        <div class="form-group">
          <label for="second_name">Second Name</label>
          <input type="text" name="sname" class="form-control" required>

        </div>
        

        <div class="form-group">
          <label for="email_address">Email Address </label>
          <input type="email" name="email" class="form-control" required>

        </div>
        <div class="form-group">
          <label for="city_residence">City of Residence</label>
          <input type="text" name="resid" class="form-control" required>

        </div>
        
        
        <div class="form-group">
          
          <label for="password">Password</label>
          <input type="password" name="pword" id="myInputs"  class="form-control" required>
          <input type="checkbox"   
          onclick="myFunctions()">

          <script>
            
            function myFunctions(){
              var x=
              document.getElementById("myInputs");
              if(x.type ==="password")
              {
                x.type="text";
              }
              else
              {
                x.type="password";
              }
            }
          </script>
        </div>

        
      
      

        

       
        <div class="form-group">
            <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save User</button>
          </div>

           <p>Already have an account? <a href="login.php" class="signup">Login</a></p>
          
         
          </form>






        </div>
      </div>


       



      </div>
    </div>


  </body>
</html>
<script src="script.js"></script>