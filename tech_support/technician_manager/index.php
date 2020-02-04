<?php 
require('../model/database.php');
require('../model/technician_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'listTechnicians';
}

if ($action == 'listTechnicians') {
    $technicians = getTechnicians();
    include('../view/technicianList.php');
}

if ($action == 'deleteTechnician') {
    $technicianId = filter_input(INPUT_POST,'technicianId');
    if (isset($technicianId) && !empty($technicianId)) {
        deleteTechnician($technicianId);
        header('Location: ../technician_manager/index.php?action=listTechnicians');
    } else {
        $error = "Technician Id is either empty or not set.";
        include('../view/error.php');
    }
}

if ($action == 'addTechnician') {
    $technicianFirstName = filter_input(INPUT_POST, 'technicianFirstName');
    $technicianLastName = filter_input(INPUT_POST, 'technicianLastName');
    $technicianEmail = filter_input(INPUT_POST, 'technicianEmail', FILTER_VALIDATE_EMAIL);
    $technicianPhone = filter_input(INPUT_POST, 'technicianPhone');
    $technicianPassword = filter_input(INPUT_POST, 'technicianPassword');
    $error = "";

    if (!isset($technicianFirstName) && empty($technicianFirstName)) {
       $error += "Technician first name is empty or not set. \n";
    } 
    if (!isset($technicianLastName) && empty($technicianLastName)) {
        $error += "Technician last name is empty or not set. \n";
    } 
    if (!isset($technicianEmail) && empty($technicianEmail)) {
        $error += "Technician email is empty or not set. \n";
    }
    if (!isset($technicianPhone) && empty($technicianPhone)) {
        $error += "Technician phone is empty or not set. \n";
    }
    if (!isset($technicianPassword) && empty($technicianPasword)) {
        $error += "Technician password is empty or not set. \n";
    } 
    
    if($error == "") {
        addTechnician($technicianFirstName, $technicianLastName, $technicianEmail, $technicianPhone, $technicianPassword);
        Header("Location: ../technician_manager/index.php?action=listTechnicians");
    } else {
        include("../view/error.php");
    }

}
?>