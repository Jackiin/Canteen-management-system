<?php

include($_SERVER['DOCUMENT_ROOT'].'/connect.php');

$index_sql = "SELECT id FROM employee ORDER BY id DESC LIMIT 1";
$index_result = mysqli_query($conn, $index_sql);
$index_num = mysqli_num_rows($index_result);
$index_id = "";
if ($index_num > 0) {
	$index_id = mysqli_fetch_row($index_result);
}

$idno = intval($index_id[0]);

if ($idno >= 9) {
	$id = '0'.($idno + 1);
} else {
	$id = '00'.($idno + 1);
}

$names = explode(" ", $_POST['name']);
$lname = array_shift($names); //remove the first element of the array and return the value of that element
$fname = implode(" ", $names);
$salary = $_POST['salary'];
$tel = trim($_POST['tel']);
$position = trim($_POST['position']);
$dismiss = false;


if (empty($names) || empty($salary) || empty($tel) || empty($position)){
	echo "<script>alert('Empty field!');document.location.href='/main.php';</script>";
} else {
	if (!empty($lname)){
		$sql = "INSERT INTO employee(`id`, `fname`, `lname`, `salary`, `tel`, `position`, `dismissed`) VALUES ('$id', '$fname', '$lname', '$salary', '$tel', '$position', '$dismiss')";
		$result = mysqli_query($conn, $sql);
		if ($result == true){
			echo "<script>alert ('Employee was added!');document.location.href='/main.php';</script>";
			mysqli_free_result($result);
		} else {
		
		}
	} else {
		echo "<script>alert('Name not completed!');document.location.href='/main.php';</script>";
	}
}



?>