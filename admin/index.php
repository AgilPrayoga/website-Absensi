<?php
session_start();
if(!isset($_SESSION['admin'])||($_SESSION['admin'])!="admin"){
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
    <title>Ruang Admin</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Poppins:ital,wght@0,100;1,300&display=swap" rel="stylesheet">
    <!-- font -->
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Selamat Datang Di Ruang Admin.</h1>
            
            
        </div>
        <section class="wrapper">
            
            <div class="card">
                <img src="../image/card2.png" alt="">
                <form action="controller/index.php">
                    <button >Data Pegawai</button>
                </form>
            </div>
            
            <div class="card">
                <img src="../image/card1.png" alt="">
                <form action="dataabsensi/index.php">
                    <button >Data Absensi</button>
                </form>
            </div>
            
        </section>
        <div class="logout">
            <form action="" method="post" class="logout-button">
                <button  name="logout" type="submit">LogOut</button>
            </form>
        </div>
    </div>
    
</body>
</html>