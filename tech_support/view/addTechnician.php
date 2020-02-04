<?php include 'header.php'; ?>
    <div id='main'>
        <h1>Add Technician</h1>
        <form action="../technician_manager/index.php" method='post' >
            <input type='hidden' name='action' value='addTechnician' />
            <table id='no_border'>
                <tr>
                    <td>First Name:</td>
                    <td><input type='text' name='technicianFirstName' maxlength='50' required/></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type='text' name='technicianLastName' maxlength='50' required/></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type='email' name='technicianEmail' maxlength='50' required/></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type='tel' name='technicianPhone' maxlength='20' required/></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type='password' name='technicianPassword' maxlength='20' required/></td>
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