<?php 
	#memanggil file 
	include_once("../../assets/function/koneksi.php");
	include_once("../../assets/function/helper.php");

	admin_only("barang",$level);

	$barang_id =isset($_GET['barang_id']) ? $_GET['barang_id'] : "" ;
	$button =isset($_POST['button']) ? $_POST['button'] : $_GET['button'];


	$kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : false;
	$nama_barang =isset($_POST['nama_barang']) ? $_POST['nama_barang'] : false;
	$spesifikasi = isset($_POST['spesifikasi']) ? $_POST['spesifikasi'] : false;
	$stok = isset($_POST['stok']) ? $_POST['stok'] : false;
	$harga = isset($_POST['harga']) ? $_POST['harga'] : false;
	$status = isset($_POST['status']) ? $_POST['status'] : false;
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
		#mengupdate data 
		mysqli_query($koneksi, "UPDATE barang SET kategori_id='$kategori_id',
												nama_barang='$nama_barang',
												spesifikasi = '$spesifikasi',
												harga = '$harga',
												stok = '$stok',	
												status='$status'
												$update_gambar
												 WHERE barang_id='$barang_id'");
	}elseif ($button == "Delete") {
		#mengdelete data 
		mysqli_query($koneksi, "DELETE FROM barang WHERE barang_id='$barang_id'");
	}
	

	header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");
 ?>