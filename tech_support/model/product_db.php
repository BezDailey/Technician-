<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getProducts() {
    global $db;
    $query = "SELECT * FROM products";
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function deleteProduct($productCode) {
    global $db;
    $query = 'DELETE FROM products WHERE productCode = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $statement->closeCursor();
}

function addProduct($productCode, $name, $version, $releaseDate) {
    global $db;
    $query = 'INSERT INTO products (productCode, name, version, releaseDate) VALUES (:productCode, :name, :version, :releaseDate)';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':releaseDate', $releaseDate);
    $statement->execute();
    $statement->closeCursor();
}

?>