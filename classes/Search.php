<?php
require_once 'classes/Connect.php';

class Search extends Connect{

    public $src;
    public function search($src){
        $sql = "SELECT * FROM numbers WHERE call = :src ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->bindParam(':src', $src);
        $query->execute();
        return $query->fetchAll();
    }
}

?>