<?php 

$conn = mysqli_connect("localhost","root","","blood_bank"); //connection string
if ($conn->connect_error) //checking the connection
{
	die("Connection error".$conn->local_error); //connection error 
}
 ?>