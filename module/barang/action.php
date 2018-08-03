<?php 
	#memanggil file 
	include_once("../../assets/function/koneksi.php");
	include_once("../../assets/function/helper.php");

	$kategori_id = $_POST['kategori_id'];
	$nama_barang = $_POST['nama_barang'];
	$spesifikasi = $_POST['spesifikasi'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	$update_gambar = "";

	#mengecek apakah gambar tidak kosong, jika benar maka akan melakukan proses upload
	if (!empty($_FILES["file"]["name"])) {
		#mengapluoad sebuah file ke dalam server
		$nama_file = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"], "../../assets/images/barang/".$nama_file);

		$update_gambar = ", gambar = '$nama_file'";
	}

	if ($button == "add") {
		#menambahkan data
		mysqli_query($koneksi, "INSERT INTO barang(nama_barang,kategori_id,spesifikasi,stok,gambar,harga, status)  								VALUES ('$nama_barang','$kategori_id','$spesifikasi','$stok','$nama_file','$harga','$status')");
	}
	elseif ($button == "update") {
		$barang_id = $_GET['barang_id'];
		#mengupdate data 
		mysqli_query($koneksi, "UPDATE barang SET kategori_id='$kategori_id',
												nama_barang='$nama_barang',
												spesifikasi = '$spesifikasi',
												harga = '$harga',
												stok = '$stok',	
												status='$status'
												$update_gambar
												 WHERE barang_id='$barang_id'");
	}
	

	header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");
 ?>