<?php include 'header.php'; ?>
    <div id="main">
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Version</th>
                    <th>Release Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product["productCode"]; ?></td>
                        <td><?php echo $product["name"]; ?></td>
                        <td><?php echo $product["version"]; ?></td>
                        <td><?php echo $product["releaseDate"]; ?></td>
                        <td>
                            <form action="product_manager/index.html" method="post">
                                <input type="hidden" name="action" value="deleteProduct" />
                                <input type="hidden" name="productCode" value="<?php echo $product["productCode"]; ?>" />
                                <input type="submit" value="Delete" />
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <ul class="nav"><li><a href="../view/addProduct.php">Add Product</a></li></ul>
    </div>
<?php include 'footer.php'; ?>