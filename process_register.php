<?php
include_once 'dbConnect.php';
include_once 'User.php';

$fname = $_POST["fname"];
$sname = $_POST["sname"];
$email = $_POST["email"];
$city = $_POST["resid"];
$password = $_POST["pword"];
$bio = $_POST["bio"];
$image = time().'-'.$_FILES["profileImage"]["name"];

//upload image
$target_dir = "profileimages/";
$target_file = $target_dir.basename($image);

move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file);
$con = new DBConnector();
$pdo = $con->connectToDB();

//register a user
$user =new User();
$user->setFname($fname);
$user->setSname($sname);
$user->setEmail($email);
$user->setCity($city);
$user->setPassword($password);
$user->setBio($bio);
$user->setImage($image);

echo $user->register($pdo);
?>