<?php 
	session_start();

	include_once("assets/function/helper.php");
	include_once("assets/function/koneksi.php");
	$page =isset($_GET['page']) ? $_GET['page'] : false ;
	$kategori_id =isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false ;

	$user_id =isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false ;
	$email =isset($_SESSION['email']) ? $_SESSION['email'] : false ;
	$level =isset($_SESSION['level']) ? $_SESSION['level'] : false ;
	$nama=isset($_SESSION['nama']) ? $_SESSION['nama'] : false ;
	$keranjang=isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array() ;

	#menghitung barang yang ada di dalam array
	$totalBarang=count($keranjang);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Arabian Food</title>
</head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."assets/css/style.css"; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."assets/css/banner.css"; ?>" />

	<!-- #memanggil file jquery -->
	<script src="<?php echo BASE_URL."assets/js/jquery-3.3.1.min.js"; ?>"></script>
	<!-- memanggil file slide js -->
	<script src="<?php echo BASE_URL."assets/js/Slides/source/jquery.slides.min.js"; ?>"></script>

		<!-- Script js SLide --> 
		<script>
	    $(function() {
	      $('#slides').slidesjs({
	        height: 350,
	        play: { auto :true,
	        		interval :3000
	        	  },
	        navigation : false
	      });
	    });
	  </script>

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
							echo "HI <b> $nama</b>,
							<a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
							<a href='".BASE_URL."logout.php'>Logout</a>";
						}
						else{
						echo "<a href='".BASE_URL."index.php?page=login'>Login</a>";
						echo "<a href='".BASE_URL."index.php?page=Register'>Register</a>";
						}
					 ?>
				</div>
				<a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang" >
				<img src="<?php echo BASE_URL."assets/images/cart.png"; ?>" />
				<?php 
					if ($totalBarang != 0) {
						echo "<span class='total-barang'>$totalBarang</span>";
					}
				 ?>
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
					include_once("main.php");
				}
			 ?>
		</div>
		<div id="footer">
			<p>Copyright Muhammad Ali Wildan</p>
		</div>
	</div>
</body>
</html>