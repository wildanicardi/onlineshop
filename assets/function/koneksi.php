<?php 
	$server = "127.0.0.1";
	$db = "onlineshop";
	$username = "root";
	$password = "";
	


	$koneksi = mysqli_connect($server,$username,$password,$db) or die("koneksi ke database gagal");
 ?>