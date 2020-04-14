<?php include('../view/header.php'); ?>
<div id='main'>
    <h1>Admin Login</h1>
    <form action='.' method='post'>
    <input type='hidden' name='action' value='login_attempt' />
    <table id='no_border'>
        <tr>
            <td>Username:</td>
            <td><input type='text' name='username' required/>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type='text' name='password' required/>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' value="Login"/>
        </tr>
    </table>
    </form>
    <?php if(isset($info)): ?>
    <p><?php echo($info); ?></p>
    <?php endif; ?>
</div>
<?php include('../view/footer.php'); ?>