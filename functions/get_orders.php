<!DOCTYPE>
<html>

	<head>

		<title>Food orders list</title>
		<link rel="stylesheet" href="/css/table.css">
		<script src="/js/jquery-3.3.1.min.js"></script>
		<script src="/js/drop_order.js"></script>
	
	</head>

	<body>
	
		<div style="margin:auto;text-align:center;width:80%">
			<h3>Food orders list</h3>
		</div>
		
		<?php
				
		include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
				
		$sql = "SELECT * FROM orders_record";
		$result = mysqli_query($conn, $sql);
				
		if ($result){
			echo '
			<table style="margin:auto;width:80%" />
			<thead>
			<tr>
				<th align="center">Order ID</th>
				<th align="center">Food ID</th>
				<th align="center">Quantity</th>
				<th align="center">Date</th>
				<th align="center"></th>
			</tr>
			</thead>
			<tbody>
			';
			
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				if ($row['finished'] == 0) {
					echo '<tr><td align="center" />'.$row['order_id'].'<td align="center" />'.$row['food_id'].
					'<td align="center" />'.$row['quantity'].'<td align="center" />'.$row['order_date'].
					'<td align="center"><input class="drop" type="image" src="/image/drop.png"></td>'.
					'</tr>';
				} else {
					
				}
			}
					
			echo '</tbody></table>';
					
			mysqli_free_result($result);
					
		} else {
					
			echo "<script>alert ('Fetch result error')</script>";
					
		}
		
		?>
			
		
	</body>

</html>