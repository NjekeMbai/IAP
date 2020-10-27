<?php 
include_once 'dbConnect.php';
include_once 'User.php';

$con = new DBConector();
$pdo = $con->connectToDB();

$user = new User();

echo $user->logout($pdo);

 ?>