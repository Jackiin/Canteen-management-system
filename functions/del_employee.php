<?php

include($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$names = explode(" ", $_POST['name']);
$lname = array_pop($names);
$fname = implode(" ", $names);
$dismiss = $_POST['dismiss'];

//echo "<script>alert($dismiss)</script>";

$dismissed = ($dismiss === 'true')? 1 : 0;

//echo "<script>alert($dismissed)</script>";

if (empty($names) || empty($dismiss)) {
	echo "<script>alert('Empty field!');document.location.href='/main.html';</script>";
} else {
	$sql = "UPDATE employee SET `dismissed` = '$dismissed' WHERE `lname` = '$lname' AND `fname` = '$fname'";
	$result = mysqli_query($conn, $sql);
	if ($result == true) {
		echo "<script>alert ('Success operate!');document.location.href='/main.html';</script>";
		mysqli_free_result($result);
	}
}

?>