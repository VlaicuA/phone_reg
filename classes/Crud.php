<?php
require_once 'classes/Connect.php';


class Crud extends Connect {
    public $name;
    public $call_nr;
    public $truck_number;
    public $phone_number;
    public function get_numbers(){
        $sql = "SELECT * FROM numbers ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->fetchAll();
    }
    public function insert() {
        $sql = "INSERT INTO numbers SET 
        name = :name, 
        call_nr = :call_nr, 
        truck_number = :truck_number,
        phone_number = :phone_number";
        $query = $this->db->prepare($sql);
        $query->bindParam(':name', $this->name);
        $query->bindParam(':call_nr', $this->call_nr);
        $query->bindParam(':truck_number', $this->truck_number);
        $query->bindParam(':phone_number', $this->phone_number);
        $query->execute();
    }

// update method, not sure I will implement it
    public function update($id){
        $sql = "UPDATE numbers SET
        name = :name, 
        call_nr = :call_nr, 
        truck_number = :truck_number,
        phone_number = :phone_number 
        WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':name', $this->name);
        $query->bindParam(':call_nr', $this->call_nr);
        $query->bindParam(':truck_number', $this->truck_number);
        $query->bindParam(':phone_number', $this->phone_number);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
    public function delete_id($id){
        $sql = "DELETE FROM numbers WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
    }
//delete based on a date ?

}