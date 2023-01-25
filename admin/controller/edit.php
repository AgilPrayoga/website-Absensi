<?php
session_start();
include("../../connection.php");

$cekid =$_GET['message'];
$tampil = "SELECT * FROM users WHERE employee_id=$cekid";

$hasil=$db->query($tampil);
$row = $hasil->fetch_assoc();

if(isset($_POST['edit'])){
        
        $fullname = $_POST['fullname'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        
        
        $user = "UPDATE  users SET fullname='$fullname',role ='$role', password='$password'WHERE employee_id=$cekid ";
        
        $tambah =$db->query($user);
        
        if(!$tambah){
        echo "data tidak anda masuk kok";
        }else{
            $message = "data Berhasil di edit!!";
            echo "<script type='text/javascript'>
            alert('$message');
            window.location.href='index.php';
            </script>";
            
            }
        
        
       
    }
    







?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>
    <link rel="stylesheet" href="style-edit.css">
</head>
<body>
    <div class="container">
        
        <section class="wrapper">
            <h1>Ubah Data Pegawai</h1>
            
            <form class="form" action="" method="POST">

                <label class="label" for=""  > Masukan Nama Lengkap</label>
                <input class="input" value="<?php echo $row['fullname'];?>" name="fullname" placeholder = "Nama Lengkap" type="text">

                <label class="label" for="" >Jabatan</label>
                <input class="input" value="<?php echo $row['role'];?>" type="text" placeholder="Jabatan" name="role">

                <label class="label" for="">Masukan Password </label>
                <input class="input" value="<?php echo $row['password'];?>" placeholder = "Password" name="password" type="text">

                <button class="edit " name="edit" type="submit">edit</button>
             </form>
    
        </section>
    </div>
</body>
<style>

</style>
</html>
