<?php include 'header.php'; ?>
<div id='main'>
    <h1>Technician Login</h1>
    <p>You must login before you can update an incident.</p>
    <form action='../incident_update/index.php' method='post'>
        <input type='hidden' name='action' value='login' />
        <table id='no_border'>
            <tr>
                <td>Email:</td>
                <td><input type='email' name='email' required/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type='password' name='password' required/></td>
            </tr>
            <tr>
                <td></td>
                <td> <input type='submit' value='Login' /></td>
            </tr>
        </table>
    </form>
</div>
<?php include 'footer.php'; ?>