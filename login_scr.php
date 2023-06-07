<?php
session_start();
require_once 'classes/Connect.php';
require_once 'classes/Admin.php';

$log_in = new Admin;
$log_in->username = $_POST['username'];
$log_in->password = $_POST['password'];



if ($log_in->check_log_in($log_in->username, $log_in->password)) {
    echo "Login successful!";
    $_SESSION['log_in_status'] = true;
    header("Location: admin_panel.php");
} else {
    echo "Invalid username or password!";
    $_SESSION['log_in_status'] = false;
    header("Location: login.php");
}

?>