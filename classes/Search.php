<?php
require_once 'classes/Connect.php';

class Search extends Connect{

    public $src;
    // public function search($src){
    //     $sql = "SELECT * FROM numbers WHERE call_nr LIKE CONCAT('%', :src '%') ORDER BY id DESC";
    //     $query = $this->db->prepare($sql);
    //     $query->bindParam(':src', $src);
    //     $query->execute();
    //     return $query->fetchAll();
    // }

    //build with ChatGPT starting from the other method
    public function call_search($src){
        $sql = "SELECT *, CASE WHEN call_nr LIKE :src THEN 1
                             WHEN call_nr LIKE CONCAT('%', :src) THEN 2
                             WHEN call_nr LIKE CONCAT(:src, '%') THEN 3
                             ELSE 4
                        END AS relevance
                FROM numbers
                WHERE call_nr LIKE CONCAT('%', :src, '%')
                ORDER BY relevance, id DESC";
        $query = $this->db->prepare($sql);
        $query->bindParam(':src', $src);
        $query->execute();
        return $query->fetchAll();
    }
}

?>