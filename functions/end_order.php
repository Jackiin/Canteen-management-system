<!DOCTYPE html>
<head>

	<link rel="stylesheet" href="/css/main.css">

</head>

<body>

	<div class="center">
		<h3>The order is finished!</h3>
	</div>
	<div class="center">
		<span id="timeout"></span>
	</div>

	<?php
	include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
	
	date_default_timezone_set('Asia/Hong_Kong');
	$date = date('Ymd');
	
	$index_sql = "SELECT id FROM order ORDER BY id DESC LIMIT 1";
	$index_result = mysqli_query($conn, $index_sql);
	$index_num = mysqli_num_rows($index_result);
	if ($index_num > 0) {
		$index_id = mysqli_fetch_row($index_result);
	}	
	
	$idno = intval(explode($date, $index_id[0]));
	$order_id = $date.'000'.($idno + 1);
	$employee_id = '001';
	
	$dt = date('Y-m-d');
	$sql = "INSERT INTO orders(`id`, `employee_id`, `date`) VALUES ('$order_id', '$employee_id', '$dt')";
	$result = mysqli_query($conn, $sql);
	
	session_start();
	$ids = $_SESSION['ids'];
	$quantities = $_SESSION['quantities'];
	$prices = $_SESSION['prices'];
	$_SESSION['order_id'] = $order_id;
	
	foreach ($ids as $key => $value){
		$d = date('Y-m-d H:i:s');
		$q = $quantities[$key];
		$fd_sql = "UPDATE food SET `quantity` = `quantity` - '$q' WHERE `id` = '$value'";
		$fd_result = mysqli_query($conn, $fd_sql);
		if ($q != 0) {
			$od_sql = "INSERT INTO orders_record(`order_id`, `food_id`, `quantity`, `order_date`) VALUES ('$order_id', '$value', '$q', '$d')";	
			$od_result = mysqli_query($conn, $od_sql);
		}
	}
	
	echo "<script>window.open('/functions/gen_order_report.php');</script>";
	
	//session_destroy();
	?>
	<script>
	var t = 5;
	setInterval("refer()",1000);  
	function refer(){ 
		if(t == 0){ 
			location = "/order.php";
		} 
		document.getElementById('timeout').innerHTML="Redirect to order page after " + t + " second";
		t--;
	}
	</script>
</body>

<html>