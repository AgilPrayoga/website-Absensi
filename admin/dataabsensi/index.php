<?php
session_start();
if(!isset($_SESSION['admin'])||($_SESSION['admin'])!="admin"){
    header("location:../index.php?message=silahkan login terlebih dahulu!!");
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
    <title>Data Absensi Pegawai</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <section class="wrapper">
            
            <div>
                <form action="" method="post" class="logout-button">
                <button class=" dashboard-admin" name="dashboard-admin" type="submit">Dashboard</button>
                </form>
            </div >
            
            <div class="title">
                <h1>Data Absensi Pegawai</h1>
            </div>

                <table class ="table" border = "1">

                    <tr>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal</th>
                        <th>clock in</th>
                        <th>clock out</th>
                    </tr>
                    <?php
                    include("../../connection.php");
                    
                    $sql = "SELECT*FROM users INNER JOIN attendences on users.employee_id= attendences.employee_id";
                    $result = $db->query($sql);
                    while($row=$result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['employee_id'] ."</td>";
                    echo "<td>".$row['fullname']."</td>";
                    echo "<td>".$row['date']. "</td>";
                    echo "<td>".$row['clock_in']. "</td>";
                    echo "<td>".$row['clock_out']. "</td>";
                    echo "</tr>";
                    }
                    
                    ?>
                </table>
                
           
            <div >
                <a href="export.php"><button class="export" >export</button></a>

            </div> 
        </section>
    </div>
</body>
</html>