<?php 
require_once('../model/database.php');
require_once('../model/customer_db.php');
require_once('../model/country_db.php');
require_once('../model/fields.php');
require_once('../model/validate.php');
require_once('../model/database_oo.php');

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
        //setting postBack
        $postBack = false;

        //getting customer data
        $customerId = $_POST['customerId'];
        $customer = getCustomer($customerId);
        $countries = getCountries();
        //creating field var for fields on update customer page
        $firstNameField = new Field('customerFirstName','');
        $lastNameField = new Field('customerLastName','');
        $addressField = new Field('customerAddress','');
        $cityField = new Field('customerCity', '');
        $stateField = new Field('customerState', '');
        $postalCodeField = new Field('customerPostalCode','');
        $phoneField = new Field('customerPhone', '');
        $emailField = new Field('customerEmail', '');
        $passwordField = new Field('customerPassword', '');
        //redirecting to update customer form
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
        $countries = getCountries();
        $customer = getCustomer($customerId);
        //creating field var for fields on update customer page
        $firstNameField = new Field('customerFirstName', $customerFirstName);
        $lastNameField = new Field('customerLastName', $customerFirstName);
        $addressField = new Field('customerAddress', $customerAddress);
        $cityField = new Field('customerCity', $customerCity);
        $stateField = new Field('customerState', $customerState);
        $postalCodeField = new Field('customerPostalCode',$customerPostalCode );
        $phoneField = new Field('customerPhone', $customerPhone);
        $emailField = new Field('customerEmail', $customerEmail);
        $passwordField = new Field('customerPassword',  $customerPassword);
        //validation
        $error = false;
        $firstNameError = Validate::validateText($firstNameField->getValue(), true, 1, 51);
        if($firstNameError != 1) {
            $firstNameField->setErrorMessage($firstNameError);
            $error = true;
        }
        $lastNameError = Validate::validateText($lastNameField->getValue(), true, 1, 51);
        if ($lastNameError != 1) {
            $lastNameField->setErrorMessage($lastNameError);
            $error = true;
        }
        $addressError = Validate::validateText($addressField->getValue(), true, 1, 51);
        if ($addressError != 1) {
            $addressField->setErrorMessage($addressError);
            $error = true;
        }
        $cityError = Validate::validateText($cityField->getValue(), true, 1, 51);
        if ($cityError != 1) {
            $cityField->setErrorMessage($cityError);
            $error = true;
        }
        $stateError = Validate::validateText($stateField->getValue(), true, 1, 51);
        if ($stateError != 1) {
            $stateField->setErrorMessage($stateError);
            $error = true;
        }
        $postalCodeError = Validate::validateText($postalCodeField->getValue(), true, 1, 21);
        if ($postalCodeError != 1) {
            $postalCodeField->setErrorMessage($postalCodeError);
            $error = true;
        }
        $emailError = Validate::validateEmail($emailField->getValue());
        if($emailError != 1) {
            $emailField->setErrorMessage($emailError);
            $error = true;
        }
        $passwordError = Validate::validateText($passwordField->getValue(), true, 6, 21);
        if($passwordError != 1) {
            $passwordField->setErrorMessage($passwordError);
            $error = true;
        }
        $phoneError = Validate::validatePhone($phoneField->getValue());
        if ($phoneError != 1) {
            $phoneField->setErrorMessage($phoneError);
            $error = true;
        }
        //redirect or add customer
        if ($error === true) {  
            $name = "postBack";
            $value = true;
            $expire = strtotime("+1 day");
            $path = '/';
            setcookie($name, $value, $expire, $path);
            include('../view/updateCustomer.php');

        } else {
            updateCustomer($customerId, $customerFirstName, $customerLastName, $customerAddress, $customerCity, $customerState, $customerPostalCode, $customerCountryCode, $customerPhone, $customerEmail, $customerPassword);
            header("Location: ../customer_manager/index.php?action=searchCustomers");
        }
        break;
    case 'addCustomerForm':

        //creating field var for fields on update customer page
        $firstNameField = new Field('customerFirstName','');
        $lastNameField = new Field('customerLastName','');
        $addressField = new Field('customerAddress','');
        $cityField = new Field('customerCity', '');
        $stateField = new Field('customerState', '');
        $postalCodeField = new Field('customerPostalCode','');
        $phoneField = new Field('customerPhone', '');
        $emailField = new Field('customerEmail', '');
        $passwordField = new Field('customerPassword', '');
        //geting countries
        $countries = getCountries();
        //redirecting to update customer form
        include('../view/updateCustomer.php');
        break;
    case 'addCustomer':
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
        $countries = getCountries();
        //creating field var for fields on update customer page
        $firstNameField = new Field('customerFirstName', $customerFirstName);
        $lastNameField = new Field('customerLastName', $customerFirstName);
        $addressField = new Field('customerAddress', $customerAddress);
        $cityField = new Field('customerCity', $customerCity);
        $stateField = new Field('customerState', $customerState);
        $postalCodeField = new Field('customerPostalCode',$customerPostalCode );
        $phoneField = new Field('customerPhone', $customerPhone);
        $emailField = new Field('customerEmail', $customerEmail);
        $passwordField = new Field('customerPassword',  $customerPassword);
        //validation
        $error = false;
        $firstNameError = Validate::validateText($firstNameField->getValue(), true, 1, 51);
        if($firstNameError != 1) {
            $firstNameField->setErrorMessage($firstNameError);
            $error = true;
        }
        $lastNameError = Validate::validateText($lastNameField->getValue(), true, 1, 51);
        if ($lastNameError != 1) {
            $lastNameField->setErrorMessage($lastNameError);
            $error = true;
        }
        $addressError = Validate::validateText($addressField->getValue(), true, 1, 51);
        if ($addressError != 1) {
            $addressField->setErrorMessage($addressError);
            $error = true;
        }
        $cityError = Validate::validateText($cityField->getValue(), true, 1, 51);
        if ($cityError != 1) {
            $cityField->setErrorMessage($cityError);
            $error = true;
        }
        $stateError = Validate::validateText($stateField->getValue(), true, 1, 51);
        if ($stateError != 1) {
            $stateField->setErrorMessage($stateError);
            $error = true;
        }
        $postalCodeError = Validate::validateText($postalCodeField->getValue(), true, 1, 21);
        if ($postalCodeError != 1) {
            $postalCodeField->setErrorMessage($postalCodeError);
            $error = true;
        }
        $emailError = Validate::validateEmail($emailField->getValue());
        if($emailError != 1) {
            $emailField->setErrorMessage($emailError);
            $error = true;
        }
        $passwordError = Validate::validateText($passwordField->getValue(), true, 6, 21);
        if($passwordError != 1) {
            $passwordField->setErrorMessage($passwordError);
            $error = true;
        }
        $phoneError = Validate::validatePhone($phoneField->getValue());
        if ($phoneError != 1) {
            $phoneField->setErrorMessage($phoneError);
            $error = true;
        }
        //redirect or add customer
        if ($error === true) {  
            $name = "postBack";
            $value = true;
            $expire = strtotime("+1 day");
            $path = '/';
            setcookie($name, $value, $expire, $path);
            $addCustomer = true;
            include('../view/updateCustomer.php');

        } else {
            addCustomer($customerFirstName, $customerLastName, $customerAddress, $customerCity, $customerState, $customerPostalCode, $customerCountryCode, $customerPhone, $customerEmail, $customerPassword);
            header("Location: ../customer_manager/index.php?action=searchCustomers");
        }
        break;
    default:
        $error = '/customer_manager/index.php does not have a value for $action';
        include('../errors/error.php');
        break;
}
?>