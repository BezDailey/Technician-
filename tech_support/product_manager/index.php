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
    if (isset($_POST['productCode']) && isset($_POST['productName']) && isset($_POST['productVersion']) && isset($_POST['productReleaseDate'])) {
        $productCode = $_POST['productCode'];
        $name = $_POST['productName'];
        $version = $_POST['productVersion'];
        $releaseDate = $_POST['productReleaseDate'];
        addProduct($productCode, $name, $version, $releaseDate);
        header("Location: ../product_manager/index.php?action=listProducts");
    } else {        
        header("Location: ../product_manager/index.php?action=errorPage&error=You don't have all required information");
    }
}

if($action == 'errorPage') {
    $error = $_GET['error'];
    include("../view/error.php");
}
?>