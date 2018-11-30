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
	Enetr march:<input type="text" name="mac">
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
	$place_buy=$result['place_buy'];
	echo "<table border='2px>'>
	<tr>
	<th>model</th>
	<th>place of repair</th>
	<th>march</th>
	<th>price_repair</th>
	<th>price_buy</th>
	<th>photo</th>
	</tr>
	<tr>
	<td>$Model</td>
	<td>$place</td>
	<td>$marc</td>
	<td>$price_repair</td>
	<td>$price_buy</td>
	<td><img src=$path width='100px' height='100px'></td>
	</tr>
	";
}
?>
