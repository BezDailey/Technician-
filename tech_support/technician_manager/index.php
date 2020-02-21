<?php 
require('../model/database_oo.php');
require('../model/technician_db_oo.php');
require('../model/technician.php');
require_once('../model/validate.php');
require_once('../model/fields.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'listTechnicians';
}

switch ($action) {
    case 'listTechnicians':
        $technicians = TechnicianDB::getTechnicians();
        include('../view/technicianList.php');
        break;
    case 'deleteTechnician':
        $technicianId = filter_input(INPUT_POST,'technicianId');
        if (isset($technicianId) && !empty($technicianId)) {
            TechnicianDB::deleteTechnician($technicianId);
            header('Location: ../technician_manager/index.php?action=listTechnicians');
        } else {
            $error = "Technician Id is either empty or not set.";
            include('../view/error.php');
        }
        break;
    case 'addTechnician':
        $technicianFirstName = filter_input(INPUT_POST, 'technicianFirstName');
        $technicianLastName = filter_input(INPUT_POST, 'technicianLastName');
        $technicianEmail = filter_input(INPUT_POST, 'technicianEmail', FILTER_VALIDATE_EMAIL);
        $technicianPhone = filter_input(INPUT_POST, 'technicianPhone');
        $technicianPassword = filter_input(INPUT_POST, 'technicianPassword');
        $error = false;
        //creating field vars
        $firstNameField = new Field('technicianFirstName', $technicianFirstName);
        $lastNameField = new Field('technicianLastName', $technicianLastName);
        $emailField = new Field('technicianEmail', $technicianEmail);
        $phoneField = new Field('technicianPhone', $technicianPhone);
        $passwordField = new Field('technicianPassword', $technicianPassword);
        //doing validation
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

        //either adds technician or returns form with errors
        if($error === false) {
            TechnicianDB::addTechnician($technicianFirstName, $technicianLastName, $technicianEmail, $technicianPhone, $technicianPassword);
            Header("Location: ../technician_manager/index.php?action=listTechnicians");
        } else {
            include("../view/addTechnician.php");
        }
        break;
    case "showAddForm":
        //creating field vars
        $firstNameField = new Field('technicianFirstName', '');
        $lastNameField = new Field('technicianLastName', '');
        $emailField = new Field('technicianEmail', '');
        $phoneField = new Field('technicianPhone', '');
        $passwordField = new Field('technicianPassword', '');
        //redirecting to addTechnician form
        include('../view/addTechnician.php');
        break;
    default:
        $error = '/technician_manager/index.php $action does not have a proper value.';
        include('../errors/error.php');
        break;
}
?>