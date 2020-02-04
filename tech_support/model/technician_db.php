<?php
    function getTechnicians() {
        global $db;
        $query = 'SELECT * FROM technicians';
        $statement = $db->prepare($query);
        $statement->execute();
        $technicians = $statement->fetchAll();
        $statement->closeCursor();
        return $technicians;
    }

    function deleteTechnician($techId) {
        global $db;
        $query = 'DELETE FROM technicians WHERE techID = :techId';
        $statement = $db->prepare($query);
        $statement->bindValue(':techId', $techId);
        $statement->execute();
        $statement->closeCursor();
    }

    function addTechnician($firstName, $lastName, $email, $phone, $password) {
        global $db;
        $query = 'INSERT INTO technicians (firstName, lastName, email, phone, password) VALUES (:firstName, :lastName, :email, :phone, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }
?>