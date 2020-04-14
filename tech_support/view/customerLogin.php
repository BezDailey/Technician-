<?php include 'header.php'; ?>
    <div id=main> 
        <h1>Customer Login</h1>
        <form action="../product_register/index.php" method='post'>
        <input type='hidden' name='action' value='customerLoginAttempt' />
            <table id='no_border'>
                <tr>
                    <td>Email:</td>
                    <td><input type='email' name='customerEmail' maxlength='50' required/></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type='password' name='password' required/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' value='login'/></td>
                </tr>
            </table>
        </form>
    </div>
<?php include 'footer.php'; ?>
