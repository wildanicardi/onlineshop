<?php 
	#memanggil file 
	include_once("assets/function/koneksi.php");
	include_once("assets/function/helper.php");

<<<<<<< HEAD
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
=======
	#mengambil data dari form register
	// if(isset($_POST['submit'])) {
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
	
	
	#mengunset input an password
	unset($_POST['password']);

	#mengasignment setiap data post 
	$dataForm = http_build_query($_POST);

	#mengecek email yang telah terdaftar di database
	$tabel = mysqli_query($koneksi, "SELECT * FROM user  WHERE email = '$email'");

	#melakukan input dan pengecekan form 
	if (empty($nama_depan) || empty($nama_belakang) || empty($email) ||
 		empty($alamat) || empty($kota) || empty($provinsi) || empty($zip) || empty($jk) ||
 		empty($password) || empty($nomerhp)) {
		header("location: ".BASE_URL."index.php?page=register&notif=require&$dataForm" );
	}
	#mengecek apakah ada sebuah data , jika == 1 maka ada data
	elseif (mysqli_num_rows($tabel) == 1) {
		header("location: ".BASE_URL."index.php?page=register&notif=email&$dataForm" );
	}
	else{
<<<<<<< HEAD
		$passwordHash = md5($password);
		$query = mysqli_query($koneksi,"INSERT INTO user (level , nama_depan , nama_belakang, email, alamat, kota, provinsi, zip, jk, phone, password, status ) 
			VALUES('$level', '$nama_depan', '$nama_belakang', '$email', '$alamat', '$kota', '$provinsi', '$zip', '$jk','$nomerhp', '$passwordHash', '$status')");


 	}
 		if($query) {
			echo "<script>alert('Berhasil')</script>";
			header("Location: ".BASE_URL."index.php?page=login" );
=======
		$password = md5($password);
		mysqli_query($koneksi , "INSERT INTO user ( level , nama_depan , nama_belakang, email, alamat, kota, provinsi, zip, jk, password, nomerhp) 
			VALUES('$level', '$nama_depan', '$nama_belakang', '$email', '$alamat', '$kota', '$provinsi', '$zip', '$jk', '$password', '$nomerhp', '$status')");
>>>>>>> a9377ec81470d5f3c0ccf74e7ee033fa4da99f77

		if($query) {
			"<script>alert('Berhasil')</script>";
			header("Location: ",BASE_URL."index.php?page=login" );
>>>>>>> f44325fce336c8470c09575b33059e0c9915c639
		}
		else {
			error_reporting(E_ALL);
		}
<<<<<<< HEAD
 	
=======
			
 	// }
>>>>>>> f44325fce336c8470c09575b33059e0c9915c639
 ?>