<?php



include("connection.php");
include("Users.php");
session_start();


$user = new Users();
//ketika login button di klik
if(isset($_POST['login'])){
    //fitur cek kebenaran input
    if(strlen($_POST['nip'])<=1||strlen($_POST['password']<=1)){
        header("location:index.php?message=Data yang anda masukan kurang!!");
        

    }else{
        // mengambil inputan dari form
        $user->set_login_data($_POST['nip'], $_POST['password']);

        //membuat variable untuk menjalankan function
        $id = $user->get_employee_id();
        $password =$user->get_password();

        //sql untuk mengambil data dari table users
        $sql = "SELECT * FROM users WHERE employee_id = $id AND password ='$password'";
        $result=$db->query($sql);
        
        // pengecekan apakah data yang di input terdapat pada data base
        if($result->num_rows > 0){
            //data yang akan di masukan kedalam dashboard
            while($row = $result->fetch_assoc()){
                $_SESSION['employee_id'] = $row['employee_id'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['status'] = "login";
                $_SESSION['admin']="admin";
            }
            if($_SESSION['role']==="admin"){
                header("location:admin/index.php");
            }
            else{

                header("location:dashboard/index.php");
            }
        }else{
            header("location:index.php?message=id atau password salah!!"); 
        }
    }

}

?>