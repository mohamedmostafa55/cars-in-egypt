<!DOCTYPE html>
<html>
<head>
	<title>singUp</title>
	<style type="text/css">
		form{
			border: 10px solid white;
			padding: 10px;
			margin-left: 500px;
			margin-top: 100px;
			font-size: 20px;
			width: 300px;
		}
		body{
			background-image: url("cars.jpg");
			background-size: cover;
		}
		
	</style>
</head>
<body>

<form method="post">
	Email:<input type="text" name="email">
	<br><br>
	Name:<input type="text" name="name">
	<br><br>
	Pass:<input type="password" name="pass">
	<br><br>
	<input type="submit" name="sing" value="sing Up">
</form>
</body>
</html>
<?php
include_once 'database.php';
if (isset($_POST['sing'])) {
	if (!isEmailExit($_POST['email'])) {
		$email=$_POST['email'];
		$name=$_POST['name'];
		$pass=$_POST['pass'];
		$conn->query("insert into user values('$email','$name','$pass');");
		header("location:main.php?email=$email");
	}else
	echo "<script>
	alert('email is exists');
	</script>";
	
}
function isEmailExit($email){
	global $conn; 
		$c=$conn->query("select * from users where email='$email'");
		if (mysqli_num_rows($c)== 0)
			return False;
		return True;
	}
?>