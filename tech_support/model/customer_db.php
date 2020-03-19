<?php 
    function getCustomersByLastName($customerLastName) {
        try {
            global $db;
            $query = 'SELECT * FROM customers WHERE lastName = :lastName';
            $statement = $db->prepare($query);
            $statement->bindValue(':lastName', $customerLastName);
            $statement->execute();
            $customers = $statement->fetchAll();
            $statement->closeCursor();        
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
        return $customers;
    }

    function addCustomer($customerFirstName, $customerLastName, $customerAddress, $customerCity, $customerState, $customerPostalCode, $customerCountryCode, $customerPhone, $customerEmail, $customerPassword) {
        try {
            global $db;
            $query = 'INSERT INTO customers (firstName, lastName, address, city, state, postalCode, countryCode, phone, email, password)' . 
                           ' VALUES (:firstName, :lastName, :address, :city, :state, :postalCode, :countryCode, :phone, :email, :password)';
            $statement = $db->prepare($query);
            $statement->bindValue(':firstName', $customerFirstName);
            $statement->bindValue(':lastName', $customerLastName);
            $statement->bindValue(':address', $customerAddress);
            $statement->bindValue(':city', $customerCity);
            $statement->bindValue(':state', $customerState);
            $statement->bindValue(':postalCode', $customerPostalCode);
            $statement->bindValue(':countryCode', $customerCountryCode);
            $statement->bindValue(':phone', $customerPhone);
            $statement->bindValue(':email', $customerEmail);
            $statement->bindValue(':password', $customerPassword);
            $statement->execute();
            $statement->closeCursor();  
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function getCustomer($customerId) {
        try {
            global $db;
            $query = 'SELECT * FROM customers WHERE customerID = :customerID';
            $statement = $db->prepare($query);
            $statement->bindValue(':customerID', $customerId);
            $statement->execute();
            $customer = $statement->fetch();
            $statement->closeCursor();           
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
        return $customer;
    }

    function updateCustomer($customerId, $customerFirstName, $customerLastName, $customerAddress, $customerCity, $customerState, $customerPostalCode, $customerCountryCode, $customerPhone, $customerEmail, $customerPassword) {
        try {
            global $db;
            $query = 'UPDATE customers SET firstName = :firstName, lastName = :lastName, address = :address, city = :city, state = :state, postalCode = :postalCode, countryCode = :countryCode, phone = :phone, email = :email, password = :password WHERE customerID = :customerID';
            $statement = $db->prepare($query);
            $statement->bindValue(':firstName', $customerFirstName);
            $statement->bindValue(':lastName', $customerLastName);
            $statement->bindValue(':address', $customerAddress);
            $statement->bindValue(':city', $customerCity);
            $statement->bindValue(':state', $customerState);
            $statement->bindValue(':postalCode', $customerPostalCode);
            $statement->bindValue(':countryCode', $customerCountryCode);
            $statement->bindValue(':phone', $customerPhone);
            $statement->bindValue(':email', $customerEmail);
            $statement->bindValue(':password', $customerPassword);
            $statement->bindValue(':customerID', $customerId);
            $statement->execute();
            $statement->closeCursor();         
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function customerLogin($customerEmail) {
        try {
            global $db;
            $query = "SELECT * FROM customers WHERE email = :email";
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $customerEmail);
            $statement->execute();
            $customer = $statement->rowCount();
            $statement->closeCursor();
            if($customer > 0) {
                return true;
            } else {
                return false;
            }      
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function getCustomerByEmail($customerEmail) {
        try {
            global $db;
            $query = "SELECT * FROM customers WHERE email = :email";
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $customerEmail);
            $statement->execute();
            $customer = $statement->fetch();
            $statement->closeCursor();
            return $customer;   
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }

    function getCustomers() {
        try {
            $db = Database::getDB();
            $query = 'SELECT * FROM customers';
            $statement = $db->prepare($query);
            $statement->execute();
            $customers = $statement->fetchAll();
            $statement->closeCursor();
            return $customers;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            Database::display_db_error($error);
        }
    }
?>