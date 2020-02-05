<?php 
    function createIncident($customerId, $productCode, $dateOpened, $title, $description) {
        global $db;
        $query = 'INSERT INTO incidents (customerID, productCode, dateOpened, title, description) VALUES (:customerId, :productCode, :dateOpened, :title, :description)';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->bindValue(':productCode', $productCode);
        $statement->bindValue(':dateOpened', $dateOpened);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor();
    }
?>