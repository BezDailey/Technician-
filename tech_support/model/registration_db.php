<?php
    function registerProduct($customerId, $productCode, $registrationDate) {
        try {            
            global $db;
            $query = 'INSERT INTO registrations (customerID, productCode, registrationDate) VALUES (:customerId, :productCode, :registrationDate)';
            $statement = $db->prepare($query);
            $statement->bindValue(':customerId', $customerId);
            $statement->bindValue(":productCode", $productCode);
            $statement->bindValue("registrationDate", $registrationDate);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }
?>