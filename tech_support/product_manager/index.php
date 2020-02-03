<?php
require('../model/database.php');
require('../model/product_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'listProducts';
}

if ($action == 'under_construction') {
    include('../under_construction.php');
}

if($action == 'listProducts') {
    $products = getProducts();
    include('../view/productList.php');
}

if($action == 'deleteProduct') {
    if (isset($_POST['productCode'])) {
        $productCode = $_POST["productCode"];
        deleteProduct($productCode);
        header('Location: .?action=listProducts');
    } else {
        header("Location: .?action=under_construction");
    }
}

if($action == 'addProduct') {

}
?>