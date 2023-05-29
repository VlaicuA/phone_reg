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
        <input type="date" name="date" id="date">
        <input type="submit" value="show">
    </form>
</body>
</html>


<?php
require_once 'classes/Crud.php';

$show_entries = new Crud;

$date = $_GET['date'];

echo $date;

$show_reg = $show_entries->get_numbers();

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

?>