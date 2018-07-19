<?php 
	include_once("assets/function/helper.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Arabian Food</title>
</head>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."assets/css/style.css"; ?>" />
<body>
	<div id="container">
		<div id="header">
			<a href="<?php echo BASE_URL."index.php"; ?>">
				<img src="<?php echo BASE_URL."assets/images/logo.png"; ?>" />
			</a>
			<div id="menu">
				<div id="user">
					<a href="<?php echo BASE_URL."index.php?page=login"; ?>">Login</a>
					<a href="<?php echo BASE_URL."index.php?page=Register"; ?>">Register</a>
				</div>
				<a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang" >
				<img src="<?php echo BASE_URL."assets/images/cart.png"; ?>" />
			</a>
			</div>
		</div>
		<div id="content">
			
		</div>
		<div id="footer">
			<p>Copyright Muhammad Ali Wildan</p>
		</div>
	</div>
</body>
</html>