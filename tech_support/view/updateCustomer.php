<?php include 'header.php'; ?>
    <?php 
        //checking postback status of page
        if(isset($_COOKIE['postBack'])) {
            $postBack = true;
            $expire = strtotime('-1 year');
            setcookie('postBack', '', $expire, '/');
        } else {
            $postBack = false;
        }

        switch ($postBack) {
            case false: 
                if (isset($customer)){
                    //seting vars to be displayed on form
                    $customerFirstNameField = $customer['firstName'];
                    $customerLastNameField = $customer['lastName'];
                    $customerAddressField = $customer['address'];
                    $customerCityField = $customer['city'];
                    $customerStateField = $customer['state'];
                    $customerPostalCodeField = $customer['postalCode'];
                    $customerPhoneField = $customer['phone'];
                    $customerEmailField = $customer['email'];
                    $custmerPasswordField = $customer['password'];
                } else {
                    $customerFirstNameField =  '';
                    $customerLastNameField =  '';
                    $customerAddressField =  '';
                    $customerCityField = '';
                    $customerStateField = '';
                    $customerPostalCodeField =  '';
                    $customerPhoneField =  '';
                    $customerEmailField =  '';
                    $custmerPasswordField = '';
                    $addCustomer = true;
                }
                break;
            case true:
                //setting vars to display previous values if postback
                $customerFirstNameField = $firstNameField->getValue();
                $customerLastNameField = $lastNameField->getValue();
                $customerAddressField = $addressField->getValue();
                $customerCityField = $cityField->getValue();
                $customerStateField = $stateField->getValue();
                $customerPostalCodeField = $postalCodeField->getValue();
                $customerPhoneField = $phoneField->getValue();
                $customerEmailField = $emailField->getValue();
                $custmerPasswordField = $passwordField->getValue();
                break;
            default:
                $error = "postBack var doesn't have a proper value";
                include('../errors/error.php');
                break;
        }
    ?>
    <div id='main'>
        <h1>Add/Update Customer</h1>
        <table id='no_border'>
            <form action='../customer_manager/index.php' method='post'>
                <?php if(isset($addCustomer)) : ?>
                    <input type='hidden' name='action' value='addCustomer' />
                <?php else : ?>
                    <input type='hidden' name='action' value='updateCustomer' />
                <?php endif; ?>           
                <input type='hidden' name='customerId' value='<?php echo $customerId?>'/>
                <tr>
                    <td><label>First Name:</label></td>
                    <td><input type='text' value='<?php echo $customerFirstNameField; ?>' name='customerFirstName' required/><?php echo $firstNameField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Last Name:</label></td>
                    <td><input type='text' value='<?php echo $customerLastNameField; ?>' name='customerLastName' required/><?php echo $lastNameField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Address:</label></td>
                    <td><input type='text' value='<?php echo $customerAddressField; ?>' name='customerAddress' required/><?php echo $addressField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>City:</label></td>
                    <td><input type='text' value='<?php echo $customerCityField; ?>' name='customerCity' required/><?php echo $cityField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>State:</label></td>
                    <td><input type='text' value='<?php echo $customerStateField; ?>' name='customerState' required/><?php echo $stateField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Postal Code:</label></td>
                    <td><input type='text' value='<?php echo $customerPostalCodeField; ?>' name='customerPostalCode' required/><?php echo $postalCodeField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Country:</label></td>
                    <td>
                        <select name="customerCountryCode" required>
                            <?php foreach($countries as $country): ?>
                                <?php if(isset($addCustomer)) : ?>
                                    <option value='<?php echo $country['countryCode']; ?>'><?php echo $country['countryName']; ?></option>
                                <?php else : ?>
                                    <option value='<?php echo $country['countryCode']; ?>' <?php if($country['countryCode'] == $customer['countryCode']) echo "selected";?>><?php echo $country['countryName']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?> 
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Phone:</label></td>
                    <td><input type='text' value='<?php echo $customerPhoneField; ?>' name='customerPhone' required/><?php echo $phoneField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type='text' value='<?php echo $customerEmailField; ?>' name='customerEmail' required/><?php echo $emailField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td><input type='text' value='<?php echo $custmerPasswordField; ?>' name='customerPassword' required/><?php echo $passwordField->getHTML(); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <?php if(isset($addCustomer)) : ?>
                        <td><input type='submit' value='Add Customer' /></td>
                    <?php else : ?>
                        <td><input type='submit' value='Update Customer' /></td>
                    <?php endif; ?>
                </tr>
            </form>
        </table>
    </div>
<?php include 'footer.php'; ?>