<?php 
	#memanggil file 
	include_once("assets/function/koneksi.php");
	include_once("assets/function/helper.php");

	#mengambil data dari form register
		$level = "customer";
		$status="on";
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$provinsi = $_POST['provinsi'];
		$zip = $_POST['zip'];
		$jk = $_POST['jk'];
		$password =$_POST['password'];
		$nomerhp = $_POST['hp'];
	
	
	#mengunset input an password
	unset($_POST['password']);

	#mengasignment setiap data post 
	$dataForm = http_build_query($_POST);

	#mengecek email yang telah terdaftar di database
	$tabel = mysqli_query($koneksi, "SELECT * FROM user  WHERE email = '$email'");

	#melakukan input dan pengecekan form 
	if (empty($nama) || empty($email) ||
 		empty($alamat) || empty($kota) || empty($provinsi) || empty($zip) || empty($jk) ||
 		empty($password) || empty($nomerhp)) {
		header("location: ".BASE_URL."index.php?page=register&notif=require&$dataForm" );
	}
	#mengecek apakah ada sebuah data , jika == 1 maka ada data
	elseif (mysqli_num_rows($tabel) == 1) {
		header("location: ".BASE_URL."index.php?page=register&notif=email&$dataForm" );
	}
	else{
		$passwordHash = md5($password);
		$query = mysqli_query($koneksi,"INSERT INTO user (level , nama, email, alamat, kota, provinsi, zip, jk, phone, password, status ) 
			VALUES('$level', '$nama', '$email', '$alamat', '$kota', '$provinsi', '$zip', '$jk','$nomerhp', '$passwordHash', '$status')");


 	}
 		if($query) {
			echo "<script>alert('Berhasil')</script>";
			header("Location: ".BASE_URL."index.php?page=login" );

		}
		else {
			error_reporting(E_ALL);
		}

 ?>

