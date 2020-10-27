<?php

session_start();
 $conn = mysqli_connect("localhost", "root", "", "profiles");

if(isset($_POST["change"])){
  $Oldpass=$_POST["oldpassword"];
  $Newpass=$_POST["newpassword"];
  $Confirmpass=$_POST["confirmnewpassword"];
  
   $names=$_SESSION ['username'];
      $password=$_SESSION ['password'];


      

      
     

        if($Oldpass == $password){
            if($Newpass == $Confirmpass){
               
                $query=("UPDATE  user_details SET Password='$Newpass' WHERE Password=$password")or die ($conn->error());
                  mysqli_query($conn,$query);
                  $_SESSION ['password']=$Newpass;

    
          echo "<script>alert('Record has been updated')</script>";
          echo "<script>window.location='display.php'</script>";
                
            }else{
          echo "<script>alert('Passwords do not match. Try again.')</script>";
          echo "<script>window.location='edit.php'</script>";
               
            }
        }else{

         echo "<script>alert('Old password incorrect.')</script>";
          echo "<script>window.location='edit.php'</script>";
           
        }
    }
  

?>

<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet"  href="css/bootstrap.min.css">

    <title>Login</title>
  </head>
  <body>

    <p><?=  $_SESSION ['password'] ?></p>

  	



<div class="container">
    	<div class="login-box">
    	<div class="row">
    		<div class="login-lefti">
    			<h2>Change Password</h2>
    			<form action="process_change_password.php" method="post">

    			

				<div class="form-group">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" placeholder="Old password" name="oldpassword" id="myInput"   class="form-control" required>
					<input type="checkbox"   
					onclick="myFunction()">

					<script>
						
						function myFunction(){
							var x=
							document.getElementById("myInput");
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
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="New password" name="newpassword" id="myInputs"   class="form-control" required>
                    <input type="checkbox"   
                    onclick="myFunction()">

                    <script>
                        
                        function myFunction(){
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
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Confirm New Password" name="confirmnewpassword" id="myInputss"   class="form-control" required>
                    <input type="checkbox"   
                    onclick="myFunction()">

                    <script>
                        
                        function myFunction(){
                            var x=
                            document.getElementById("myInputss");
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
				
				<button type="submit" name="change" class="btn btn-primary">Change</button>
                <button onclick="window.location.href='display.php'" class="btn btn-info " >Back</button>
    			
    			
    			
    			</form>
    		</div>	



    			


    	</div>



    	</div>
    </div>

</body>
</html>