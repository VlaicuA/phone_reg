<?php
require_once 'classes/Connect.php';

class Admin extends Connect {
    public $username;
    public $password;

    public function check_log_in($username, $password){
        $this->username = trim($username);
        $this->password = trim($password);

        $sql = "SELECT * FROM user WHERE 
        username = :username and 
        password = :password";
        $query = $this->db->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    public function log_out(){
        session_unset();
        session_destroy();
    }

}


?>