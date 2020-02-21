<?php include 'header.php'; ?>
    <div id='main'>
        <h1>View/Update Customer</h1>
        <table id='no_border'>
            <form action='../customer_manager/index.php' method='post'>
                <input type='hidden' name='action' value='updateCustomer' />
                <input type='hidden' name='customerId' value='<?php echo $customerId?>'/>
                <tr>
                    <td><label>First Name:</label></td>
                    <td><input type='text' value='<?php echo $customer['firstName']; ?>' name='customerFirstName' required/><?php echo $firstNameField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Last Name:</label></td>
                    <td><input type='text' value='<?php echo $customer['lastName']; ?>' name='customerLastName' required/><?php echo $lastNameField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Address:</label></td>
                    <td><input type='text' value='<?php echo $customer['address']; ?>' name='customerAddress' required/><?php echo $addressField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>City:</label></td>
                    <td><input type='text' value='<?php echo $customer['city']; ?>' name='customerCity' required/><?php echo $cityField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>State:</label></td>
                    <td><input type='text' value='<?php echo $customer['state']; ?>' name='customerState' required/><?php echo $stateField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Postal Code:</label></td>
                    <td><input type='text' value='<?php echo $customer['postalCode']; ?>' name='customerPostalCode' required/><?php echo $postalCodeField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Country:</label></td>
                    <td>
                        <select name="customerCountryCode" required>
                            <?php foreach($countries as $country): ?>
                                <option value='<?php echo $country['countryCode']; ?>' <?php if($country['countryCode'] == $customer['countryCode']) echo "selected";?>><?php echo $country['countryName']; ?></option>
                            <?php endforeach; ?> 
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Phone:</label></td>
                    <td><input type='text' value='<?php echo $customer['phone']; ?>' name='customerPhone' required/><?php echo $phoneField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type='text' value='<?php echo $customer['email']; ?>' name='customerEmail' required/><?php echo $emailField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td><input type='text' value='<?php echo $customer['password']; ?>' name='customerPassword' required/><?php echo $passwordField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' value='Update Customer' /></td>
                </tr>
            </form>
        </table>
    </div>
<?php include 'footer.php'; ?>