<?php 
require_once('../model/database.php');
require_once('../model/customer_db.php');
require_once('../model/country_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'searchCustomers';
}

switch ($action) {
    case 'searchCustomers':
        if (isset($_POST['customerLastName'])) {
            $customerLastName = $_POST['customerLastName'];
            $customers = getCustomersByLastName($customerLastName);
        } else if (isset($_GET['customerLastName'])) {
            $customerLastName = $_GET['customerLastName'];
            $customers = getCustomersByLastName($customerLastName);
        } else {
            $customers = '';
        }
        include('../view/customerSearch.php');
        break;
    case 'selectCustomer':
        $customerId = $_POST['customerId'];
        $customer = getCustomer($customerId);
        $countries = getCountries();
        include('../view/updateCustomer.php');
        break;  
    case 'updateCustomer':
        $customerId = filter_input(INPUT_POST, "customerId");
        $customerFirstName = filter_input(INPUT_POST, 'customerFirstName');
        $customerLastName = filter_input(INPUT_POST, 'customerLastName');
        $customerAddress = filter_input(INPUT_POST, 'customerAddress');
        $customerCity = filter_input(INPUT_POST, 'customerCity');
        $customerState = filter_input(INPUT_POST, 'customerState');
        $customerPostalCode = filter_input(INPUT_POST, 'customerPostalCode');
        $customerCountryCode = filter_input(INPUT_POST, 'customerCountryCode');
        $customerPhone = filter_input(INPUT_POST, 'customerPhone');
        $customerEmail = filter_input(INPUT_POST, 'customerEmail');
        $customerPassword = filter_input(INPUT_POST, 'customerPassword');
        echo $customerId, $customerFirstName, $customerLastName, $customerAddress, $customerCity, $customerState, $customerPostalCode, $customerCountryCode, $customerPhone, $customerEmail, $customerPassword;
        updateCustomer($customerId, $customerFirstName, $customerLastName, $customerAddress, $customerCity, $customerState, $customerPostalCode, $customerCountryCode, $customerPhone, $customerEmail, $customerPassword);
        header("Location: ../customer_manager/index.php?action=searchCustomers");
        break;
    default:
        $error = '/customer_manager/index.php does not have a value for $action';
        include('../errors/error.php');
        break;
}
?>