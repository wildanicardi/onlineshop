<?php 
	#memanggil file 
	include_once("assets/function/koneksi.php");
	include_once("assets/function/helper.php");

	session_start();

	$nama_penerima = $_POST['nama_penerima'];
	$nomer_telepon = $_POST['nomer_telepon'];
	$alamat = $_POST['alamat'];
	$kota = $_POST['kota'];

	$user_id = $_SESSION['user_id'];
	$waktu_saat_ini = date("Y-m-d H-i-s");


	$query = mysqli_query($koneksi,"INSERT INTO pesanan (nama_penerima,user_id,nomor_telepon,kota_id,alamat,tanggal_pemesanan,status)
												VALUES('$nama_penerima','$user_id','$nomer_telepon','$kota','$alamat','$waktu_saat_ini','0')");

	if ($query) {
		#mengeluarkan id nya 
		$last_pesanan_id = mysqli_insert_id($koneksi);

		$keranjang = $_SESSION['keranjang'];

		foreach ($keranjang as $key => $value) {
 					$barang_id = $key;
 					$harga = $value['harga'];
 					$quantity = $value['quantity'];

 					mysqli_query($koneksi,"INSERT INTO pesanan_detail(pesanan_id,barang_id,quantity,harga)
												VALUES('$last_pesanan_id','$barang_id','$quantity','$harga')");

 		}
 		unset($_SESSION['keranjang']);
 		header("location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$last_pesanan_id");
	}
 ?>