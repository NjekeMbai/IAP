<?php
    include("connect.php");
    session_start();
    $password = $_SESSION["correctPassword"];
    if(isset($_POST["submit"])){
        if($_POST["password"] == $password){
            if($_POST["newPassword"] == $_POST["confirmPassword"]){
                $_SESSION["correctPassword"] =  $_POST["newPassword"];
                $message = "Password changed successfully.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Location: landingPage.php");
            }else{
                $message = "Passwords do not match. Try again.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("refresh:3;url=changePassword.php");
            }
        }else{
            $message = "Old password incorrect.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("refresh:3;url=changePassword.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EDIT PASSWORD</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/changePassword.css">
        <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Monoton&display=swap" rel="stylesheet">        

        <script src="js/index.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div id="topNavBar">
                <img class="logo" src="images/camLogo.png">
                <ul>
                    <li id="title"><a href="changePassword.php">STACEGRAM</a></li>
                    <li class="listItem"><a href="index.php">Logout</a></li>
                    <li class="listItem"><a href="landingPage.php">Back</a></li>
                </ul>
            </div>
            <div class="changePasswordForm">
                    <div class="edit">
                        <form style="max-width: 600px;" method="POST" style="margin:auto" action="">
                            <h1 class="formHeading">CHANGE PASSWORD</h1>
                            <label for="password" >Old Password:</label>
                            <input type="password" name="password" minlength="4" maxlength="12" class="form-control" required><br/><br/>
                            <label for="confirmPassword" >New Password:</label>
                            <input type="password" id="newPassword" name="newPassword" minlength="4" maxlength="12" class="form-control" required><br/><br/>
                            <label for="confirmPassword" >Confirm Password:</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" minlength="4" maxlength="12" class="form-control" required><br/><br/>
                            <input type="submit" name="submit" value="EDIT" class="submit">
                        </form>
                    </div>   
                </div>
        </div> 
    </body>
</html>