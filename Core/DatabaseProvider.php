<?php

namespace Aron\Core;

use Exception;
use PDO;

class DatabaseProvider {
    private static $dataBase;

    /**
     * databaseProvider constructor.
     * @throws Exception
     */
     public function __construct() {
         throw new Exception("Cannot create instance of databaseProvider");
     }

     /**
     * @return PDO
     */
     public static function getDb(): PDO
     {
         if (self::$dataBase === null) {
             $dsn = 'mysql:dbname=' . $_ENV['DB_NAME'] . ';host=' . $_ENV['DB_HOST'] ;
             $user = $_ENV['DB_USER'];
             $password = $_ENV['DB_PASSWORD'];
             self::$dataBase = new PDO($dsn, $user, $password);
             self::$dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         }
         return self::$dataBase;
     }
}
