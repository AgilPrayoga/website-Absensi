<?php
class Users{
    private $employee_id;
    private $username;
    private $role;
    private $password;

    function set_login_data($employee_id,$password){
        $this->employee_id = $employee_id;
        $this->password = $password;  
    }
    function get_employee_id(){
        return $this->employee_id;

    }
    function get_password(){
        return $this->password;
    }
   

}

?>