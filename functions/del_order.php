<?php
function del_order($o_id, $f_id) {

	include($_SERVER['DOCUMENT_ROOT'].'/connect.php');

	$order_id = $o_id;
	$food_id = $f_id;

	$sql = "UPDATE orders_record SET `finished` = 1 WHERE `order_id` = '$order_id' AND `food_id` = '$food_id'";
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		echo "<script>alert('Record deleted!');document.location.href='/functions/get_orders.php';</script>";
		mysqli_free_result($result);
	}

}

$order_id = $_GET['order_id'];
$food_id = $_GET['food_id'];
del_order($order_id, $food_id);

?>