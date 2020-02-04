<?php include 'header.php'; ?>
    <div id=main> 
        <h1>Customer Login</h1>
        <form action="../product_register/index.php" method='post'>
            <input type='hidden' name='action' value='customerLoginAttempt' />
            <label>Email: </label>
            <input type='email' name='customerEmail' maxlength='50' required/>
            <input type='submit' value='login'/>
        </form>
    </div>
<?php include 'footer.php'; ?>
