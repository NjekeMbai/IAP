<?php


session_start();

$server="localhost";
$username="root";
$password="";
$database="profiles";

$con=mysqli_connect($server,$username,$password,$database);



if (isset($_POST["register"])) 
{

$First_name=$_POST["fname"];
$Second_name=$_POST["sname"];
$Email=$_POST["email"];
$City=$_POST["cress"];
$Password=$_POST["pword"];


$files = stripslashes($_POST['file']);

   

                $folders='profileimages/'.$files;

                $fileDestination='profileimages/'.$files;
               

 





	$query="INSERT INTO user_details(First_name,Second_name,Email_address,City_of_residence,Password,Bio)VALUES('$First_name','$Second_name','$Email','$City','$Password','$folders')";
	if(mysqli_query($con,$query))
{
	echo "  Record Added to the database";
}
else
{
	echo "Error".mysqli_error();	
}


	


}



?>