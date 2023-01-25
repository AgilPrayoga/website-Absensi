<!-- Table start -->
<table >
    <tr>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam keluar</th>
        <th>performa</th>
    </tr>
        
           
    <?php
        include("../connection.php");
    
        date_default_timezone_set("Asia/Jakarta");//GMT + 07
        $date = date('Y-m-d');
        $clock_in = date('H:i:s', strtotime('+1 hours'));//GMT + 08
        $employee_id = $_SESSION['employee_id'];

        $sql = "SELECT * FROM attendences WHERE employee_id = $employee_id";
        $result = $db->query($sql);


        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['clock_in']."</td>";

            if(empty($row['clock_out']) && !empty($row['clock_in']) && $date==$row['date']){
                echo 
                    "<td>
                    <form action='' method='POST' onsubmit='return alert(`Terimakasih telah bekerja hari ini.`)'>
                    <button class='clock_out' name='keluar' >Clock Out</buttom>
                    </form>
                    </td>";
            }else{
                echo "<td>".$row['clock_out']."</td>";
            }
    
            echo "<td>👍</td>";
            echo "</tr>";
        }

    
  
?>
 
</table>
<!-- Table end -->

<!-- tombol Absen -->
<form class="wrapper-absen" action="action.php" method="POST">
    <button class="bt-absen" type="submit" name ="absen">Absen</button>
</form>
<!-- tombol Absen -->

<!-- validasi tombol clock out -->
<?php
    if (isset($_POST['keluar'])){
    $update = "UPDATE attendences set clock_out = '$clock_in' WHERE employee_id=$employee_id AND date='$date' ";

    $clock_out = $db->query($update);
    if ($clock_out === true){
        session_start();
        session_destroy();
        header("location:../index.php");
    }
    else{
        var_dump("website gangguan!!");

    }
}

?>
<!-- validasi tombol clock out -->




