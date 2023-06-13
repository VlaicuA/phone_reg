<?php
session_start();
require_once 'classes/Crud.php';

$crud = new Crud;

$crud->name = $_POST['name'];
$crud->call_nr = $_POST['call_nr'];
$crud->truck_number = $_POST['truck_number'];
$crud->phone_number = $_POST['phone_number'];
// $crud->insert();

if($crud->insert()){
    $_SESSION['insert_message'] = 'Inregistrat cu succes';
} else {
    $_SESSION['insert_message'] = 'Eroare';
}

header("Location: index.php");

?>