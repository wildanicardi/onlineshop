<div id="frame-tambah">
	<a href="<?php echo BASE_URL. "index.php?page=my_profile&module=kategori&action=form";?> " class="tombol-action">+ Tambah Kategori</a>
</div>

<?php 
	#mengecek kategori di dalam database
	$querykategori = mysqli_query($koneksi, "SELECT * FROM kategori");

	if (mysqli_num_rows($querykategori) == 0) {
		echo "<h3>Saat ini belum ada kategori di dalam table kategori</h3>";
	}else{
		echo "<table class='table-list'";

		echo "<tr>
				<th>No</th>
				<th>Kategori</th>
				<th>Status</th>
				<th>Action</th>
			</tr>";
		$no=1;

		while ($row=mysqli_fetch_assoc($querykategori)) {
			echo "<tr>
					<td>$no</td>
					<td>$row['kategori']</td>
					<td>$row['status']</td>
					<td>
						<a class='".BASE_URL.
						"index.php?page=my_profile&module=kategori&action=form&kategori_id=$row['kategori_id']>EDIT</a> 
					</td>";
		}
		echo "</table>";
	}
 ?>