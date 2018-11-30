<!DOCTYPE html>
<html>
<head>
	<title>log In</title>
	<style type="text/css">
		.head{
			height: 30px;
			width: 100%;
			background: black;
			font-size: 20px;
			text-align: right;
		}
		form{
			margin-top: 200px;
			margin-left: 480px;
			width: 300px;
			height: 100px;
			padding: 10px;
		}
		a{
			color: white;
			text-decoration: none;
			padding-right: 50px
		}
		body{
    background-image: url("cars.jpg");
    background-size: cover;
    color: white;
		}
	</style>
</head>
<body>

<div class="head">
	<a href="sing up.php">sing up</a>
</div>
<form method="post">
	 email:<input type="text" name="email">
	<br>
	<br>
	 Pass:<input type="password" name="pass">
	<br>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="logIn" name="submit">
</form>
</body>
</html>
<?php
include 'database.php';
if(isset($_POST['submit']))
{
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$type="";
		if(logIN($email,$pass))
		{

	header("location:main.php?email=$email");
		}else
	echo "<script>
	alert('error pass or email');
	</script>";
		
}
	function logIN($email,$pass){
		global $conn;
	$result = mysqli_query($conn, "select * from user where pass='$pass' and email='$email'");
	if (mysqli_num_rows($result)== 0)
			return False;
		return True;
		
	}
?>
