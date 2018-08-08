<?php

	$pesanan_id = $_GET["pesanan_id"];

?>

<table class="table-list">

	<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
		<div>
            <label class="control-label "></label>
                <div >  
                    <input type="text" placeholder="Nomor Rekening"class="form-control " name="nomor_rekening" >
                </div>
        </div>

		<div>
            <label class="control-label "></label>
                <div >  
                    <input type="text" placeholder="Nama Account"class="form-control " name="nama_account" >
                </div>
        </div>		
		<div>
            <label class="control-label "></label>
                <div >  
                    <input type="text" placeholder="Tanggal Transfer (format: yyyy-mm-dd)" class="form-control " name="tanggal_transfer"" >
                </div>
        </div>
		<div class="element-form">
			<span><input type="submit" value="Konfirmasi" name="button" /></span>
		</div>		
	
	</form>

</table>