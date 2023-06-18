<?php
session_start();
if (isset($_SESSION['log_in_status']) && $_SESSION['log_in_status'] === true) {
    echo 'Conectat cu succes';
} else {
    header("Location: login.php");
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'classes/Crud.php';
require_once 'classes/Search.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style_admin.css">
    <title>Admin Panel</title>
</head>
<body>
    <div class="main_div">
    <div class="version"><p>v1.0.0</p>
</div>
        <div class="main_top_div">
        <section class="top_section">
        <form action="delete_old.php" method="get">
        <label for="clear DB"></label>
        <input type="submit" name="delete_old" id="delete_old" value="Sterge date > 14 zile">
    </form>
    <br>
    <form action="" method="get">
        <label for="search">Cautare</label>
        <input type="search" name="search" id="search">
        <input type="submit" value="Cauta">
    </form>
    <br>
    <form action="" method="get">
        <label for="date">Data</label>
        <input type="date" name="date" id="date" value="<?php echo date('Y-m-d', strtotime('-1 day')); ?>">
        <input type="submit" value="Arata">
    </form>

    </section>
    </div>



<?php

if (isset($_SESSION['delete_old_date_mess'])){
    echo $_SESSION['delete_old_date_mess'];
    unset($_SESSION['delete_old_date_mess']);
}

$show_entries = new Crud;
$show_sentries = new Search;


// $show_reg = $show_entries->get_numbers();
?>

<div class="display_div">
<p class="call_row"><b>Nr. Chemare</b></p>
<p class="date_row"><b>Data</b></p>
<p class="name_row"><b>Nume</b></p>
<p class="truck_row"><b>Numar</b></p>
<p class="phone_row"><b>Telefon</b></p>
<p class="delete_row"><b>Sterge</b></p>
</div>
<hr>


<?php

if(!empty($_GET['date'])){

    $show_reg = $show_entries->get_numbers($_GET['date']);

    if(!empty($show_reg)){

        foreach ($show_reg as $row) {
            echo "<form action=delete_id.php method='GET'" .'<br>';
            echo '<div class="display_div">';
            echo '<p style="display: hidden" class="id_row"'.$row['id'] . '</p>';
            echo '<p class="call_row">'.$row['call_nr'].'</p>';
            echo '<p class="date_row">'.$row['date'].'</p>';
            echo '<p class="name_row">'.$row['name'].'</p>';
            echo '<p class="truck_row">'.$row['truck_number'].'</p>';
            echo '<p class="phone_row">'.$row['phone_number'].'</p>';
            echo '<p class="delete_row">'."<a href='delete_id.php?id=".$row['id']."'>Sterge</a> <br>".'</p>';
            echo '</div>';
            echo '<hr>';
        } 
        } else  echo 'Nu exista inregistrari cu o data egala sau mai mare decat data selectata';
    } 


    if(!empty($_GET['search'])){

        $show_sreg = $show_sentries->call_search($_GET['search']);
    
        if(!empty($show_sreg)){
    
            foreach ($show_sreg as $row) {
                echo "<form action=delete_id.php method='GET'" .'<br>';
                echo '<div class="display_div">';
                echo '<p style="display: hidden" class="id_row"'.$row['id'] . '</p>';
                echo '<p class="call_row">'.$row['call_nr'].'</p>';
                echo '<p class="date_row">'.$row['date'].'</p>';
                echo '<p class="name_row">'.$row['name'].'</p>';
                echo '<p class="truck_row">'.$row['truck_number'].'</p>';
                echo '<p class="phone_row">'.$row['phone_number'].'</p>';
                echo '<p class="delete_row">'."<a href='delete_id.php?id=".$row['id']."'>Sterge</a> <br>".'</p>';
                echo '</div>';
                echo '<hr>';
            } 
            } else  echo 'Nu exista inregistrari aferente datelor introduse';
        } 


        
// register_shutdown_function('clear_session');

// function clear_session() {
//     session_unset();
//     session_destroy();
// }

?>

</div>
</body>
</html>