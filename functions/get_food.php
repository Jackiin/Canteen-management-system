<!DOCTYPE>
<html>

	<head>

		<title>Current Food</title>
		<link rel="stylesheet" href="/css/table.css">
	
	</head>

	<body>
	
		<div style="margin:auto;text-align:center;width:80%">
			<h3>Current Food</h3>
		</div>
		
		<?php
				
		include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
				
		$sql = "SELECT * FROM food";
		$result = mysqli_query($conn, $sql);
				
		if ($result){
			echo '
			<table style="margin:auto;width:80%" />
			<thead>
			<tr>
				<th align="center">ID</th>
				<th align="center">Zone</th>
				<th align="center">Name</th>
				<th align="center">Quantity</th>
				<th align="center">Price</th>
			</tr>
			</thead>
			<tbody>
			';
			
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				echo '<tr><td align="center" />'.$row['id'].'<td align="center" />'.$row['zone_id'].
				'<td align="center" />'.$row['name'].'<td align="center" />'.$row['quantity'].
				'<td align="center" />'.$row['price'].'</tr>';
			}
					
			echo '</tbody></table>';
					
			mysqli_free_result($result);
					
		} else {
					
			echo "<script>alert ('Fetch result error')</script>";
					
		}
				
		?>
		
	</body>

</html>

