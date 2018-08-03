<?php 
	$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

	$nama_barang="";
    $kategori_id = "";
    $spesifikasi="";
    $gambar = "";
    $stok ="";
    $harga = "";
	 $status="";
	 $button="add";

	if ($barang_id) {
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
		#mengeluarkan data
		$row = mysqli_fetch_assoc($query);

        $nama_barang = $row['nama_barang'];
		$kategori_id = $row['kategori_id'];
        $spesifikasi = $row['spesifikasi'];
        $gambar = $row['gambar'];
        $stok = $row['stok'];
        $harga = $row['harga'];
		$status = $row['status'];
        $keterangan_gambar = "";
		$button = "update";

        $keterangan_gambar= "(Klik pilih gambar jika ingin mengganti gambar di samping)";
        #menampilkan gambar di form
        $gambar = "<img src='".BASE_URL."assets/images/barang/$gambar' style='vertical-align:middle;width:400px;'/>"; 
	}
 ?>
 <script src="<?php echo BASE_URL."assets/js/ckeditor/ckeditor.js" ?>"></script>
<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data">

	<div>
        <label for="kategori" >Kategori</label>
         	<div >  
               <select name="kategori_id" class="control-label">
                   <?php 
                    $query = mysqli_query($koneksi,"SELECT kategori_id,kategori FROM kategori WHERE status='on'  ORDER BY kategori ASC");
                    while ($row=mysqli_fetch_assoc($query)) {
                        if ($kategori_id == $row["kategori_id"]) {
                           echo "<option value='$row[kategori_id]' selected = 'true'>$row[kategori]</option>";
                        }
                        else{
                            echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                        }
                    }
                    ?>
               </select>
        	</div>
    </div>
    <div>
        <label >Nama Barang</label>
            <div >  
                <input type="text" name="nama_barang" class="control-label" value="<?php echo $nama_barang; ?>">
            </div>
    </div>
    <div>
        <label >Spesifikasi</label>
            <div >  
                <textarea name="spesifikasi" class="control-label" id="editor"><?php echo $spesifikasi; ?></textarea>
            </div>
    </div>
    <div>
        <label >Stok</label>
            <div >  
                <input type="text" name="stok" class="control-label" value="<?php echo $stok; ?>">
            </div>
    </div>
    <div>
        <label >Harga</label>
            <div >  
                <input type="text" name="harga" class="control-label" value="<?php echo $harga; ?>">
            </div>
    </div>
    <div>
        <label >Gambar Produk <?php if ($gambar) {
            echo $keterangan_gambar;
        } ?></label>
            <div >  
                <?php echo $gambar; ?>
                <input type="file" name="file" >
            </div>
    </div>
    <div>
        <label  class="control-label ">status</label>
         	<div >  
                <input type="radio"  name="status" value="on" <?php if ($status == "on") {
                	echo "checked == 'true'";
                } ?>>on
                <input type="radio"  name="status" value="off" <?php if ($status == "off") {
                	echo "checked == 'true'";
                } ?>>off
        	</div>
    </div>
         	<div >  
                <input type="submit" class="tombol-action" name="button" value="<?php echo $button; ?>">
        	</div>	
</form>
<script type="text/javascript">
    // #membuat fungsi ckeditor di text area

    CKEDITOR.replace('editor');
</script>