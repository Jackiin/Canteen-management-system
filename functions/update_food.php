<?php

include($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$id = $_POST['id'];
$quantity = intval($_POST['quantity']);
$price = $_POST['price'];

if (empty($quantity) && empty($price)) {
	echo "<script>alert('Empty field!');document.location.href='/staff.php';</script>";
} else {
	if (empty($quantity)) {
		$sql = "UPDATE food SET `price` = '$price' WHERE `id` = '$id'";
		$result = mysqli_query($conn, $sql);
		if ($result == true) {
			echo "<script>alert ('Food information was updated!');document.location.href='/staff.php';</script>";
			mysqli_free_result($result);
		}		
	}
	if (empty($price)) {
		$sql = "UPDATE food SET `quantity` = `quantity` + '$quantity' WHERE `id` = '$id'";
		$result = mysqli_query($conn, $sql);
		if ($result == true) {
			echo "<script>alert ('Food information was updated!');document.location.href='/staff.php';</script>";
			mysqli_free_result($result);
		}		
	}
}

?>