<?php
    include_once('../model/authentication.php');
    Authentication::check_permissions('admin');
?>
<?php include('../view/header.php'); ?>
<div id='main'>
    <h1>Admin Menu</h1>
    <ul class="nav">
        <li><a href="../product_manager/index.php">Manage Products</a></li>
        <li><a href="../technician_manager/index.php">Manage Technicians</a></li>
        <li><a href="../customer_manager/index.php">Manage Customers</a></li>
        <li><a href="../incident_create/index.php">Create Incident</a></li>
        <li><a href="../assign_incident/index.php">Assign Incident</a></li>
        <li><a href="../incident_display/index.php">Display Incidents</a></li>
    </ul>
    <h1>Login Status</h1>
    <p>You are logged in as admin</p>
    <form action='.' method='post'>
        <input type='hidden' name='action' value='logout'/>
        <input type='submit' value='Logout'/>
    </form>
</div>
<?php include('../view/footer.php'); ?>