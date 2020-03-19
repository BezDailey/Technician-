<?php
require_once('../model/database.php');
require_once('../model/product_db.php');
require_once('../model/database_oo.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'listProducts';
}

switch ($action) {
    case 'under_construction':
        include('../under_construction.php');
        break;
    case 'listProducts':
        $products = getProducts();
        include('../view/productList.php');
        break;
    case 'deleteProduct':
        if (isset($_POST['productCode'])) {
            $productCode = $_POST["productCode"];
            deleteProduct($productCode);
            header('Location: .?action=listProducts');
        } else {
            header("Location: .?action=under_construction");
        }
        break;
    case 'addProduct':
        if (isset($_POST['productCode']) && isset($_POST['productName']) && isset($_POST['productVersion']) && isset($_POST['productReleaseDate'])) {
            $productCode = $_POST['productCode'];
            $name = $_POST['productName'];
            $version = $_POST['productVersion'];
            $releaseDate = $_POST['productReleaseDate'];
            try {
                $dateObject = new DateTime($releaseDate);     
            } catch (Exception $e) {
                $error = $e->getMessage();
                include('../errors/error.php');
            }
            $releaseDate = $dateObject->format('Y-m-d H:i:s');
            addProduct($productCode, $name, $version, $releaseDate);
            header("Location: ../product_manager/index.php?action=listProducts");
        } else {        
            header("Location: ../product_manager/index.php?action=errorPage&error=You don't have all required information");
        }
        break;
    case 'errorPage':
        $error = $_GET['error'];
        include("../errors/error.php");
        break;
    default:
        $error = '/product_manager/index.php action does not have a value';
        include('../errors/error.php');
        break;
}
?>