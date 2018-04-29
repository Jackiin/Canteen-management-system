<!--This page is for manager-->
<!DOCTYPE> 
<html>

<head>

	<title>CCAN Management System</title>
	<link rel="stylesheet" href="/css/main.css">

</head>

<body>

	<h1 class="center" style="margin-top:40px;text-align:center;width:80%">CCAN Management System (Manager)</h1>
	
	<div>
		<div class="center" style="margin-top:30px;width:40%;font-size:24">
			<a class="section" href="/functions/get_employee.php" target="_blank">Show Employee</a><br>
			<a class="section" onclick="document.getElementById('pop_01').style.display='block'">Add Employee</a><br>
			<a class="section" onclick="document.getElementById('pop_02').style.display='block'">Remove Employee</a><br>
			<a class="section" onclick="document.getElementById('pop_03').style.display='block'">Update salary</a><br>
			<a class="section" href="/staff.php">Visit staff page</a><br>
		</div>
		
		<div id="pop_01" class="pop_up">
			<form class="pop_up_content animate" action="/functions/add_employee.php" method="post">
				<br>
				<label class="label">Employee name</label><br>
				<input class="input" type="text" name="name">
				<br>
				<label class="label">Telephone no.</label><br>
				<input class="input" type="text" name="tel">
				<br>
				<label class="label">Position</label><br>
				<select style="width:100px" name="position">
					<option value="Cleaner">Cleaner</option>
					<option value="Cashier">Cashier</option>
					<option value="Waiter">Waiter</option>
					<option value="Chef">Chef</option>
				</select><br>
				<label class="label">Salary</label><br>
				<input class="input" type="number" name="salary">
				<br>
				<input class="apply" style="margin-right:22px" type="submit" name="submit" value="Add">
				<a class="cancel" onclick="document.getElementById('pop_01').style.display='none'">Cancel</a>
			</form>
		</div>
		
		<div id="pop_02" class="pop_up">
			<form class="pop_up_content animate" action="/functions/del_employee.php" method="post">
				<br>
				<label class="label">Employee name</label><br>
				<select name="name">
				<?php
					include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
					$result = mysqli_query($conn, "SELECT fname, lname FROM employee WHERE dismissed = 0");
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$fname = $row['fname'];
						$lname = $row['lname'];
						$name = $fname.' '.$lname;
						echo "<option value='$name'>".$name."</option>";				
					}
				?>
				</select>				
				<br>
				<label class="label">Dismiss</label><br>
				<select name="dismiss">
					<option value="true">true</option>
					<option value="false">false</option>
				</select>
				<br>
				<input class="apply" style="margin-right:22px" type="submit" name="submit" value="Apply">
				<a class="cancel" onclick="document.getElementById('pop_02').style.display='none'">Cancel</a>
			</form>
		</div>

		<div id="pop_03" class="pop_up">
			<form class="pop_up_content animate" action="/functions/update_salary.php" method="post">
				<br>
				<label class="label">Employee name</label><br>
				<input class="input" type="text" name="name">
				<br>
				<label class="label">Salary</label><br>
				<input class="input" type="number" name="salary">
				<br>
				<input class="apply" style="margin-right:22px" type="submit" name="submit" value="Apply">
				<a class="cancel" onclick="document.getElementById('pop_03').style.display='none'">Cancel</a>
			</form>
		</div>
		
	</div>
	
	

</body>

</html>