<?php include 'header.php'; ?>
<div id='main'>
    <h1>Technician List</h1>
    <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Password</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($technicians as $row): ?>
                <tr>
                    <td><?php echo $row->getFullName(); ?></td>
                    <td><?php echo $row->getEmail(); ?></td>
                    <td><?php echo $row->getPhone(); ?></td>
                    <td><?php echo $row->getPassword(); ?></td>
                    <td>
                        <form action='../technician_manager/index.php' method='post'>
                            <input type='hidden' name='action' value='deleteTechnician' />
                            <input type='hidden' name='technicianId' value='<?php echo $row->getTechID(); ?>' />
                            <input type='submit' value='Delete' />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <ul class="nav"><li><a href="../view/addTechnician.php">Add Technician</a></li></ul>
</div>
<?php include 'footer.php'; ?>