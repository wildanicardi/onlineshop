<?php 
	include_once("assets/function/koneksi.php");
	include_once("assets/function/helper.php");

	if(isset($_POST['submit'])) {
		$level = "customer";
		$status="on";
		$nama_depan = $_POST['namadepan'];
		$nama_belakang = $_POST['namabelakang'];
		$email = $_POST['email'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$provinsi = $_POST['provinsi'];
		$zip = $_POST['zip'];
		$jk = $_POST['jk'];
		$password =$_POST['password'];
		$nomerhp = $_POST['hp'];
	}
	

	// unset($_POST['password']);
	// $dataForm = http_build_query($_POST);

	// $query = mysqli_query($koneksi, "SELECT * FROM user  WHERE email = '$email'");

	// if (empty($nama_depan) || empty($nama_belakang) || empty($email) ||
 	// 	empty($alamat) || empty($kota) || empty($provinsi) || empty($zip) || empty($jk) ||
 	// 	empty($password) || empty($nomerhp)) {
	// 	header("location: ",BASE_URL."index.php?page=register&notif=require&$dataForm" );
	// }
	// elseif (mysqli_num_rows($query) == 1) {
	// 	header("location: ",BASE_URL."index.php?page=register&notif=email&$dataForm" );
	// }
	// else{
		$passwordHash = md5($password);
		$query = mysqli_query($koneksi,"INSERT INTO user (level , nama_depan , nama_belakang, email, alamat, kota, provinsi, zip, jk, phone, password, status ) 
			VALUES('$level', '$nama_depan', '$nama_belakang', '$email', '$alamat', '$kota', '$provinsi', '$zip', '$jk','$nomerhp', '$passwordHash', '$status')");

		if($query) {
			"<script>alert('Berhasil')</script>";
			header("Location: ",BASE_URL."index.php?page=login" );
		}
		else {
			error_reporting(E_ALL);
		}
			
 	// }
 ?>