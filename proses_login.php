<?php 
	#memanggil file 
	include_once("assets/function/koneksi.php");
	include_once("assets/function/helper.php");

	if(isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
	}
	

	#mengecek email yang telah terdaftar di database
	$query = mysqli_query($koneksi, "SELECT * FROM user  WHERE email = '$email' AND password = '$password' AND status='on'");
	$cek = mysqli_num_rows($query);
	#mengecek apakah ada sebuah data , jika == 0 maka tdk ada data

	if (mysqli_num_rows($query) == 0) {
		header("location: ".BASE_URL."index.php?page=login&notif=true");
	}
	else{
		#berfungsi untuk melihat data jika user berhasil login
		$row = mysqli_fetch_assoc($query);
		session_start();

		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['level'] = $row['level'];

		if (isset($_SESSION["proses_pesanan"])) {
			unset($_SESSION["proses_pesanan"]);
			header("location: ".BASE_URL."data-pemesan.html");
		}else{
			header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");
		}
	}
 ?>