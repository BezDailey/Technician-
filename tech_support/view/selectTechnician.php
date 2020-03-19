<?php include 'header.php'; ?>
<div id='main'>
    <h1>Select Technician</h1>
    <table>
        <thead>
            <th>Name</th>
            <th>Open Incidents</th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach($technicians as $row): ?>
                <tr>
                    <td><?php echo $row[0] . " " . $row[1]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td>
                        <form action='../assign_incident/index.php' method='post'>
                            <input type='hidden' name='action' value='assignIncidentForm' />
                            <input type='hidden' name='technicianId' value='<?php echo $row[2]; ?>' />
                            <input type='submit' value='select' />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>