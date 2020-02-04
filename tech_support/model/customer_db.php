<?php 
    function getCustomersByLastName($customerLastName) {
        global $db;
        $query = 'SELECT * FROM customers WHERE lastName = :lastName';
        $statement = $db->prepare($query);
        $statement->bindValue(':lastName', $customerLastName);
        $statement->execute();
        $customers = $statement->fetchAll();
        $statement->closeCursor();
        return $customers;
    }

    function getCustomer($customerId) {
        global $db;
        $query = 'SELECT * FROM customers WHERE customerID = :customerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerID', $customerId);
        $statement->execute();
        $customer = $statement->fetch();
        $statement->closeCursor();
        return $customer;
    }

    function updateCustomer($customerId, $customerFirstName, $customerLastName, $customerAddress, $customerCity, $customerState, $customerPostalCode, $customerCountryCode, $customerPhone, $customerEmail, $customerPassword) {
        global $db;
        $query = 'UPDATE customers SET firstName = :firstName, lastName = :lastName, address = :address, city = :city, state = :state, postalCode = :postalCode, countryCode = :countryCode, phone = :phone, email = :email, password = :password WHERE customerID = :customerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $customerFirstName);
        $statement->bindValue(':lastName', $customerLastName);
        $statement->bindValue(':address', $customerAddress);
        $statement->bindValue(':city', $customerCity);
        $statement->bindValue('state', $customerState);
        $statement->bindValue(':postalCode', $customerPostalCode);
        $statement->bindValue(':countryCode', $customerCountryCode);
        $statement->bindValue(':phone', $customerPhone);
        $statement->bindValue(':email', $customerEmail);
        $statement->bindValue(':password', $customerPassword);
        $statement->bindValue(':customerID', $customerId);
        $statement->execute();
        $statement->closeCursor();
    }
?>