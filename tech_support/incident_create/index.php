<?php 
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/incident_db.php');
require_once('../model/database_oo.php');
require_once('../model/authentication.php');
Authentication::valid_role($admin);

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'getCustomer';
}

if ($action == 'getCustomer') {
    include('../view/getCustomerCreateIncident.php');
}

if ($action == 'getCustomerAttempt') {
    $customerEmail = filter_input(INPUT_POST, 'customerEmail');

    if (customerLogin($customerEmail)) {
        $customer = getCustomerByEmail($customerEmail);
        $products = getProducts();
        include('../view/createIncident.php');
    } else {
        $error = "The email entered is wrong";
        include('../view/error.php');
    }
}

if ($action == 'createIncident') {
    $customerId = filter_input(INPUT_POST, 'customerId');
    $incidentProductCode = filter_input(INPUT_POST, 'incidentProductCode');
    $incidentDateOpened = date("Y-m-d");
    $incidentTitle = filter_input(INPUT_POST, 'incidentTitle');
    $incidentDescription = filter_input(INPUT_POST, 'incidentDescription');
    createIncident($customerId, $incidentProductCode, $incidentDateOpened, $incidentTitle, $incidentDescription);
    include('../view/incidentCreated.php');
}
?>