<?php include 'header.php'; ?>
    <div id='main'>
        <table id='no_border'>
            <form action='../customer_manager/index.php' method='post'>
                <input type='hidden' name='action' value='updateCustomer' />
                <input type='hidden' name='customerId' value='<?php echo $customer['customerID'] ?>'/>
                <tr>
                    <td><label>First Name:</label></td>
                    <td><input type='text' value='<?php echo $customer['firstName']; ?>' name='customerFirstName' maxlength='50' required/>
                </tr>
                <tr>
                    <td><label>Last Name:</label></td>
                    <td><input type='text' value='<?php echo $customer['lastName']; ?>' name='customerLastName' maxlength='50' required/>
                </tr>
                <tr>
                    <td><label>Address:</label></td>
                    <td><input type='text' value='<?php echo $customer['address']; ?>' name='customerAddress' maxlength='50' required/>
                </tr>
                <tr>
                    <td><label>City:</label></td>
                    <td><input type='text' value='<?php echo $customer['city']; ?>' name='customerCity' maxlength='50' required/>
                </tr>
                <tr>
                    <td><label>State:</label></td>
                    <td><input type='text' value='<?php echo $customer['state']; ?>' name='customerState' maxlength='50' required/>
                </tr>
                <tr>
                    <td><label>Postal Code:</label></td>
                    <td><input type='text' value='<?php echo $customer['postalCode']; ?>' name='customerPostalCode' maxlength='20' required/>
                </tr>
                <tr>
                    <td><label>Country Code:</label></td>
                    <td><input type='text' value='<?php echo $customer['countryCode']; ?>' name='customerCountryCode' maxlength='2' required/>
                </tr>
                <tr>
                    <td><label>Phone:</label></td>
                    <td><input type='text' value='<?php echo $customer['phone']; ?>' name='customerPhone' maxlength='20' required/>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type='text' value='<?php echo $customer['email']; ?>' name='customerEmail' maxlength='50' required/>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td><input type='text' value='<?php echo $customer['password']; ?>' name='customerPassword' maxlength='20' required/>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' value='Update Customer' />
                </tr>
            </form>
        </table>
    </div>
<?php include 'footer.php'; ?>