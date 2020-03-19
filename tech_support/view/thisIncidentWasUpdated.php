<?php include('header.php'); ?>
    <div id='main'>
        <h1>Update Incident</h1>
        <p>This incident was updated.</p>
        <ul class="nav">
            <li><a href="../incident_update/index.php">Select Another Incident</a></li>
        </ul>
        <form action='../incident_update/index.php'>
            <p>You are logged in as <?php echo $_SESSION['technicianEmail']; ?><p>
            <input type='hidden' name='action' value='logout' />
            <input type='submit' value='Logout' />
        </form>
    </div>
<?php include('footer.php'); ?>