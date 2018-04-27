<!--This page is for customer-->
<!DOCTYPE html> 

<head>

	<title>Accounting</title>
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/order.css">
	<link rel="stylesheet" href="/css/table.css">
	<script src="/js/jquery-3.3.1.min.js"></script>
	<script src="/js/submit_order.js"></script>	
	
</head>

<body>

	<div class="center">
		<img src="/image/ap.png" style="width:10%;height:10%" />
	</div>
	
	<?php
	function show($dish01, $quantity01, $dish02, $quantity02, $dish03, $quantity03, $dish04, $quantity04) {
		
		include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
		
		$q1 = intval($quantity01);
		$q2 = intval($quantity02);
		$q3 = intval($quantity03);
		$q4 = intval($quantity04);
		
		$n1 = "";
		$n2 = "";
		$n3 = "";
		$n4 = "";
		
		$p1 = 0;
		$p2 = 0;
		$p3 = 0;
		$p4 = 0;
		
		$sql1 = "SELECT `price`, `name` from food WHERE `id` = '$dish01'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
		$p1 = $row1['price'] * $q1;
		$n1 = $row1['name'];
		$sql2 = "SELECT `price`, `name` from food WHERE `id` = '$dish02'";
		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$p2 = $row2['price'] * $q2;
		$n2 = $row2['name'];
		$sql3 = "SELECT `price`, `name` from food WHERE `id` = '$dish03'";
		$result3 = mysqli_query($conn, $sql3);
		$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
		$p3 = $row3['price'] * $q3;
		$n3 = $row3['name'];
		$sql4 = "SELECT `price`, `name` from food WHERE `id` = '$dish04'";
		$result4 = mysqli_query($conn, $sql4);
		$row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
		$p4 = $row4['price'] * $q4;
		$n4 = $row4['name'];
		
		echo '
			<table style="margin:auto;width:80%">
			<thead>
			<tr>
				<th align="center" style="width:800px">Dish</th>
				<th align="center" style="width:200px">Quantity</th>
				<th align="center">Price</th>
			</tr>
			</thead>
			<tbody>
			';
		
		echo '<tr><td align="center" />'.$n1.'<td align="center" />'.$q1.'<td align="center" />'.$p1.'</tr>'.
			 '<td align="center" />'.$n2.'<td align="center" />'.$q2.'<td align="center" />'.$p2.'</tr>'.
			 '<td align="center" />'.$n3.'<td align="center" />'.$q3.'<td align="center" />'.$p3.'</tr>'.
			 '<td align="center" />'.$n4.'<td align="center" />'.$q4.'<td align="center" />'.$p4.'</tr>'.
			 '<td align="center" />'.'<b>Total</b>'.'<td align="center" />'.($q1+$q2+$q3+$q4).'<td align="center" />'.($p1+$p2+$p3+$p4).'</tr>';
			 
		echo '</tbody></table>';
	}

	
	$dish01 = $_GET['dish01'];
	$quantity01 = $_GET['quantity01'];
	$dish02 = $_GET['dish02'];
	$quantity02 = $_GET['quantity02'];
	$dish03 = $_GET['dish03'];
	$quantity03 = $_GET['quantity03'];
	$dish04 = $_GET['dish04'];
	$quantity04 = $_GET['quantity04'];
	

	show($dish01, $quantity01, $dish02, $quantity02, $dish03, $quantity03, $dish04, $quantity04);
		
	?>
	
	<div style="margin-top:20px;margin-right:150px" align="right">
		<button id="next" onclick="window.location.href='/order.php'">Return</button>
		<button id="order" onclick="submitOrder()">Order</button>
	</div>

</body>


</html>