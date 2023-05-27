<?php
require_once 'classes/Connect.php';
require_once 'classes/Crud.php';


$crud = new Crud;
/*
$crud ->name = 'Vlaicu';
$crud ->call_nr = 'C2121';
$crud ->truck_number = 'SJ22ASE';
$crud->phone_number = '0745147349';
$crud->insert();
*/
print_r($crud->get_numbers());



