<?php include 'header.php'; ?>
    <div id="main">
        <h1>Add Product</h1>
        <form action="../product_manager/index.php" method="post">
            <input type='hidden' name='action' value="addProduct" />
            <table id="no_border">
                <tr>
                    <td><label for="productCode">Code:</label></td>
                    <td><input type="text" name="productCode" id="productCode" required/></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="productName">Name:</label></td>
                    <td><input type="text" name="productName" id="productName" required/></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="productVersion">Version:</label></td>
                    <td><input type="text" name="productVersion" id="productVersion" required/></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="productReleaseDate">Release Date:</label></td>
                    <td><input type="text" name="productReleaseDate" id="productReleaseDate" required/></td>
                    <td><p>Use 'yyyy-mm-dd' format</p></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' value='Add Product' /></td>
                    <td></td>
                </tr>               
            </table>
        </form>
        <ul class="nav"><li><a href="../product_manager/index.php?action=listProducts">View Product List</a></li></ul>
    </div>
<?php include 'footer.php'; ?>