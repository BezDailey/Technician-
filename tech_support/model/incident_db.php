<?php 
    function addIncident($customerId, $productCode, $dateOpened, $title, $description) {
        try {
            $db = Database::getDB();
            $query = 'INSERT INTO incidents (customerID, productCode, dateOpened, title, description) VALUES (:customerId, :productCode, :dateOpened, :title, :description)';
            $statement = $db->prepare($query);
            $statement->bindValue(':customerId', $customerId);
            $statement->bindValue(':productCode', $productCode);
            $statement->bindValue(':dateOpened', $dateOpened);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $description);
            $statement->execute();
            $statement->closeCursor();          
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function getIncidents() {
        try {
            $db = Database::getDB();
            $query = 'SELECT * FROM incidents';
            $statement = $db->prepare($query);
            $statement->execute();
            $incidents = $statement->fetchAll();
            $statement->closeCursor();
            return $incidents;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function getIncidentById($incidentId) {
        try {
            $db = Database::getDb();
            $query = 'SELECT customers.firstName, customers.lastName, incidents.productCode, incidents.incidentID, incidents.dateOpened, incidents.title, incidents.description FROM incidents INNER JOIN customers ON incidents.customerID = customers.customerID WHERE incidents.incidentID = :incidentId';
            $statement = $db->prepare($query);
            $statement->bindValue(':incidentId', $incidentId);
            $statement->execute();
            $rows = $statement->fetch();
            $statement->closeCursor();
            return $rows;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function getIncidentsAssigned($techId) {
        try {
            $db = Database::getDb();
            $query = 'SELECT customers.firstName, customers.lastName, incidents.productCode, incidents.dateOpened, incidents.title, incidents.description, incidents.incidentID FROM incidents INNER JOIN customers ON incidents.customerID = customers.customerID WHERE incidents.techID = :techId AND incidents.dateClosed IS NULL';
            $statement = $db->prepare($query);
            $statement->bindValue(':techId', $techId);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function getIncidentsAndCustomers() {
        try {
            $db = Database::getDb();
            $query = 'SELECT customers.firstName, customers.lastName, incidents.productCode, incidents.dateOpened, incidents.title, incidents.description, incidents.incidentID FROM incidents INNER JOIN customers ON incidents.customerID = customers.customerID WHERE incidents.techID IS NULL';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function getIncidentsAndCustomersUnassigned() {
        try {
            $db = Database::getDb();
            $query = 'SELECT customers.firstName, customers.lastName, incidents.productCode, incidents.dateOpened, incidents.title, incidents.description, incidents.incidentID, products.name 
            FROM incidents 
            INNER JOIN customers ON incidents.customerID = customers.customerID 
            INNER JOIN products ON incidents.productCode = products.productCode
            WHERE incidents.techID IS NULL';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function getIncidentsAndCustomersAssigned() {
        try {
            $db = Database::getDb();
            $query = 'SELECT customers.firstName, customers.lastName, incidents.productCode, incidents.dateOpened, incidents.title, incidents.description, incidents.incidentID, incidents.dateClosed, products.name 
            FROM incidents 
            INNER JOIN customers ON incidents.customerID = customers.customerID 
            INNER JOIN products ON incidents.productCode = products.productCode
            WHERE incidents.techID IS NOT NULL';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function assignIncident($techId, $incidentId) {
        try {
            $db = Database::getDb();
            $query = 'UPDATE incidents SET techID = :techId WHERE incidentID = :incidentId';
            $statement = $db->prepare($query);
            $statement->bindValue(':incidentId', $incidentId);
            $statement->bindValue(':techId', $techId);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function updateIncident($id, $date, $description) {
        try {
            $db = Database::getDb();
            $query = 'UPDATE incidents SET dateClosed = :date, description = :description WHERE incidentID = :id';
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':date', $date);
            $statement->bindValue(':description', $description);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

?>