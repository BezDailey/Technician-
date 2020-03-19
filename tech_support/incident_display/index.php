<?php
    require_once('../model/incident_db.php');
    require_once('../model/database_oo.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'displayUnassigned';
    }

    switch($action) {
        case 'displayUnassigned':
            $incidents = getIncidentsAndCustomersUnassigned();
            include('../view/unassignedIncidents.php');
            break;
        case 'displayAssigned':
            $incidents = getIncidentsAndCustomersAssigned();
            include('../view/assignedIncidents.php');
            break;
        default:
            $error = '/incident_display/index.php $action does\'t have a proper value. $action = ' . $action; 
            include('../errors/error.php');
            break;
    }

?>