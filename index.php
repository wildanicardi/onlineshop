<?php 

	session_start();

	include_once("assets/function/helper.php");
	$page =isset($_GET['page']) ? $_GET['page'] : false ;

	$user_id =isset($_GET['user_id']) ? $_GET['user_id'] : false ;
	$email =isset($_GET['email']) ? $_GET['email'] : false ;
	$level =isset($_GET['level']) ? $_GET['level'] : false ;
	
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
					<?php 
						if ($user_id) {
							echo "HI <b> $nama_depan</b>, <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>";
						}
						else{
						echo "<a href='".BASE_URL."index.php?page=login'>Login</a>";
						echo "<a href='".BASE_URL."index.php?page=Register'>Register</a>";
						}
					 ?>
				</div>
				<a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang" >
				<img src="<?php echo BASE_URL."assets/images/cart.png"; ?>" />
			</a>
			</div>
		</div>
		<div id="content">
			<?php 
				$filename = "$page.php";
				if (file_exists($filename)) {
					include_once($filename);
				}
				else{
					echo "File tidak ada dalam system";
				}
			 ?>
		</div>
		<div id="footer">
			<p>Copyright Muhammad Ali Wildan</p>
		</div>
	</div>
</body>
</html>