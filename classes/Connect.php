<?php

class Connect {

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = 'root';
    private $db_dbname ='phone_reg_sil'; //need to set it up, build one if not present 
    protected $db;

    public function __construct(){
        $char_set = 'utf8mb4';
        $collation = 'utf8mb4_general_ci';

        $conn = 'mysql:host='.$this->db_host.';dbname='.$this->db_dbname;

        $this->db = new PDO($conn, $this->db_user, $this->db_pass);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //used chatGPT for checking if the DB exist and create one if not
        try {
            $this->db = new PDO($conn, $this->db_user, $this->db_pass);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
            // Check if the database exists
            $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$this->db_dbname]);
            $databaseExists = ($stmt->rowCount() > 0);
    
            // Create the database if it doesn't exist
            if (!$databaseExists) {
                $createDatabaseQuery = "CREATE DATABASE $this->db_dbname CHARACTER SET $char_set COLLATE $collation";
                $this->db->exec($createDatabaseQuery);
                echo "Database created successfully.";
            } 
            // else {
            //     echo "Error on db connection";
            // }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}

$connect_mess = new Connect;

