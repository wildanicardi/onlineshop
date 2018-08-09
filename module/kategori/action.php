<?php 
	#memanggil file 
	include_once("../../assets/function/koneksi.php");
	include_once("../../assets/function/helper.php");

	admin_only("kategori",$level);

	$kategori_id =isset($_GET['kategori_id']) ? $_GET['kategori_id'] : "" ;
	$button =isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
	$kategori =isset($_POST['kategori']) ? $_POST['kategori'] : "" ;
	$status = isset($_POST['status']) ? $_POST['status'] : "" ;

	if ($button == "add") {
		#menambahkan data
		mysqli_query($koneksi, "INSERT INTO kategori(kategori,status) VALUES ('$kategori','$status')");
	}
	elseif ($button == "update") {
		#mengupdate data 
		mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori',
													status='$status' WHERE kategori_id='$kategori_id'");
	}elseif ($button == "Delete") {
		#mengdelete data 
		mysqli_query($koneksi, "DELETE FROM kategori WHERE kategori_id='$kategori_id'");
	}
	

	header("location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
 ?>