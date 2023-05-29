<?php
session_start();
require_once 'classes/Crud.php';

$crud = new Crud;

if(isset($_GET['id'])){
    $crud->delete_id($_GET['id']);
}

if($crud->delete_id($_GET['id'])){
    $_SESSION['del_message'] = 'Inserat cu succes';
} else {
    $_SESSION['del_message'] = 'Eroare';
}

header("Location: admin_panel.php");

?>