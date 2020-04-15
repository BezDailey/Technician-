<?php

require_once('../model/authentication.php');
require_once('../model/database_oo.php');
require_once('../model/administrators_db_oo.php');
$lifetime = 60 * 60 * 24;
$path = realpath('');
session_set_cookie_params($lifetime, $path);
session_start();
Authentication::redirect_to_secure_conection();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'login';
}

switch($action) {
    case 'login':
        if(isset($_SESSION['is_valid_admin']) AND $_SESSION['is_valid_admin'] == "true") {
            include('admin_menu_page.php');
        } else {
            include('admin_login_page.php');
        }
        break;
    case 'login_attempt':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        Authentication::login('admin', $username, $password);
        if ($_SESSION['is_valid_admin'] == "true") {
            include('admin_menu_page.php');
        } else {
            $info = 'login attempt failed.';
            include('admin_login_page.php');
        }
        break;
    case 'logout': 
        Authentication::logout('admin');
        header("Location: ../index.php");
        break;
}

?>