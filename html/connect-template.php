<?php
# This code block connects to the database server
$servername = "Right";
$username = "";
$password = "";
$dbname = "counterlog";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}
?>
