<?php
include("../connection.php");
session_start();//untuk memulai session

date_default_timezone_set("Asia/Jakarta");
$date = date('Y-m-d');
$clock_in = date('H:i:s', strtotime('+1 hours'));
$employee_id = $_SESSION['employee_id'];


//ketika kapan
if (isset($_POST['absen'])) {
    $check_absensi = "SELECT date FROM attendences WHERE employee_id='$employee_id' AND date='$date'";
    $checking = $db->query($check_absensi);

    if($checking->num_rows>0){
        header("location:index.php ?message=Anda sudah absen!!.");
    }
    else{

        $sql = "INSERT INTO`attendences`(`id`,`employee_id`,`date`,`clock_in`,`clock_out`)
         value(NULL,'$employee_id','$date','$clock_in',NULL)";
        $result = $db->query($sql);
        if ($result === true) {
            header("location:index.php ?message=absen berhasil di lakukan.");
        } else {
            header("location:index.php ?message=absen gagal!");
        }
    }
    
        
    
    }

?>