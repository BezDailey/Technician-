<?php 

class AdministratorsDB {
    public static function adminExist($username, $password) {
        $db = Database::getDB();
        $query = 'SELECT COUNT(*) FROM administrators WHERE username = :username AND password = :password';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);
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