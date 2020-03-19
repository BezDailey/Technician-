<?php include 'header.php'; ?>
<div id='main'>
    <h1>Update Incident</h1>
    <form action='../incident_update/index.php' method='post'>
        <table id='no_border'>
            <tr>
                <td>Incident ID:</td>
                <td><?php echo $incident['incidentID']; ?></td>
            </tr>
            <tr>
                <td>Product Code:</td>
                <td><?php echo $incident['productCode']; ?></td>
            </tr>
            <tr>
                <td>Date Opened:</td>
                <td>
                    <?php 
                        $date = $incident['dateOpened']; 
                        $datef = date("m/d/Y", strtotime($date));
                        echo $datef;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Date Closed:</td>
                <td><input type='text' name='date' value='' required/></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><?php echo $incident['title']; ?></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea name='description' required><?php echo $incident['description']; ?></textarea></td>
            </tr>
        </table>
        <input type='hidden' name='incidentId' value='<?php echo $incident['incidentID']; ?>' />
        <input type='hidden' name='action' value='updateIncident' />
        <input type='submit' value='Update Incident' />
    </form>
    <form action='../incident_update/index.php'>
        <p>You are logged in as <?php echo $_SESSION['technicianEmail']; ?><p>
        <input type='hidden' name='action' value='logout' />
        <input type='submit' value='Logout' />
    </form>
</div>
<?php include 'footer.php'; ?>