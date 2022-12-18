<?php
$servername="localhost";
$username="root";
$password="";
$dbname="expenzo";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn){
}
else{
	die("Connection to the database failed because".mysqli_connect_error());
}
?>
