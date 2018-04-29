<!--This page is for staff-->
<!DOCTYPE> 
<html>

<head>

	<title>CCAN Management System (staff)</title>
	<link rel="stylesheet" href="/css/main.css">

</head>

<body>

	<h1 class="center" style="margin-top:40px;text-align:center;width:80%">CCAN Management System (Staff)</h1>
	
	<div>
		<div class="center" style="margin-top:30px;width:40%;font-size:24">
			<a class="section" href="functions/get_food.php" target="_blank">Show Foods</a><br>
			<a class="section" onclick="document.getElementById('pop_01').style.display='block'">Add Food</a><br>
			<a class="section" onclick="document.getElementById('pop_02').style.display='block'">Update Food</a><br>			
			<a class="section" href="/functions/get_orders.php" target="_blank">Show Food Orders</a><br>
			<a class="section" href="/main.php">Visit manager page</a><br>
		</div>
		
		<div id="pop_01" class="pop_up">
			<form class="pop_up_content animate" action="/functions/add_food.php" method="post">
				<br>
				<label class="label">Food name</label><br>
				<input class="input" type="text" name="name">
				<br>
				<label class="label">Quantity</label><br>
				<input class="input" type="text" name="quantity">
				<br>
				<label class="label">Price</label><br>
				<input class="input" type="number" name="price">
				<br>
				<label class="label">Zone</label><br>
				<select style="width:100px" name="zone_id">
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
				</select><br>
				<input class="apply" style="margin-right:22px" type="submit" name="submit" value="Add">
				<a class="cancel" onclick="document.getElementById('pop_01').style.display='none'">Cancel</a>
			</form>
		</div>
		
		<div id="pop_02" class="pop_up">
			<form class="pop_up_content animate" action="/functions/add_food.php" method="post">
				<br>
				<label class="label">Food name</label><br>
				<select>
				<?php
					include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
					$result = mysqli_query($conn, "SELECT name FROM food");
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
							$name = $row['name'];
							echo "<option value='$name'>" .$name."</option>";
					}
				?>
				</select>
				<br>
				<label class="label">Quantity</label><br>
				<input class="input" type="text" name="quantity">
				<br>
				<label class="label">Price</label><br>
				<input class="input" type="number" name="price">
				<br>
				<input class="apply" style="margin-right:22px;padding-top:8px;padding-bottom:8px" type="submit" name="submit" value="Change">
				<a class="cancel" onclick="document.getElementById('pop_02').style.display='none'">Cancel</a>
			</form>
		</div>
	</div>

</body>

</html>