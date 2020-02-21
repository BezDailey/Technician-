<?php include 'header.php'; ?>
    <div id='main'>
        <h1>Add Technician</h1>
        <form action="../technician_manager/index.php" method='post' >
            <input type='hidden' name='action' value='addTechnician' />
            <table id='no_border'>
                <tr>
                    <td>First Name:</td>
                    <td><input type='text' name='technicianFirstName' required/><?php echo $firstNameField->getHTML(); ?></td>
                    
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type='text' name='technicianLastName' required/><?php echo $lastNameField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type='email' name='technicianEmail' required/><?php echo $emailField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type='tel' name='technicianPhone' required/><?php echo $phoneField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type='password' name='technicianPassword' required/><?php echo $passwordField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' value='Add Technician' /></td>
                </tr>
            </table>
            <ul class="nav"><li><a href="../technician_manager/index.php?action=listTechnicians">View Technician List</a></li></ul>
        </form>
    </div>
<?php include 'footer.php'; ?>