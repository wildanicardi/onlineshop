<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login </title>
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
    <?php 
    #user tidak dapat mengklik button login dan register ketika sudah login
        if ($user_id) {
            header("Location:" .BASE_URL);
        }
    ?>
    <div class="signup-form">
        <form action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST">
            <?php 
            #melakukan pengecekan apakah email dan password yang di masukkan benar
                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                if ($notif == true) {
                    echo "<div class='notif'> Maaf, email atau password yang anda masukkan salah</div>";
                 } 
             ?>
            <h2>Form  Login</h2>
            <hr>
            <div>
                <label for="email" class="control-label "></label>
                    <div >  
                        <input type="text" placeholder="email" id="email"   class="form-control " name="email" >
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
            <div class="">
                <button type="submit" class="btn btn1 btn-primary "><a href=""></a>LOGIN</button>
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