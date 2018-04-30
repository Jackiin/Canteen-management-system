<?php

include($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$zone_id = trim($_POST['zone_id']);
$index_sql = "SELECT `id` FROM food WHERE `zone_id` = '$zone_id' ORDER BY `id` DESC LIMIT 1";
$index_result = mysqli_query($conn, $index_sql);
$index_num = mysqli_num_rows($index_result);
$index_id = "";
if ($index_num > 0) {
	$index_id = mysqli_fetch_row($index_result);
}

$idno = intval(substr($index_id[0], -1));

if ($idno < 9) {
	$id = $zone_id.'0'.($idno + 1);
} else {
	$id = $zone_id.($idno + 1);
}

$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

if (empty($name) || empty($quantity) || empty($price)) {
	echo "<script>alert('Empty field!');document.location.href='/staff.php';</script>";
} else {
		$sql = "INSERT INTO food(`id`, `zone_id`, `name`, `quantity`, `price`) VALUES ('$id', '$zone_id', '$name', '$quantity', '$price')";
		$result = mysqli_query($conn, $sql);
		
		if ($result == true) {
			echo "<script>alert ('Food was added!');document.location.href='/staff.php';</script>";
			mysqli_free_result($result);
		}
}

?>
