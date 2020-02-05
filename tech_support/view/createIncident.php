<?php include('header.php'); ?>
    <div id='main'>
        <h1>Create Incident</h1>
        <form action='../incident_create/index.php' method='post'>
            <input type='hidden' name='action' value='createIncident' />
            <input type='hidden' name='customerId' value='<?php echo $customer['customerID'];?>' />
            <table id='no_border'>
                <tr>
                    <td>Customer</td>
                    <td><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?></td>
                </tr>
                <tr>
                    <td>Product:</td>
                    <td>
                        <select name='incidentProductCode' required>
                            <?php foreach($products as $row): ?>
                                <option value='<?php echo $row['productCode']; ?>'><?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Title:</td>
                    <td><input type='text' name='incidentTitle' required/></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name='incidentDescription' required></textarea>                                                    
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Create Incident'/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
<?php include('footer.php'); ?>