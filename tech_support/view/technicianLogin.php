<?php include 'header.php'; ?>
<div id='main'>
    <h1>Technician Login</h1>
    <p>You must login before you can update an incident.</p>
    <form action='../incident_update/index.php' method='post'>
        <input type='hidden' name='action' value='login' />
        <p>Email:
        <input type='email' name='email' required/>
        <input type='submit' value='Login' /></p>
    </form>
</div>
<?php include 'footer.php'; ?>