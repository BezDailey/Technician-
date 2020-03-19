<?php include('header.php'); ?>
    <div id='main'>
        <h1>Update Incident</h1>
        <p>You don't have any incidents assigned.</p>
        <form action='../incident_update/index.php'>
            <p>You are logged in as <?php echo $_SESSION['technicianEmail']; ?><p>
            <input type='hidden' name='action' value='logout' />
            <input type='submit' value='Logout' />
        </form>
    </div>
<?php include('footer.php'); ?>