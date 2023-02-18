<?php 
error_reporting(0); 
$servername = 'localhost';
$username = 'root';  
$password= ''; 
$database= 'responsive_form'; 
$conn = mysqli_connect($servername, $username, $password , $database );  
if($conn )  
{  
//  echo"Connection is successfully....?";
}  
else
{
echo 'Connected Not successfully'.mysqli_connect_error();
}
?>