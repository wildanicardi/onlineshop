<?php 
	#proteksi agar tidak dapat masuk ke data pemesanan sebelum login
	if ($user_id ==false) {
		$_SESSION["proses_pesanan"] = true;
		header("location:".BASE_URL."index.php?page=login");
		exit;
	}
 ?>

<div id="frame-data-pengiriman">
 	<h3 class="label-data-pengiriman">Alamat Pengirim Barang</h3>
 	<div id="frame-form-pengiriman">
 		<form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
 			<div>
                <label  class="control-label "></label>
                    <div >  
                        <input type="text" placeholder="Nama Penerima" id="nama_penerima"   class="form-control " name="nama_penerima" >
                    </div>
            </div>
            <div>
                <label  class="control-label "></label>
                    <div >  
                        <input type="text" placeholder="Nomer Telepon"   class="form-control" name="nomer_telepon" >
                    </div>
            </div>
            <div>
                <label  class="control-label "></label>
                    <div >  
                        <textarea name="alamat" placeholder="Alamat Pengiriman" class="form-control"></textarea>
                    </div>
            </div>
            <div>
                <label  class="control-label "></label>
                    <div > 
                    	<select class="form-control" name="kota">
                    	    <?php 
	                    		$query = mysqli_query($koneksi,"SELECT * FROM kota");

	                    		while ($row=mysqli_fetch_assoc($query)) {
	                    			echo "<option value='$row[kota_id]'>$row[kota](".rupiah($row[tarif]).")</option>";
	                    		}
	                    	 ?> 
                        
                    	</select>
                    </div>
            </div>
            <div>
            	<input type="submit" value="submit">
            </div>
 		</form>
 	</div>
 </div>
 <div id="frame-data-detail">
 	<h3 class="label-data-pengiriman">Detail Order</h3>

 	<div id="frame-detail-order">
 		<table class="table-list">
 			<tr>
 				<th class="kiri">Nama Barang</th>
 				<th class="tengah">Qty</th>
 				<th class="kanan">Total</th>
 			</tr>
 			<?php 
 			$subtotal=0;
 				foreach ($keranjang as $key => $value) {
 					$barang_id = $key;

 					$nama_barang = $value['nama_barang'];
 					$harga = $value['harga'];
 					$quantity = $value['quantity'];
 					$total = $quantity * $harga; 
 					$subtotal = $subtotal + $total;
 					echo "<tr class='baris-title'>
							<td class='kiri'>$nama_barang</td>
							<td class='tengah'>$quantity</td>
							<td class='kanan'>".rupiah($total)."</td>
						</tr>";
 				}
 				echo "<tr>
						<td colspan='2' class='kanan'><b>Sub Total</b></td>
						<td class='kanan'><b>".rupiah($subtotal)."</b></td>
					</tr>";
 			 ?>
 		</table>
 	</div>
 </div>