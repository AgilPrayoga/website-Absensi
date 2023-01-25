<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi final</title>
    <link rel="stylesheet" href="./style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&display=swap" rel="stylesheet">
    <!-- font -->
</head>
<body>
    <!--start div-->
    <div class="container">
            <section class="wrapper">
            <div class="form-wrapper">
                <form action="login.php" method="POST" class="form-login" >
                    <h1>Selamat Datang</h1>
                    <p>Silahkan masukan data anda untuk melakukan Absensi.</p>
                    <label class="label">Masukan NIP </label>
                    <input  name="nip"class="input-login" placeholder=" NIP " type="number">
                    <label class="label">Masukan Password</label>
                    <input name="password" class="input-login" placeholder="******" type="password">
                    
                    <div class="alert">
                    <?php
                    if(isset($_GET['message'])){
                        echo $_GET['message'];
                    }
                    ?>
                    </div>
                    <button name="login" class="bt-login" type="submit">login</button>
                </form> 
                <img src="image/computer.png" alt="">   
            </div>
        </section>
    </div>
    <!--end div-->
</body>
</html>