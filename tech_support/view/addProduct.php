<?php include 'header.php'; ?>
    <div id="main">
        <h1>Add Product</h1>
        <form action="product_manager/index.php" method="post">
            <table id="no_border">
                <tr>
                    <td><label for="productCode">Code:</label></td>
                    <td><input type="text" name="productCode" id="productCode" /></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="productName">Name:</label></td>
                    <td><input type="text" name="productName" id="productName" /></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="productVersion">Version:</label></td>
                    <td><input type="text" name="productVersion" id="productVersion" /></td>
                    <td><input type='hidden' name='action' value="addProduct" /></td>
                </tr>
                <tr>
                    <td><label for="productReleaseDate">Release Date:</label></td>
                    <td><input type="text" name="productReleaseDate" id="productReleaseDate" /></td>
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