<?php
    //require statements
    require_once('../model/database_oo.php');
    require_once('../model/incident_db.php');
    require_once('../model/customer_db.php');
    require_once('../model/technician_db_oo.php');
    require_once('../model/technician.php');
    require_once('../model/authentication.php');
    Authentication::valid_role($admin);
    //gets or sets $action
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'selectIncident';
    }
    //selects a process based on $action
    switch($action){
        case 'selectIncident':
            $incidentsWithCustomers = getIncidentsAndCustomers();
            include('../view/selectIncident.php');
            break;
        case 'selectTechnician':
            $lifetime = 60 * 60 * 24 * 365;
            session_set_cookie_params($lifetime, '/');
            session_start();
            $incidentId = $_POST['incidentId'];
            $_SESSION['incidentId'] = $incidentId;
            $technicians = TechnicianDB::getTechniciansWithIncidents();
            include('../view/selectTechnician.php');
            break;
        case 'assignIncidentForm':
            session_start();
            $technicianId = $_POST['technicianId'];
            $_SESSION['technicianId'] = $technicianId;
            $technician = TechnicianDB::getTechnicianById($technicianId);
            $postBack = false;
            $incidentId = $_SESSION['incidentId'];
            $incident = getIncidentById($incidentId);
            $customerName = $incident[0] . " " . $incident[1];
            $productCode = $incident['productCode'];
            $technicianName = $technician['firstName'] . " " . $technician['lastName'];
            include('../view/assignIncident.php');
            break;
        case 'assignIncident':
            $postBack = true;
            session_start();
            assignIncident($_SESSION['technicianId'], $_SESSION['incidentId']);
            $_SESSION = array();
            session_destroy();
            include('../view/assignIncident.php');
            break;
        default:
            $error = '/assign_incident/index.php $action does\'t have a proper value. $action = ' . $action; 
            include('../errors/error.php');
            break;
    }
?>