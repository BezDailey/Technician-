<?php
    function getCountry ($countryCode) {
        global $db;
        $query = "SELECT * FROM countries WHERE countryCode = ?";
        $statement = $db->prepare($query);
        $statement->bindValues(1, $countryCode);
        $statement->execute();
        $country = $statement->fetchAll();
        $statement->closeCursor();
        return $country;
    }

    function getCountries () {
        global $db;
        $query = "SELECT * FROM countries";
        $statement = $db->prepare($query);
        $statement->execute();
        $countries = $statement->fetchAll();
        $statement->closeCursor();
        return $countries;
    }
?>