<?php
session_start();
if(!isset($_SESSION['status'])||($_SESSION['status'])!="login"){
    header("location:../index.php?message=silahkan login terlebih dahulu!!");
}

if(isset($_POST['logout'])){
    session_destroy();
    header("location:../index.php?message=Anda telah keluar dari sistem!");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Poppins:ital,wght@0,100;1,300&display=swap" rel="stylesheet">
    <!-- font -->
</head>
<body>
    <div class="container">
        <div class="bt-logout">
        <form action="" method="post" class="logout-button">
                    <button class=" logout" name="logout" type="submit">LogOut</button>
                </form>
        </div>
        <section>
            <div class="wrapper">
                <h1>Selamat Datang , <?php echo $_SESSION['fullname']; ?></h1>
                <br>
                <?php if(isset($_GET['message']) ){
                    echo $_GET['message'];
                } ?>
                <div class="table">
                    <?php include("absensi.php");?>

                </div>
                
            </div>
        </section>
    </div>
</body>
</html>
