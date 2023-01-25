<?php 
    // fungsi header dengan mengirimkan raw data excel
    header("Content-type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
     
    // membuat nama file ekspor "export-to-excel.xls"
    header("Content-Disposition: attachment; filename=laporan.xls");
     
    // tambahkan table
    include 'index.php';
?>