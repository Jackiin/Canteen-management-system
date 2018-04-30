<?php

include($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$sysusername = trim($_POST['username']);
$syspassword = trim($_POST['password']);

if(!isset($_POST['submit'])){
	exit('Access denied.');
}

if(empty($sysusername) || empty($syspassword)){
	echo "<script>alert('Empty field!');document.location.href='/index.html';</script>";
}

$sql = "SELECT `name`, `password` FROM user WHERE `name` = '$sysusername' AND `password` = '$syspassword'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

if($num){
	//session_start();
	echo "<script>alert('Welcome to CCAN Management System!');document.location.href='/main.php';</script>";
}

mysqli_free_result($result);

//mysqli_close($conn);
?>