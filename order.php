<!--This page is for customer-->
<!DOCTYPE html>

	<head>

		<title>Order</title>
		<link rel="stylesheet" href="/css/main.css">
		<link rel="stylesheet" href="/css/order.css">
		<!--<link rel="stylesheet" href="W:/courses/IIT3008/project/css/main.css">
		<link rel="stylesheet" href="W:/courses/IIT3008/project/css/order.css">
		<script src="/js/jquery-3.3.1.min.js"></script>-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
		<script src="/js/jquery.form.min.js"></script> 
		<script src="/js/account.js"></script>

	</head>

	<body style="background-color:#e6ff99">

		<h1 class="center" style="margin-top:30px;text-align:center;width:30%">Order Machine</h1>
		
		<div class="flex-container">
			<div class="order" style="font-size:20">
				<form id="order01" action="/functions/account.php" method="post">
					<div>
						<label class="label">Food:</label>
						<select id="dish01" style="height:30px" name="dish01">
						<?php
							include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
							$result = mysqli_query($conn, "SELECT name, id, quantity FROM food");
							while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								if ($row['quantity'] <= 0) {
									
								} else {
									$id = $row['id'];
									echo "<option value='$id'>" .$row['name']."</option>";
								}
							}
						?>
						</select>
					</div>
					<br>
					<div>
						<label class="label">Quantity:</label>
						<input style="height:30px" name="quantity01" type="number" />
					</div>
				</form>
			</div>

			<div class="order" style="font-size:20">
				<form id="order02" action="/functions/account.php" method="post">
					<div>
						<label class="label">Food:</label>
						<select id="dish02" style="height:30px" name="dish02">
						<?php
							include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
							$result = mysqli_query($conn, "SELECT name, id, quantity FROM food");
							while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								if ($row['quantity'] <= 0) {
									
								} else {
									$id = $row['id'];
									echo "<option value='$id'>".$row['name']."</option>";
								}
							}
						?>
						</select>
					</div>
					<br>
					<div>
						<label class="label">Quantity:</label>
						<input style="height:30px" name="quantity02" type="number" />
					</div>
				</form>
			</div>

			<div class="order" style="font-size:20">
				<form id="order03" action="/functions/account.php" method="post">
					<div>
						<label class="label">Food:</label>
						<select id="dish03" style="height:30px" name="dish03">
						<?php
							include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
							$result = mysqli_query($conn, "SELECT name, id, quantity FROM food");
							while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								if ($row['quantity'] <= 0) {
									
								} else {
									$id = $row['id'];
									echo "<option value='$id'>".$row['name']."</option>";
								}
							}
						?>
						</select>
					</div>
					<br>
					<div>
						<label class="label">Quantity:</label>
						<input style="height:30px" name="quantity03" type="number" />
					</div>
				</form>
			</div>

			<div class="order" style="font-size:20">
				<form id="order04" action="/functions/account.php" method="post">
					<div>
						<label class="label">Food:</label>
						<select id="dish04" style="height:30px" name="dish04">
						<?php
							include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
							$result = mysqli_query($conn, "SELECT name, id, quantity FROM food");
							while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								if ($row['quantity'] <= 0) {
									
								} else {
									$id = $row['id'];
									echo "<option value='$id'>".$row['name']."</option>";
								}
							}
						?>
						</select>
					</div>
					<br>
					<div>
						<label class="label">Quantity:</label>
						<input style="height:30px" name="quantity04" type="number" />
					</div>
				</form>
			</div>
		</div>
		
		<div style="margin-top:20px" onclick="account()" align="right">
			<button id="next" type="submit">Next</button>
		</div>
		
	</body>


</html>