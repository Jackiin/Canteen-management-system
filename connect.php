<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname); 

if ($conn) {
    echo "<script>alert ('connect successfully');</script>";
} else {
	echo "<script>alert ('connect fail');</script>";
}
//mysqli_close($conn);
?>