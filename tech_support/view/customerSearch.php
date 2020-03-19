<?php include 'header.php'; ?>
    <div id='main'>
        <h1>Customer Search</h1>
        <form action='../customer_manager/index.php' method='post'>
            <input type='hidden' name='action' value='searchCustomers' />
            <label>Last Name: </label>
            <input type='text' name='customerLastName' maxlength='50' required/>
            <input type='submit' value='Search' />
        </form>
        <?php if(!empty($customers)): ?>
            <h1>Results</h1>
            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email Address</td>
                        <td>City</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($customers as $row): ?>
                        <tr>
                            <td><?php echo $row['firstName'] . ' ' . $row['lastName']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td>
                                <form action='../customer_manager/index.php' method='post'>
                                    <input type='hidden' name='action' value='selectCustomer' />
                                    <input type='hidden' name='customerId' value='<?php echo $row['customerID']; ?>' required/>
                                    <input type='submit' value='Select' />
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <h1>Add a new customer</h1>
        <form action='../customer_manager/index.php' method='post'>
            <input type='hidden' name='action' value='addCustomerForm' />
            <input type='submit' value='Add Customer' />
        </form>
    </div>
<?php include 'footer.php'; ?>