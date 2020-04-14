<?php
    class TechnicianDB {
        /**
         * Gets all technicians in tech_support database.
         * 
         * @return array $technicians An array of Technician objects.
         * @throws PDOExcepetion if error in PDO object.
         */
        public static function getTechnicians() {
            //gets database to connect to
            $db = Database::getDB();
            //query to act on database with
            $query = 'SELECT * FROM technicians';
            //used to catch possible database errors
            try {
                $statement = $db->prepare($query);
                $statement->execute();
                $rows = $statement->fetchAll();
                $statement->closeCursor();  
                foreach ($rows as $row) {
                    $technician = new Technician($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
                    $technicians[] = $technician;
                }
                return $technicians;           
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }

        /**
         * Deletes technician from tech_support with the given value of techID.
         * 
         * @param int $techID
         * @throws PDOException if error in PDO object
         */
        public static function deleteTechnician($techID) {
            $db = Database::getDB();
            $query = 'DELETE FROM technicians WHERE techID = :techId';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':techId', $techID);
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }

        /**
         * Adds technician to database.
         * 
         * @param string $firstName First name of technician.
         * @param string $lastName Last name of technician.
         * @param string $email Email of technician.
         * @param string $phone Phone number of technician.
         * @param string $password Password of technician.
         * 
         * @throws PDOException if error in PDO object
         * 
         * @return void
         */
        public static function addTechnician($firstName, $lastName, $email, $phone, $password) {
            $db = Database::getDB();
            $query = 'INSERT INTO technicians (firstName, lastName, email, phone, password) VALUES (:firstName, :lastName, :email, :phone, :password)';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':firstName', $firstName);
                $statement->bindValue(':lastName', $lastName);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':phone', $phone);
                $statement->bindValue(':password', $password);
                $statement->execute();
                $statement->closeCursor();     
            } catch (PDOException $e){
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }

        public static function getTechniciansWithIncidents() {
            $db = Database::getDB();
            $query = 'SELECT technicians.firstName, technicians.lastName, technicians.techID, COUNT(incidents.techID) FROM technicians LEFT OUTER JOIN incidents ON technicians.techID = incidents.techID GROUP BY technicians.techID';
            try {
                $statement = $db->prepare($query);
                $statement->execute();
                $technicians = $statement->fetchAll();
                $statement->closeCursor();  
                return $technicians;
            } catch (PDOException $e){
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }

        public static function getTechnicianById($techId) {
            $db = Database::getDB();
            $query = 'SELECT * FROM technicians WHERE techID = :techId';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':techId', $techId);
                $statement->execute();
                $technician = $statement->fetch();
                $statement->closeCursor();  
                return $technician;   
            } catch (PDOException $e){
                $error = $e->getMessage();
                Database::display_db_error($error);
            }

        }

        public static function getTechnicianByEmail($email) {
            $db = Database::getDB();
            $query = 'SELECT * FROM technicians WHERE email = :email';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':email', $email);
                $statement->execute();
                $technician = $statement->fetch();
                $statement->closeCursor();  
                return $technician;   
            } catch (PDOException $e){
                $error = $e->getMessage();
                Database::display_db_error($error);
            }

        }

        public static function doesTechnicianExist($email, $password) {
            $db = Database::getDB();
            $query = 'SELECT COUNT(*) FROM `technicians` WHERE email = :email AND password = :password';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':password', $password);
                $statement->execute();
                $row = $statement->fetch();
                $statement->closeCursor();
                if($row[0] != 0) {
                    return true;
                } else {
                    return false;
                }  
            } catch (PDOException $e){
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }
    }
?>