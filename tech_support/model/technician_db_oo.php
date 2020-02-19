<?php
    class TechnicianDB {
        public static function getTechnicians() {
            $db = Database::getDB();

            $query = 'SELECT * FROM technicians';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            foreach ($rows as $row) {
                $technician = new Technician($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
                $technicians[] = $technician;
            }
            return $technicians;
        }

        public static function deleteTechnician($techID) {
            $db = Database::getDB();

            $query = 'DELETE FROM technicians WHERE techID = :techId';
            $statement = $db->prepare($query);
            $statement->bindValue(':techId', $techID);
            $statement->execute();
            $statement->closeCursor();
        }

        public static function addTechnician($firstName, $lastName, $email, $phone, $password) {
            $db = Database::getDB();
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
    }
?>