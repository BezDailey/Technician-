<?php include 'header.php'; ?>
<div id='main'>
    <h1>Assign Incident</h1>
    <?php if($postBack): ?>
        <p>This incident was assigned to a technician.</p>
        <a href="../assign_incident/index.php">Select Another Incident</a>
    <?php else: ?>
        <table id='no_border'>
            <tr>
                <td>Customer:</td>
                <td><?php echo $customerName ?></td>
            </tr>
            <tr>
                <td>Product:</td>
                <td><?php echo $productCode ?></td>
            </tr>
            <tr>
                <td>TechnicianName:</td>
                <td><?php echo $technicianName ?></td>
            </tr>
        </table>
        <form action='../assign_incident/index.php' method='post'>
            <input type='hidden' name='action' value='assignIncident' />
            <input type='submit' value='Assign Incident' />
        </form>
    <?php endif; ?>
</div>
<?php include 'footer.php'; ?>