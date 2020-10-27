<?php 
include_once 'dbConnect.php';
include_once 'User.php';

$fname = $_POST["user"];
$password = $_POST["password"];

$con = new DBConnector();
$pdo = $con->connectToDB();

//login a user
$user = new User();
$user->setFname($fname);
$user->setPassword($password);

echo $user->login($pdo);
 ?>