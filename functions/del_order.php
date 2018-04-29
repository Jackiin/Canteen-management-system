<?php
function del_order($id) {

	include($_SERVER['DOCUMENT_ROOT'].'/connect.php');

	$order_id = $id;

	$sql = "UPDATE orders_record SET `finished` = 1 WHERE `order_id` = '$order_id'";
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		echo "<script>alert('Record deleted!');document.location.href='/functions/get_orders.php';</script>";
		mysqli_free_result($result);
	}

}

$id = $_GET['order_id'];
del_order($id);

?>