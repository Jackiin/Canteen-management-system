<?php

include($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$names = explode(" ", $_POST['name']);
$lname = array_pop($names);
$fname = implode(" ", $names);
$salary= $_POST['salary'];

if (empty($names) || empty($salary)) {
	echo "<script>alert('Empty field!');document.location.href='/main.html';</script>";
} else {
	$sql = "UPDATE employee SET `salary` = '$salary' WHERE `lname` = '$lname' AND `fname` = '$fname'";
	$result = mysqli_query($conn, $sql);
	if ($result == true) {
		echo "<script>alert ('Employee salary was updated!');document.location.href='/main.html';</script>";
		mysqli_free_result($result);
	}
}

?>