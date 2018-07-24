<?php
	if ($user_id) {
		$module = isset($_SESSION['module']) ? $_SESSION['module'] : false ;
		$action = isset($_SESSION['action']) ? $_SESSION['action'] : false ;
		$mode = isset($_SESSION['mode']) ? $_SESSION['mode'] : false ;
	}
	else{
		header("location: ".BASE_URL."index.php?page=login");
	}
?>
<div id="bg-page-profile">
		<div id="menu-profile">
			<ul>
				<li>
					<a <?php if ($module == "kategori") {
						echo "class='active'";
					} ?> 
					href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list";?>">Kategori</a>
				</li>
				<li>
					<a <?php if ($module == "barang") {
						echo "class='active'";
					} ?>  href="<?php echo	BASE_URL."index.php?page=my_profile&module=barang&action=list";?>">Barang</a>
				</li>
				<li>
					<a <?php if ($module == "kota") {
						echo "class='active'";
					} ?>  href="<?php echo	BASE_URL."index.php?page=my_profile&module=kota&action=list";?>">Kota</a>
				</li>
				<li>
					<a <?php if ($module == "user") {
						echo "class='active'";
					} ?>  href="<?php echo	BASE_URL."index.php?page=my_profile&module=user&action=list";?>">User</a>
				</li>
				<li>
					<a <?php if ($module == "banner") {
						echo "class='active'";
					} ?>  href="<?php echo	BASE_URL."index.php?page=my_profile&module=banner&action=list";?>">Banner</a>
				</li>
				<li>
					<a <?php if ($module == "pesanan") {
						echo "class='active'";
					} ?>  href="<?php echo	BASE_URL."index.php?page=my_profile&module=pesanan&action=list";?>">Pesanan</a>
				</li>
			</ul>
		</div>
</div>
<div id="profile-konten">
		<?php 
			$file="assets/module/$module/$action.php";
			if (file_exists($file)) {
				include_once($file);
			}
			else{
				echo "<h3>Maaf halaman Yang anda Minta Tidak Ada</h3>";
			}
		 ?>
</div>
