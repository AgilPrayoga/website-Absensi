<?php
session_start();
if(!isset($_SESSION['admin'])||($_SESSION['admin'])!="admin"){
    header("location:../../index.php?message=silahkan login terlebih dahulu!!");
}
if(isset($_POST['dashboard-admin'])){
    $_SESSION['admin'] = "admin";
    header("location:../index.php?");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&display=swap" rel="stylesheet">
    <!-- font -->
</head>
<body>
    <div class="container">
        <section class="wrapper-table">
            
                
            <div class = title>
                <h1>Data Pegawai</h1>
            </div>
            <div>
                <table class="table">
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>role</th>
                            <th>password</th>

                        </tr>

                    <?php
                    include("../../connection.php");
                    $profil = "SELECT * FROM users ";

                    $result = $db->query($profil);
                    

                    while($row=$result->fetch_assoc()){
                        $id=$_SESSION['cek']=$row['employee_id'];
                        

                        echo "<tr>";
                        echo "<td>".$row['fullname']."</td>";
                        echo "<td>".$row['employee_id']."</td>";
                        echo "<td>".$row['role']."</td>";
                        echo "<td>".$row['password']."</td>";
                        echo "<td class='edit'>
                            <form  action ='edit.php?message=$id' method='POST'>
                            <button class='editor' type='submit' name='ubah'>edit</button>
                            </form>
                              </td>";
                        echo "</tr>";
                    }

                    ?>
                </table>
            </div>
        </section>
        
        <section class="wrapper-form" >
            <h1>Tambahkan data Pegawai</h1>
            <div>
                <form class="form" action="" method="POST">
                    <label for="">Masukan NIP</label>
                    <input class="input" placeholder="NIP" name="nip" type="text">
    
                    <label for=""  > Masukan Nama Lengkap</label>
                    <input class="input" name="fullname" placeholder = "Nama Lengkap" type="text">
    
                    <label for="" >Jabatan</label>
                    <input class="input"  type="text" placeholder="Jabatan" name="role">
    
                    <label for="">Masukan Password Baru</label>
                    <input class="input" placeholder = "Password" name="password" type="text">
    
                    <button class="submit2" name="submit" type="submit">submit</button>
                </form>
            </div>
        </section>
        <section>
        <form action="" method="post" class="dashboard-button">
                    <button class=" bt-dashboard-admin" name="dashboard-admin" type="submit">Dashboard</button>
            </form>
        </section>
    </div>
    

    
    
</body>
</html>
<?php

include("../../connection.php");

if(isset($_POST['submit'])){

    $nomorid = $_POST['nip'];
    $fullname = $_POST['fullname'];
    $role = $_POST['role'];
    $password = $_POST['password'];
   

    
    if($nomorid==NULL||$fullname==NULL||$role==NULL||$password==NULL){
        $message = "Data yang anda isikan kurang!!";
        echo "<script type='text/javascript'>
            alert('$message');
            window.location.href='index.php';
            </script>";
    }else{
    $check_user = "SELECT employee_id FROM users WHERE employee_id = $nomorid" ;
    $cek=$db->query($check_user);
        if($cek->num_rows>0){
            $message = "User telah tersedia!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location.href='index.php';
            </script>";
        }
         else{
        $user = "INSERT INTO `users` (`id`, `employee_id`, `fullname`, `role`, `password`) VALUES (NULL, '$nomorid', '$fullname', '$role', '$password')";

        $tambah =$db->query($user);
            if(!$tambah){
        echo "data tidak anda masuk kok";
        }else{
            $message = "data yang anda isikan Tersimpan!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location.href='index.php';
            </script>";
        }
        
        

        }
        
    }
    

        
        
    
    
    }
?>