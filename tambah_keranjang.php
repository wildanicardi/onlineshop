<?php 
	include_once("assets/function/helper.php");
	include_once("assets/function/koneksi.php");

	session_start();
	
	$barang_id = $_GET['barang_id'];
	$keranjang=isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false ;
	
		$query = mysqli_query($koneksi, "SELECT nama_barang,gambar,harga FROM barang WHERE barang_id='$barang_id'");

		#mengeluarkan data
		$row=mysqli_fetch_assoc($query);

		$keranjang[$barang_id] = array('nama_barang' =>$row["nama_barang"] ,
										'gambar' =>$row["gambar"],
										'harga' =>$row["harga"],
										'quantity' => 1);
		#membuat session keranjang yang nantinya akan di akses di file index
		$_SESSION['keranjang'] =$keranjang;

		header("location:".BASE_URL); 
 ?>
 