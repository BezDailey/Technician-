<?php include('header.php'); ?>
    <div id='main'>
        <h1>Update Incident</h1>
        <p>There are no open incidents for this technician</p>
        <a href='.'>Refresh List of Incidents</a>
        <form action='../incident_update/index.php'>
            <p>You are logged in as <?php echo $_SESSION['technicianEmail']; ?><p>
            <input type='hidden' name='action' value='logout' />
            <input type='submit' value='Logout' />
        </form>
    </div>
<?php include('footer.php'); ?>