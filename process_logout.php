<?php 
include_once 'dbConnect.php';
include_once 'User.php';

$con = new DBConnector();
$pdo = $con->connectToDB();

$user = new User();

echo $user->logout($pdo);

 ?>