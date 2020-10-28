<?php

include_once 'dbConnect.php';
include_once 'User.php';

$username=$_POST["user"];
$Oldpass=$_POST["oldpassword"];
$Newpass=$_POST["newpassword"];
$Confirmpass=$_POST["confirmnewpassword"];
  
$name=$_SESSION ['username'];
$password=$_SESSION ['password'];

$con = new DBConnector();
$pdo = $con->connectToDB();

//changing password
$user = new User();
$user->setNewPass($Newpass);
$user->setOldPass($Oldpass);
$user->setConfirmPass($Confirmpass);
$user->setUsername($name);
$user->setPassword($password);
$user->setFname($username);
echo $user->changePassword($pdo);


?>