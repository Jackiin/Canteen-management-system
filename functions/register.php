<?php
function register(){
	include($_SERVER['DOCUMENT_ROOT'].'/connect.php');
				
	$regusername = trim($_POST['username']);
	$regpassword = trim($_POST['password']);
	$cmfpassword = trim($_POST['cf_password']);
	
	if (empty($regusername) || empty($regpassword) || empty($cmfpassword)){
		echo "<script>alert('Empty field!');document.location.href='/register.html';</script>";
	} else {
		if ($regpassword != $cmfpassword){
			echo "<script>alert('Passwords not match!');document.location.href='/register.html'</script>";
		} else {
			$sql = "INSERT INTO user(`name`, `password`) VALUES ('$regusername', '$regpassword')";
			$result = mysqli_query($conn, $sql);
		}
	}
				 
	if ($result){
		echo "<script>alert ('Welcome, newdie')</script>";
		echo "<script>window.open('', '_self', '');window.close()</script>";
		//mysqli_free_result($result);
	}
	
	//mysqli_free_result($result);
	
}

	if(!isset($_POST['submit'])){
		exit('Access denied.');
	} else {
		register();
	}
			
?>

