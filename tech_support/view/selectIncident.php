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
            <?php foreach($incidentsWithCustomers as $row): ?>
                <tr>
                    <td><?php echo $row[0] . " " . $row[1] ?></td>
                    <td><?php echo $row['productCode']; ?></td>
                    <td><?php echo $row['dateOpened']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <form action='../assign_incident/index.php' method='post'>
                            <input type='hidden' name='action' value='selectTechnician' />
                            <input type='hidden' name='incidentId' value='<?php echo $row[6];?>' />
                            <input type='submit' value='select' />
                        </form>
                    </td>
                </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>