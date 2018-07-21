<!DOCTYPE html>
<html>
<head>
	<title>Halaman Register </title>
</head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-4.0.0/dist/css/bootstrap.min.css">
<style type="text/css">
	body{
		color: #fff;
		background: #2ecc71;
		font-family: 'Roboto', sans-serif;
	}
	.form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 412px;
		margin: 0 auto;
		padding: 30px 0;
	}
	h2{
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
    .signup-form .btn1{        
        font-size: 16px;
        font-weight: bold;
        margin-left: 62px;	
		min-width: 281px;
        outline: none !important;
    }
</style>
<body>
	<div class="signup-form">
		<form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST">
			<?php 
			#melakukan pengecekan apakah form telah di isi semua
				$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
				$namadepan = isset($_GET['namadepan']) ? $_GET['namadepan'] : false;
				$namabelakang = isset($_GET['namabelakang']) ? $_GET['namabelakang'] : false;
				$email = isset($_GET['email']) ? $_GET['email'] : false;
				$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;
				$kota = isset($_GET['kota']) ? $_GET['kota'] : false;
				$jk = isset($_GET['jk']) ? $_GET['jk'] : false;
				$provinsi = isset($_GET['provinsi']) ? $_GET['provinsi'] : false;
				$zip = isset($_GET['zip']) ? $_GET['zip'] : false;
				$hp = isset($_GET['hp']) ? $_GET['hp'] : false;

				if ($notif == "require") {
				 	echo "<div class='notif'> Maaf, anda harus melengkapi form dibawah ini</div>";
				 } 
				elseif ($notif == "email") {
				 	echo "<div class='notif'> Maaf, email sudah terdaftar</div>";
				 } 
			 ?>
			<h2>Form  Register</h2>
			<hr>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      <input type="text" placeholder="Nama Depan" value="<?php echo $namadepan ?>" name="namadepan" id="namadepan" class="form-control " >
			    </div>
			    <div class="form-group col-md-6">
					<input type="text" placeholder="Nama Belakang" value="<?php echo $namabelakang ?>" name="namabelakang" id="namabelakang" class="form-control " >
			    </div>
			 </div>
			<div class="form-group">
				<label for="email" class="control-label "></label>
					<div >	
						<input type="text" placeholder="email" value="<?php echo $email ?>" name="email" id="email" class="form-control " >
					</div>
			</div>
			<div class="form-group">
				<label for="alamat" class="control-label " ></label>
					<div >
						<textarea type="text" placeholder="alamat" value="<?php echo $alamat ?>" name="alamat" class="form-control " id="alamat" ></textarea>
					</div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      <input type="text" class="form-control" id="inputCity" value="<?php echo $kota ?>" name="kota" placeholder="Kabupaten/Kota">
			    </div>
			    <div class="form-group col-md-4">
			      <select id="inputState" class="form-control"  value="<?php echo $provinsi ?>" name="provinsi">
			        <option selected>Provinsi</option>
			        <option>Jawa Timur</option>
			        <option>Jawa Barat</option>
			        <option>Jawa Tengah</option>
			        <option>Jakarta</option>
			        <option>Yogyakarta</option>
			        <option>Bali</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			      <input type="text" class="form-control" id="inputZip" value="<?php echo $zip ?>" name="zip" placeholder="Zip">
			    </div>
			</div>
			<div>
				<label for="jk" class="control-label "></label>
					<div >	
						<select class="form-control " id="jk" value="<?php echo $jk ?>" name="jk">
							<option >laki-laki</option>
							<option>perempuan</option>
						</select>
					</div>
			</div>
			<div>
				<label for="nomerhp" class="control-label "></label>
					<div >	
						<input type="text" placeholder="nomer hp" id="nomerhp"  value="<?php echo $hp ?>" class="form-control " name="hp" >
					</div>
			</div>
			<div>
				<label for="password" class="control-label "></label>
					<div>	
						<input type="password" placeholder="password" id="password" class="form-control" name="password" > 
					</div>
					<div >	
						<button type="button" onclick="show(this)" class="btn">Show</button>
					</div>
			</div>
			<br>
			<div class="-12">
				<button type="submit" class="btn btn1 btn-primary "><a href="login.html"></a>Register</button>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		// #fungsi untuk menshow dan hide password
		function show(x) {
		    var y = document.getElementById("password");
		    if ( y.type === "password") {
		        y.type = "text";
		    } else {
		        y.type = "password";
		    }
	    }
	</script>
</body>

</html>