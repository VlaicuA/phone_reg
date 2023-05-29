<?php
session_start();
require_once 'classes/Connect.php';
require_once 'classes/Crud.php';


// $crud = new Crud;
/*
$crud->name = 'Vlaicu';
$crud->call_nr = 'C2121';
$crud->truck_number = 'SJ22ASE';
$crud->phone_number = '0745147349';
$crud->insert();
*/
// print_r($crud->get_numbers());

if (isset($_SESSION['insert_message'])){
    echo $_SESSION['insert_message'];
    unset($_SESSION['insert_message']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
</head>
<body>
    <a href="admin_panel.php">Admin</a>
    <form action="insert_form.php" method="post">
        <label for="name">Nume:</label>
        <input type="text" name="name" id="name" required> <br>
        <label for="call_nr">Nr. chemare:</label>
        <input type="text" name="call_nr" id="call_nr" required> <br>
        <label for="truck_number">Nr. Inmatriculare:</label>
        <input type="text" name="truck_number" id="truck_number" required><br>
        <label for="phone_number">Nr. Telefon</label>
        <input type="text" name="phone_number" id="phone_number"> <br>
        <input type="submit" value="Inregistreaza">
    </form>
    
</body>
</html>
