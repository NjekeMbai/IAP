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

  	



<div class="container">
    	<div class="login-box">
    	<div class="row">
    		<div class="login-lefti">
    			<h2>Login</h2>
    			<form action="process_login.php" method="post">

    			<div class="form-group">
    			<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="First Name" name="user"  class="form-control" required>
				
				</div>

				<div class="form-group">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" placeholder="Enter password" name="password" id="myInput"   class="form-control" required>
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
				
				<button type="submit" name="login" class="btn btn-primary">Login</button>
    			
    			<p style="color: #fff;">Dont have an account?<a href="signup.php">Sign Up</a></p>
    			
    			</form>
    		</div>	



    			


    	</div>



    	</div>
    </div>

</body>
</html>