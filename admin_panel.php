<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <form action="" method="get">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" value="<?php echo date('Y-m-d', strtotime('-1 day')); ?>">

        <input type="submit" value="Arata">
    </form>
</body>
</html>


<?php
require_once 'classes/Crud.php';

$show_entries = new Crud;


// $show_reg = $show_entries->get_numbers();
if(!empty($_GET['date'])){

    $show_reg = $show_entries->get_numbers($_GET['date']);

    if(!empty($show_reg)){

        foreach ($show_reg as $row) {
            echo "<form action=delete_id.php method='GET'";
            echo '<p style="display: hidden"'.$row['id'] . '</p>';
            echo '<h4>'.$row['call_nr'].'</h4>';
            echo '<p>'.$row['date'].'</p>';
            echo '<p>'.$row['name'].'</p>';
            echo '<p>'.$row['truck_number'].'</p>';
            echo '<p>'.$row['phone_number'].'</p>';
            echo "<a href='delete_id.php?id=".$row['id']."'>Delete</a> <br>";
            echo '<hr>';
        } 
        } else  echo 'Nu exista inregistrari cu o data egala sau mai mare decat data selectata';
    } 

?>