<?php 
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

	$kategori="";
	$status="";
	$button="add";

	if ($kategori_id) {
		$querykategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
		#mengeluarkan data
		$row = mysqli_fetch_assoc($querykategori);

		$kategori = $row['kategori'];
		$status = $row['status'];
		$button = "update";
	}
 ?>
<form action="<?php echo BASE_URL."module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="POST">

	<div>
        <label for="kategori" class="control-label "></label>
         	<div >  
                <input type="text" placeholder="kategori" id="kategori" value="<?php echo $kategori; ?>"  class="form-control " name="kategori" >
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