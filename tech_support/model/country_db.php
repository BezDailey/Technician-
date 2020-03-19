<?php
    function getCountry ($countryCode) {
        try {
            global $db;
            $query = "SELECT * FROM countries WHERE countryCode = ?";
            $statement = $db->prepare($query);
            $statement->bindValues(1, $countryCode);
            $statement->execute();
            $country = $statement->fetchAll();
            $statement->closeCursor();         
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
        return $country;
    }

    function getCountries () {
        try {
            global $db;
            $query = "SELECT * FROM countries";
            $statement = $db->prepare($query);
            $statement->execute();
            $countries = $statement->fetchAll();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
        return $countries;
    }
?>