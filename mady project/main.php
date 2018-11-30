<?php
session_start();
if (isset($_GET['email'])) {
	$_SESSION['email']=$_GET['email'];
}
include_once 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>main</title>
	<style type="text/css">
	a{
			color: white;
			text-decoration: none;
			padding-right: 50px
		}
	.head{
			height: 30px;
			width: 100%;
			background: black;
			font-size: 20px;
			text-align: right;
		}
		h1{
			text-align: center;
		}
		body{
			background-image: url("cars.jpg");
			background-size: cover;
			text-align: center;
			color: white;
		}

		table{
			margin-top: 100px;
			margin-left: 500px;
		}
		
	</style>
</head>
<body>
	<div class="head">
	<a href="index.php">log out</a>
</div>
	<h1><?php echo $_SESSION['email'];?></h1>
<form method="post">
	Enter Model:<input type="text" name="Model">
	<br>
	<br>
	Enetr markh:<input type="text" name="mac">
	<br><br>
	<input type="submit" name="sub">
</form>
</body>
</html>
<?php
if (isset($_POST['sub'])) {
	$Model=$_POST['Model'];
	$marc=$_POST['mac'];
	$result=$conn->query("select * from cars where model='$Model' and mac='$marc'");
	$result=$result->fetch_assoc();
	$price=$result['price'];
	$palce_repair=$result['palce_repair'];
	$path=$result['path_photo'];
	$place_buy=$result['palce_buy'];
	echo "<table border='2px>'>
	<tr>
	<th>model</th>
	<th>march</th>
	<th>place_repair</th>
	<th>place_buy</th>
	<th>price</th>
	<th>photo</th>
	</tr>
	<tr>
	<td>$Model</td>
	<td>$marc</td>
	<td>$palce_repair</td>
	<td>$place_buy</td>
	<td>$price</td>
	<td><img src=$path width='100px' height='100px'></td>
	</tr>
	";
}
?>
