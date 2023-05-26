<?php

class Connect {

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = 'root';
    private $db_dbname = ''; //need to set it up, build an if not present 
    protected $db;

    public function __construct(){
        $conn = 'mysql:host='.$this->db_host.';dbname='.$this->db_dbname;
        $this->db = new PDO($conn, $this->db_user, $this->db_pass);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        if(!$this->db){
            echo 'not connected';
        } else {
            echo 'connected';
        }
    } 

}

$connect_mess = new Connect;

