<?php 
	#memanggil file 
	include_once("assets/function/koneksi.php");
	include_once("assets/function/helper.php");

	$email = $_POST['email'];
	$password = md5($_POST['password']);

	#mengecek email yang telah terdaftar di database
	$query = mysqli_query($koneksi, "SELECT * FROM user  WHERE email = '$email' AND password = '$password' AND status='on'");

	#mengecek apakah ada sebuah data , jika == 0 maka tdk ada data
	if (mysqli_num_rows($query) == 0) {
		header("location: ",BASE_URL."index.php?page=register&notif=true");
	}
	else{
		#berfungsi untuk melihat data jika user berhasil login
		$row = mysqli_fetch_assoc($query);
		echo $row['nama'];

	}
 ?>