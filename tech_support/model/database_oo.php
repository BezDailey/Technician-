<?php 
    class Database {
    private static $dsn = 'mysql:host=localhost;dbname=tech_support';
    private static $username = 'ts_user';
    private static $password = 'pa55word';
    private static $db;

    private function __construct() {}

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO (self::$dsn, self::$username, self::$password);
            } catch (PDOException $e){
                $error = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }

    public static function display_db_error($error_message) {
        $error = $error_message;
        include('../errors/database_error.php');
        exit();
    }
    }
?>