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



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="./style/style_index.css">
    <title>Inregistrare</title>
</head>
<body>
    <div class="main_div">
    <form action="insert_form.php" method="post">
        <div class="form_div">
        <a href="login.php">Admin</a>
            <h1>Inregistrare</h3>
        <label for="name"></label>
        <p><input type="text" name="name" id="name" required placeholder="Nume" maxlength="18"></p>
        <label for="call_nr"></label>
        <p><input type="text" name="call_nr" id="call_nr" required placeholder="Numar chemare" maxlength="5"></p>
        <label for="truck_number"></label>
        <p><input type="text" name="truck_number" id="truck_number" required placeholder="Numar inmatriculare" maxlength="16"></p>
        <label for="phone_number"></label>
        <p><input type="text" name="phone_number" id="phone_number" placeholder="Numar telefon" required maxlength="12"></p>
        <p class="input_para"><input class="input_button" type="submit" value="Inregistreaza"></p>
        <p class="insert_message"><?php 
                if (isset($_SESSION['insert_message'])){
                    echo $_SESSION['insert_message'];
                    unset($_SESSION['insert_message']);
                    }
        ?></p>
        </div>
    </form>
    </div>
</body>
</html>
