<?php
session_start();
require_once 'classes/Crud.php';

$delete_date = date('Y-m-d', strtotime('-14 days'));

if (isset($_GET['delete_old'])) {
    $delete_old = new Crud();
    $delete_old = 
    $delete_old_date = $delete_old->delete_date();
}
    if ($delete_old_date) {
        $_SESSION['delete_old_date_mess'] = 'S-au sters cu succes date mai vechi de ' . $delete_date;
    } else {
        $_SESSION['delete_old_date_mess'] = 'Erroare la incercarea de a sterge';
    }

    header('Location: admin_panel.php')
?>