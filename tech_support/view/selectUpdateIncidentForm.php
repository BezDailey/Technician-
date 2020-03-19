<?php include 'header.php'; ?>
<div id='main'>
    <h1>Select Incident</h1>
    <table>
        <thead>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Date Opened</th>
                <th>Title</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($incidents as $row): ?>
                <tr>
                    <td><?php echo $row[0] . " " . $row[1] ?></td>
                    <td><?php echo $row['productCode']; ?></td>
                    <td>
                        <?php
                            $date = $row['dateOpened']; 
                            $datef = date("m/d/Y", strtotime($date));
                            echo $datef;
                        ?>
                     </td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <form action='../incident_update/index.php' method='post'>
                            <input type='hidden' name='action' value='updateIncidentForm' />
                            <input type='hidden' name='incidentId' value='<?php echo $row['incidentID'] ?>' />
                            <input type='submit' value='select' />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form action='../incident_update/index.php'>
        <p>You are logged in as <?php echo $_SESSION['technicianEmail']; ?><p>
        <input type='hidden' name='action' value='logout' />
        <input type='submit' value='Logout' />
    </form>
</div>
<?php include 'footer.php'; ?>