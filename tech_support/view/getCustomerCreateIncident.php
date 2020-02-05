<?php include 'header.php'; ?>
    <div id=main> 
        <h1>Get Customer</h1>
        <form action="../incident_create/index.php" method='post'>
            <input type='hidden' name='action' value='getCustomerAttempt' />
            <label>Email: </label>
            <input type='email' name='customerEmail' maxlength='50' required/>
            <input type='submit' value='Get Customer'/>
        </form>
    </div>
<?php include 'footer.php'; ?>