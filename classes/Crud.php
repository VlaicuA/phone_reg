<?php
require_once 'classes/Connect.php';


class Crud extends Connect {
    public $name;
    public $call_nr;
    public $truck_number;
    public $phone_number;
    public $date;

    // public function get_numbers(){
    //     $sql = "SELECT * FROM numbers ORDER BY id DESC";
    //     $query = $this->db->query($sql);
    //     $query->execute();
    //     return $query->fetchAll(); //return statement for checking if true or false 
    // }

    public function get_numbers($date){
        $sql = "SELECT * FROM numbers WHERE date >= :date ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->bindParam(':date', $date);
        $query->execute();
        return $query->fetchAll(); //return statement for checking if true or false 
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
        return $query->execute(); //return statement for checking if true or false 
    }
// update method, not sure it is useful. 
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
        return $query->execute(); //return statement for checking if true or false 
    }
    public function delete_id($id){
        $sql = "DELETE FROM numbers WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        return $query->execute(); //return statement for checking if true or false 
    }

    //delete entries older than 'x' months

    public function delete_date(){
        $input_date = date('Y-m-d', strtotime('-3 months'));
        $sql = "DELETE FROM numbers WHERE date < :input_date";
        $query = $this->db->prepare($sql);
        $query->bindParam(':input_date', $input_date);
        return $query->execute();
    }


}