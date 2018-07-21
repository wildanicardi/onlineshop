<?php 
	$server = "localhost";
	$username = "root";
	$password = "";
	$db = "onlineshop";

	$koneksi = mysqli_connect($server , $username , $password, $db) or die("koneksi ke database gagal");
 ?>