<?php include('header.php'); ?>
    <div id='main'>
        <h1>Register Product</h1>
        <table id='no_border'>
            <form action='../product_register/index.php' method='post'>
                <input type='hidden' name='action' value='registerProduct' />
                <tr>
                    <td>Customer:</td>
                    <td><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?><td>
                </tr>
                <tr>
                    <td>Product:</td>
                    <td>
                        <select name='productName'>
                            <?php foreach($products as $row): ?>
                                <option value='<?php echo $row['productCode'];?>'><?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Register Product' />
                    </td>
                </tr>
            </form>
        </table> 
    </div>
<?php include('footer.php'); ?>