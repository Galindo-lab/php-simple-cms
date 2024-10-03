<?php 


require_once __DIR__ . '/../base/Connection.php';

class UserManager {
    public static function all(): array {
        $dbConnection =  Connection::getInstance()->getConnection();
        $query =  'SELECT * FROM Users';
        return $dbConnection->query($query)->fetch_all(mode: MYSQLI_ASSOC);
    }
}

