<!DOCTYPE html>
<head>

	<link rel="stylesheet" href="/css/main.css">

</head>

<body>

	<div class="center">
		<h4>The order is finished!</h4>
	</div>

	<?php
	//require('fpdf.php');
	//$pdf = new FPDF('P','mm','A4');
	//$pdf->SetFont('Times',16);
	//$pdf->Cell(40,10,'Hello World!');
	//$pdf->Output();
	include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
	
	session_start();
	$ids = $_SESSION['ids'];
	$quantities = $_SESSION['quantities'];
	$prices = $_SESSION['prices'];
	
	foreach ($ids as $key => $value){
		$q = $quantities[$key];
		$sql = "UPDATE food SET `quantity` = `quantity` - '$q' WHERE `id` = '$value'";
		$result = mysqli_query($conn, $sql);
	}
	
	session_destroy();
	echo "<script>window.location.href='/order.php';</script>";

	?>

</body>

<html>