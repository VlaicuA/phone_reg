<?php

require_once 'classes/Crud.php';

$crud = new Crud;
$dateToDelete = '2022-01-01';
$crud->delete_date($dateToDelete);

?>