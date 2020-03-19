<?php
    require_once('../model/technician_db_oo.php');
    require_once('../model/database_oo.php');
    require_once('../model/incident_db.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'loginForm';
    }

    switch($action) {
        case 'loginForm':
            session_start();
            if(isset($_SESSION['technicianEmail'])){
                $email = $_SESSION['technicianEmail'];
                $technician = TechnicianDB::getTechnicianByEmail($email);
                $incidents = getIncidentsAssigned($technician['techID']);
                if(count($incidents) > 0) {
                    include('../view/selectUpdateIncidentForm.php');
                } else {
                    include('../view/noIncidentsToUpdate.php');
                }
            } else {
                include('../view/technicianLogin.php');
            }
            break;
        case 'login':
            $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
            if($email == FALSE){
                $error = 'The technician email should be set.';
                include('../errors/error.php');
            } elseif ($email == NULL) {
                $error = 'The email is not correct.';
                include('../errors/error.php');
            } else {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $loginAttempt = TechnicianDB::doesTechnicianExist($email);
                if ($loginAttempt == 1) {
                    session_start();
                    $_SESSION['technicianEmail'] = $email;
                    $technician = TechnicianDB::getTechnicianByEmail($email);
                    $incidents = getIncidentsAssigned($technician['techID']);
                    if(count($incidents) > 0) {
                        include('../view/selectUpdateIncidentForm.php');
                    } else {
                        include('../view/noIncidentsToUpdate.php');
                    }
                } else {
                    $error = 'The technician doesn\'t exist';
                    include('../errors/error.php');
                }
            }
            break;
        case 'updateIncidentForm':
            session_start();
            $incidentId = $_POST['incidentId'];
            $incident = getIncidentById($incidentId);
            include('../view/updateIncidentForm.php');
            break;
        case 'updateIncident':
            $incidentId = filter_input(INPUT_POST, 'incidentId', FILTER_VALIDATE_INT);
            if($incidentId == FALSE){
                $error = 'The incident id should be set.';
                include('../errors/error.php');
            } elseif ($incidentId == NULL) {
                $error = 'The incident id is not a whole number.';
                include('../errors/error.php');
            } else {
                $incidentId = filter_var($incidentId, FILTER_SANITIZE_NUMBER_INT);
                $date = filter_input(INPUT_POST, 'date');
                if($date == FALSE){
                    $error = 'The date should be set.';
                    include('../errors/error.php');
                } elseif ($date == NULL) {
                    $error = 'The date is not a correct.';
                    include('../errors/error.php');
                } else {
                    $error = preg_match('/^[01]\d\/\d{2}\/\d{4}$/',$date);
                    if ($error != 1) {
                        $error = 'The date is not in correct format use 00/00/0000.';
                        include('../errors/error.php');
                    } else {
                        $description = filter_input(INPUT_POST, 'description');
                        if($description == FALSE) {
                            $error = 'The description should be set.';
                            include('../errors/error.php');
                        } elseif($description == NULL) {
                            $error = 'The description is not right.';
                            include('../errors/error.php');
                        } elseif(strlen($description) > 2000) {
                            $error = 'The description is too long.';
                            include('../errors/error.php');
                        } else {
                            session_start();
                            $date = strtotime($date);
                            $date = date('Y-m-d H:i:s', $date);
                            updateIncident($incidentId, $date, $description);
                            include('../view/thisIncidentWasUpdated.php');
                        }
                    }
                }
            }
            break;
            case 'logout':
                session_start();
                $_SESSION = array();
                session_destroy();
                header('Location: .');
                break;
        default:
            $error = '/incident_update/index.php $action does\'t have a proper value. $action = ' . $action; 
            include('../errors/error.php');
            break;
    }
?>