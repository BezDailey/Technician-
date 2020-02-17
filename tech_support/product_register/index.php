<?php
require_once('../model/database.php');
require_once('../model/customer_db.php');
require_once('../model/product_db.php');
require_once('../model/registration_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'customerLogin';
}

switch ($action) {
    case 'customerLogin':
        if (isset($_COOKIE['customerEmail'])){
            $customerEmail = filter_input(INPUT_COOKIE, 'customerEmail');
            if ($customerEmail === false) {
                $error = 'customerEmail cookie filter failed.';
                include('../errors/error.php');
            } elseif ($customerEmail === null) {
                $error = 'customerEmail cookie is not set.';
                include('../errors/error.php');
            } else {
                $customer = getCustomerByEmail($customerEmail);
                $products = getProducts();
                include('../view/registerProduct.php');
            }
        } else {
            include('../view/customerLogin.php');
        }
        break;
    case 'customerLoginAttempt':
        $customerEmail = filter_input(INPUT_POST, 'customerEmail');
        if (customerLogin($customerEmail)) {
            $customer = getCustomerByEmail($customerEmail);
            $products = getProducts();
            $name = 'customerEmail';
            $value = $customerEmail;
            $expire = 0;
            $path = '/';
            setcookie($name, $value, $expire, $path);
            include('../view/registerProduct.php');
        } else {
            $error = "The email entered is not in database";
            include('../errors/error.php');
        }
        break;
    case 'registerProduct':
        $customerId = filter_input(INPUT_POST, 'customerId');
        $productCode = filter_input(INPUT_POST, 'productName');
        $registrationDay = date("Y-m-d");
        registerProduct($customerId, $productCode, $registrationDay);
        if(isset($productCode) && !empty($productCode)) {
            $msg = 'Product (' . $productCode . ') was registered successfully.';
            include('../view/productRegistered.php');
        } else {
            $error = "Product code is either empty or not set.";
            include('../errors/error.php');
        }
        break;
    case 'deleteCustomerCookie':
        $expire = strtotime('-1 year');
        setCookie('customerEmail', '', $expire, '/');
        include('../view/customerLogin.php');
        break;
    default:
        $error = '/product_register/index.php $action does not have a proper value.';
        include('../errors/error.php');
        break;
}
?>