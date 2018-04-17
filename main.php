<!DOCTYPE>
<html>

<head>

	<title>CCAN Management System</title>

</head>

<body>

	<h1 id='sys_title' style="margin:auto;text-align:center;width:80%">CCAN Management System</h1>
	
	<div id='sys_report'>
		
		<div style="margin:auto;text-align:center;width:80%">
			<p>Current Employee</p>
		</div>
		
		<?php
		
		include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
		
		$sql = "SELECT * FROM employee";
		$result = mysqli_query($conn, $sql);
		
		if ($result){
			echo '<table style="margin:auto;width:80%" />
			<thead>
			<tr>
				<th align="center">ID</th>
				<th align="center">First name</th>
				<th align="center">Last name</th>
				<th align="center">Salary</th>
				<th align="center">Contact No.</th>
			</tr>
			</thead>
			<tbody>
			';
			
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				echo '<tr><td align="center">'.$row['staff_id'].'<td align="center">'.$row['fname'].
				'<td align="center">'.$row['lname'].'<td align="center">'.$row['salary'].
				'<td align="center">'.$row['tel'].'</td></tr>';
			}
			
			echo '</tbody></table>';
			
			mysqli_free_result($result);
			
		} else {
			
			echo "<script>alert ('Fetch result error')</script>";
			
		}
		
		?>
		
	
	</div>

</body>

</html>