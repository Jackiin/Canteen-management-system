<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname); 

if ($conn) {
    //echo "<script>alert ('connect successfully');</script>";
} else {
	die();
}
//mysqli_close($conn);
?>