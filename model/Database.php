<?php
//class holding DB connection created using PDO
class Database {
    private static $dsn = 'mysql:host=sql1.njit.edu;dbname=db';
    private static $username = 'user';
    private static $password = 'password';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>
