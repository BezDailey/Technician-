<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'customerLogin';
}

if ($action == 'customerLogin') {
    include('../view/customerLogin.php');
}

if ($action == 'customerLoginAttempt') {
    $customerEmail = filter_input(INPUT_POST, 'customerEmail');

    if (customerLogin($customerEmail)) {
        session_start();
        $_SESSION["customer"] = true;
        $customer = getCustomerByEmail($customerEmail);
        $products = getProducts();
        include('../view/registerProduct.php');
    } else {
        $error = "The email entered is wrong";
        include('../view/error.php');
    }
}

if ($action == 'registerProduct') {
    $productCode = filter_input(INPUT_POST, 'productName');
    if(isset($productCode) && !empty($productCode)) {
        $msg = 'Product (' . $productCode . ') was registered successfully.';
        include('../view/productRegistered.php');
    } else {
        $error = "Product code is either empty or not set.";
        include('../view/error.php');
    }
}
?>